<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Request\SignupRequest;
use App\Http\Controllers\DateTime;

class HandleController extends Controller
{
    public function getForm(){
        return view('userslist');
    }
    
    public function handleRequestAdd(Request $request){
        $this->validate($request,
            [
                'username' => 'required|min:3|max:20',
                'fullname' => 'required|min:10|max:100',
            ],

            [
                'required' => ':attribute can not not empty!',
                'min' => ':attribute can not less than :min',
                'max' => ':attribute can not more than :max',
            ],

            [
                'username' => 'Username',
                'fullname' => 'Fullname',
            ]
        );
        $data = $request->only(['username', 'fullname']);
        DB::table('users')->insert($data);
        
        return view('userslist')->with ('users', $this->getListUsers())
                                ->with ('message2', "Insert success!");
    }
    public function handleRequestEdit(Request $request, $id){
        $this->validate($request,
            [
                'username' => 'required|min:3|max:20',
                'fullname' => 'required|min:10|max:100',
            ],

            [
                'required' => ':attribute can not not empty!',
                'min' => ':attribute can not less than :min',
                'max' => ':attribute can not more than :max',
            ],

            [
                'username' => 'Username',
                'fullname' => 'Fullname',
            ]

        );
        try{
            $data = $request->only(['username', 'fullname']);
            $checkConflitData = $this->isChangeDataUser($data,$id);
            if($checkConflitData === 1){
                return view('userEdit')
                                ->with ('message', "Data not change")
                                ->with ('user', $this->getUserById($id))
                                ->with ('users', $this->getListUsers());
            } else {
                $data['updated_at'] = date('Y-m-d H:i:s');
                $returnValue = DB::table('users')
                    ->where('id', '=', $id )
                    ->update([
                        'username'  => $data['username'],
                        'fullname'  => $data['fullname'],
                        'updated_at' => $data['updated_at'],
                    ]);
                return view('userslist')->with ('users', $this->getListUsers())
                                        ->with ('message2', "Update success!");
            }
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }

    public function isChangeDataUser($user,$id){
        $userDB=DB::table('users')->where('id', '=', $id)->get();
        if($userDB['0']-> username === $user['username'] && $userDB['0']-> fullname === $user['fullname'])
            return 1;
        return 0;
    }
    public function getListUsers(){
        return DB::select('select * from users', [1]);
    }
    public function getUserById($id){
        return DB::table('users')->where('id', '=', $id)->get();
    }
}