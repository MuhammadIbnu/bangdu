<?php

namespace App\Http\Controllers\api;

// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\WarisResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Waris;
use Auth;
use Validator;


class WarisController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api_waris');
    }
    
   public function me(){
       
        $user = Auth::guard('api_waris')->user();
        return new WarisResource($user);
   }


}
