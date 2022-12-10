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
             <!-- /.card -->

            <div class="card">
                <div class="card-header">
                  <h6 class="card-title">Categories</h6>
                  <h6 class="card-title p-1 rounded float-right" style="cursor: pointer; background-color:rgba(136, 167, 167, 0.156);" data-toggle="modal" data-target="#modal-add-category">Add categories<i class="fa fa-plus text-info" aria-hidden="true"></i></h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="category" class="table  table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Edit</th>

                    </tr>
                    </thead>
                    <tbody>



                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Edit</th>

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
            <div class="col-12">
                    <!-- /.card -->
                <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Sub-categories</h6>
                            <h6 class="card-title p-1 rounded float-right addsubcategories" style="cursor: pointer; background-color:rgba(136, 167, 167, 0.156);" data-toggle="modal" data-target="#modal-subcategory">Add sub-categories<i class="fa fa-plus text-info" aria-hidden="true"></i></h6>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="sub-category" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Image</th>
                                <th>Category</th>

                            </tr>
                            </thead>
                            <tbody>



                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Image</th>
                                <th>Category</th>

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
                <!-- /.modal add category-->
            <div class="modal fade" id="modal-add-category">
                <div class="modal-dialog modal-dialog-scrollable modal-m">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Add new category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">



                        <div class=" alert-error px-4  alert-dismissible" style="background-color:rgba(233, 129, 129, 0.277);">
                            <ul class="hhhb">

                            </ul>
                        </div>



                        <form  id="addcategory"  class="row g-3" >

                                @csrf


                            <div class="col-11 mx-auto mt-1">
                                    <label for="categoryname" class="form-label">Category</label>
                                    <input type="text" name="categoryname" class="form-control form-control-sm " id="categoryname" value="" >

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
        </div>

        <div class="row">
                <!-- /.modal add category-->
            <div class="modal fade" id="modal-subcategory">
                <div class="modal-dialog modal-dialog-scrollable modal-m">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Add new sub-category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">



                        <div class=" alert-error px-4  alert-dismissible" style="background-color:rgba(233, 129, 129, 0.277);">
                            <ul class="sub">

                            </ul>
                        </div>



                        <form  id="addsubcategory" enctype="multipart/form-data"  class="row g-3" >

                                @csrf

                            <div class="col-11 mx-auto mt-2">
                                    <label for="subcategoryname" class="form-label">Sub category</label>
                                    <input type="text" name="subcategoryname" class="form-control form-control-sm " id="subcategoryname" value="" >

                            </div>

                            <div class="col-11 mx-auto mt-2">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" name="image" id="image" value="">
                            </div>


                            <div class=" col-11 mx-auto mt-2">
                                <label for="category">Category</label>
                                <select class="custom-select custom-select-sm catego" name="category" id="categories">
                                    <option selected>Select one</option>
                                </select>

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
        </div>

        <div class="row">
            <!-- /.modal add category-->
            <div class="modal fade" id="modal-edit-category">
                <div class="modal-dialog modal-dialog-scrollable modal-m">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Edit category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">



                        <div class=" alert-error px-4  alert-dismissible" style="background-color:rgba(233, 129, 129, 0.277);">
                            <ul class="editcat">

                            </ul>
                        </div>



                        <form  id="editcategory"  class="row g-3" >

                                @csrf

                            <input type="hidden" name="id" id="catid" value="">

                            <div class="col-11 mx-auto mt-2">
                                    <label for="categoryname" class="form-label">Category</label>
                                    <input type="text" name="categoryname" class="form-control form-control-sm " id="editcategoryname" value="" >

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
        </div>

        <div class="row">
            <!-- /.modal add category-->
            <div class="modal fade" id="modal-edit-subcategory">
                <div class="modal-dialog modal-dialog-scrollable modal-m">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Edith sub-category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">



                        <div class=" alert-error px-4  alert-dismissible" style="background-color:rgba(233, 129, 129, 0.277);">
                            <ul class="subedit">

                            </ul>
                        </div>



                        <form  id="editsubcategory" enctype="multipart/form-data"  class="row g-3" >

                                @csrf

                            <input type="hidden" name="id" id="subeditids" value="">

                            <input type="hidden" name="oldimage" id="oldimage" value="">

                            <div class="col-11 mx-auto mt-2 subimage">

                            </div>

                            <div class="col-11 mx-auto mt-2">
                                    <label for="editsubcategoryname" class="form-label">Sub category</label>
                                    <input type="text" name="editsubcategoryname" class="form-control form-control-sm " id="editsubcategoryname" value="" >

                            </div>

                            <div class="col-11 mx-auto mt-2 subimsgechange ">
                                <label for="editimage" class="form-label">Image</label>
                                <input class="form-control" type="file" name="editimage" id="editimage" value="">
                            </div>


                            <div class=" col-11 mx-auto mt-2">
                                <label for="category">Category</label>
                                <select class="custom-select custom-select-sm catego" name="category" id="categoryeditsub">
                                    <option selected></option>
                                </select>

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
        </div>


      </div>
    </div>
  </div>


@include('Mainpage.Dashboardfooter')
