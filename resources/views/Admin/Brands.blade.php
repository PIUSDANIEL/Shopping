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
                  <h6 class="card-title">Brands</h6>
                  <h6 class="card-title p-1 rounded float-right" style="cursor: pointer; background-color:rgba(136, 167, 167, 0.156);" data-toggle="modal" data-target="#modal-add-category">Add Brands<i class="fa fa-plus text-info" aria-hidden="true"></i></h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="brands" class="table  table-bordered table-striped">
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
                <!-- /.modal add category-->
            <div class="modal fade" id="modal-add-category">
                <div class="modal-dialog modal-dialog-scrollable modal-m">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Add new Brands</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">



                        <div class=" alert-error px-4  alert-dismissible" style="background-color:rgba(233, 129, 129, 0.277);">
                            <ul class="hhhb">

                            </ul>
                        </div>



                        <form  id="addbrand"  class="row g-3" >

                                @csrf


                            <div class="col-11 mx-auto mt-1">
                                    <label for="brandname" class="form-label">Brand</label>
                                    <input type="text" name="brandname" class="form-control form-control-sm " id="brandname" value="" >

                            </div>



                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="submitbrand" class="btn btn-info btn-sm float-right m-2 text-white"  >Submit</button>
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
                    <h4 class="modal-title">Edit Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">



                        <div class=" alert-error px-4  alert-dismissible" style="background-color:rgba(233, 129, 129, 0.277);">
                            <ul class="editbrand">

                            </ul>
                        </div>



                        <form  id="editbrand"  class="row g-3" >

                                @csrf

                            <input type="hidden" name="id" id="brandid" value="">

                            <div class="col-11 mx-auto mt-2">
                                    <label for="brandname" class="form-label">Category</label>
                                    <input type="text" name="brandname" class="form-control form-control-sm " id="editbrandname" value="" >

                            </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="submitbrand" class="btn btn-info btn-sm float-right m-2 text-white"  >Submit</button>
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
