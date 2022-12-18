@include('Mainpage.Dashboardheader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Welcome</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                            {{-- -
                            <li class="breadcrumb-item active">Starter Page</li>
                            --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

            <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header  ">
                            <h6 class="card-title">Products Uploaded</h6>
                            <h6 class="card-title p-1 rounded float-right" style="cursor: pointer; background-color:rgba(136, 167, 167, 0.156);" data-toggle="modal" data-target="#modal-editor">Add product <i class="fa fa-plus text-info" aria-hidden="true"></i></h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body py-2">
                            <table id="example12" class="table table-bordered table-responsive table-striped  w-100">
                                <thead>
                                <tr>
                                <th>Product</th>
                                <th>image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Variation</th>
                                <th>Categories</th>
                                <th>Sub categories</th>

                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Product</th>
                                    <th>image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Variation</th>
                                    <th>Categories</th>
                                    <th>Sub categories</th>
                                </tr>
                                </tfoot>
                            </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                        <div class="col-md-12">
                            <!-- /.modal add product-->
                            <div class="modal fade" id="modal-editor">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Add new product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">



                                        <div class=" alert-error px-4  alert-dismissible" style="background-color:rgba(233, 129, 129, 0.277);">

                                        </div>



                                        <form  id="productupload"  enctype="multipart/form-data" class="row g-3 newattrpro" >

                                                @csrf

                                                <input type="hidden" name="shopname" id="shopname"
                                                    @if (Auth::guard('seller')->user())
                                                        value="{{ Auth::guard('seller')->user()->id }}"
                                                    @else
                                                        value="flea"
                                                    @endif
                                                >

                                                <input type="hidden" name="uploader" id="uploader"
                                                    @if (Auth::guard('seller')->user())
                                                        value="{{ Auth::guard('seller')->user()->id }}"

                                                    @elseif (Auth::guard('editor')->user())
                                                        value="{{ Auth::guard('editor')->user()->id }}"
                                                    @else
                                                        value="admin"
                                                    @endif
                                                >

                                            <div class="col-md-4 mt-2">
                                                    <label for="productname" class="form-label">Product name</label>
                                                    <input type="text" name="productname" class="form-control form-control-sm name" id="productname" value="" >

                                            </div>

                                            <div class=" col-lg-4 mt-2">
                                                <label for="listprice" class="form-label">List Price</label>
                                                <input type="number" name="listprice" class="form-control form-control-sm listprice" id="editlistprice" value="{{ old('listprice') }}" >

                                            </div>

                                            <div class=" col-lg-4 mt-2">
                                                <label for="percentage" class="form-label">Percentage</label>
                                                <input type="number" name="percentage" value="{{ old('percentage') }}" class="form-control form-control-sm" id="editpercentage" >
                                            </div>



                                            <div class="col-md-4 mt-2">
                                                <label for="main_image">Main images</label>
                                                <input type="file" class="form-control-file" name="main_image" id="main_image" placeholder="image" aria-describedby="fileHelpId">
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="images">images</label>
                                                <input type="file" class="form-control-file" name="images[]" id="images" placeholder="images" aria-describedby="fileHelpId"  multiple>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="brandp">Brands</label>
                                                <select class="custom-select custom-select-sm brandp" name="brand" id="brandp">
                                                <option selected></option>
                                                </select>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <label for="categories">Categories</label>
                                                <select class="custom-select custom-select-sm" name="categories" id="categories">
                                                <option selected></option>
                                                </select>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                    <label for="sub_categories">Sub categories</label>
                                                    <select class="custom-select custom-select-sm"  name="sub_categories" id="sub_categories">
                                                        <option selected></option>
                                                    </select>
                                            </div>


                                            <div class="col-md-4 mt-2">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description" value="{{ old('description') }}" id="description" rows="3"></textarea>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                    <label for="specification">Specification</label>
                                                    <textarea class="form-control" name="specification" value="{{ old('specification') }}" id="specification" rows="3"></textarea>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                    <label for="search">Posible search</label>
                                                    <textarea class="form-control" name="search" value="{{ old('search') }}" id="search" rows="3"></textarea>
                                                    <div class=" p-1 rounded" style="background-color: rgb(55, 54, 54);">
                                                        <p style="color: white;">
                                                            Note : Posible search helps customers to find your products easily
                                                            please write down keywords related to your product without comma
                                                            eg: if the product is men's shoes your keywords could be
                                                            men zara leather shoes and more..

                                                        </p>
                                                    </div>
                                            </div>




                                            <div class="row w-100 mx-auto mt-2 p-1 ">
                                                <button class="btn btn-sm bg-dark addmoreattrpro" id="">
                                                        Add more attributes <span class="badge badge-primary"> <i class="fa fa-plus" aria-hidden="true"></i> </span>
                                                </button>
                                            </div>

                                            <div class="w-100 row rounded mx-auto mt-2 p-1 " style="background-color: rgb(138, 136, 136);">

                                                    <div class="col-md-4 mt-2">
                                                        <label for="size" class="form-label">Size </label>
                                                        <input type="text" name="size[]" value="n/a" class="form-control form-control-sm size" id="size">

                                                    </div>

                                                    <div class="col-md-4 mt-2">
                                                            <label for="colour" class="form-label">Colour</label>
                                                            <input type="color" name="colour[]" value="{{ old('colour') }}" class="form-control form-control-sm" id="colour" >
                                                    </div>

                                                    <div class="col-md-4 mt-2">
                                                        <label for="quantity" class="form-label">Quantity</label>
                                                        <input type="number" name="quantity[]" value="{{ old('quantity') }}" class="form-control form-control-sm" id="quantity" >
                                                    </div>

                                                    <div class="col-md-4 mt-2">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input type="number" name="price[]" class="form-control form-control-sm price" id="price" value="{{ old('price') }}" >

                                                    </div>




                                            </div>







                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" id="submitdata" class="btn btn-info btn-sm float-right m-2 text-white"  >Submit</button>
                                        </form>
                                    </div>

                                </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                            <!-- /.modal edit product-->
                            <div class="modal fade" id="modal-edit-product">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Edit product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">



                                        <div class=" alert-error-edit px-4  alert-dismissible" style="background-color:rgba(233, 129, 129, 0.277);">

                                        </div>



                                        <form  id="productedit"  enctype="multipart/form-data" class="row g-3 " >

                                                @csrf

                                                    <div class=" col-lg-4 mt-2">
                                                        <label for="main_image">Main images</label>
                                                        <div class="displaimg">

                                                        </div>
                                                        <input type="file" class="form-control-file" name="main_image" id="editmain_image" placeholder="image" aria-describedby="fileHelpId">
                                                    </div>



                                                    <div class=" col-lg-4 mt-2">
                                                         <label for="images">images</label>
                                                        <div class="displaimges d-flex row ">

                                                        </div>
                                                        <input type="file" class="form-control-file " name="imagesegit[]" id="editimages" placeholder="images" aria-describedby="fileHelpId" multiple>
                                                    </div>

                                                <input type="hidden" name="shopname" id="shopname"
                                                    @if (Auth::guard('seller')->user())
                                                        value="{{ Auth::guard('seller')->user()->id }}"
                                                    @else
                                                        value="flea"
                                                    @endif
                                                >

                                                <input type="hidden" name="uploader" id="uploader"
                                                    @if (Auth::guard('seller')->user())
                                                        value="{{ Auth::guard('seller')->user()->id }}"

                                                    @elseif (Auth::guard('editor')->user())
                                                        value="{{ Auth::guard('editor')->user()->id }}"
                                                    @else
                                                        value="admin"
                                                    @endif
                                                >

                                                <input type="hidden" name="productid" value="" id="productid">

                                                <input type="hidden" name="old_main_image" value="" class="old_main_image">

                                                <input type="hidden" name="old_images" value="" class="old_images">

                                                <div class=" col-lg-4 mt-2">
                                                    <label for="productname" class="form-label">Product name</label>
                                                    <input type="text" name="productname" class="form-control form-control-sm name" id="editproductname" value="" >

                                                </div>


                                                <div class=" col-lg-4 mt-2">
                                                    <label for="listprice" class="form-label">List Price</label>
                                                    <input type="number" name="listprice" class="form-control form-control-sm listprice" id="editlistprices" value="{{ old('listprice') }}" >

                                                </div>


                                                <div class="col-md-4 mt-2">
                                                    <label for="brand">Brands</label>
                                                    <select class="custom-select custom-select-sm brandp" name="brand" id="editbrand">
                                                    <option selected></option>
                                                    </select>
                                                </div>



                                                <div class=" col-lg-4 mt-2">
                                                    <label for="percentage" class="form-label">Percentage</label>
                                                    <input type="number" name="percentage" value="{{ old('percentage') }}" class="form-control form-control-sm" id="editpercentages" >
                                                </div>



                                                <div class=" col-lg-4 mt-2">
                                                    <label for="categories">Categories</label>
                                                    <select class="custom-select custom-select-sm" name="categories" id="editcategories">
                                                        <option selected></option>
                                                    </select>
                                                </div>

                                                <div class=" col-lg-4 mt-2">
                                                    <label for="sub_categories">Sub categories</label>
                                                    <select class="custom-select custom-select-sm"  name="sub_categories" id="editsub_categories">
                                                        <option selected></option>
                                                    </select>
                                                </div>


                                                <div class=" col-lg-4 mt-2">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description" value="{{ old('description') }}" id="editdescription" rows="3"></textarea>
                                                </div>

                                                <div class=" col-lg-4 mt-2">
                                                    <label for="specification">Specification</label>
                                                    <textarea class="form-control" name="specification" value="{{ old('specification') }}" id="editspecification" rows="3"></textarea>
                                                </div>

                                                <div class=" col-lg-4 mt-2">
                                                    <label for="search">Posible search</label>
                                                    <textarea class="form-control" name="search" value="{{ old('search') }}" id="editsearch" rows="3"></textarea>
                                                </div>

                                                <div class="row w-100 mx-auto mt-2 p-1 ">
                                                    <button class="btn btn-sm bg-dark addmoreattr" id="">
                                                            Add more attributes <span class="badge badge-primary"> <i class="fa fa-plus" aria-hidden="true"></i> </span>
                                                    </button>
                                                </div>

                                                <div class="container newattr">

                                                </div>





                                    </div>
                                    <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" id="editsubmitdata" class="btn btn-info btn-sm float-right m-2 text-white"  >Edit</button>
                                        </form>
                                    </div>

                                </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                            <!-- /.modal size price quantity-->
                            <div class="modal fade" id="modal-scpq">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Size, Colour,Price and Quantity</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">

                                            @for ($i = 1; $i <= 5; $i++)
                                                <div class="row border border-info mt-1 rounded">
                                                    <div class="form-group mx-auto col-10 col-md-4 col-lg-3 mb-3 m-2">
                                                        <label for="size{{$i}}" class="form-label">Size</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm" value="" name="size{{$i}}" id="size{{$i}}" aria-describedby="helpId" placeholder="">
                                                    </div>
                                                    <div class="form-group mx-auto col-10 col-md-4 col-lg-3 mb-3 m-2">
                                                        <label for="colour{{$i}}" class="form-label">Color</label>
                                                        <input type="color"
                                                        class="form-control form-control-sm" value="" name="colour{{$i}}" id="colour{{$i}}" aria-describedby="helpId" placeholder="">
                                                    </div>
                                                    <div class="form-group mx-auto col-10 col-md-4 col-lg-3 mb-3 m-2">
                                                        <label for="price{{$i}}" class="form-label">Price</label>
                                                        <input type="number"
                                                            class="form-control form-control-sm" value="" name="price{{$i}}" id="price{{$i}}" aria-describedby="helpId" placeholder="" min="1">
                                                    </div>

                                                    <div class="form-group mx-auto col-10 col-md-4 col-lg-3 mb-3 m-2">
                                                        <label for="quantity{{$i}}" class="form-label">Quantity</label>
                                                        <input type="number"
                                                        class="form-control form-control-sm" value="" name="quantity{{$i}}" id="quantity{{$i}}" aria-describedby="helpId" placeholder="" min="1">
                                                    </div>
                                                </div>
                                            @endfor




                                    </div>
                                    <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" data-dismiss="modal" id="sizeprice" onclick="sizepriceqty();" class="btn btn-info btn-sm float-right m-2 text-white"  >Save</button>

                                    </div>

                                </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                                <!-- /.modal size price quantity-->
                            <div class="modal fade" id="modal-edit-scpq">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Size, Colour,Price and Quantity</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">

                                            @for ($i = 1; $i <= 5; $i++)
                                                <div class="row border border-info mt-1 rounded">
                                                    <div class="form-group mx-auto col-10 col-md-4 col-lg-3 mb-3 m-2">
                                                        <label for="editsize{{$i}}" class="form-label">Size</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm" value="" name="editsize{{$i}}" id="editsize{{$i}}" aria-describedby="helpId" placeholder="">
                                                    </div>
                                                    <div class="form-group mx-auto col-10 col-md-4 col-lg-3 mb-3 m-2">
                                                        <label for="editcolour{{$i}}" class="form-label">Color</label>
                                                        <input type="color"
                                                        class="form-control form-control-sm" value="" name="editcolour{{$i}}" id="editcolour{{$i}}" aria-describedby="helpId" placeholder="">
                                                    </div>
                                                    <div class="form-group mx-auto col-10 col-md-4 col-lg-3 mb-3 m-2">
                                                        <label for="editprice{{$i}}" class="form-label">Price</label>
                                                        <input type="number"
                                                            class="form-control form-control-sm" value="" name="editprice{{$i}}" id="editprice{{$i}}" aria-describedby="helpId" placeholder="" min="1">
                                                    </div>

                                                    <div class="form-group mx-auto col-10 col-md-4 col-lg-3 mb-3 m-2">
                                                        <label for="editquantity{{$i}}" class="form-label">Quantity</label>
                                                        <input type="number"
                                                        class="form-control form-control-sm" value="" name="editquantity{{$i}}" id="editquantity{{$i}}" aria-describedby="helpId" placeholder="" min="1">
                                                    </div>
                                                </div>
                                            @endfor




                                    </div>
                                    <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" data-dismiss="modal" id="sizeprice" onclick="editsizepriceqty();" class="btn btn-info btn-sm float-right m-2 text-white"  >Save</button>

                                    </div>

                                </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                </div>



            </div><!-- /.container-fluid -->
        </div>
            <!-- /.content -->




  </div>
  <!-- /.content-wrapper -->

@include('Mainpage.Dashboardfooter')


