$(document).ready(function () {
    //GET PRODUCT CATEGORY FOR UPOAD
    $.ajax({
        type: "Get",
        url: "/productuploadcat",
        dataType: "json",
        contentType:"application/json",
        processData:false,
        Cache:false,
        async:true,
        success: function (response) {

            if(response.status === 200){

                $.each(response.cat, function (key, category) {
                     $('#categories').append("<option value='"+category.id+"'>"+category.categoryname+"</option>");
                     $('#editcategories').append("<option value='"+category.id+"'>"+category.categoryname+"</option>");
                     $('#categoryeditsub').append("<option value='"+category.id+"'>"+category.categoryname+"</option>");
                });

            }

        }
    });



     //GET PRODUCT BRAND FOR UPOAD
     $.ajax({
        type: "Get",
        url: "/getbrand",
        dataType: "json",
        contentType:"application/json",
        processData:false,
        Cache:false,
        async:true,
        success: function (response) {

               // console.log(response.brands);
                $.each(response.brands, function (key, bran) {


                     $('.brandp').append("<option value='"+bran.id+"'>"+bran.brand+"</option>");

                     $('.filterbrandss').append('<label class="list-group-item small">'
                     +'<input class="form-check-input me-1" type="radio" name="brand" value="'+bran.id+'">'
                      +bran.brand
                     +'</label>');
                });



        }
    });

    //GET PRODUCT SUB_CATEGORY FOR UPOAD
    var categ;
    $('#categories').change(function (e) {
        // e.preventDefault();
        categ  =  $('#categories').val();

        $('#sub_categories').html('');
        $('#sub_categories').html('<option selected></option>');

        $.ajax({
            type: "Get",
            url: "/productuploadsubcat/"+categ,
            dataType: "json",
            contentType:"application/json",
            processData:false,
            Cache:false,
            async:true,
            success: function (response) {
                if(response.status === 200){
                    console.log(response.status);

                    $.each(response.sub_cat, function (key, sub_categ) {
                        $('#sub_categories').append("<option value='"+sub_categ.id+"'>"+sub_categ.sub_categoryname+"</option>");
                    });
                }
            }
        });

    });



  //SEARCH PRODUCT
   $('#searchpro').on('keyup', function () {
        var search = $(this).val();
        var search2 = search.trim();
        if(search2.length !== 0 &&  search !== null){
            //console.log(search2);

            var _token = $('input[name="_token"]').val();
            var data = {
                'search':search2,
                '_token': _token
            }

            $.ajax({
                type: "POST",
                url: "/search",
                data: data,
                success: function (response) {

                    if(response.status === 200){
                        //console.log(response.message);
                        $('.appensearch').html(' ');
                        $('.appensearch').append(response.message);
                    }

                    if(response.status === 201){
                        $('.appensearch').html(' ');
                        $('.appensearch').append(response.message);
                    }
                }
            });
        }

   });



    //GET PRODUCT SUB_CATEGORY FOR EDIT
    var categ;
    $('#editcategories').change(function (e) {
        // e.preventDefault();
        categ  =  $('#editcategories').val();

        $('#editsub_categories').html('');
        $('#editsub_categories').html('<option selected></option>');

        $.ajax({
            type: "Get",
            url: "/productuploadsubcat/"+categ,
            dataType: "json",
            contentType:"application/json",
            processData:false,
            Cache:false,
            async:true,
            success: function (response) {
                if(response.status === 200){
                    console.log(response.status);

                    $.each(response.sub_cat, function (key, sub_categ) {
                        $('#editsub_categories').append("<option value='"+sub_categ.id+"'>"+sub_categ.sub_categoryname+"</option>");
                    });
                }
            }
        });

    });



    //GET UPLOADED PRODUCT
    $('#example12').DataTable({
        ajax:{
            url:"/productsfetch",
            dataSrc: 'products',
        },
        responsive: true,
        paging: true,
        lengthChange: true,
        info: true,
        autoWidth: false,
        searching:true,
        ordering:true,
        columns:[
            { data:'productname',
                name:'productname'
            },
            { data: 'main_image',
                name:'main_image'
            },

            { data: function (row){
                return '<i class="fa fa-edit text-info" data-toggle="modal" data-target="#modal-edit-product" onclick="geteditproduct('+row.id+');" aria-hidden="true"></i>'
            },
                name: 'id'
            },
            { data: function (row){
                return '<i class="fa fa-trash text-danger"  onclick="deleteproduct('+row.id+');" aria-hidden="true"></i>'
            },
                name: 'id'
            },
            { data: 'product_item',
                name:'product_item'
            },
            { data: 'category',
                name:'category'
            },
            { data: 'subcat',
                name:'subcat'
            },


        ],
        columnDefs:
        [{
            'targets':1,
            'data':'main_image',
            'render': function(data,type,row,meta){
                    return '<img src="'+ data +'" class="mx-auto rounded" height="40" width="50">'

            }
        },
        {
            'targets':4,
            'data':'product_item',
            'render': function(data,type,row,meta){

                var s = "<div class='dropdown open'><button class='btn btn-secondary dropdown-toggle' type='button' id='triggerId' data-toggle='dropdown' aria-haspopup='true'aria-expanded='false'>Available</button><div class='dropdown-menu' aria-labelledby='triggerId'>";
                $.each(data, function (key, vall) {
                    var price =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(vall['price']);
                     s +="<a class='dropdown-item'><span class='border border-info m-1 rounded p-1'>"+(vall['size'] === null? 'n/a':vall['size'])+"</span>"
                     +"<span class='border border-info p-1 m-1 rounded'><i class='fa fa-square' aria-hidden='true' style='color:"+vall['colour']+";'></i></span>"
                     +"<span class='border "+(vall['qty_in_stock'] < 5 ?'bg-danger':'border-info')+" m-1 rounded p-1'>"+(vall['qty_in_stock'] < 5 ?'low : ':'')+""+vall['qty_in_stock']+"</span>"
                     +"<span class='border border-info m-1 rounded p-1'>&#8358;"+price+"</span>"
                     +"</a>";
                });
                s +="</div></div>";

                return s ;
            }
        },
        {
            'targets':5,
            'data':'category',
            'render': function(data,type,row,meta){


                     return data[0]['categoryname'];

            }
        },
        {
            'targets':6,
            'data':'subcat',
            'render': function(data,type,row,meta){



                     return data[0]['sub_categoryname'];

            }
        },
        ],

    });



    //GET ALL PRODUCT FEATURED AND FLASH
    $('#mm').DataTable({
        ajax:{
            url:"/allproduct",
            dataSrc: 'allproduct',
        },
        responsive: true,
        paging: true,
        lengthChange: true,
        info: true,
        autoWidth: false,
        searching:true,
        ordering:true,
        responsive: true,
        paging: true,
        lengthChange: true,
        info: true,
        autoWidth: false,
        searching:true,
        ordering:true,
        columns:[
            { data:'productname',
             name:'productname'
            },
            { data: 'main_image',
              name:'main_image'
            },

            { data: function (row){
                    if(row.featured == 1){
                     return ' <p class="text-info text-center" style="cursor:pointer;" onclick="featured('+row.featured+','+row.id+')">featured   <i class="fa fa-plus text-info ml-2" aria-hidden="true"></i></p>'
                    }
                    else{
                        return '  <p class="text-info text-center" style="cursor:pointer;" onclick="featured('+row.featured+','+row.id+')"> <i class="fa fa-window-minimize " aria-hidden="true"></i> </p>'
                    }
            },
                name: 'featured'
            },
            { data: function (row){
                if(row.flash_sale == 1){
                 return ' <p class="text-info text-center" style="cursor:pointer;" onclick="flash('+row.flash_sale+','+row.id+')">flash sale   <i class="fa fa-bolt text-primary ml-2" aria-hidden="true"></i></p>'
                }
                else{
                    return '  <p class="text-info text-center" style="cursor:pointer;" onclick="flash('+row.flash_sale+','+row.id+')"> <i class="fa fa-window-minimize " aria-hidden="true"></i> </p>'
                }
            },
              name: 'flash_sale'
            },
            { data:'shopname'}
        ],
        columnDefs:
        [{
            'targets':1,
            'data':'main_image',
            'render': function(data,type,row,meta){
                    return '<img src="'+ data +'" class="mx-auto rounded" height="40" width="50">'

            }
        }]

    });

     //GET ALL CATEGORY

     $('#category').DataTable({
        ajax:{
            url:"getcategory",
            dataSrc: 'categories',
        },
        responsive: true,
        paging: true,
        lengthChange: true,
        info: true,
        autoWidth: false,
        searching:true,
        ordering:true,

        columns:[
            { data:'categoryname',
                name:'categoryname'
            },
            { data: function (row){
                return '<i class="fa fa-edit text-info" data-toggle="modal" data-target="#modal-edit-category" onclick="getcategory('+row.id+',\''+row.categoryname+'\');" aria-hidden="true"></i>'
            },
                name: 'id'
            }
        ]
     });



      //GET ALL BRAND
      $('#brands').DataTable({
        ajax:{
            url:"/getbrand",
            dataSrc: 'brands',
        },
        responsive: true,
        paging: true,
        lengthChange: true,
        info: true,
        autoWidth: false,
        searching:true,
        ordering:true,

        columns:[
            { data:'brand',
                name:'brand'
            },
            { data: function (row){
                return '<i class="fa fa-edit text-info" data-toggle="modal" data-target="#modal-edit-category" onclick="getbrand('+row.id+',\''+row.brand+'\');" aria-hidden="true"></i>'
            },
                name: 'id'
            }
        ]
      });



     //GET ALL SUB CATEGORY
     $('#sub-category').DataTable({
        ajax:{
            url:"getsubcategory",
            dataSrc: 'subcategory',
        },
         responsive: true,
        paging: true,
        lengthChange: true,
        info: true,
        autoWidth: false,
        searching:true,
        ordering:true,

        columns:[
            { data:'sub_categoryname',
             name:'sub_categoryname'
            },
            { data: function (row){
                return '<i class="fa fa-edit text-info" data-toggle="modal" data-target="#modal-edit-subcategory" onclick="editsubcategory('+row.id+',\''+row.sub_categoryname+'\',\''+row.image+'\');" aria-hidden="true"></i>'
            },
                name: 'id'
            },
            { data: 'image',
              name:'image'
            },
            { data: 'categoryname',
            name:'categoryname'
            },



        ],
        columnDefs:
        [{
            'targets':2,
            'data':'image',
            'render': function(data,type,row,meta){
                    return '<img src="'+ data +'" class="mx-auto rounded" height="28" width="28">'

            }
        }]

     });





 });


  //GET PRODUCT TO BE EDITED
  geteditproduct();
   function geteditproduct(id){

    $.get("/geteditproduct/"+id,
    function (data) {
        if(data.status === 200){

             $('.displaimg').html('');
             $('.displaimges').html('');

            $('#productid').val(id);
            $('.newattr').html('');

            $.each(data.products, function (key, produ) {

                $('#editproductname').val(produ.productname);

                $('#editlistprices').val(produ.listprice);

                $('#editbrand').val(produ.brand);

                $('#editquantity').val(produ.quantity);
                $('#editcondition').val(produ.condition);
                $('#editpercentages').val(produ.percentage);
                $('#editsearch').val(produ.search);

                $('#editdescription').summernote('code',produ.description) ;

                $('#editspecification').summernote('code',produ.specification);
                $('.old_main_image').val(produ.main_image);
                $('.old_images').val(produ.images);



                $.each(produ.product_item, function (keys, variatn) {
                    $('.newattr').append('<div class="w-100 row rounded removeattr mx-auto mt-2 p-1 " style="background-color: rgb(138, 136, 136);">'
                    +' <div class="col-12 kkkkkhh">'
                    +(keys === 0 ?'':'<i class="fa fa-close text-light me-auto "  aria-hidden="true"></i>')
                    +'</div>'

                    +'<input type="hidden" name="sku[]" value="'+variatn['SKU']+'" class="form-control form-control-sm" id="sku" >'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="size" class="form-label">Size </label>'
                    +'<input type="text" name="size[]" value="'+variatn['size']+'" class="form-control form-control-sm size" id="size">'

                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="colour" class="form-label">Colour</label>'
                    +'<input type="color" name="colour[]" value="'+variatn['colour']+'" class="form-control form-control-sm" id="colour" >'
                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="quantity" class="form-label">Quantity</label>'
                    +'<input type="number" name="quantity[]" value="'+variatn['qty_in_stock']+'" class="form-control form-control-sm" id="quantity" >'
                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="price" class="form-label">Price</label>'
                    +'<input type="number" name="price[]" class="form-control form-control-sm price" id="price" value="'+variatn['price']+'" >'

                    +'</div>'

                    +'</div>');
                });

                if(produ.main_image !== ""){
                    $('#editmain_image').css('display', 'none');

                    $('.displaimg').append('<div class="card bb p-0" style="height:70px; width:70px;"><img src="'+ produ.main_image +'" class="mx-auto rounded"'
                    +' height="70" width="70"> <div class="card-body  py-3 "><p class="card-title text-danger  text-center mainimage1  mt-n3"'
                    +' onclick="deletemainimage()" id="" style="cursor:pointer;" data-image="'+produ.main_image+'" data-id="'+produ.id+'">delete</p></div></div>');
                }else{

                    $('#editmain_image').css('display', 'block');
                }
                //console.log(produ.images);

                if(produ.images !== ""){
                    $('#editimages').css('display', 'none');

                    var image = produ.images.split(',');
                    $.each(image, function (key, images) {
                        //console.log(images);
                        $('.displaimges').append('<div class="card m-1 bb p-0" ><img src="'+ images +'" class="mx-auto rounded"'
                        +' height="70" width="70"> </div>');


                    });

                    $('.displaimges').append('<p class="text-danger allimages m-1" data-imagess="'+image+'"  style="cursor:pointer;" onclick="deleteimages('+produ.id+')">delete all images</p>');

                }else{
                    $('#editimages').css('display', 'block');
                }


            });


        }
    },

  );

  }


//DELETE MAIN IMAGE
function deletemainimage(){

  var id =  $('.mainimage1').attr('data-id');
  var image =  $('.mainimage1').attr('data-image');


    $.ajax({
        type: "Post",
        url: "/deletemainimage",
        data:{
            id: id,
            image:image
        },

        success: function (response) {
            if(response.status === 200){
                geteditproduct(id);
                $('#editmain_image').css('display', 'block');

                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });



            }else{

                Swal.fire({
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });

            }
        }
    });
}

//DELETE ALL IMAGE
 function deleteimages(imagesid){

   var id = imagesid;
   var allimage = $('.allimages').attr('data-imagess');
    // console.log(allimage);

     $.ajax({
         type: "Post",
         url: "/deleteallimages",
         data:{
             id: id,
             images:allimage
         },

         success: function (response) {
             if(response.status === 200){
                 geteditproduct(id);
                 $('#editimages').css('display', 'block');

                 Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });

             }else{

                 Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });

             }
         }
     });


 }



 //DELETE PRODUCT
 function deleteproduct(id){

      Swal.fire({
        title: 'Are you sure?',
        text: "Product will be deleted !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "Get",
                url: "/deleteproduct/"+id,
                success: function (response) {

                    if(response.status === 200){

                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1700
                        });



                       $('#example12').DataTable().ajax.reload();

                    }else{

                        Swal.fire({
                            icon: 'error',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1700
                        });
                    }
                }
            });

        }
      });




 }

 //FEATURED UPDATE
 function featured(featured , id){

   var data = {
        'id':id,
        'featured':featured
   };

   console.log(data);

    $.ajax({
        type: "Post",
        url: "/featured",
        data: data,
        success: function (response) {
            if(response.status === 200){

                $('#mm').DataTable().ajax.reload();

            }

            if(response.status === 400){
                alert(response.message);
            }
        }
    });
 }

  //FLASH SALE
  function flash(flash , id){

    var data = {
         'id':id,
         'flash':flash
    };


     $.ajax({
         type: "Post",
         url: "/flash",
         data: data,
         success: function (response) {
             if(response.status === 200){

                 $('#mm').DataTable().ajax.reload();

             }

             if(response.status === 400){
                 alert(response.message);
             }
         }
     });
  }




 //UPLOAD PRODUCT
 jQuery(function(){

   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    });

    $('#productupload').on('submit', function (e) {
        e.preventDefault();

        $('.alert-error').html('');

        var inputdatails = new FormData($('#productupload')[0]);
        console.log(inputdatails);


        $.ajax({
            type: "POST",
            url: "/uploadproduct",
            data:inputdatails ,
            contentType:false,
            processData:false,
            success: function (response) {
                console.log(response.error);


                if(response.status === 200){



                   $('#productupload').closest('form').find("input[type=text],input[type=number], textarea").val('');

                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1700
                    });



                    $('#example12').DataTable().ajax.reload();

                    getproduct();

                }else{

                   $.each(response.error, function (key, validateerror) {
                        $('.alert-error').append('<li class="" style="color: red;">'+validateerror +'</li>');
                   });
                }
            }
        });

    });
});

//EDIT PRODUCT
jQuery(function(){

    $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }

     });

     $('#productedit').on('submit', function (e) {
         e.preventDefault();

         $('.alert-error-edit').html('');

         var inputdatails = new FormData($('#productedit')[0]);


         $.ajax({
             type: "POST",
             url: "/editproduct",
             data:inputdatails ,
             contentType:false,
             processData:false,
             success: function (response) {


                 if(response.status === 200){

                    $('#modal-edit-product').modal('hide');

                     Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    });


                     $('#example1').DataTable().ajax.reload();



                 }else{

                    $.each(response.error, function (key, validateerror) {
                         $('.alert-error-edit').append('<li class="" style="color: red;">'+validateerror +'</li>');
                    });
                 }
             }
         });

     });
 });

    //GET CATEGORY FOR EDIT
 function getcategory(id,cat){

    $('#editcategoryname').val(cat);

    $('#catid').val(id);
 }

 //ADD CATEGORY
 $('#addcategory').submit(function (e) {
    e.preventDefault();

    $('.hhhb').html('');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    var dat = new FormData($('#addcategory')[0]);

    //console.log(data);

    $.ajax({
        type: "POST",
        url: "addcategory",
        data: dat,
        contentType:false,
        processData:false,
        success: function (response) {

            if(response.status === 200){

                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });


                $('#category').DataTable().ajax.reload();


                $('#categories').html('');
                $('#editcategories').html('');
                $('#categoryeditsub').html('');

                    //THIS IS TO GET CATEGORY WHEN IT IS UPDATED
                        $.ajax({
                            type: "Get",
                            url: "/productuploadcat",
                            dataType: "json",
                            contentType:"application/json",
                            processData:false,
                            Cache:false,
                            async:true,
                            success: function (response) {

                                if(response.status === 200){

                                    $.each(response.cat, function (key, category) {
                                        $('#categories').append("<option value='"+category.id+"'>"+category.categoryname+"</option>");
                                        $('#editcategories').append("<option value='"+category.id+"'>"+category.categoryname+"</option>");
                                        $('#categoryeditsub').append("<option value='"+category.id+"'>"+category.categoryname+"</option>");

                                    });

                                }

                            }
                        });

            }else{
                //console.log(response.message);

                $.each(response.message, function (key, validateerror) {
                    $('.hhhb').append('<li class="" style="color: red;">'+validateerror +'</li>');
               });
            }
        }
    });


 });

 //EDIT CATEGORY
 $('#editcategory').submit(function (e) {
    e.preventDefault();

    $('.editcat').html('');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    var dat = new FormData($('#editcategory')[0]);

    $.ajax({
        type: "POST",
        url: "editcategory",
        data: dat,
        contentType:false,
        processData:false,
        success: function (response) {

            if(response.status === 200){

                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });


                $('#category').DataTable().ajax.reload();

            }else{

                $.each(response.message, function (key, validateerror) {
                    $('.editcat').append('<li class="" style="color: red;">'+validateerror +'</li>');
               });
            }
        }
    });


 });

 //ADD SUB CATEGORY
 $('#addsubcategory').submit(function (e) {
    e.preventDefault();

    $('.sub').html('');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    var dat = new FormData($('#addsubcategory')[0]);

    //console.log(data);

    $.ajax({
        type: "POST",
        url: "addsubcategory",
        data: dat,
        contentType:false,
        processData:false,
        success: function (response) {

            if(response.status === 200){

                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });


                $('#sub-category').DataTable().ajax.reload();

            }else{
                $.each(response.message, function (key, validateerror) {
                    $('.sub').append('<li class="" style="color: red;">'+validateerror +'</li>');
               });
            }
        }
    });


 });

 // GET SUB CATEGORY TO BE EDITED
 function editsubcategory(id,sub,imag){

    var id =id;
    var sub =sub;
    var imag =imag;

    $('.subimage').html('');

    if(imag !== ''){
        $('.subimage').append('<div class="card bb p-0" style="height:70px; width:70px;"><img src="'+ imag +'" class="mx-auto rounded"'
        +' height="70" width="70"> <div class="card-body  py-3 "><p class="card-title text-danger  text-center subimagedata  mt-n3"'
        +' onclick="subdeleteimage()" id="" style="cursor:pointer;" data-image="'+imag+'" data-id="'+id+'">delete</p></div></div>');

        $('.subimsgechange').addClass('d-none');
        $('.subimage').removeClass('d-none');
    }else{
        $('.subimage').addClass('d-none');
        $('.subimsgechange').removeClass('d-none');
    }

   $('#subeditids').val(id);
   $('#oldimage').val(imag);
   $('#editsubcategoryname').val(sub);


 }


//DELETE SUBCATEGORY IMAGE
function subdeleteimage(){

    var id =  $('.subimagedata').attr('data-id');
    var image =  $('.subimagedata').attr('data-image');


      $.ajax({
          type: "Post",
          url: "deletesubcategoryimage",
          data:{
              id: id,
              image:image
          },

          success: function (response) {
              if(response.status === 200){

                $('.subimage').addClass('d-none');
                $('.subimsgechange').removeClass('d-none');

                  Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });



              }else{

                Swal.fire({
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });

              }
          }
      });
}

//EDIT SUB CATEGORY
$('#editsubcategory').submit(function (e) {
    e.preventDefault();

    $('.subedit').html('');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    var dat = new FormData($('#editsubcategory')[0]);

    $.ajax({
        type: "POST",
        url: "editsubcategory",
        data: dat,
        contentType:false,
        processData:false,
        success: function (response) {

            if(response.status === 200){

                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });


                $('#sub-category').DataTable().ajax.reload();

            }else{

                $.each(response.message, function (key, validateerror) {
                    $('.subedit').append('<li class="" style="color: red;">'+validateerror +'</li>');
               });
            }
        }
    });


 });

 function detailsmodal(id){
       // console.log(id);

         $(".alert-danger").html('');
         $('#detailsname').html('');
         $('#detailsbrand').html('');
         $('#detailsprice').html('');
         $('#detailslistprice').html('');
         $('#detailsmainimage').html('');
         $('#detailspercent').html('');
         $('#detailsdesc').html('');
         $('#detailsspec').html('');
         $('#detailsize').html('');
         $('.carousel-inner').html('');
         $('.mod-content').html('');
         $('#detailsqty').html('');
         $('#detailscolour').html('');
         $('.detailsinstock').html('');
         $('.varia').html('');
         $('.variations').html('');
         $('.variation').html('');
         $('.quantity-error').html('');



       $.get("/detailsmodal/"+id,function(response) {

            if(response.status === 200){
                $.each(response.message, function (key, detais) {


                    var price =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(detais.price);
                    var pricemin =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(detais.price_min);
                    var pricemax =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(detais.price_max);
                    var listprice =  new Intl.NumberFormat('en-NG',{ maximumSignificantDigits: 3 }).format(detais.listprice);

                    $('#detailsname').append(detais.productname);
                    $('#detailsbrand').append(detais.brand);
                    $('#detailslistprice').append('&#8358;'+listprice);
                    $('#detailspercent').append('&#37;'+detais.percentage);
                    $('#detailsdesc').append(detais.description);
                    $('#detailsspec').append(detais.specification);


                    if(detais.variation.length == 1){
                        $('#detailsprice').append('&#8358;'+price);

                        //var ssize =detais.variation[0]['size'] ;

                        $('#detailsize').append('Size | '+detais.variation[0]['size']);

                        $('#detailsqty').append('<div class="input-group mb-3">'
                          +(detais.variation[0]['qty_in_stock'] < 1 ?'<button class="btn btn-sm ms-auto btn-secondary" >out of stock</button>':'<input type="number" class="form-control form-control-sm"  aria-label="Button" aria-describedby="" id="'+detais.variation[0]['SKU']+'" value="" min="1" max="" placeholder="Qty"><button class="btn btn-sm btn-info px-2" type="button" onclick="add_to_cart('+id+',\''+detais.variation[0]['size']+'\',\''+detais.variation[0]['colour']+'\',\''+detais.variation[0]['price']+'\',\''+detais.variation[0]['qty_in_stock']+'\',\''+detais.main_image+'\',\''+detais.productname+'\',\''+detais.variation[0]['SKU']+'\',\''+detais.shopname+'\')" id="">Add to cart <i class="fa fa-shopping-basket" aria-hidden="true"></i> </button>')
                          +'</div>');


                          if(detais.variation[0]['qty_in_stock'] < 4){
                            $('.detailsinstock').append('<i class="fa fa-question-circle" aria-hidden="true"></i>  '+detais.variation[0]['qty_in_stock']+'  unit left');

                          }

                        $('#detailscolour').append('Colour | <i class="fa fa-square " aria-hidden="true" style="margin-top:1px;  font-size:20px; color:'+detais.variation[0]['colour']+';"></i>');

                    }else{
                        $('.variation').append('<button type="button" class="btn btn-sm  mb-3 btn-info">Add to cart <i class="fa fa-shopping-basket ml-2" aria-hidden="true"></i> </button>');

                        $('.variation').append('<h5>Variation</h5>');

                        $('#detailsprice').append('&#8358;'+pricemin+'-  &#8358;'+ pricemax);


                        $.each(detais.variation, function (keys, varian) {

                            $('.varia').append('<span class="p-1 col m-1 rounded  shadow" style="border: 2px solid '+varian['colour']+';">'+varian['size']+'</span>');




                             var varianprice =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(varian['price']);



                                $('.variations').append('<div class="row rounded p-1 shadow   mt-3"><div class="col-6 col-lg-3">'+varian['size']+'</div>'
                                +'<div class="col-6 col-lg-1"> <i class="fa fa-square" aria-hidden="true" style="color:'+varian['colour']+';"></i></div>'
                                +'<div class="col-6 col-lg-3">&#8358;'+varianprice+'</div>'
                                +'<div class="col-6 col-lg-5 "> <div class="input-group ">'
                                +(varian['qty_in_stock'] < 1 ?'<button class="btn btn-sm ms-auto btn-secondary" >out of stock</button>':'<input type="text" class="form-control form-control-sm" aria-label="" id="'+varian['SKU']+'" aria-describedby="button-addon2"><button class="btn btn-sm btn-info " type="button" onclick="add_to_cart('+id+',\''+varian['size']+'\',\''+varian['colour']+'\',\''+varian['price']+'\',\''+varian['qty_in_stock']+'\',\''+detais.main_image+'\',\''+detais.productname+'\',\''+varian['SKU']+'\',\''+detais.shopname+'\')" id="">Add <i class="fa fa-shopping-basket" aria-hidden="true"></i> </button>')
                                +'</div> </div>'
                                +'</div>'
                                +(varian['qty_in_stock'] < 4 ? '<p class="text-danger small "><i class="fa fa-question-circle" aria-hidden="true"></i> '+varian['qty_in_stock']+' units left</p>':''));



                        });


                    }




                    $('.carousel-inner').append('<div class="carousel-item rounded border border-0 shadow active"><div class="card border border-0" ><img src="'+detais.main_image+'" onclick="openModal();currentSlide(1)" class="w-100 d-block card-img-top" alt=""></div></div>');

                    $.each(detais.images, function (keys, immm) {

                        $('.carousel-inner').append('<div class="carousel-item rounded border border-0 shadow"><div class="card border border-0" ><img src="'+immm+'" onclick="openModal();currentSlide('+keys + 2 +')" class="w-100 d-block card-img-top" alt=""></div></div>');
                    })


                    $('.mod-content').append('<div class="mySlides"><img src="'+detais.main_image+'" style="width:100%"></div>');

                    $.each(detais.images, function (keys, immm) {

                        $('.mod-content').append('<div class="mySlides"><img src="'+immm+'" style="width:100%"></div>');
                    })

                    $('.mod-content').append('<a class="prev bg-info" onclick="plusSlides(-1)">&#10094;</a>');

                    $('.mod-content').append('<a class="next bg-info" onclick="plusSlides(1)">&#10095;</a>');






                });



            }

        }
       );
 }

 function sizepriceqty(){
    $('#size').val('');


    var spqc = "";

    for(var i = 1; i <=5 ; i++){
        if($('#size'+i).val() != "" && $('#colour'+i).val() != "" && $('#price'+i).val() != "" && $('#quantity'+i).val() != ""){
            spqc += $('#size'+i).val()+':'+$('#colour'+i).val()+':'+$('#price'+i).val()+':'+$('#quantity'+i).val()+',';
        }
    }

    $('#size').val(spqc);

}

function editsizepriceqty(){

    $('#editsize').val('');

    var editsiz = "";

    for(var i = 1; i <=5 ; i++){
        if($('#editsize'+i).val() != "" && $('#editcolour'+i).val() != "" && $('#editprice'+i).val() != "" && $('#editquantity'+i).val() != ""){
            editsiz += $('#editsize'+i).val()+':'+$('#editcolour'+i).val()+':'+$('#editprice'+i).val()+':'+$('#editquantity'+i).val()+',';
        }
    }

    $('#editsize').val(editsiz);

}



 //GET NUMBER ON CART
 cart();
 function cart(){
    $('.mycart').html('');
        $.get("/cart", function (response) {
                if(response.status === 200){
                    if(response.message > 0){
                        $('.mycart').append(response.message);
                    }else{
                        $('.mycart').append('0');
                    }

                }

        });
 }

 subtotal();
 function subtotal(){
    $('.subtotal').html('');
    $.get("/subtotal",function (response) {
            if(response.status === 200){
                if(response.message > 0){
                    var subtotal =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(response.message);
                    $('.subtotal').append('&#8358;'+subtotal);
                }

            }

    });
 }



//ADD TO CART
function add_to_cart(id, size, colo, price, qty_in_stock,image,productname,sku,shopname){
    $(".alert-danger").html('');


    //alert(price);
    $('.quantity-error').html('');
    var product_id = id;
    var size = size;
    var colo = colo;
    var price = price;
    var sku = sku;
    var shopname = shopname;
    var qty_in_stock = qty_in_stock;
    var image = image;
    var productname = productname;
    var quantity = $("#"+sku).val();



    var datacart = {
        'id':product_id,
        'size':size,
        'colo':colo,
        'price':price,
        'sku' : sku,
        'shopname' : shopname,
        'quantity':quantity,
        'qty_in_stock':qty_in_stock,
        'image':image,
        'productname':productname
    };




    if(quantity == "" || quantity == 0){
        $('.quantity-error').append("<p>Quantity is need!</p>");

        return
    }


    var qty_stock = parseInt(qty_in_stock);
    var qty = parseInt(quantity);

    if( qty_stock < qty){
        $('.quantity-error').append("<p>There are only "+qty_in_stock+"  size " +size+" colour <i class='fa fa-square' aria-hidden='true' style='color:"+colo+"';></i>  available</p>");

        return
    }

    if(quantity != "" && quantity != 0){
       console.log(datacart);
        $.ajax({
            type: "get",
            url: "/addtocart",
            data: datacart,
            dataType:"json",
            success: function (response) {
                if(response.status === 200){

                    console.log(response.message);
                    console.log(response.notice);

                    if(response.message != ''){
                        Swal.fire({
                            position: 'top-end',
                            width: 600,
                            title: '<p style="color:white; font-size:medium; margin:-5px;">'+response.message+'</p>',
                            color: 'black',
                            background: 'rgba(7, 254, 7, 0.872)',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }

                    if(response.notice != ''){
                        $(".quantity-error").append(response.notice);
                    }

                    cart();
                    subtotal();




                }



                if(response.status === 400){
                    $.each(response.message, function (key, error) {
                         $('.alert-danger').append('<li>'+error+'</li>');
                    });

                    console.log(response.message);
                }
            }
        });



    }



}

//REMOVE OR ADD PRODUCT AT THE CART PAGE
function removeaddcart(id, size, colour, price,quantity, available,sku,mode){
   $dta = {
    'id':id,
    'size':size,
    'colour':colour,
    'price':price,
    'quantity':quantity,
    'available':available,
    'sku':sku,
    'mode':mode
   }


   console.log($dta);

   $.ajax({
    type: "get",
    url: "removeaddcart",
    data: $dta,
    dataType:"json",
    success: function (response) {
        if(response.status === 200){
            cart();
            subtotal();
            location.reload();


          Swal.fire({
            position: 'top-end',
            width: 600,
            title: '<p style="color:white; font-size:medium; margin:-5px;">'+response.message+'</p>',
            color: 'black',
            background: 'rgba(7, 254, 7, 0.872)',
            showConfirmButton: false,
            timer: 2000
          });


        }



        if(response.status === 400){

            Swal.fire({
                icon: 'error',
                title: response.message,
                showConfirmButton: false,
                timer: 1700
            });


        }
    }
});

}

//ADD BRAND
$('#addbrand').submit(function (e) {
    e.preventDefault();

    $('.hhhb').html('');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    var dat = new FormData($('#addbrand')[0]);

    //console.log(dat);

    $.ajax({
        type: "POST",
        url: "addbrand",
        data: dat,
        contentType:false,
        processData:false,
        success: function (response) {

            if(response.status === 200){

                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });


                $('#brands').DataTable().ajax.reload();


                $('#brandname').html('');
                $('#editbrand').html('');
               // $('#categoryeditsub').html('');
            }else{
                //console.log(response.message);

                $.each(response.message, function (key, validateerror) {
                    $('.hhhb').append('<li class="" style="color: red;">'+validateerror +'</li>');
               });
            }
        }
    });


 });

 //GET BRAND FOR EDIT
 function getbrand(id,cat){

    $('#editbrandname').val(cat);

    $('#brandid').val(id);
 }



 //EDIT BRAND
 $('#editbrand').submit(function (e) {
    e.preventDefault();

    $('.editbrand').html('');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    var dat = new FormData($('#editbrand')[0]);

    $.ajax({
        type: "POST",
        url: "editbrand",
        data: dat,
        contentType:false,
        processData:false,
        success: function (response) {

            if(response.status === 200){

                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1000
                });


                $('#brands').DataTable().ajax.reload();

            }else{

                $.each(response.message, function (key, validateerror) {
                    $('.editbrand').append('<li class="" style="color: red;">'+validateerror +'</li>');
               });
            }
        }
    });


 });

 $(document).ready(function () {

    $('#submitfiltersmall').submit(function (e) {
     e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
         $data = new FormData($('#submitfiltersmall')[0]);
         console.log($data);

         $.ajax({
            type: "POST",
            url: "/filter",
            data: $data,
            contentType:false,
            processData:false,
            success: function (response) {
                if(response.status === 200){
                    $('.filterproduct').html('');

                    console.log(response.message);

                    $.each(response.message, function (key, product) {

                        var naira =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(product.price);

                         $('.filterproduct').append('<div class="card p-0 m-1 col-2 subcatprodd" onclick="detailsmodal('+product.id+')" data-bs-toggle="modal" data-bs-target="#detailsModal" style="">'
                         +'<img src="'+product.main_image+'" class="card-img-top" alt="...">'

                         +(product.percentage > 0 ? '<div class="card-img-overlay">'
                         +'<span class="position-absolute top-1  translate-middle badge rounded-pill " style="color: red; background-color:rgba(127, 44, 44, 0.337);">'
                             +'<i class="fas fa-minus"></i>'
                             +product.percentage+'%'
                             +'</span>'
                         +'</div>':'' )
                         +'<div class="card-body p-1">'
                             +'<p class="card-text productcard small">'+product.productname+'</p>'
                             +'<p class="card-text mt-n3 naira small">&#8358;'+naira+'</p>'
                         +'</div>'
                        +'</div>');
                    });
                }

                if(response.status === 201){
                    $('.filterproduct').append('<div class="col-11 mx-auto rounded">'
                     +'<h6 class="text-bg-secondary rounded p-3">No product found... Search more product please</h6>'
                    +'</div>');
                }
            }
        });
    });

    $('#submitfilterbig').submit(function (e) {
        e.preventDefault();

           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }

           });
            $data = new FormData($('#submitfilterbig')[0]);
            console.log($data);

            $.ajax({
               type: "POST",
               url: "/filter",
               data: $data,
               contentType:false,
               processData:false,
               success: function (response) {
                   if(response.status === 200){
                       $('.filterproduct').html('');

                       console.log(response.message);

                       $.each(response.message, function (key, product) {

                            var naira =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(product.price);

                            $('.filterproduct').append('<div class="card p-0 m-2 cardcartpro categoryproduct2" onclick="detailsmodal('+product.id+')" data-bs-toggle="modal" data-bs-target="#detailsModal" style="">'
                            +'<img src="'+product.main_image+'" class="card-img-top" alt="...">'

                            +(product.percentage > 0 ? '<div class="card-img-overlay">'
                            +'<span class="position-absolute top-1  translate-middle badge rounded-pill" style="color: red; background-color:rgba(127, 44, 44, 0.337);">'
                                +'<i class="fas fa-minus"></i>'
                                +product.percentage+'%'
                                +'</span>'
                            +'</div>':'' )
                            +'<div class="card-body p-1">'
                                +'<p class="card-text productcard small">'+product.productname+'</p>'
                                +'<p class="card-text mt-n3 naira small">&#8358;'+naira+'</p>'
                            +'</div>'
                           +'</div>');
                       });
                   }

                   if(response.status === 201){
                        $('.filterproduct').html('');
                        $('.filterproduct').append('<div class="col-6 mx-auto rounded">'
                        +'<h6 class="text-bg-secondary rounded p-3">No product found... Search more product please</h6>'
                        +'</div>');
                   }
               }
           });
    });

    $('#categoryproductfilterbig').submit(function (e) {
        e.preventDefault();

           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }

           });
            $data = new FormData($('#categoryproductfilterbig')[0]);
            console.log($data);

            $.ajax({
               type: "POST",
               url: "/categoryprodfilter",
               data: $data,
               contentType:false,
               processData:false,
               success: function (response) {
                   if(response.status === 200){
                       $('.catprodfiltered').html('');

                       console.log(response.message);

                       $.each(response.message, function (key, product) {

                            var naira =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(product.price);

                            $('.catprodfiltered').append('<div class="card p-0 m-2 cardcartpro categoryproduct2" onclick="detailsmodal('+product.id+')" data-bs-toggle="modal" data-bs-target="#detailsModal" style="">'
                            +'<img src="'+product.main_image+'" class="card-img-top" alt="...">'

                            +(product.percentage > 0 ? '<div class="card-img-overlay">'
                            +'<span class="position-absolute top-1  translate-middle badge rounded-pill " style="color: red; background-color:rgba(127, 44, 44, 0.337);">'
                                +'<i class="fas fa-minus"></i>'
                                +product.percentage+'%'
                                +'</span>'
                            +'</div>':'' )
                            +'<div class="card-body p-1">'
                                +'<p class="card-text productcard small">'+product.productname+'</p>'
                                +'<p class="card-text mt-n3 naira small">&#8358;'+naira+'</p>'
                            +'</div>'
                           +'</div>');
                       });

                   }

                   if(response.status === 201){
                       $('.catprodfiltered').html('');
                        $('.catprodfiltered').append('<div class="col-6 mx-auto rounded">'
                        +'<h6 class="text-bg-secondary rounded p-3">No product found... Search more product please</h6>'
                        +'</div>');
                   }
               }
           });
    });

    $('#categoryproductfilterbsmall').submit(function (e) {
        e.preventDefault();

           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }

           });
            $data = new FormData($('#categoryproductfilterbsmall')[0]);
            console.log($data);

            $.ajax({
               type: "POST",
               url: "/categoryprodfilter",
               data: $data,
               contentType:false,
               processData:false,
               success: function (response) {
                   if(response.status === 200){
                       $('.catprodfiltered').html('');

                       console.log(response.message);

                       $.each(response.message, function (key, product) {

                            var naira =  new Intl.NumberFormat('en-NG', { maximumSignificantDigits: 3 }).format(product.price);

                            $('.catprodfiltered').append('<div class="card p-0 m-2 categoryproduct2" onclick="detailsmodal('+product.id+')" data-bs-toggle="modal" data-bs-target="#detailsModal" style="">'
                            +'<img src="'+product.main_image+'" class="card-img-top" alt="...">'

                            +(product.percentage > 0 ? '<div class="card-img-overlay">'
                            +'<span class="position-absolute top-1  translate-middle badge rounded-pill " style="color: red; background-color:rgba(127, 44, 44, 0.337);">'
                                +'<i class="fas fa-minus"></i>'
                                +product.percentage+'%'
                                +'</span>'
                            +'</div>':'' )
                            +'<div class="card-body p-1">'
                                +'<p class="card-text productcard small">'+product.productname+'</p>'
                                +'<p class="card-text mt-n3 naira small">&#8358;'+naira+'</p>'
                            +'</div>'
                           +'</div>');
                       });

                   }

                   if(response.status === 201){
                       $('.catprodfiltered').html('');
                        $('.catprodfiltered').append('<div class="col-11 mx-auto rounded">'
                        +'<h6 class="text-bg-secondary rounded p-3">No product found... Search more product please</h6>'
                        +'</div>');
                   }
               }
           });
    });

    $('.clear').click(function (e) {
        e.preventDefault();
        location.reload();
    });


    //Add more size price for edith prod
    $('.addmoreattr').click(function (e) {
        e.preventDefault();
        $('.newattr').append('<div class="w-100 row rounded removeattr mx-auto mt-2 p-1 " style="background-color: rgb(138, 136, 136);">'
                    +' <div class="col-12 kkkkkhh">'
                     +'<i class="fa fa-close text-light me-auto "  aria-hidden="true"></i>'
                    +'</div>'

                    +'<input type="hidden" name="sku[]" value="" class="form-control form-control-sm" id="variid" >'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="size" class="form-label">Size </label>'
                    +'<input type="text" name="size[]" value="n/a" class="form-control form-control-sm size" id="size">'

                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="colour" class="form-label">Colour</label>'
                    +'<input type="color" name="colour[]" value="" class="form-control form-control-sm" id="colour" >'
                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="quantity" class="form-label">Quantity</label>'
                    +'<input type="number" name="quantity[]" value="" class="form-control form-control-sm" id="quantity" >'
                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="price" class="form-label">Price</label>'
                    +'<input type="number" name="price[]" class="form-control form-control-sm price" id="price" value="" >'

                    +'</div>'

                    +'</div>');
    });


    //REMOVE ANY SIZE PRICE YOU WANT
    $('div').on('click','.kkkkkhh', function () {
        $(this).parent('div').remove();
    });

    //Add more size price for prod
    $('.addmoreattrpro').click(function (e) {
        e.preventDefault();
        $('.newattrpro').append('<div class="w-100 row rounded removeattr mx-auto mt-2 p-1 " style="background-color: rgb(138, 136, 136);">'
                    +' <div class="col-12 kkkkkhh">'
                     +'<i class="fa fa-close text-light me-auto "  aria-hidden="true"></i>'
                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="size" class="form-label">Size </label>'
                    +'<input type="text" name="size[]" value="n/a" class="form-control form-control-sm size" id="size">'

                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="colour" class="form-label">Colour</label>'
                    +'<input type="color" name="colour[]" value="" class="form-control form-control-sm" id="colour" >'
                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="quantity" class="form-label">Quantity</label>'
                    +'<input type="number" name="quantity[]" value="" class="form-control form-control-sm" id="quantity" >'
                    +'</div>'

                    +'<div class="col-md-4 mt-2">'
                    +'<label for="price" class="form-label">Price</label>'
                    +'<input type="number" name="price[]" class="form-control form-control-sm price" id="price" value="" >'

                    +'</div>'

                    +'</div>');
    });

    //Close and open variaions

    $('.varia').on('click', function () {
       $('.variations').toggle('slow');
    });
    $('.variation').on('click', function () {
        $('.variations').toggle('slow');variation
     });


 });


//CLOSE THE FILTER
 function closesss(){
     $('.sidednavv').toggle('slow');

     $('.sidenav').toggle('slow');

     $('.kkhgf').toggleClass('rightside');

     $('.footer').toggleClass('footersubbig');

     $('.catprodfil').toggleClass('col-md-8 col-lg-9');

     $('.cardcartpro').toggleClass('categoryproduct2');

     $('.cardcartpro').toggleClass('catprofilled');


 }





















