<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PolicyFormRequest;
use Dompdf\Dompdf;

class PolicyController extends Controller
{
    public function index()
    {
        $policy = Policy::all();
        return view('admin.policy.index', compact('policy'));
    }
  
    public function create()
    {
        return view('admin.policy.create');
    }

    public function store(PolicyFormRequest $request)
    {
        $data = $request->validated();

        $policy = new Policy;
        $policy->policy_number = $data['policy_number'];
        $policy->policy_type = $data['policy_type'];
        $policy->plans = $data['plans'];
        $policy->description = $data['description'];
        $policy->coverage_amount = $data['coverage_amount'];
        $policy->policy_duration = $data['policy_duration'];
        $premium = $policy->calculatePremium(); // Calculate the premium amount
        $policy->save();

        return redirect('admin/policy')->with('message', 'Policy Added Successfully');
    }

    public function edit($policy_id)
    {
        $policy = Policy::find($policy_id);
        return view('admin.policy.edit', compact('policy'));
    }

    public function update(PolicyFormRequest $request, $policy_id)
    {
        $data = $request->validated();

        $policy = Policy::find($policy_id);
        $policy->policy_number = $data['policy_number'];
        $policy->policy_type = $data['policy_type'];
        $policy->plans = $data['plans'];
        $policy->description = $data['description'];
        $policy->coverage_amount = $data['coverage_amount'];
        $policy->policy_duration = $data['policy_duration'];
        $premium = $policy->calculatePremium(); // Calculate the premium amount
        $policy->update();

        return redirect('admin/policy')->with('message', 'Policy Updated Successfully');
    }

    public function destroy($policy_id)
    {
        $policy = Policy::find($policy_id);
        if($policy_id)
        {
            $policy->delete();
            return redirect('admin/policy')->with('message','Policy Deleted Successfully');
        }
        else
        {
            return redirect('admin/policy')->with('message', 'No Policy Id Found');
        }
    }

    public function generatePDF()
    {
        $policy = Policy::all();
        if(!$policy){
            return redirect('admin/policy')->with('message', 'No Policy Id Found');
        }
        $html = view('admin.policy.pdf_report', compact('policy'))->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream("policy.pdf", array("Attachment" => false));
    }

    /**public function getDescription($policy_type)
{
  $policy = Policy::where('policy_type', $policy_type)->first();

  if ($policy) {
    return $policy->description;
  }

  return '';
}**/


}
