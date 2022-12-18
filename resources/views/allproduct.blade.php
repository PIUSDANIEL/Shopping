@include('Mainpage.Dashboardheader')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 welcom">Welcome</h1>

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
                  <h3 class="card-title">All products</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="mm" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>image</th>
                        <th>Featured</th>
                         <th>Flash sale</th>
                         <th>Shop</th>
                    </tr>
                    </thead>
                    <tbody>



                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Product</th>
                        <th>image</th>
                        <th>Featured</th>
                         <th>Flash sale</th>
                        <th>Shop</th>
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





      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->




  </div>
  <!-- /.content-wrapper -->

@include('Mainpage.Dashboardfooter')



