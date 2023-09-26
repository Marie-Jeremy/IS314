<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Claim;
use App\Http\Requests\Admin\ClaimFormRequest;
use Dompdf\Dompdf;

class ClaimsController extends Controller
{
    public function index()
    {
        $claims = Claim::all();
        return view('admin.claims.index', compact('claims'));
    }

    public function create()
    {
        return view('admin.claims.create');
    }

    public function store(ClaimFormRequest $request)
    {
        // Create a new Claim instance
        $claim = new Claim();

        // Set the values from the form input
        $claim->customer_id = $request->input('customer_id');
        $claim->name = $request->input('name');
        $claim->email = $request->input('email');
        $claim->claim_type = $request->input('claim_type');
        $claim->description = $request->input('description');

        // Upload and store the proof of loss file
        if ($request->hasFile('proof_of_loss')) {
            $file = $request->file('proof_of_loss');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('proof_of_loss', $filename, 'public');
            $claim->proof_of_loss_filename = $filename;
            $claim->proof_of_loss_path = $path;
        }

        // Save the claim
        $claim->save();

        // Redirect back with success message
        return redirect()->route('claims')->with('message', 'Claim added successfully');
    }

    public function edit($id)
    {
        $claim = Claim::findOrFail($id);
        return view('admin.claims.edit', compact('claim'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'claim_type' => 'required',
            'description' => 'required',
            'proof_of_loss' => 'nullable|file|mimes:jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $claim = Claim::findOrFail($id);

        $claim->name = $request->input('name');
        $claim->email = $request->input('email');
        $claim->claim_type = $request->input('claim_type');
        $claim->description = $request->input('description');

        if ($request->hasFile('proof_of_loss')) {
            $proofOfLoss = $request->file('proof_of_loss');
            $proofOfLossPath = $proofOfLoss->store('public/proof_of_loss');
            $claim->proof_of_loss_path = $proofOfLossPath;
        }

        $claim->save();

        return redirect()->route('claims')->with('message', 'Claim updated successfully');

    }

    public function destroy($id)
{
    $claim = Claim::findOrFail($id);
    $claim->delete();

    return redirect()->route('claims')->with('message', 'Claim deleted successfully');
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Pending,Approved,Rejected',
    ]);

    $claim = Claim::findOrFail($id);
    $claim->status = $request->input('status');
    $claim->save();

    return redirect()->route('claims')->with('message', 'Claim status updated successfully');
}

public function generatePDF($id)
    {
        $claim = Claim::find($id);
        if(!$claim){
            return redirect('admin/claims')->with('message', 'Claim not found');
        }
        $html = view('admin.claims.pdf_report', compact('claim'))->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream("claim_report.pdf", array("Attachment" => false));
    }

}
