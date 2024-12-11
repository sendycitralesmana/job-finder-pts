<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Loker PST </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpeg') }}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/flaticon.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/price_rangs.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/slicknav.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/animate.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/magnific-popup.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/fontawesome-all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/slick.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/jobfinder-master/assets/css/style.css') }}">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

            {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

        <!-- CSS Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        
   </head>

   <body>
    <!-- Preloader Start -->
    @include('frontoffice.preloader')
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        @include('frontoffice.header')
        <!-- Header End -->
    </header>
    <main>

        @yield('content')

    </main>
    <footer>
        <!-- Footer Start-->
        @include('frontoffice.footer')
        <!-- Footer End-->
    </footer>

  <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('assets/jobfinder-master/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ asset('assets/jobfinder-master/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/bootstrap.min.js') }}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ asset('assets/jobfinder-master/assets/js/jquery.slicknav.min.js') }}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('assets/jobfinder-master/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/price_rangs.js') }}"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('assets/jobfinder-master/assets/js/wow.min.js') }}"></script>
		<script src="{{ asset('assets/jobfinder-master/assets/js/animated.headline.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/jquery.magnific-popup.js') }}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('assets/jobfinder-master/assets/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('assets/jobfinder-master/assets/js/jquery.sticky.js') }}"></script>
        
        <!-- contact js -->
        <script src="{{ asset('assets/jobfinder-master/assets/js/contact.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/jquery.form.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/mail-script.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/jquery.ajaxchimp.min.js') }}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ asset('assets/jobfinder-master/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/jobfinder-master/assets/js/main.js') }}"></script>

        <!-- JS Select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

        <script>
            // Inisialisasi Select2 pada elemen select
            $(document).ready(function() {
                $('#mySelect').select2();  // Mengaktifkan Select2 pada elemen dengan id "mySelect"
            });
        </script>
        
    </body>
</html>