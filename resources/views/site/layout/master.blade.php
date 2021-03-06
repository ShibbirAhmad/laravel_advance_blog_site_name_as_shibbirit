<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') {{ config('app.name', 'Blog') }}  </title>

  

    
	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
     
     <!-- bangla font -->
     
     
     <link href="{{asset('font/BalooDa2-Medium.ttf ')}}" rel="stylesheet"  type="text/css" />

     <link href="{{asset('font/BalooDa2-Regular.ttf ')}}" rel="stylesheet"  type="text/css" />

     <!--cdn of sweet_alert-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>

     <!--cdn of sweet_alert-->


	<!-- Stylesheets -->

	<link rel="stylesheet"  href="{{asset('css/app.css')}}" >
    
    <link rel="stylesheet" href="{{asset('css/fontawesome/all.min.css')}}">

	<link rel="stylesheet"  href="{{asset('site/layout-1/css/styles.css')}}" >

    <link rel="stylesheet"  href="{{asset('site/layout-1/css/responsive.css')}}" >
    
     @stack('css')
   
</head>

<body>

    @include('site.layout.header')
    
       
        
        @yield('slider')
  
     

	<section class="blog-area section">
		<div class="container">
       
            @yield('content')
            

		</div><!-- container -->
	</section><!-- section -->


    @include('site.layout.footer')
    
          <!-- SCIPTS -->
    
          <script src="{{asset('js/jquery.min.js')}}"></script>
    
          <script src="{{asset('site/common-js/tether.min.js ')}}"></script>
          
          <script src="{{asset('js/fontawesome/all.min.js')}}"></script>
      
          <script src="{{asset('js/app.js ')}}"></script>

          <script src="{{asset('js/modal.js')}}"></script>
          
          <script src="{{asset('site/common-js/swiper.js')}}"></script>
    
          <script src="{{asset('site/common-js/scripts.js ')}}"></script>  
      
      
          @stack('js') 


</body>
</html>
