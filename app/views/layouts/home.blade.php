
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Speaker</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('/assets/css/bootstrap.min.css') }}

    <!-- Fonts -->
    {{ HTML::style('/assets/font-awesome/css/font-awesome.min.css') }}
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Custom Theme CSS -->
    <!-- <link href="assets/css/speaker.css" rel="stylesheet"> -->
    {{ HTML::style('/assets/css/homepage.css') }}

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
                    <i class="fa fa-play-circle fa-fw"></i>Speaker
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#download">How to</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="brand-heading">Speaker</h1>
                        <p class="intro-text">A free, community platform, focused in giving voice to you daily experiences.</p>
                    </div>
                    <div class="col-md-5 col-lg-4 col-lg-offset-1 white-box box-align-right">
                    </div>
                    <div class="col-md-5 col-lg-4 col-lg-offset-1 box-align-right">

                        @yield('login-content')
                    
                    </div>
                    <div class="col-md-12">
                        <div class="page-scroll">
                            <a id="btn-scroll-down" href="#about" class="btn btn-circle">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== ABOUT SECTION ========== -->    
    <section id="about" class="container content-section text-center">
        <div class="row" style="margin-bottom: 70px;">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About Speaker   </h2>
                <p>Speaker is ...</p>
            </div>
        </div>
    
      <div class="row">
        <div class="col-md-3 col-sm-6 product">
          <div class="product-ball">
            <span class="fa fa-bullhorn"></span>
          </div>
          <h4>Public polls</h4>
          <p>Descrição</p>
        </div> 

        <div class="col-md-3 col-sm-6 product">
          <div class="product-ball">
            <span class="fa fa-list"></span>
          </div>
          <h4>Companies feedback forms</h4>
          <p>Descrição</p>
        </div> 

        <div class="col-md-3 col-sm-6 product">
          <div class="product-ball">
            <span class="fa fa-comments"></span>
          </div>
          <h4>your uncensored daily opinions</h4>
          <p>Descrição</p>
        </div> 
        
        <div class="col-md-3 col-sm-6 product">
          <div class="product-ball">
            <span class="fa fa-calendar"></span>
          </div>
          <h4>Poll your routine with friends</h4>
          <p>Descrição</p>
        </div> 

    </section>
    
    
    <!-- ========== HOW-TO & DOWNLOAD SECTION ========== -->    
    <section id="download" class="content-section text-center" style="padding-top: 50px;">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-6 col-lg-offset-1">
                    <h2>How to start</h2>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <br>
                        <br>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active centered">
                                {{ HTML::image("/assets/img/c1.png", "Image 1", array('class' => 'img-responsive')) }}
                            </div>
                            <div class="item centered">
                                {{ HTML::image("/assets/img/c2.png", "Image 2", array('class' => 'img-responsive')) }}
                            </div>
                            <div class="item centered">
                                {{ HTML::image("/assets/img/c3.png", "Image 3", array('class' => 'img-responsive')) }}
                            </div>
                        </div>
                        <br>
                        <br>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-1">
                    <p style="margin-top: 200px;">Description regarding how to download speaker from Google and Apple Store</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CONTACTS SECTION ========== --> 
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Give us feedback</h2>
                <p>Feel free to contact us to provide some feedback, give us suggestions for pools, or to just say hello!</p>
                <p>feedback@speaker.com</p>
                <ul class="list-inline banner-social-buttons">
                    <li><a href="#contact" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">facebook</span></a></li>
                    <li><a href="#contact" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a></li>
                    <li><a href="#contact" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a></li>
                    <li><a href="#contact" class="btn btn-default btn-lg"><i class="fa fa-envelope fa-fw"></i> <span class="network-name">Email</span></a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- <div id="map"></div> -->

    <!-- Core JavaScript Files -->
    {{ HTML::script('/assets/js/jquery-1.10.2.js') }}
    {{ HTML::script('/assets/js/bootstrap.min.js') }}
    {{ HTML::script('/assets/js/jquery.placeholder.js') }}
    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - You will need to use your own API key to use the map feature -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <!-- <script src="assets/js/homepage.js"></script> -->
    {{ HTML::script('/assets/js/homepage.js') }}

    <script type="text/javascript">
    
        @yield('javascript-content')

    </script>

</body>

</html>
