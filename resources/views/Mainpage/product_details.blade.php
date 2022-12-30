@includeIf('Mainpage.Header')

@foreach ($producs as $product)
<div class="row after-header">

        <div class="card  col-12 col-md-12 col-lg-8" style="">
            <div class="row g-0">
                <div class="col-md-4">
                   <!-- Add images to <div class="fotorama"></div> -->
                      <div class="fotorama rounded"
                        data-allowfullscreen="true"
                        data-nav="thumbs"
                        data-autoplay="true"
                        data-keyboard='{"space": true, "home": true, "end": true, "up": true, "down": true}'
                        data-arrows="true"
                        data-click="true"
                        data-swipe="true">
                             <img src="{{ $product['main_image'] }}" class="rounded">

                        @foreach ($product['images'] as $img)
                            <img src="{{ $img }}" class="rounded">
                        @endforeach

                     </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['productname']}}</h5>
                        <div><span>Brand</span> <div class="vr"></div>  <span>
                            @foreach ($product['brand'] as $bradf)
                                {{ $bradf->brand }}
                            @endforeach
                        </span></div>
                        <p class="card-text">
                            <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                            <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                            <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                            <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                            <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                        </p>
                        <h5>&#8358;{{ number_format($product['price_min'])}} - &#8358;{{ number_format($product['price_max'])}}</h5>
                        <p class="card-text"><del>&#8358;{{ number_format($product['listprice'])}}</del> <span class=" ml-3 rounded p-1" style="background-color: rgba(154, 50, 50, 0.201); color:red;">-40%</span></p>

                        @if (count($product['variation']) == 1)
                            <div class="row">
                                @foreach ($product['variation'] as $variation)
                                        <p>Size: {{ $variation->size }}</p>
                                        <p>Colour: <i class="fa fa-square " aria-hidden="true" style="margin-top:1px;  font-size:20px; color:{{ $variation->colour }};"></i></p>

                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control form-control-sm" aria-label="Button" aria-describedby="" id="" value="" min="1" max="" placeholder="Qty">
                                                <button class="btn btn-sm btn-info px-5" type="button" id=""> <i class="fa fa-shopping-basket" aria-hidden="true"></i> </button>
                                            </div>
                                        </div>

                                @endforeach
                            </div>
                        @else
                            <div class="row mt-1 ">
                                    <h6>Variations</h6>
                                    @foreach ($product['variation'] as $variation)
                                    <div class="card col-5 m-1 rounded col-sm-3" data-bs-toggle="modal" data-bs-target="#modalIdvariaion">
                                        <div class="row">
                                            <div class="col-9">{{ $variation->size }} </div>
                                            <div class="col-3" style="background-color:{{ $variation->colour }};"></div>
                                        </div>

                                    </div>

                                    @endforeach


                                <div class="col-12 d-flex p-3">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#modalIdvariaion" class="btn btn-sm w-50 mx-auto bg-info mt-3"><i class="fa fa-shopping-cart"></i></button>
                                </div>
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>

        <div class="card col-12 col-sm-4" style="">
          <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            b5
          </div>
        </div>











        <script>
            var modalIdvariaion = document.getElementById('modalIdvariaion');

            modalIdvariaion.addEventListener('show.bs.modal', function (event) {
                  // Button that triggered the modal
                  let button = event.relatedTarget;
                  // Extract info from data-bs-* attributes
                  let recipient = button.getAttribute('data-bs-whatever');

                // Use above variables to manipulate the DOM
            });
        </script>




</div>

 <!-- Modal -->
<div class="modal fade" id="modalIdvariaion" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog   modal-dialog-scrollable" role="document">
        <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    @foreach ($product['variation'] as $variation)
                        <div class="row  my-2 d-flex justify-content-between">
                            <div class="col-2"><p class="text-center">{{ $variation->size }}</p></div>
                            <div class="col-1"><p class="text-center"><i class="fa fa-square " aria-hidden="true" style="margin-top:1px;  font-size:25px; color:{{ $variation->colour}};"></i></p></div>
                            <div class="col-3  col-lg-3"><p class="text-center">&#8358;{{ number_format($variation->price) }}</p></div>
                            <div class="col-6 col-lg-4">
                                <div class="input-group">
                                <input type="number" class="form-control form-control-sm" aria-label="Button" aria-describedby="" id="" value="" min="1" max="" placeholder="Qty">
                                <button class="btn btn-sm btn-info px-3" type="button" id=""> <i class="fa fa-shopping-basket" aria-hidden="true"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="row px-5 "><p class="small text-danger">{{ $variation->qty_in_stock < 10 ? $variation->qty_in_stock.' units left':'' }}</p> <p class="small">{{ $variation->qty_in_stock > 10 ? 'in stock':'' }}</p></div>
                    @endforeach





                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> </button>

            </div>
        </div>
    </div>
</div>



@endforeach





@includeIf('Mainpage.Footer')
