<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $users = DB::select('select * from users', [1]);

        return view('userslist', ['users' => $users]);
    }
    public function getListUser()
    {
        $users = DB::select('select * from users', [1]);

        return view('userslist', ['users' => $users]);
    }

    public function getUserById($id)
    {
        try {
          $user=DB::table('users')->where('id', '=', $id)->get();
          $users = DB::select('select * from users', [1]);
          return view('userEdit')
                    ->with ('user', $user)
                    ->with ('users', $users);
        } catch (ModelNotFoundException $err) {
            //redirect to your error page
        }
    }
    public function delUserById($id)
    {
        try {
          $user=DB::table('users')->where('id', '=', $id)->get();
          if($user){
            DB::table('users')->delete($id);
            $users = DB::select('select * from users', [1]);
            return view('userslist')
                        ->with ('message2', "Delete success!")
                        ->with ('users', $users);
          }
        } catch (ModelNotFoundException $err) {
            //redirect to your error page
        }
    }
}
