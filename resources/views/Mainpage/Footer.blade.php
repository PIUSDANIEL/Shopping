
</div>

{{-- footer --}}
<footer class=" mb-0 w-100 footer  " style="background-color:#6b7280 ;">
    <div class="row footerrow">
        <div class="col-11 col-lg-5 mx-auto my-2 shadow" style="background-color:#00000000 ; border-radius:20px;">
            <p class="text-white submitfilterd">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Praesentium et, ex exercitationem nobis minima architecto
            assumenda eligendi autem quas amet perspiciatis unde, voluptate quasi sit.
            Magni ad soluta blanditiis saepe?mm
            </p>
        </div>
        <div class="col-11 col-lg-5 mx-auto my-2 shadow" style="background-color:#00000000 ; border-radius:20px; ">
            <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Praesentium et, ex exercitationem nobis minima architecto
            assumenda eligendi autem quas amet perspiciatis unde, voluptate quasi sit.
            Magni ad soluta blanditiis saepe?
            </p>
        </div>
    </div>
</footer>


        <!---jquery---->



            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $('.loop').owlCarousel({
                    center: true,
                    loop: true,
                    margin: 10,
                    responsive: {
                        0: {
                        items: 3
                        },
                        360: {
                        items: 3
                        },
                        400: {
                        items: 4
                        },
                        1000: {
                        items: 10
                        }
                    }
                    });

                });

                $(document).ready(function() {
                    var owl = $('.owl-carousel');
                    owl.owlCarousel({
                    margin: 10,
                    nav: false,
                    loop: true,
                    responsive: {
                        0: {
                        items: 2
                        },
                        600: {
                        items: 3
                        },
                        1000: {
                        items: 5
                        }
                    }
                    })
                });




            </script>


</body>
</html>
