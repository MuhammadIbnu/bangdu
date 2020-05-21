<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DinkesResource;
use Auth;

class DinkesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api_dinkes');
    }
    public function profile(){
       
        $user = Auth::guard('api_dinkes')->user();
        return response()->json([
            'status'=> true,
            'message'=>"profile tampil",
            'data'=> new DinkesResource($user)
        ], 200);
   }
}
