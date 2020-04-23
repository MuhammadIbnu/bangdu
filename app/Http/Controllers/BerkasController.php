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

    public function pdf(){

        $report_data = Data::orderBy('created_at','DESC')->where('confirmed_III', '1')->paginate(20);
        $pdf = Data::loadview('data_pdf',['report_data'=>$report_data]);
        return $pdf->stream();
    }
}
