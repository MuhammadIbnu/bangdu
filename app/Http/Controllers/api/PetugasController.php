<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PetugasResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class PetugasController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:api_petugas');
    }
    public function profile(){
       
        $user = Auth::guard('api_petugas')->user();
        return response()->json([
            'status'=> true,
            'message'=>"profile tampil",
            'data'=> new PetugasResource($user)
        ], 200);
   }
}
