<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Request\SignupRequest;
class HandleController extends Controller
{
    public function getForm(){
        return view('userslist');
    }
    
    public function handleRequest(Request $request){
        // return $request->all();
        $this->validate($request,
            [
                'username' => 'required|min:3|max:20',
                'fullname' => 'required|min:10|max:100',
                // 'agree' =>    'required|accepted',
            ],

            [
                'required' => ':attribute can not not empty!',
                'min' => ':attribute can not less than :min',
                'max' => ':attribute can not more than :max',
                // 'accepted' => 'Make sure you read the terms!',
            ],

            [
                'username' => 'Username',
                'fullname' => 'Fullname',
                // 'agree' => 'Fullname',
            ]

        );
        $data = $request->only(['username', 'fullname']);
        DB::table('users')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/userslist">Click Here</a> to go back.';
        // return $request->all();
    }
}