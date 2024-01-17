
<script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.slim.min.js')}}"></script>
        <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('js/myjs.js') }}"></script>


        <script>
            $(".banner-left-slider-inner").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    },
                },
            });
        </script>
        <script>
            $(".partner-logo-slider-inner").owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 7,
                    },
                },
            });
        </script>
        <script>
            $(".project-slider-content").owlCarousel({
                loop: true,
                margin: 50,
                nav: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 3,
                    },
                },
            });
        </script>
        <script>
            $(".testimonials-slider").owlCarousel({
                loop: true,
                margin: 37,
                nav: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 3,
                    },
                },
            });
        </script>
        <script>
            $("document").ready(function () {
                $(".verified-btn").click(function () {
                    $(this).toggleClass("verified-done");
                });
            });
        </script>

