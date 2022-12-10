@include('Mainpage.Header')

<div class=" row  registerrow bringitdownreglog mx-auto">

    <div class="col-sm-12 shadow  registercol mx-auto" >

        <div class=" d-flex justify-content-end bg-info rounded p-2">
              <a href="{{ route('user.login') }}" class="ml-3 text-light">Already have an account  Login</a>

        </div>


      <h2 class="mt-4 mb-2">Register</h2>

        @if ($errors->any())

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>


            @foreach ($errors->all() as $error)
                <li class="">
                    {{ $error }}
                </li>
            @endforeach

                </div>

                    <script>
                        var alertList = document.querySelectorAll('.alert');
                        alertList.forEach(function (alert) {
                        new bootstrap.Alert(alert)
                        })
                    </script>
        @endif



      <form action="{{ route('user.userRegister') }}" method="post" class="row g-3 needs-validation" novalidate>

             @csrf

                <div class="col-md-4">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" name="firstname" class="form-control form-control-sm" id="firstname" value="{{ old('firstname') }}" required>
                <div class="valid-feedback">

                </div>
                </div>

                <div class="col-md-4">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" name="lastname" class="form-control form-control-sm" id="lastname" value="{{ old('lastname') }}" required>
                <div class="valid-feedback">

                </div>
                </div>

                <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm" id="email" required>
                <div class="invalid-feedback">

                </div>
                </div>


                <div class="col-md-4">
                    <label for="phone_number_1" class="form-label">Phone number 1</label>
                    <input type="number" name="phone_number_1" value="{{ old('phone_number_1') }}" class="form-control form-control-sm" id="phone_number_1" >
                    <div class="invalid-feedback">

                    </div>
                </div>

                <div class="col-md-4">
                    <label for="phone_number_2" class="form-label">Phone number 2</label>
                    <input type="number" name="phone_number_2" value="{{ old('phone_number_2') }}" class="form-control form-control-sm" id="phone_number_2"
                    placeholder="optional" >
                    <div class="invalid-feedback">

                    </div>
                </div>



                <div class="col-md-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" value="" class="form-control form-control-sm" id="password" required>
                    <div class="invalid-feedback">

                    </div>
                </div>

                <div class="col-md-4">
                    <label for="confirmpassword" class="form-label">Confirm password</label>
                    <input type="password" name="confirmpassword" value="" class="form-control form-control-sm" id="confirmpassword" required>
                    <div class="invalid-feedback">

                    </div>
                </div>



                <div class="col-12">
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

                <div class="col-12 ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="col-12 d-flex">
                  <button class="btn btn-info btn-sm ms-auto m-2 text-white"  type="submit">Submit</button>
                </div>
      </form>







    </div>



</div>

@includeIf('Mainpage.Footer')
