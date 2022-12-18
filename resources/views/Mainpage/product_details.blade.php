@includeIf('Mainpage.Header')

<div class="row after-header">
    <div class="col-12 col-md-12 col-lg-11 mx-auto  rounded " >
        <div class="row ">

            <div class="col-12 col-sm-5 rounded mt-2">
                <!-- Add images to <div class="fotorama"></div> -->
                <div class="fotorama rounded"
                 data-allowfullscreen="true"
                 data-nav="thumbs"
                 data-autoplay="true"
                 data-keyboard='{"space": true, "home": true, "end": true, "up": true, "down": true}'
                 data-arrows="true"
                data-click="true"
                data-swipe="true">
                    <img src="https://s.fotorama.io/1.jpg" class="rounded">
                    <img src="https://s.fotorama.io/2.jpg" class="rounded">
                </div>
            </div>

            <div class="col-12 col-sm-7 rounded mt-2" style="background-color:rgb(224, 219, 219) ; cursor: pointer; ">
                <h5>Men's Slip On Shoes</h5>
                <p>
                    <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                    <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                    <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                    <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                    <i class="fa fa-star small text-warning" aria-hidden="true"></i>
                </p>
               <span>Three Seater <i class="fa fa-square" aria-hidden="true"></i>  <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder=""> <button class="btn btn-primary" >
                        <span class="badge bg-primary"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> </span>
               </button> </span>

               <div class=" m-3 d-flex justify-content-around">
                <h4 class="text-info">Three Seater</h4>
                <i class="fa fa-square " aria-hidden="true" style="margin-top:1px;  font-size:25px; color:;"></i>
                <h5 style="">&#8358;85555</h5>
                <input  type="number" class="  border border-info " id="" value="" min="1" max="" placeholder="Qty">
                <button class="btn btn-sm btn-info  h-75"  style=""><i class="fa fa-shopping-cart"></i></button>
              </div>
            </div>

        </div>
    </div>
</div>






@includeIf('Mainpage.Footer')
