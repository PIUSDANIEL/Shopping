@include('Mainpage.Dashboardheader')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

            <div class=" row mt-5 registerrow mx-auto">

                @if (session('registered'))

                <script>
                    swal("successfull","{!! session('registered') !!}","success",{
                        button:"ok",
                    });
                </script>

                @endif

                <div class="col-12  shadow  registercol mx-auto" >



                <h2 class="mt-4 mb-2">Register an editor</h2>

                    @if ($errors->any())

                    <div class="alert alert-danger  alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>

                        @foreach ($errors->all() as $error)
                            <li class="">
                                {{ $error }}
                            </li>
                        @endforeach


                    </div>

                    @endif



                <form action="{{ route('admin.editorRegister') }}" method="post" class="row  g-3 needs-validation" novalidate>

                        @csrf

                            <div class="col-md-6 mt-2">
                            <label for="firstname" class="form-label">First name</label>
                            <input type="text" name="firstname" class="form-control form-control-sm" id="firstname" value="{{ old('firstname') }}" required>
                            <div class="valid-feedback">

                            </div>
                            </div>

                            <div class="col-md-6 mt-2">
                            <label for="lastname" class="form-label">Last name</label>
                            <input type="text" name="lastname" class="form-control form-control-sm" id="lastname" value="{{ old('lastname') }}" required>
                            <div class="valid-feedback">

                            </div>
                            </div>

                            <div class="col-md-6 mt-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm" id="email" required>
                            <div class="invalid-feedback">

                            </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="phonenumber" class="form-label">Phone number</label>
                                <input type="number" name="phonenumber" value="{{ old('phonenumber') }}" class="form-control form-control-sm" id="phonenumber" >
                                <div class="invalid-feedback">

                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" value="" class="form-control form-control-sm" id="password" required>
                                <div class="invalid-feedback">

                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label for="confirmpassword" class="form-label">Confirm password</label>
                                <input type="password" name="confirmpassword" value="" class="form-control form-control-sm" id="confirmpassword" required>
                                <div class="invalid-feedback">

                                </div>
                            </div>



                            <div class="col-12 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" value="1" id="terms" required>
                                <label class="form-check-label" for="terms">
                                Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                You must agree before submitting.
                                </div>
                            </div>
                            </div>
                            <div class="col-12 mt-2">
                            <button class="btn btn-info btn-sm float-right m-2 text-white"  type="submit">Submit</button>
                            </div>
                </form>







                </div>



            </div>

      </div>
    </div>
</div>
@include('Mainpage.Dashboardfooter')
