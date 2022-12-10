<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Sellercontroller extends Controller
{
    public function sellerRegister(Request $request){


        $request->validate([

            'firstname'      => 'required|string|max:191',
            'lastname'       => 'required|string|max:191',
            'email'          => 'required|email|unique:sellers,email',
            'shopname'       => 'required|string|unique:sellers,shopname',
            'password'       => 'required',
            'phonenumber'    => 'integer',
            'phonenumber2'    => 'integer',
            'confirmpassword' => 'required|same:password',
            'terms'           => 'required|integer',
        ],[
            'firstname.required' => 'first name is required!',
            'lastname.required' => 'last name is required!',
            'confirmpassword.required' => ' confirm password is required!',
            'shopname.required' => ' shop name is required!',
            'shopname.unique' => 'This shop name has already been taken!',
            'confirmpassword.same' => ' confirm password and password must match!',
            'phonenumber.integer' => 'invalid phone number!',
            'phonenumber2.integer' => 'invalid phone number!',
            'terms.required' => 'please agree to the terms and condition!',

        ]);

            $save = new seller();
            $save->firstname = $request->firstname;
            $save->lastname = $request->lastname;
            $save->email = $request->email;
            $save->shopname = $request->shopname;
            $save->phonenumber = $request->phonenumber;
            $save->terms = $request->terms;
            $save->password = Hash::make($request->password);
            $save->save();

            $userww = $request->only('email','password');



            if( Auth::guard('seller')->attempt($userww, $request->remember) ){

                return redirect('seller/dashboard')->with('registered','Registeration Successfull!');
            }else{

                return redirect()->back()->with('error','registeration failed!');
            }

    }




    public function sellerLogin(Request $request){

        $request->validate([
            'email'     => 'required|email|exists:sellers,email',
            'password'  =>'required'
        ],[
            'email.exists'     => 'Seller does not exist please register',
        ]);


            if(Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->password] , $request->remember )){

                return redirect('seller/dashboard')->with('success','Login successful');

               }else{
               return redirect()->back()->with('error','Email and Password does not match');
            }


    }



    public function sellerLogout (){

        Auth::guard('seller')->logout();

        return redirect('/');

    }
}
