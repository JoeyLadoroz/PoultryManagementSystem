<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EggProduction;
use Illuminate\Http\Request;

class EggProductionController extends Controller
{
    public function index ()
    {   
        $eggproductions =  EggProduction::all();
        return view ('admin.eggs.production.index',compact('eggproductions'));
    }
    public function show ()
    {   
        $id = $request->id;
        $eggproductions = EggProduction::find($id);
        return response()->json($eggproductions);
    }
    public function edit (Request $request)
    {
        $id = $request->id;
		$eggproductions = EggProduction::find($id);
		return response()->json($eggproductions);
    }

    public function update (Request $request)
    {
		$emp = EggProduction::find($request->emp_id);
		$empData = ['type' => $request->type, 'date' => $request->date, 'quantity' => $request->quantity];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
    }

    public function create ()
    {
       return view ('admin.eggs.production.create');
    }

    public function store (Request $request)
    {
      $this->validate($request,[
            'type' => 'required',
            'date' => 'required',
            'quantity' => 'required|numeric',
      ]);

      $eps = new EggProduction;
      
      $eps->type = $request->input('type');
      $eps->date = $request->input('date');
      $eps->quantity = $request->input('quantity');

      $eps->save();

      return redirect('admin/table-production')->with('success','Data Save');
    }
}
