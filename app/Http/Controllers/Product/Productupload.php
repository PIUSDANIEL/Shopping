<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\images;
use App\Models\Product;
use App\Models\product_item;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class Productupload extends Controller
{
    public function uploadproduct(Request $request){



            $validate = validator::make($request->all(),[
                'productname' => 'required|string',
                'price.*'       => 'required|integer',
                'listprice'   => 'nullable|integer',
                'shopname'    => 'required|string',
                'size.*'        => 'nullable|string',
                'colour.*'      => 'nullable|string',
                'brand'       => 'nullable|string',
                'quantity.*'    => 'required|integer',
                'description' => 'nullable|string',
                'search'      => 'required|string',
                'main_image'      => 'required|dimensions:min_width=300,min_height=300',
                'main_image.*'    => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048',
                'images'      => 'required',
                'images.*'      => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048|dimensions:min_width=300,min_height=300',
                'uploader'    => 'required|string',
                'categories'  => 'required|string',
                'sub_categories' => 'required|string',
                'specification'  => 'nullable|string',
                'percentage'     => 'nullable|string',

            ],[
                'main_image.dimensions'=>'Only 500 x 500 image dimension are required !',
                'images.0.dimensions'=>'Only 500 x 500 image dimension are required !',
                'images.1.dimensions'=>'Only 500 x 500 image dimension are required !',
                'images.2.dimensions'=>'Only 500 x 500 image dimension are required !'
            ]);



            if($validate->fails()){

                return response()->json([
                    'status'=>400,
                    'error'=> $validate->errors()
                ]);

            }else{



                $product = new product;
                $product->productname = $request->productname;
              //  $product->price       = $request->price;
                $product->listprice   = $request->listprice;
                $product->shopname    = $request->shopname;
               // $product->size        = rtrim($request->size,',') ;
               // $product->singlesize  = $request->singlesize;
               // $product->colour      = $request->colour;
                $product->brand       = $request->brand;
               // $product->quantity    = $request->quantity;
                $product->description = $request->description;
                $product->search      = $request->search;
                $product->uploader    = $request->uploader;
               // $product->condition   = $request->condition;
                $product->categories  = $request->categories;
                $product->sub_categories = $request->sub_categories;
                $product->specification  = $request->specification;
                $product->percentage     = $request->percentage;

                if(count($request->price) == 1){

                       $product->price       = $request->price[0];

                }

                if(count($request->price) > 1){

                    $product->price = min($request->price);

                    $product->price_min= min($request->price);

                    $product->price_max = max($request->price);
                }



                if($request->hasFile('main_image')){

                        if($request->file('main_image')->isValid()){

                            $fileDestination = 'public/images';
                            $extention = $request->file('main_image')->extension();
                        // $imagename = $main_image->getClientOriginalName();
                            $main_image_name = uniqid().'.'.$extention;

                            $path = $request->file('main_image')->move( $fileDestination, $main_image_name);
                            //all image in an array

                        }


                }





               // $product->images = json_encode($imagess);

                $product->main_image =  '/public/images/'.$main_image_name;

                $product->save();

                if($request->hasFile('images')){
                    foreach($request->file('images') as $images){
                        if($images->isValid()){

                            $fileDestination = 'public/images';
                            $extention = $images->extension();
                        // $imagename = $images->getClientOriginalName();
                            $name = uniqid().'.'.$extention;

                            $path =  $images->move( $fileDestination, $name);
                            //all image in an array

                            $imagess[] = '/public/images/'.$name;
                        }

                    }
                }

                $productimage = new images;
                $productimage->product_id = $product->id;
                $productimage->images = json_encode($imagess);
                $productimage->save();

                for($i = 0; $i < count($request->price); $i++ ){
                    $produc = new product_item;
                    $produc->product_id =  $product->id;
                    $produc->SKU = substr(md5(microtime()),0,12);
                    //dd($request->quantity[$i]);
                    $produc->qty_in_stock = $request->quantity[$i];

                    $produc->size = $request->size[$i];
                    $produc->colour = $request->colour[$i];
                    $produc->price = $request->price[$i];
                    $produc->save();
               }


                return response()->json([
                    'status'=>200,
                    'message'=> $request->productname.' '.'upload succcessful'
                ]);
            }



    }

    public function editproduct(Request $request){


        $validate = validator::make($request->all(),[
                'productname' => 'required|string',
                'variid.*'       =>'nullable|integer',
                'price.*'       => 'required|integer',
                'listprice'   => 'nullable|integer',
                'shopname'    => 'required|string',
                'size.*'        => 'nullable|string',
                'colour.*'      => 'nullable|string',
                'brand'       => 'nullable|string',
                'quantity.*'    => 'required|integer',
                'description' => 'nullable|string',
                'search'      => 'required|string',
                'main_image'      => 'nullable|dimensions:min_width=300,min_height=300',
                'main_image.*'    => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048',
                'images'      => 'nullable',
                'images.*'      => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048|dimensions:min_width=300,min_height=300',
                'uploader'    => 'required|string',
                'categories'  => 'required|string',
                'sub_categories' => 'required|string',
                'specification'  => 'nullable|string',
                'percentage'     => 'nullable|string',
                

        ]);


        if($validate->fails()){

            return response()->json([
                'status'=>400,
                'error'=> $validate->errors(),
            ]);

        }else{



            if($request->hasFile('main_image')){

                    if($request->file('main_image')->isValid()){

                        $fileDestination = 'public/images';
                        $extention = $request->file('main_image')->extension();
                    // $imagename = $main_image->getClientOriginalName();
                        $main_image_name_edit = uniqid().'.'.$extention;

                        $path = $request->file('main_image')->move( $fileDestination, $main_image_name_edit);
                        //all image in an array
                        $new_main_image = '/public/images/'.$main_image_name_edit;
                    }


            }

            if($request->File('main_image') == null){

                $new_main_image = $request->old_main_image;
            }




            if($request->hasFile('imagesegit')){
                foreach($request->file('imagesegit') as $editimages){
                    if($editimages->isValid()){

                        $fileDestination = 'public/images';
                        $extention = $editimages->extension();
                    // $imagename = $images->getClientOriginalName();
                        $name_edit = uniqid().'.'.$extention;

                        $path =  $editimages->move( $fileDestination, $name_edit);
                        //all image in an array

                        $newimages[] = '/public/images/'.$name_edit;
                    }

                }
            }

            if($request->hasFile('imagesegit') == null){

                $newimages = $request->old_images;
            }

            //dd( $newimages);



            product::where('id', $request->productid)
            ->update([

               'productname' => $request->productname,
               //'price' => $request->price,
               'listprice' => $request->listprice,
               'shopname' => $request->shopname,
              // 'size' => $request->size,
              // 'singlesize' => $request->singlesize,
              // 'colour' => $request->colour,
               'brand' => $request->brand,
               //'quantity' => $request->quantity,
               'description' => $request->description,
               'search' => $request->search,
               'uploader' => $request->uploader,
              // 'condition' => $request->condition,
               'categories' => $request->categories,
               'sub_categories' => $request->sub_categories,
               'specification' => $request->specification,
               'percentage' => $request->percentage,
               'main_image' =>   $new_main_image,
              // 'images' => $newimages

            ]);

            images::where('product_id', $request->productid)->update([
                'images'=> $newimages
            ]);

            for($i = 0; $i < count($request->price); $i++ ){
                if($request->variid[$i] !== ""){
                product_item::where('id', $request->variid[$i])->update([
                    'size'=> $request->size[$i],
                    'qty_in_stock' => $request->quantity[$i],
                    'colour' => $request->colour[$i],
                    'price' => $request->price[$i],

                ]);
             }

             for($i = 0; $i < count($request->price); $i++ ){
                if($request->variid[$i] == ""){
                    $produc = new product_item;
                    $produc->product_id =$request->productid ;
                    $produc->SKU = substr(md5(microtime()),0,12);
                    //dd($request->quantity[$i]);
                    $produc->qty_in_stock = $request->quantity[$i];
       
                    $produc->size = $request->size[$i];
                    $produc->colour = $request->colour[$i];
                    $produc->price = $request->price[$i];
                    $produc->save();
                }
             }


            
                
           }







            return response()->json([
                'status'=>200,
                'message'=> $request->productname.' '.'edited succcessful'
            ]);
        }



    }

    public function deleteproduct($id){


        if( Product::where('id', $id)->update(['deleted' => '1','deleted_at' => now()])){

            return response()->json([
                'status'=>200,
                'message'=> 'Product deleted successfully!',
            ]);

        }else{
            return response()->json([
                'status'=>400,
                'message'=> 'Something went wrong!',
            ]);

        }



    }


    public function productuploadcat(){
        $cat = DB::table('product_categories')
                    ->select('id','categoryname')
                    ->get();
            if($cat){
                return response()->json([
                    'status'=>200,
                    'cat'=>$cat
                ]);
            }
    }


    public function productuploadsubcat($cat_id){

        $sub_cat = DB::table('product_subcategories')
                    ->where('categoryid', '=', $cat_id)
                    ->select('id','sub_categoryname')
                    ->get();

        if($sub_cat){
            return response()->json([
                'status'=>200,
                'sub_cat'=>$sub_cat
            ]);
        }
    }

    public function productsfetch(){


            if(Auth::guard('editor')->user()){

                $user = 'flea';
            }

            if(Auth::guard('seller')->user()){

                $user = Auth::guard('seller')->user()->id;

            }


            if(Auth::guard('admin')->user()){

               $user = 'flea';

            }

        $products = DB::table('products')
                        ->where('products.shopname','=',$user)
                        ->where('products.deleted','=', 0)
                        ->select('id','productname','main_image','categories','sub_categories')
                        ->get();

        $product = json_decode($products,true);

        for($i=0; $i < count($product); $i++){
           $id = $product[$i]['id'];
           $categ =  $product[$i]['categories'];
           $subcateg =  $product[$i]['sub_categories'];
           $product_item = DB::table('product_items')->where('product_id',$id)->select('qty_in_stock','price','size','colour')->get();
           $product[$i]['product_item'] =  $product_item;

           $product_cat = DB::table('product_categories')->where('id',$categ)->select('categoryname')->get();
           $product[$i]['category'] =  $product_cat;

           $product_sub = DB::table('product_subcategories')->where('id',$subcateg)->select('sub_categoryname')->get();
           $product[$i]['subcat'] =  $product_sub;
        }

          return response()->json([
            'products' =>  $product
          ]);

    }

    public function geteditproduct($id){

        //$products = DB::table('products')->where('id',$id)->get();
        $products = DB::table('products')
        ->where('id','=',$id)
        ->where('products.deleted','=', 0)
        //->select('id','productname','main_image','categories','sub_categories')
        ->get();

                $product = json_decode($products,true);

                for($i=0; $i < count($product); $i++){
                $id = $product[$i]['id'];
                $categ =  $product[$i]['categories'];
                $subcateg =  $product[$i]['sub_categories'];

                $product_item = DB::table('product_items')->where('product_id',$id)->get();
                $product[$i]['product_item'] =  $product_item;

                $product_cat = DB::table('product_categories')->where('id',$categ)->get();
                $product[$i]['category'] =  $product_cat;

                $product_sub = DB::table('product_subcategories')->where('id',$subcateg)->get();
                $product[$i]['subcat'] =  $product_sub;


                $product_imgs = DB::table('images')->where('product_id',$id)->select('images')->get();
                $product[$i]['images'] =  $product_imgs;

                }

        return  response()->json([
            'status'=> 200,
            'products'=> $product
        ]);
    }

    public function deletemainimage(Request $req){

          $validate = validator::make($req->all(),[
                'id' => 'required|integer',
          ]);

         // dd( $req->image);

        if($validate->fails()){
            return response()->json([
                'status'=> 400,
                'message'=>'error! contact the technical team'
            ]);
        }else{
            product::where('id', $req->id)->update(['main_image' => '']);


            if(File::exists(public_path($req->image))){

                File::delete(public_path($req->image));
            }

            return response()->json([
                'status'=> 200,
                'message'=> 'image deleted successfully'
            ]);
        }



    }

    public function deleteallimages(Request $req){

        $validate = validator::make($req->all(),[
              'id' => 'required|integer',
        ]);

      if($validate->fails()){
          return response()->json([
              'status'=> 400,
              'message'=>'error! contact the technical team'
          ]);
      }else{

         $imagess = explode(',', $req->images);

         foreach($imagess as $ima){

            if(File::exists(public_path($ima))){

                File::delete(public_path($ima));
            }
         }

          images::where('id', $req->id)->update(['images' => '']);

          return response()->json([
              'status'=> 200,
              'message'=> 'images deleted successfully'
          ]);
      }



    }

    public function product(){

        $flash = DB::table('products')
        ->where('flash_sale',1)
        ->where('deleted', 0)
        ->where('featured', 1)
        ->limit(12)
        ->inRandomOrder()
        ->get();

        $prod =  DB::table('product_categories')->select('id','categoryname')->get();
        $products = json_decode($prod,true);

        for($i = 0; $i < count( $products); $i++){
            $id =   $products[$i]['id'];

            $product =  DB::table('products')
                        ->where('categories',$id)
                        ->where('deleted', 0)
                        ->where('featured', 1)
                        ->limit(6)
                        ->inRandomOrder()
                        ->get();

            $products[$i]['product'] = $product;
        }

        return view('welcome', ['products'=>$products,'flash'=> $flash]) ;

    }



    public function allproduct(){

        $allproducts =  DB::table('products')
                        ->where('deleted','=', 0)
                        ->get();

        return response()->json([
            'allproduct' =>  $allproducts
        ]);
    }


    public function featured(Request  $req){
         $req->validate([
            'id'=>'required|integer',
            'featured'=>'required|integer'
        ]);

        if($req){

            if($req->featured == 1){
                DB::table('products')
                        ->where('id', $req->id )
                        ->update(['featured'=> 0]);
            }else{
                DB::table('products')
                ->where('id', $req->id )
                ->update(['featured'=> 1]);

            }


            return response()->json([
                'status'=>200,
                'message'=> 'featured updataed!'
            ]);

        }else{

            return response()->json([
                'status'=>400,
                'message'=> $req->errors()
            ]);
        }

    }

    public function flash(Request  $req){
        $req->validate([
           'id'=>'required|integer',
           'flash'=>'required|integer'
       ]);

       if($req){

           if($req->flash == 1){
               DB::table('products')
                       ->where('id', $req->id )
                       ->update(['flash_sale'=> 0]);
           }else{
               DB::table('products')
               ->where('id', $req->id )
               ->update(['flash_sale'=> 1]);

           }


           return response()->json([
               'status'=>200,
               'message'=> 'flash sale updataed!'
           ]);

       }else{

           return response()->json([
               'status'=>400,
               'message'=> $req->errors()
           ]);
       }

   }

   public function detailsmodal($id){

        $product = DB::table('products')
                        ->join('brands','brands.id','=','products.brand')
                        ->where('products.id',$id)
                        ->where('products.deleted', 0)
                        ->get();

        if(count($product) == 0){


            /*
            return response()->json([
                'status'=>400,
                'message'=>"Product does not exist!"
            ]);
            */
        }else{
              /*
            return response()->json([
                'status'=>200,
                'message'=>$product
            ]);
            */

            return view('Mainpage.product_details', compact('product'));
        }



   }

   public function search(Request $search){
        $vali = validator::make($search->only('search'),[
            'search' => 'required|string'
        ]);

        if($vali->fails()){
            return response()->json([
                'status'=> 400,
                'message' => $vali->errors()
            ]);

        }else{

            $query = preg_split('/\s+/',$search->search, -1, PREG_SPLIT_NO_EMPTY) ;


            $searches = Product::where(function ($q) use ($query){
                foreach( $query as $valu){
                    $q->Where('search','like', "%{$valu}%");
                }
            })->get();
            $searchess = '';
            foreach($searches as $roe){
                $searchess .= '<div class="card p-0 m-2 searchcard" onclick="detailsmodal('.$roe->id.')" data-bs-toggle="modal" data-bs-target="#detailsModal" style="">
                                <img src="'.$roe->main_image.'" class="card-img-top" alt="...">';

                if($roe->percentage !== ""){
                    $searchess .= '<div class="card-img-overlay">
                                     <span class="position-absolute top-1  translate-middle badge rounded-pill " style="color: red; background-color:rgba(127, 44, 44, 0.337);">
                                    <i class="fas fa-minus"></i>
                                    '.$roe->percentage.'
                                    </span>
                                  </div>';
                }

                 $searchess .=  '<div class="card-body p-1">
                                    <p class="card-text productcard small">'.$roe->productname.'</p>
                                    <p class="card-text mt-n3 naira small">&#8358;'.number_format($roe->price).'</p>
                                </div>
                            </div>';

            }





            if(count($searches) > 0){
                    return response()->json([
                        'status' => 200,
                        'message' => $searchess
                    ]);
            }else{
                return response()->json([
                    'status' => 201,
                    'message' => 'Product search is empty !'
                ]);
            }

        }
   }

   public function filter(Request $filter){
        $val = validator::make($filter->only('subcategory','productname','minprice','maxprice',
        'highlow',
        'brand',
        'percentage',
        'rating','latest'),[

            "subcategory" => "integer|nullable",
            "productname" => "string|nullable",
            "minprice" => "integer|nullable",
            "maxprice" => "integer|nullable",
            "highlow" => "string|nullable",
            "brand" => "integer|nullable",
            "percentage" => "integer|nullable",
            "rating" => "integer|nullable",
            "latest" => "integer|nullable"
        ]);

        if($val->fails()){

            return back()->with('errrorfilter','Oops something went wrong');
        }else{

            $query = Product::query();
            if($filter->productname != "" && $filter->productname !== null){
                $query->where('productname',$filter->productname);
            }

            if($filter->brand != "" && $filter->brand !== null){
                $query->where('brand',$filter->brand);
            }

            if($filter->subcategory != "" && $filter->subcategory !== null){
                $query->where('sub_categories',$filter->subcategory);
            }

            if($filter->percentage != "" && $filter->percentage !== null){
                $query->where('percentage','>=',$filter->percentage);
            }

            if($filter->minprice != "" && $filter->maxprice != "" && $filter->maxprice !== null && $filter->minprice !== null){
                $query->where('price', '>=', $filter->minprice);
            }

            if($filter->minprice != "" && $filter->maxprice != "" && $filter->maxprice !== null && $filter->minprice !== null){
                $query->where('price', '<=', $filter->maxprice);
            }

            $query->where('deleted',0);

            if($filter->highlow != "" && $filter->highlow !== null){
                if($filter->highlow == "high"){
                    $query->orderBy('price', 'desc');
                }

            }


            if($filter->highlow != "" && $filter->highlow !== null){
                if($filter->highlow == "low"){
                    $query->orderBy('price', 'asc');
                }

            }

            if($filter->latest != "" && $filter->latest !== null){
                if( $filter->latest == "1"){
                    $query->latest();
                }

            }


            if($filter->productname === null && $filter->brand === null && $filter->subcategory === null
            && $filter->minprice === null && $filter->highlow === null && $filter->latest === null
            && $filter->maxprice === null && $filter->percentage === null ){

                $productfilter = array();
            }else{
                $productfilter = $query->get();

            }



            if(count($productfilter) > 0){
                return response()->json([
                    'status'=> 200,
                    'message'=> $productfilter
                ]);
            }

            if(count($productfilter) < 1){
                return response()->json([
                    'status'=> 201
                ]);
            }

        }
   }

   public function categoryprodfilter(Request $filter){
    $val = validator::make($filter->only('subcategory','productname','minprice','maxprice',
    'highlow',
    'brand',
    'percentage',
    'rating','latest'),[

        "subcategory" => "integer|nullable",
        "productname" => "string|nullable",
        "minprice" => "integer|nullable",
        "maxprice" => "integer|nullable",
        "highlow" => "string|nullable",
        "brand" => "integer|nullable",
        "percentage" => "integer|nullable",
        "rating" => "integer|nullable",
        "latest" => "integer|nullable"
    ]);

    //dd($filter->brand);

    if($val->fails()){

        return back()->with('errrorfilter','Oops something went wrong');
    }else{

        $query = Product::query();
        if($filter->productname != "" && $filter->productname !== null){
            $query->where('productname',$filter->productname);
        }

        if($filter->brand != "" && $filter->brand !== null){
            $query->where('brand',$filter->brand);
        }

        if($filter->subcategory != "" && $filter->subcategory !== null){
            $query->where('sub_categories',$filter->subcategory);
        }

        if($filter->percentage != "" && $filter->percentage !== null){
            $query->where('percentage','>=',$filter->percentage);
        }

        if($filter->minprice != "" && $filter->maxprice != "" && $filter->maxprice !== null && $filter->minprice !== null){
            $query->where('price', '>=', $filter->minprice);
        }

        if($filter->minprice != "" && $filter->maxprice != "" && $filter->maxprice !== null && $filter->minprice !== null){
            $query->where('price', '<=', $filter->maxprice);
        }

        $query->where('deleted',0);

        if($filter->highlow != "" && $filter->highlow !== null){
            if($filter->highlow == "high"){
                $query->orderBy('price', 'desc');
            }

        }


        if($filter->highlow != "" && $filter->highlow !== null){
            if($filter->highlow == "low"){
                $query->orderBy('price', 'asc');
            }

        }

        if($filter->latest != "" && $filter->latest !== null){
            if( $filter->latest == "1"){
                $query->latest();
            }

        }


        if($filter->productname === null && $filter->brand === null && $filter->subcategory === null
        && $filter->minprice === null && $filter->highlow === null && $filter->latest === null
        && $filter->maxprice === null && $filter->percentage === null ){

            $productfilter = array();
        }else{
            $productfilter = $query->get();

        }



        if(count($productfilter) > 0){
            return response()->json([
                'status'=> 200,
                'message'=> $productfilter
            ]);
        }

        if(count($productfilter) < 1){
            return response()->json([
                'status'=> 201
            ]);
        }

    }
   }



   public function subcatproducts($id){
        $prod = DB::table('products')
                ->where('sub_categories',$id)
                ->where('deleted',0)
                ->get();

        return view('Mainpage.Subcat', compact('prod'));
   }

   public function products($id){
        $prod = DB::table('products')
                ->where('categories',$id)
                ->where('deleted',0)
                ->get();

        return view('Mainpage.products', compact('prod'));
   }

   public function flashproducts(){
      $flash = DB::table('products')
                ->where('deleted',0)
                ->where('flash_sale',1)
                ->paginate(7);

        return view('Mainpage.Flashproducts', compact('flash'));
   }













}
