<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\editor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Editorcontroller extends Controller
{
    public function editorRegister(Request $request){


        $request->validate([

            'firstname'      => 'required|string|max:191',
            'lastname'       => 'required|string|max:191',
            'email'          => 'required|email|unique:editors,email',
            'password'       => 'required',
            'phonenumber'    => 'integer',
            'confirmpassword' => 'required|same:password',
            'terms'           => 'required|integer',
        ],[
            'firstname.required' => 'first name is required!',
            'lastname.required' => 'last name is required!',
            'confirmpassword.required' => ' confirm password is required!',
            'confirmpassword.same' => ' confirm password and password must match!',
            'phonenumber.integer' => 'invalid phone number!',
            'terms.required' => 'please agree to the terms and condition!',

        ]);

            $save = new editor();
            $save->firstname = $request->firstname;
            $save->lastname = $request->lastname;
            $save->email = $request->email;
            $save->phonenumber = $request->phonenumber;
            $save->terms = $request->terms;
            $save->password = Hash::make($request->password);
            $save->save();

            $userww = $request->only('email','password');



            if(  $request ){

                return redirect()->back()->with('registered','New editor added successfull!');
            }else{

                return redirect()->back()->with('error','registeration failed!');
            }

    }




    public function editorLogin(Request $request){

        $request->validate([
            'email'     => 'required|email|exists:editors,email',
            'password'  =>'required'
        ],[
            'email.exists'     => 'Editor does not exist please register',
        ]);


            if(Auth::guard('editor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember )){

                return redirect('editor/dashboard')->with('success','Login successful');

               }else{
               return redirect()->back()->with('error','Email and Password does not match');
            }


    }


    public function editorLogout (){

        Auth::guard('editor')->logout();

        return redirect('/');

    }

}
