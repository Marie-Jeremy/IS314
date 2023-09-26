<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;


class PremiumController extends Controller
{
   public function index()
   {
    $policy = Policy::all();
    return view('admin.premium.index', compact('policy'));
   }

   public function edit($policy_id)
   {
    $policy = Policy::find($policy_id);
    return view('admin.premium.edit', compact('policy'));
   }

   public function update(Request $request, $policy_id)
   {
    $policy = Policy::find($policy_id);
    if($policy)
    {
        $policy->premium_amount = $request->premium_amount;
        $policy->update();
        return redirect('admin/premium')->with('message', 'Updated Successfully');
    }
   }
}
