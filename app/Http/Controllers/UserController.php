<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserController extends Controller
{

    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'mobilenumber' => 'required|string',
            'accesslevel' => 'required|integer',
            'is_member' => 'required|integer'
        ]);

        try {

            $user = new User;
            $user->fullname = $request->input('fullname');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->mobilenumber = $request->input('mobilenumber');
            $user->accesslevel = $request->input('accesslevel');
            $user->is_member = $request->input('is_member');

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => $e], 409);
        }

    }

    public function logAuth(Request $request){

        /*Access Level
            1 - superadmin
            2 - admin
            3 - cashier
            4 - customer
        */
        //Comment Added September 29

        $email    = $request->input('email');
        $password = $request->input('password');

        $login = User::where('email', $email)->first();

        if ($login) {

            if ($login->count() == 1) {

              if (Hash::check($password, $login->password)) {

                $res['success'] = true;
                $res['accesslevel'] = $login->accesslevel;
                $res['fullname'] = $login->fullname;

                return response(json_encode($res), 200);

              }else{

                $res['success'] = false;
                $res['message'] = 'password incorrect';
                return response($res, 200);

              }

            }else{

              $res['success'] = false;
              $res['message'] = 'email incorrect';
              return response($res, 200);
              
            }

        }else{

            $res['success'] = false;
            $res['message'] = 'email missing';
            return response($res, 200);

        }

    }


    public function checkEmail($email){



    }

    public function checkMobilenum($mobilenum){



    }

    public function addCustomer( Request $request ){



    }

    public function updateCustomer(){



    }

    /*Soft Delete Only*/
    public function deleteCustomer(){

        
        
    }

    public function recoverCustomer(){

        
        
    }
    
}
