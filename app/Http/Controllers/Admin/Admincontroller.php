<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\product_category;
use App\Models\product_subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class Admincontroller extends Controller
{
    public function adminLogin(Request $request){

        $request->validate([
            'email'     => 'required|email|exists:admins,email',
            'password'  =>'required'
        ],[
            'email.exists'     => 'Admin does not exist please register',
        ]);


            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember )){

                return redirect('admin/dashboard')->with('success','Login successful');

               }else{
               return redirect()->back()->with('error','Email and Password does not match');
            }


    }



    public function adminLogout (){

        Auth::guard('admin')->logout();

        return redirect('/');

    }

    public function getcategory(){

        $category = product_category::get();
        return response()->json(['categories'=> $category]);
    }

    public function getsubcategory(){

        $sub_cat = DB::table('product_categories')
                ->join('product_subcategories','product_subcategories.categoryid','=','product_categories.id')
                ->orderBy('product_categories.id', 'asc')
                ->get();

            return response()->json([
                'subcategory'=>$sub_cat
            ]);

    }


    public function addcategory(Request $requ){

        $cat = Validator::make($requ->only('categoryname'),[

            'categoryname'=> 'required|string|unique:product_categories,categoryname',
        ],[
            'categoryname.unique'=>'This category has already been added!',
            'categoryname.required'=>'Category name is required!',
            'categoryname.string'=>'Category name must be letters only!'

        ]);

        if($cat->fails()){

            return response()->json([
                'status'=> 400,
                'message'=>$cat->errors()
           ]);
        }else{


           $category = new product_category;
           $category->categoryname = $requ->categoryname;
           $category->save();
           return response()->json([
                'status'=> 200,
                'message'=> $requ->categoryname.'  category added successful'
           ]);

        }

    }


    public function editcategory(Request $req){

        $val = Validator::make($req->only('categoryname','id'),[

            'categoryname'=> 'required|string|unique:product_categories,categoryname',
        ],[
            'categoryname.unique'=>'This category has already been added!',
            'categoryname.required'=>'Category name is required!',
            'categoryname.string'=>'Category name must be letters only!'

        ]);
       // dd($req->id);

       if($val->fails()){
            return response()->json([
                'status'=>400,
                'message'=> $val->errors()
            ]);

       }else{

            if(DB::table('product_categories')->where('id',$req->id)->update(['categoryname'=>$req->categoryname])){
                return response()->json([
                    'status'=>200,
                    'message'=> $req->categoryname.'  Category has been updated successfully'
                ]);
            }



       }

    }



    public function addsubcategory(Request $req){

        $vali = Validator::make($req->only('subcategoryname','image','category'),[
            'subcategoryname'=>'required|regex:/^[a-zA-Z ]+$/u',
            'image'=>'required|image|mimes:png|max:2048',
            'category'=>'required|integer'
        ],[
            'subcategoryname.required'=>'sub-category name is required',
            'category.integer'=>'sub category is required',
            'image.mimes'=>'image must be a png file'
        ]);

        if($vali->fails()){
            return response()->json([
                'status'=>400,
                'message'=> $vali->errors()
            ]);

        }else{

            if($req->hasFile('image')){

                if($req->file('image')->isValid()){

                    $fileDestination = 'public/images';
                    $extention = $req->file('image')->extension();
                // $imagename = $image->getClientOriginalName();
                    $image_name = uniqid().'.'.$extention;

                    $path = $req->file('image')->move( $fileDestination, $image_name);
                    //all image in an array

                }


           }

           $subcat = new product_subcategory();
           $subcat->sub_categoryname = $req->subcategoryname;
           $subcat->image = '/public/images/'.$image_name;
           $subcat->categoryid = $req->category;

           $subcat->save();

           if($subcat){
                return response()->json([
                    'status'=>200,
                    'message'=> '  Category has been updated successfully'
                ]);
           }

        }

    }



    public function editsubcategory(Request $requ){

        $val = Validator::make($requ->only('id','editsubcategoryname','editimage','category','oldimage'),[
            'id' =>'required|integer',
            'editsubcategoryname'=>'required|regex:/^[a-zA-Z ]+$/u',
            'editimage'=>'nullable|image|mimes:png|max:2048',
            'category'=>'required|integer'
        ],[
            'editimage.mimes'=>'image must be a png file'
        ]);



        if( $val->fails()){
            return response()->json([
                'status'=>400,
                'message'=>  $val->errors()
            ]);
        }else{

            if( $requ->hasFile('editimage')){

                if( $requ->file('editimage')->isValid()){

                    $fileDestination = 'public/images';
                    $extention =  $requ->file('editimage')->extension();

                    $image_name_edit = uniqid().'.'.$extention;

                    $path =  $requ->file('editimage')->move( $fileDestination, $image_name_edit);

                    $new_image = '/public/images/'.$image_name_edit;
                }


            }

            if( $requ->File('editimage') == null){

                $new_image =  $requ->oldimage;
            }



             DB::table('product_subcategories')
                     ->where('id', $requ->id)
                    ->update([
                        'sub_categoryname' =>$requ->editsubcategoryname,
                        'categoryid' =>$requ->category,
                        'image' => $new_image
                    ]);





            return response()->json([
                'status'=>200,
                'message'=> $requ->editsubcategoryname.'  edited successfully!'
            ]);
        }
    }



    public function deletesubcategoryimage(Request $req){

        $validate = validator::make($req->only('id','image'),[
              'id' => 'required|integer',
        ]);

       // dd( $req->image);

      if($validate->fails()){
          return response()->json([
              'status'=> 400,
              'message'=>'error! contact the technical team'
          ]);
      }else{
        product_subcategory::where('id', $req->id)->update(['image' => '']);


          if(File::exists(public_path($req->image))){

              File::delete(public_path($req->image));
          }

          return response()->json([
              'status'=> 200,
              'message'=> 'image deleted successfully'
          ]);
      }



  }

  public function addbrand(Request $requ){

    $bran = Validator::make($requ->only('brandname'),[

        'brandname'=> 'required|alpha|unique:brands,brand',
    ],[
        'brandname.unique'=>'This brand has already been added!',
        'brandname.required'=>'Brand name is required!',
        'brandname.alpha'=>'Brand name must be letters only!'
    ]);

    if( $bran->fails()){
        return response()->json([
            'status'=> 400,
            'message'=>$bran->errors()
       ]);
    }else{

        $brand = new brand ;
       $brand->brand = $requ->brandname;
       $brand->save();
       return response()->json([
            'status'=> 200,
            'message'=> $requ->brandname.'  brand added successful'
       ]);


    }
  }

  public function getbrand(){

    $brands = brand::get();
    return response()->json(['brands'=> $brands]);
  }


  public function editbrand(Request $req){

    $val = Validator::make($req->only('brandname','id'),[

        'brandname'=> 'required|alpha|unique:brands,brand',
    ],[
        'brandname.unique'=>'This brand has already been added!',
        'brandname.required'=>'Brand name is required!',
        'brandname.alpha'=>'Brand name must be letters only!'

    ]);
   // dd($req->id);

   if($val->fails()){
        return response()->json([
            'status'=>400,
            'message'=> $val->errors()
        ]);

   }else{

        if(DB::table('brands')->where('id',$req->id)->update(['brand'=>$req->brandname])){
            return response()->json([
                'status'=>200,
                'message'=> $req->brandname.'  Brand has been updated successfully'
            ]);
        }



   }

}

}
