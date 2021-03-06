<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waris;
use App\Data;
use App\Petugas;
use App\Dinkes;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $waris = Waris::count();
        $data = Data::count();
        $petugas = Petugas::count();
        $dinkes = Dinkes::count();
        $data_masuk = Data::orderBy('created_at','DESC')->paginate(5);
        $aktivasi_baru = Waris::orderBy('created_at','DESC')->paginate(5);
        return view('home',compact('waris','data','petugas','dinkes','data_masuk','aktivasi_baru'));
    }
}
