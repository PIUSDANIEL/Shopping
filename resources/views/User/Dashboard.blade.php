@includeIf('Mainpage.Header')

<div class="row after-header  ">

    <div class="col-12 col-md-12 col-lg-11 mx-auto rounded " style="background-color:rgb(224, 219, 219) ;">
        <div class="card-group m-1">
            <div class="card m-1 rounded shadow">
                <div class="row p-1" style="background-color: rgba(203, 189, 189, 0.396);">
                    <h5>Account Details</h5>
                </div>
                <div class="container-fluid mt-1">
                    <h5 class="card-title mt-1">John Chukwudi</h5>
                    <p>pofwell.gmail.com</p>
                </div>
            </div>
            <div class="card m-1 rounded shadow">
                <div class="row p-1" style="background-color: rgba(203, 189, 189, 0.396);">
                    <h5> <i class="fa fa-user-circle mr-2 text-info" aria-hidden="true"></i> My Account</h5>
                </div>
                <div class="container-fluid mt-1">
                    <div class="vstack gap-3">
                        <div class="small"><i class=" mr-2 text-info fa fa-envelope" aria-hidden="true"></i>  inbox</div>
                        <div class="small"> <i class=" mr-2 text-info fa fa-heart" aria-hidden="true"></i>  Saved Items</div>
                        <div class="small"> <i class=" mr-2 text-info fa fa-clock-rotate-left" aria-hidden="true"></i>  Recently viewed</div>
                        <div class="small"> <i class=" mr-2 text-info fa fa-shopping-bag" aria-hidden="true"></i>  Orders</div>
                        <div class="small"> <i class=" mr-2 text-info fa fa-gift" aria-hidden="true"></i>  Voucher</div>
                        <div class="small"> <i class=" mr-2 text-info fa fa-comment" aria-hidden="true"></i>  Pending review</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="row mt-1">

    <div class="col-12 col-md-12 col-lg-11 mx-auto rounded " style="background-color:rgb(224, 219, 219) ;">
        <div class="card-group">
            <div class="card m-1 rounded shadow">
                <div class="row p-1" style="background-color: rgba(203, 189, 189, 0.396);">
                    <div class="hstack">
                        <h5 class="">Address</h5> <span class="ms-auto  w-25 d-flex p-1"><i class=" text-info fa fa-plus" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#addressadd"></i> <i class=" text-info fa fa-edit ms-auto" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#addressedit" ></i></span>

                    </div>
                </div>
                <div class="container-fluid mt-1">
                    <h6 class="card-title bold">Default Shipping Address :</h6>
                    <p>Pius Daniel</p>
                    <address>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Asperiores est dolorem, eos maiores voluptatum illo nulla eum qui
                        cupiditate consectetur aliquid eveniet animi ducimus tempore repudiandae.
                         Dignissimos optio debitis fuga.
                    </address>
                    <p>+23481456788</p>
                </div>
            </div>
            <div class="card m-1 rounded shadow">
                <div class="row p-1" style="background-color: rgba(203, 189, 189, 0.396);">
                    <h5>Account Details</h5>
                </div>
                <div class="container-fluid mt-1">
                    <h5 class="card-title mt-1">John Chukwudi</h5>
                    <p>pofwell.gmail.com</p>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- Modal Address Edit-->
<div class="modal fade" id="addressedit" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Edit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Add rows here
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var addressedit = document.getElementById('addressedit');

    addressedit.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          let button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>


<!-- Modal Address Add-->
<div class="modal fade" id="addressadd" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Add</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Add rows here
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var addressadd = document.getElementById('addressadd');

    addressadd.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          let button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>








@includeIf('Mainpage.Footer')

