<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\shopping_cart;
use App\Models\shopping_cart_item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Cartcontroller extends Controller
{
    public function addtocart(Request $req){

        $validate = Validator::make($req->only('id','size','colo','price','sku','shopname','quantity','qty_in_stock','image','productname'),[
         'id'=>'required|integer',
         'size'=>'required|string',
         'colo'=>'required|string',
         'price'=>'required|integer',
         'sku'=> 'required|string',
         'shopname'=>'required|string',
         'quantity'=>'required|integer',
         'qty_in_stock'=>'required|integer',
         'image'=>'required|string',
         'productname'=>'required|string'
        ]);



        if($validate->fails()){
            return response()->json([
                'status'=> 400,
                'message'=>$validate->errors()
            ]);
        }else{
            $checking = "";
            $totalqtyinstock = "";
            if(Cookie::get('cart')){
                //add present
                $cartid = Cookie::get('cart');


                if(DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku', $req->sku)->exists()){
                    $incart = DB::table('shopping_cart_items')->where('cart_id',$cartid)->where('product_sku', $req->sku)->first();

                    $totalqty = $incart->user_qty + $req->quantity;

                    if($incart->product_qty_instock >= $totalqty){

                        $updae = DB::table('shopping_cart_items')
                        ->where('cart_id',$cartid)
                        ->where('product_sku', $req->sku)
                        ->update([
                            'cart_id'=> $cartid,
                            'product_id'=>$req->id,
                            'shop_id'=>$req->id,
                            'product_sku'=> $req->sku,
                            'product_price'=>$req->price,
                            'product_qty_instock'=> $req->qty_in_stock,
                            'user_qty'=>  $totalqty,
                            'product_name'=>$req->productname,
                            'product_size'=>$req->size,
                            'product_colour'=>$req->colo,
                            'seller'=>$req->shopname,
                            'product_image'=>$req->image
                            ]);

                            $checking = 'Product added to cart';
                            $totalqtyinstock = '';

                    }else{

                        $updateaddstock = DB::table('shopping_cart_items')
                        ->where('cart_id',$cartid)
                        ->where('product_sku', $req->sku)
                        ->update([
                            'cart_id'=> $cartid,
                            'product_id'=>$req->id,
                            'shop_id'=>$req->id,
                            'product_sku'=> $req->sku,
                            'product_price'=>$req->price,
                            'product_qty_instock'=> $req->qty_in_stock,
                            'user_qty'=>  $incart->product_qty_instock,
                            'product_name'=>$req->productname,
                            'product_size'=>$req->size,
                            'product_colour'=>$req->colo,
                            'seller'=>$req->shopname,
                            'product_image'=>$req->image
                            ]);

                            $checking = 'Product added to cart';
                            $totalqtyinstock = 'only '.$incart->product_qty_instock.' products left in stock!';

                    }

                }else{
                    $notincart = DB::table('product_items')->where('SKU', $req->sku)->first();
                    if($notincart){

                        if($notincart->qty_in_stock >= $req->quantity){
                            $newinsert = new shopping_cart_item ;

                            $newinsert->cart_id =$cartid;
                            $newinsert->product_id =$req->id;
                            $newinsert->shop_id =$req->id;
                            $newinsert->product_sku =$req->sku;
                            $newinsert->product_price =$req->price;
                            $newinsert->product_qty_instock =$req->qty_in_stock;
                            $newinsert->user_qty =$req->quantity;
                            $newinsert->product_name =$req->productname;
                            $newinsert->product_size =$req->size;
                            $newinsert->product_colour =$req->colo;
                            $newinsert->seller =$req->shopname;
                            $newinsert->product_image =$req->image;

                            $newinsert->save();

                            $checking = 'Product added to cart';
                            $totalqtyinstock ='';


                        }else{
                            $newinsert = new shopping_cart_item ;

                            $newinsert->cart_id =$cartid;
                            $newinsert->product_id =$req->id;
                            $newinsert->shop_id =$req->id;
                            $newinsert->product_sku =$req->sku;
                            $newinsert->product_price =$req->price;
                            $newinsert->product_qty_instock =$req->qty_in_stock;
                            $newinsert->user_qty = $req->qty_in_stock;
                            $newinsert->product_name =$req->productname;
                            $newinsert->product_size =$req->size;
                            $newinsert->product_colour =$req->colo;
                            $newinsert->seller =$req->shopname;
                            $newinsert->product_image =$req->image;

                            $newinsert->save();

                            $checking = 'Product added to cart';
                            $totalqtyinstock = 'only '.$req->qty_in_stock.' product left in stock!';

                        }
                    }
                }



            }else{


                $da = Carbon::now()->addMonth();
                $cartexpire = $da->diffInMinutes();

                $newcartid = new shopping_cart();
                $newcartid->user_id = 1 ;
                $newcartid->cart_expiry_date = $cartexpire;
                $newcartid->save();

                Cookie::queue('cart',$newcartid->id, $cartexpire);


                $notincart = DB::table('product_items')->where('SKU', $req->sku)->first();
                if($notincart){

                    if($notincart->qty_in_stock >= $req->quantity){
                        $newinsert = new shopping_cart_item();

                        $newinsert->cart_id =$newcartid->id;
                        $newinsert->product_id =$req->id;
                        $newinsert->shop_id =$req->id;
                        $newinsert->product_sku = $req->sku;
                        $newinsert->product_price =$req->price;
                        $newinsert->product_qty_instock =$req->qty_in_stock;
                        $newinsert->user_qty =$req->quantity;
                        $newinsert->product_name =$req->productname;
                        $newinsert->product_size =$req->size;
                        $newinsert->product_colour =$req->colo;
                        $newinsert->seller =$req->shopname;
                        $newinsert->product_image =$req->image;

                        $newinsert->save();

                        $checking = 'Product added to cart';
                        $totalqtyinstock ='';

                    }else{
                        $newinsert = new shopping_cart_item();

                        $newinsert->cart_id =$newcartid->id;
                        $newinsert->product_id =$req->id;
                        $newinsert->shop_id =$req->id;
                        $newinsert->product_sku =$req->sku;
                        $newinsert->product_price =$req->price;
                        $newinsert->product_qty_instock =$req->qty_in_stock;
                        $newinsert->user_qty = $req->qty_in_stock;
                        $newinsert->product_name =$req->productname;
                        $newinsert->product_size =$req->size;
                        $newinsert->product_colour =$req->colo;
                        $newinsert->seller =$req->shopname;
                        $newinsert->product_image =$req->image;

                        $newinsert->save();

                        $checking = 'Product added to cart';
                        $totalqtyinstock = 'only '.$req->qty_in_stock.' products left in stock!';

                    }
                }


            }

            if($checking != ''){
                return response()->json([
                    'status'=>200,
                    'message'=> $checking,
                    'notice'=> $totalqtyinstock

                ]);
            }

        }




    }

    public function cart(){
        if(Cookie::get('cart')){
            $cart_id = Cookie::get('cart');


          $cart =  DB::table('shopping_cart_items')->where('cart_id', $cart_id)->sum('user_qty');

          return response()->json([
             'status'=>200,
             'message'=>$cart
          ]);
        }else{
            return response()->json([
                'status'=>200,
                'message'=> 0
             ]);

        }
    }

     public function subtotal(){
        if(Cookie::get('cart')){
            $cart_id = Cookie::get('cart');


          $cart =  DB::table('shopping_cart_items')->where('cart_id', $cart_id)->get();

          $car = 0;
          foreach( $cart as $ca){
            $car =  $car + $ca->product_price * $ca->user_qty;
          }


          return response()->json([
             'status'=>200,
             'message'=>  $car
          ]);
        }else{
            return response()->json([
                'status'=>200,
                'message'=> 0
             ]);

        }
    }

    public function cart_product(){
        if(Cookie::get('cart')){
            $cart_id = Cookie::get('cart');


          $cart1 =  DB::table('shopping_cart_items')->where('cart_id', $cart_id)->get();


          return view('Mainpage.Cart', compact('cart1'));

        }else{

            return view('Mainpage.Cart',['cart1'=>'']);
        }
    }

    public function removeaddcart(Request $req){
        $validate = Validator::make($req->only('id','size','colour','price','quantity','available','sku','mode'),[
            'id'=>'required|integer',
            'size'=>'required|string',
            'colour'=>'required|string',
            'price'=>'required|integer',
            'quantity'=>'required|integer',
            'available'=>'required|integer',
            'sku'=>'required|string',
            'mode'=>'required|string'
        ]);




        if($validate->fails()){
            return response()->json([
                'status' => 400,
                'message'=>'Technical Error contact the developer'
            ]);
        }else{

            if($req->mode === "remove"){
                if(Cookie::get('cart')){
                    $cartid = Cookie::get('cart');

                    if(DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku',$req->sku)->exists()){

                        $incart =  DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku',$req->sku)->first();
                        $remov = $incart->user_qty - 1;
                        $cartadd = DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku',$req->sku)->update(['user_qty'=> $remov]);

                        if($remov == 0){
                            $cartadd = DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku',$req->sku)->delete();
                        }

                        if($cartadd){
                            return response()->json([
                                'status' => 200,
                                'message'=> "Cart has been updated !"
                            ]);
                        }


                    }


                }

            }

            if($req->mode === "add"){
                if(Cookie::get('cart')){
                    $cartid = Cookie::get('cart');

                    if(DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku',$req->sku)->exists()){

                        $incart =  DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku',$req->sku)->first();
                        $remov = $incart->user_qty + 1;
                        $cartadd = DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku',$req->sku)->update(['user_qty'=> $remov]);

                        if($cartadd){
                            return response()->json([
                                'status' => 200,
                                'message'=> "Cart has been updated !"
                            ]);
                        }


                    }


                }

            }

            if($req->mode === "removefinally"){
                if(Cookie::get('cart')){
                    $cartid = Cookie::get('cart');

                    if(DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku',$req->sku)->exists()){

                        $cartadd = DB::table('shopping_cart_items')->where('cart_id', $cartid)->where('product_sku',$req->sku)->delete();

                        if($cartadd){
                            return response()->json([
                                'status' => 200,
                                'message'=> "Cart has been updated !"
                            ]);
                        }


                    }


                }

            }



        }

    }




}
