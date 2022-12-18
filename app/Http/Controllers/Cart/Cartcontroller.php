<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Cartcontroller extends Controller
{
    public function addtocart(Request $req){

        $validate =Validator::make($req->only('id','size','colo','price','quantity','available','image','productname'),[
         'id'=>'required|integer',
         'size'=>'required|string',
         'colo'=>'required|string',
         'price'=>'required|integer',
         'quantity'=>'required|integer',
         'available'=>'required|integer',
         'image'=>'required|string',
         'productname'=>'required|string'
        ]);

        if($validate->fails()){
             return response()->json([
                 'status'=>400,
                 'message'=>$validate->errors()
             ]);
        }else{

            $item = array();
            $item[] = array(
                'productid'=>$req->id,
                'size'=>$req->size,
                'colour'=>$req->colo,
                'price'=>$req->price,
                'quantity'=>$req->quantity,
                'available'=>$req->available,
                'image'=>$req->image,
                'productname'=>$req->productname,

            );

            $qtybigger = "";
         if(Cookie::get('cart')){
              $cartid = Cookie::get('cart');
            $incart = Cart::findorfail($cartid);
            $previousitem = json_decode($incart->items,true);

            $item_match = 0;
            $new_item = array();

            foreach( $previousitem as $ptiem){
                if($ptiem['productid'] == $item[0]['productid'] && $ptiem['size'] == $item[0]['size']  && $ptiem['colour'] == $item[0]['colour']  &&  $ptiem['price'] == $item[0]['price']){

                    $ptiem['quantity'] = $ptiem['quantity'] + $item[0]['quantity'];

                    if($ptiem['quantity'] >= $item[0]['available']){
                        $ptiem['quantity'] = $item[0]['available'];

                        $qtybigger = 'Note : max reached only '.$ptiem['quantity'].' items were added to cart';
                    }

                    $item_match = 1;
                }

                $new_item[] = $ptiem;
            }

            if( $item_match == 0){
                $new_item = array_merge($item,$previousitem);
            }

            $item_json = json_encode($new_item);
            $addp = DB::table('carts')->where('id',$cartid)->update(['items'=>$item_json]);

            if($addp){
                $da = Carbon::now()->addMonth();
                $cartexpire = $da->diffInMinutes();
                Cookie::queue('cart', '', 1);

                Cookie::queue('cart', $cartid, $cartexpire);



                return response()->json([
                    'status'=>200,
                    'message'=> 'Product added to cart',
                    'qtybigger'=>$qtybigger
                ]);
            }



         }else{
            $da = Carbon::now()->addMonth();
            $cartexpire = $da->diffInMinutes();

            $cart = new Cart;
            $cart->items = json_encode($item);
            $cart->cart_expiry = $cartexpire;
            $cart->save();

            Cookie::queue('cart', $cart->id, $cartexpire);

            return response()->json([
                'status'=>200,
                'message'=> 'Product added to cart ',
                'qtybigger'=>''
            ]);


         }

        }

    }

    public function cart(){
        if(Cookie::get('cart')){
            $cart_id = Cookie::get('cart');


          $cart =  DB::table('carts')->where('id', $cart_id)->value('items');
          $cart1 = json_decode($cart);
          $car = 0;
          foreach( $cart1 as $ca){
            $car = $car + $ca->quantity;
          }
          //$cart_count = count($cart1);

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

     public function subtotal(){
        if(Cookie::get('cart')){
            $cart_id = Cookie::get('cart');


          $cart =  DB::table('carts')->where('id', $cart_id)->value('items');
          $cart1 = json_decode($cart);
          $car = 0;
          foreach( $cart1 as $ca){
            $car =  $car + $ca->price * $ca->quantity;
          }
          //$cart_count = count($cart1);

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


          $cart =  DB::table('carts')->where('id', $cart_id)->value('items');
          $cart1 = json_decode($cart);

          return view('Mainpage.Cart', compact('cart1'));

        }else{

            return view('Mainpage.Cart',['cart1'=>'']);
        }
    }

    public function removeaddcart(Request $req){
        $validate = Validator::make($req->only('id','size','colour','price','quantity','available','mode'),[
            'id'=>'required|integer',
            'size'=>'required|string',
            'colour'=>'required|string',
            'price'=>'required|integer',
            'quantity'=>'required|integer',
            'available'=>'required|integer',
            'mode'=>'required|string'
        ]);

        $item = array(
            'productid'=>$req->id,
            'size'=>$req->size,
            'colour'=>$req->colour,
            'price'=>$req->price,
            'quantity'=>$req->quantity,
            'available'=>$req->available
        );



        if($validate->fails()){
            return response()->json([
                'status' => 400,
                'message'=>'Technical Error contact the developer'
            ]);
        }else{

            if($req->mode === "remove"){
                if(Cookie::get('cart')){
                    $cartid = Cookie::get('cart');
                    $incart = Cart::findorfail($cartid);
                    $previousitem = json_decode($incart->items,true);
                    $new_items = array();
                    foreach($previousitem as $cartps){

                        if($cartps['productid'] == $item['productid'] && $cartps['size'] == $item['size'] &&
                        $cartps['price'] == $item['price'] && $cartps['colour'] == $item['colour'] &&
                        $cartps['available'] == $item['available']){

                            $cartps['quantity'] = $cartps['quantity'] - 1;
                        }

                        if($cartps['quantity'] > 0){
                            $new_items[] = $cartps;
                        }


                    }

                    $newitem = json_encode($new_items);

                    $cartadd = DB::table('carts')->where('id',$cartid)->update(['items'=> $newitem]);
                    if($cartadd){
                        return response()->json([
                            'status' => 200,
                            'message'=> "Cart has been updated !"
                        ]);
                    }

                }

            }

            if($req->mode === "add"){
                if(Cookie::get('cart')){
                    $cartid = Cookie::get('cart');
                    $incart = Cart::findorfail($cartid);
                    $previousitem = json_decode($incart->items,true);
                    $new_items = array();
                    foreach($previousitem as $cartps){

                        if($cartps['productid'] == $item['productid'] && $cartps['size'] == $item['size'] &&
                        $cartps['price'] == $item['price'] && $cartps['colour'] == $item['colour'] &&
                        $cartps['available'] == $item['available']){

                            $cartps['quantity'] = $cartps['quantity'] + 1;
                        }

                        if($cartps['quantity'] > 0){
                            $new_items[] = $cartps;
                        }


                    }

                    $newitem = json_encode($new_items);

                    $cartadd = DB::table('carts')->where('id',$cartid)->update(['items'=> $newitem]);
                    if($cartadd){
                        return response()->json([
                            'status' => 200,
                            'message'=> "Cart has been updated !"
                        ]);
                    }

                }

            }

            if($req->mode === "removefinally"){
                if(Cookie::get('cart')){
                    $cartid = Cookie::get('cart');
                    $incart = Cart::findorfail($cartid);
                    $previousitem = json_decode($incart->items,true);
                    $new_items = array();
                    foreach($previousitem as $cartps){

                        if($cartps['productid'] == $item['productid'] && $cartps['size'] == $item['size'] &&
                        $cartps['price'] == $item['price'] && $cartps['colour'] == $item['colour'] &&
                        $cartps['available'] == $item['available']){

                            $cartps['quantity'] = 0;
                        }

                        if($cartps['quantity'] > 0){
                            $new_items[] = $cartps;
                        }


                    }

                    $newitem = json_encode($new_items);

                    $cartadd = DB::table('carts')->where('id',$cartid)->update(['items'=> $newitem]);
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
