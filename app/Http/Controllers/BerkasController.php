<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerkasController extends Controller
{
    //
    public function index()
    {
        //
        $report = Data::orderBy('created_at','DESC')->paginate(20);
        return view('report_data.index',compact('report'));
    }
}
