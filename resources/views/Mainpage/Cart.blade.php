@include('Mainpage.Header')

    @empty($cart1)

    @else
        <div class="row after-header p-3" style="background-color:rgba(189, 205, 205, 0.32) ;" >
            <div class="col-12" style="font-weight: 700;"><h5>Cart Summary</h5></div>
            <div class="col-12 mt-2 d-inline-flex">
                <h6 class="" style="font-weight: 700;">Subtotal <span class=" bg-info p-2 rounded subtotal"></span></h6>

                @auth
                    <a href="{{ route('orders') }}" class="btn btn-sm mt-n2  btn-info ms-auto">
                        Checkout <span class="badge"> <i class="fa fa-credit-card text-dark" aria-hidden="true"></i> </span>
                    </a>
                @else
                  <a href="{{ route('user.login') }}" class="bg-info p-1 rounded ms-auto">Please Login <span><i class="fa fa-user-circle" aria-hidden="true"></i> </span></a>
                @endauth
            </div>
        </div>
    @endempty


    <div class="row mt-3 ">

       @empty($cart1)
           <div class="row after-header">
              <div class="col-11">
                  <h3 class="text-center text-info">Cart is empty</h3>
              </div>

              <div class=" col-10 mx-auto d-flex">
                 <a href="#" class="mx-auto text-info">You can search your favourite products here <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
              </div>
           </div>
        @else
            @foreach ($cart1 as $cartp)
                <div class="col-12 col-sm-6 mt-2 shadow d-inline-flex rounded">
                    <div class="row">
                        <div class="col-3 col-sm-2">
                            <img src="{{$cartp->product_image}}" class="img-fluid rounded" style="">
                        </div>
                        <div class="col-9 rounded">
                            <div class="row ">
                                <div class="col-12  rounded shadow">
                                    <div class="vstack gap-1">
                                        <div class=""><p class="m-0 small productcard">{{ $cartp->product_name}}</p></div>
                                        <div class=""><p class="m-0 small ">&#8358; @convert($cartp->product_price)</p></div>
                                        <div class=""><p class="m-0 small ">{{ $cartp->product_size}}</p></div>
                                        <div class=""><p class="m-0 small "><i class="fa fa-square" aria-hidden="true" style="color:{{ $cartp->product_colour }};" ></i></p></div>
                                    </div>

                                    <div class="hstack gap-1">
                                        <div class=""><p class="m-0 small ">{{ $cartp->product_qty_instock}} available</p></div>
                                        <p class="text-right ms-auto m-0" style="font-weight: 700;">
                                            &#8358; @convert($cartp->user_qty * $cartp->product_price)
                                        </p>
                                    </div>

                                    <div class="hstack my-1 gap-1">
                                        <span class="badge alert-danger text-danger  " style="cursor: pointer ;"
                                          onclick="removeaddcart('{{$cartp->product_id}}','{{$cartp->product_size}}','{{$cartp->product_colour}}','{{$cartp->product_price}}','{{$cartp->user_qty}}','{{$cartp->product_qty_instock}}','{{$cartp->product_sku}}','removefinally')">
                                          <i class="fa fa-trash text-danger"></i> remove
                                        </span>

                                        <span class="ms-auto">
                                            <button type="button" class="btn  btn-outline-info btn-sm "
                                                onclick="removeaddcart('{{$cartp->product_id}}','{{$cartp->product_size}}','{{$cartp->product_colour}}','{{$cartp->product_price}}','{{$cartp->user_qty}}','{{$cartp->product_qty_instock}}','{{$cartp->product_sku}}','remove')">
                                                <span class="badge" style="color:black;"><i class="fa fa-minus" style="color:black;"></i></span>
                                            </button>
                                            <span class="badge bg-light" style="color:black;">{{ $cartp->user_qty}}</span>
                                            @if ( $cartp->user_qty ==  $cartp->product_qty_instock)
                                                <span class="badge text-danger" style="color:black;">Max</span>

                                            @else
                                                <button type="button" class="btn btn-outline-info btn-sm  "
                                                onclick="removeaddcart('{{$cartp->product_id}}','{{$cartp->product_size}}','{{$cartp->product_colour}}','{{$cartp->product_price}}','{{$cartp->user_qty}}','{{$cartp->product_qty_instock}}','{{$cartp->product_sku}}','add')">
                                                    <span class="badge" style="color:black;"><i class="fa fa-plus" style="color:black;"></i></span>
                                                </button>
                                            @endif
                                        </span>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-n3 ">
                                <div class="col-12 d-flex">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
       @endempty


    </div>




@includeIf('Mainpage.Footer')
