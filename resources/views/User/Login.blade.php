@include('Mainpage.Header')

<div class=" row  registerrow bringitdownreglog mx-auto">

    <div  class="col-sm-6 bg-info registercol mx-auto p-3" >
        <div class="row welcomeregister">
            <h6 class="text-center text-light ">Don't have an Account</h6>
            <h6 class="text-center text-light "><a href="{{ route('user.register') }}"><button  class="btn btn-outline-light  rounded-pill">Register</button> </a></h6>
        </div>
    </div>

    <div class="col-sm-6 shadow registercol mx-auto" >
      <h2 class="mt-4 mb-2">Login</h2>

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


         @if ( session('error') )

         <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>



            <li class="">
                {{ session('error') }}
            </li>


        </div>

        <script>
            var alertList = document.querySelectorAll('.alert');
            alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
            })
        </script>
        @endif



        <form action="{{route('user.userLogin')}}" method="POST">
                @csrf
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                    class="form-control form-control-sm" name="email" value="{{ old('email') }}" id="email" aria-describedby="helpId" placeholder="email" />
                <small id="helpId" class="form-text text-danger"></small>
            </div>

            <div class="mb-1">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                    class="form-control form-control-sm" name="password" value="" id="password" aria-describedby="helpId" placeholder="password" />
                <small id="helpId" class="form-text text-danger"></small>
            </div>

            <div class="col-12 mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>


            <div class="d-flex">
              <button type="submit" class="btn btn-sm btn-info m-3 ms-auto text-white">Submit</button>
            </div>
        </form>

    </div>






</div>

@include('Mainpage.Footer')
