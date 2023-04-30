<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * user list
     */
    public function index(){
        
        $userList= User::all();
        $arr = [
            'status' => true,
            'message' => "user list",
            'data'=>UserResource::collection($userList)
        ];
        return response()->json($arr, 200);
    }
   
}
