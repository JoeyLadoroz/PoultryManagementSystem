<?php

namespace App\Http\Controllers\Admin;

use App\Models\EggSales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EggSalesController extends Controller
{
    public function index ()
    {   
        $eggsales =  EggSales::all();
        return view ('admin.eggs.sales.index',compact('eggsales'));
    }
    public function show ()
    {
        // return view ('admin.eggs.production.index',['eggproduction'=>$eggproductions]);
    }

    public function create ()
    {
       return view ('admin.eggs.sales.create');
    }

    public function store (Request $request)
    {
      $this->validate($request,[
            'quantity' => 'required|numeric',
            'revenue' => 'required|numeric',
            'date' => 'required',
      ]);

      $ess = new EggSales();
      
      $ess->quantity = $request->input('quantity');
      $ess->revenue = $request->input('revenue');
      $ess->date = $request->input('date');



      $ess->save();

      return redirect('admin/table-sales')->with('success','Data Save');
    }
}
