<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public function userRegister(Request $request){


        $request->validate([

            'firstname'      => 'required|string|max:191',
            'lastname'       => 'required|string|max:191',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required',
            'phone_number_1'    => 'integer',
            'phone_number_2'    => 'integer|nullable',
            'confirmpassword' => 'required|same:password',
            'terms'           => 'required|integer',
        ],[
            'firstname.required' => 'first name is required!',
            'lastname.required' => 'last name is required!',
            'confirmpassword.required' => ' confirm password is required!',
            'confirmpassword.same' => ' confirm password and password must match!',
            'phone_number_1.integer' => 'invalid phone number!',
            'phone_number_2.integer' => 'invalid phone number!',
            'terms.required' => 'please agree to the terms and condition!',

        ]);

            $save = new User();
            $save->firstname = $request->firstname;
            $save->lastname = $request->lastname;
            $save->email = $request->email;
            $save->phone_number_1 = $request->phone_number_1;
            $save->phone_number_2 = $request->phone_number_2;
            $save->terms = $request->terms;
            $save->password = Hash::make($request->password);
            $save->save();

            $user = $request->only('email','password');

            if( Auth::guard('web')->attempt($user, $request->remember) ){

                return redirect('/')->with('registered','Registeration Successfull!');
            }else{

                return redirect()->back()->with('error','registeration failed!');
            }

    }




    public function userLogin(Request $request){

        $request->validate([
            'email'     => 'required|email|exists:users,email',
            'password'  =>'required'
        ],[
            'email.exists'     => 'User does not exist please register',
        ]);


            if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember )){

                return redirect('/')->with('success','Login successful');

               }else{
               return redirect()->back()->with('error','Email and Password does not match');
            }


    }



    public function userLogout (){

        Auth::guard('web')->logout();

        return redirect('/');

    }
}
