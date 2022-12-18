@include('Mainpage.Header')


    {{-- BIG SCREEN --}}
   <div class="row after-header subcatfilter bigscreen">
        <div class=" sidenav">
            <div class="row rounded mt-4" style="cursor: pointer;">
                <h6 class="p-1 rounded  clear w-50" style="background-color: rgba(119, 119, 119, 0.407); color:black;">clear all</h6>
            </div>
            <form class="mt-1 mb-5" id="submitfilterbig">
                @csrf
                <div class="accordion accordion-flush " id="accordionFlushExamplefilter">
                    @foreach ($category as $categories)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed p-1 small" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $categories['categoryname'] }}filter" aria-expanded="false" aria-controls="{{ $categories['categoryname'] }}filter">
                                    <i class="fas fa-caret-down mr-2 small"></i> {{ $categories['categoryname'] }}
                                    </button>
                                </h2>
                                <div id="{{ $categories['categoryname'] }}filter" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExamplefilter">
                                    <div class="accordion-body ">

                                        <div class="row ">
                                                @foreach ($categories['subcat'] as $sub)
                                                    <div class="card shadow rounded  col-2 p-1">
                                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                            <input type="radio" class="btn-check" name="subcategory" id="{{$sub->id}}big" value="{{$sub->id}}" autocomplete="off">
                                                            <label class="btn btn-outline-primary p-0" for="{{ $sub->id }}big">
                                                                <div class="col-12">
                                                                    <img src="{{ $sub->image}}" class="" style="width:100%; height:100%;"  alt="Sunset Over the Sea"/>
                                                                </div>

                                                            </label>

                                                        </div>

                                                    </div>
                                                @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

                <div class="row ">
                    <div class="col-12 mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Product Name</span>
                            <input type="text" name="productname" class="form-control form-control-sm" aria-label="">
                        </div>

                    </div>

                    <div class="col-12 mt-3 ">
                        <div class="input-group">
                        <span class="input-group-text small">Price</span>
                        <input type="number" name="minprice" aria-label="First name" class="form-control form-control-sm" placeholder="Min price" min="1" >
                            <p class="mx-2" style="color: black;">to</p>
                        <input type="number"  name="maxprice" aria-label="Last name" class="form-control form-control-sm" placeholder="Max price" min="1" >
                        </div>
                    </div>


                    <div class="col-12 mt-3 ">

                        <div class="list-group">
                            <label class="list-group-item medium">
                                <input class="form-check-input me-1" type="radio" name="highlow" value="high">
                                Highest to Lowest
                            </label>
                            <label class="list-group-item medium">
                                <input class="form-check-input me-1" type="radio" name="highlow" value="low">
                                Lowest to Highest
                            </label>
                        </div>

                    </div>


                    <div class="col-md-12 mt-3 ">
                        <div class="list-group">
                            <label class="list-group-item medium">
                                <input class="form-check-input me-1" type="checkbox" name="latest" value="1">
                                Latest Product
                            </label>
                        </div>
                    </div>



                    <div class="col-12 mt-3 ">
                        <h6 class="w-75 p-1 rounded " style="background-color:#cbd5e0 ; color:black;">Brand</h6>

                               <div class="list-group filterbrandss" id="">

                               </div>


                    </div>

                    <div class="col-12 mt-3 ">
                        <h6 class="w-75 p-1 rounded " style="background-color:#cbd5e0 ; color:black;">Percentage Discount</h6>

                        <div class="list-group">
                            <label class="list-group-item small">
                                <input class="form-check-input me-1" type="radio" name="percentage" value="50">
                                50% and more
                            </label>
                            <label class="list-group-item small">
                                <input class="form-check-input me-1" type="radio" name="percentage" value="40">
                                40% and more
                            </label>
                            <label class="list-group-item small">
                                <input class="form-check-input me-1" type="radio" name="percentage" value="30">
                                30% and more
                            </label>
                            <label class="list-group-item small">
                                <input class="form-check-input me-1" type="radio" name="percentage" value="20">
                                20% and more
                            </label>
                            <label class="list-group-item small">
                                <input class="form-check-input me-1" type="radio" name="percentage" value="10">
                               10% and more
                            </label>
                        </div>

                    </div>

                    <div class="col-12 mt-3 ">
                        <h6 class="w-75 p-1 rounded " style="background-color:#cbd5e0 ; color:black;">Product Rating</h6>

                        <div class="list-group">

                            <label class="list-group-item small">
                                <input class="form-check-input me-1" type="radio" name="rating" value="4">
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                & above
                            </label>
                            <label class="list-group-item small">
                                <input class="form-check-input me-1" type="radio" name="rating" value="3">
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                               <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                & above
                            </label>
                            <label class="list-group-item small">
                                <input class="form-check-input me-1" type="radio" name="rating" value="2">
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                & above
                            </label>
                            <label class="list-group-item small">
                                <input class="form-check-input me-1" type="radio" name="rating" value="1">
                                <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                               <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                               <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                               <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                               <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                               & above
                            </label>
                        </div>

                    </div>

                    <div class="col-12 mt-3 d-flex">
                       <button type="submit" id="submitfilter" class="btn btn-sm btn-outline-info ms-auto">Apply<button>

                    </div>
                </div>
            </form>
        </div>

        <div class="ms-auto rightside kkhgf">
            <div class="row d-flex">
                <h6 class="p-1 rounded w-25 ms-auto" onclick="closesss();"  style="background-color: rgba(119, 119, 119, 0.407); color:black; cursor: pointer;">Expand
                    <i class="fa fa-expand" aria-hidden="true"></i>
                </h6>
            </div>
            <div class="row d-flex filterproduct">

                @if (count($prod) > 0)
                    @foreach ($prod as $products)
                        <div class="card p-0 m-2 cardcartpro categoryproduct2" onclick="detailsmodal({{$products->id}})" data-bs-toggle="modal" data-bs-target="#detailsModal">

                            <img src="{{ $products->main_image }}" class="card-img" alt="...">
                            @if ($products->percentage)
                                <div class="card-img-overlay">
                                    <span class="position-absolute top-1  translate-middle badge rounded-pill " style="color: red; background-color:rgba(127, 44, 44, 0.337);"">
                                    <i class="fas fa-minus"></i> {{$products->percentage}}%
                                    </span>
                                </div>
                            @endif
                            <div class="card-body p-0">
                                <p class="card-text small productcard">{{$products->productname}}</p>
                                <p class="card-text naira mt-n3 small">&#8358;{{ number_format($products->price ) }}</p>
                            </div>
                        </div>
                    @endforeach


                @else
                    <div class="col-6 mx-auto rounded">
                        <h6 class="text-bg-secondary rounded p-3">No product found... Search more product please</h6>
                    </div>

                @endif

            </div>
        </div>

        {{-- footer --}}
        <footer class=" mb-0  ms-auto footer footersubbig  " style="background-color:#6b7280 ; ">
            <div class="row footerrow">
                <div class="col-11 col-lg-5 mx-auto my-2 shadow" style="background-color:#00000000 ; border-radius:20px;">
                    <p class="text-white submitfilterd">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Praesentium et, ex exercitationem nobis minima architecto
                    assumenda eligendi autem quas amet perspiciatis unde, voluptate quasi sit.
                    Magni ad soluta blanditiis saepe?mm
                    </p>
                </div>
                <div class="col-11 col-lg-5 mx-auto my-2 shadow" style="background-color:#00000000 ; border-radius:20px; ">
                    <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Praesentium et, ex exercitationem nobis minima architecto
                    assumenda eligendi autem quas amet perspiciatis unde, voluptate quasi sit.
                    Magni ad soluta blanditiis saepe?
                    </p>
                </div>
            </div>
        </footer>

   </div>






    {{-- SMALL SCREEN --}}
    <div class="row after-header  small-screen filterproduct">

        @if (count($prod) > 0)
            @foreach ($prod as $products)
                <div class="card p-0 m-1 col-2 subcatprodd" onclick="detailsmodal({{$products->id}})" data-bs-toggle="modal" data-bs-target="#detailsModal">

                    <img src="{{ $products->main_image }}" class="card-img" alt="...">
                    @if ($products->percentage)
                        <div class="card-img-overlay">
                            <span class="position-absolute top-1  translate-middle badge rounded-pill " style="color: red; background-color:rgba(127, 44, 44, 0.337);"">
                            <i class="fas fa-minus"></i> {{$products->percentage}}%
                            </span>
                        </div>
                    @endif
                    <div class="card-body p-0">
                        <p class="card-text small productcard">{{$products->productname}}</p>
                        <p class="card-text naira mt-n3 small">&#8358;{{ number_format($products->price ) }}</p>
                    </div>
                </div>
            @endforeach


        @else
            <div class="col-11 mx-auto rounded">
                <h6 class="text-bg-secondary rounded p-3">No product found... Search more product please</h6>
            </div>

        @endif

    </div>

    {{-- footer --}}
    <footer class="row mb-0  footer  small-screen" style="background-color:#6b7280 ;">
        <div class="row footerrow">
            <div class="col-11 col-lg-5 mx-auto my-2 shadow" style="background-color:#00000000 ; border-radius:20px;">
                <p class="text-white submitfilterd">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Praesentium et, ex exercitationem nobis minima architecto
                assumenda eligendi autem quas amet perspiciatis unde, voluptate quasi sit.
                Magni ad soluta blanditiis saepe?mm
                </p>
            </div>
            <div class="col-11 col-lg-5 mx-auto my-2 shadow" style="background-color:#00000000 ; border-radius:20px; ">
                <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Praesentium et, ex exercitationem nobis minima architecto
                assumenda eligendi autem quas amet perspiciatis unde, voluptate quasi sit.
                Magni ad soluta blanditiis saepe?
                </p>
            </div>
        </div>
    </footer>



