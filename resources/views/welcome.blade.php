<!DOCTYPE html>
<html lang="en">
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    background-image: url('/images/food1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
#navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    height: 60px;
    padding: 0 30px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
#navbar h1 {
    margin: 0;
    font-size: 24px;
    color: rgb(255, 255, 255);
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
}
#navbar ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}
#navbar ul li {
    margin-left: 20px;
}
#navbar ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    transition: all 0.2s ease-in-out;
}
#navbar ul li a:hover {
    color: #ffc107;
}
#main {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    text-align: center;
}
#main h2 {
    font-size: 64px;
    color: #fff;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    margin-bottom: 30px;
    letter-spacing: 4px;
}
#main p {
    font-size: 24px;
    color: #000000;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    line-height: 1.5;
    max-width: 600px;
    margin: 0 auto;
    padding: 0 20px;
}
#cta {
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}
#cta a {
    font-size: 24px;
    color: #fff;
    background-color: #ffc107;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    border-radius: 30px;
    padding: 15px 30px;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}
#cta a:hover {
    background-color: #fff;
    color: #000;
}
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Food Recipe Website - Savory Secrets</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="css/icons.css" rel="stylesheet" type="text/css">
    <link href="/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css"  />
    <link href="/css/flexslider.css" rel="stylesheet" type="text/css" />
    <link href="/css/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="css/main.css"/>

    <!--[if lt IE 8]><!-->
    <link href="/ie7/ie7.css" rel="stylesheet" >
    <!--<![endif]-->
    <link href="/css/home.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".navbar-fixed-top">
    <header>
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 address">
                    </div>
                    <div class="col-sm-6 social">
                        <ul>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        Food<span>Recipes</span>
                    </a>
                    <p><b>Savory-Secrets</b></p>
                </div>
                <div class="collapse navbar-collapse navbar-main-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li>
                            <a href="/home">Home</a>
                        </li>
                        <li>
                            <a href="/breakfast">Breakfast</a>
                        </li>
                        <li>
                            <a href="/lunch">Lunch</a>
                        </li>
                        <li>
                            <a href="/dinner">Dinner</a>
                        </li>
                        <li>
                            <a href="/dessert">Dessert</a>
                        </li>
                        @auth <!-- Check if user is logged in -->
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @else
        <li>
            <a href="/login">Login</a>
        </li>
        <li>
            <a href="/register">Register</a>
        </li>
        @endauth <!-- End of authentication check -->
    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="clear"></div>
<div id="page-content">
    <main id="main">
        <h2>Recipes & Cooking Ideas</h2>
        <p>We know the deal. We feel your pain. Here are our superstar workhorse recipes, designed and tested to help you cook a great family meal.</p>
        <div id="cta">
            <a href="/home">Get Recipes</a>
        </div>
    </main>

</div>

   <!--footer-->
<div class="footer footer-variant-one footer-fluid">
    <div class="container">
        <div class="footer-inner">
            <div class="text-center">
                <a class="logo-footer wow animated zoomIn" href="index.html"><img src="" alt=""/></a>
                <p class="wow animated flipInX">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    <br/>
                    magna aliquyam erat, with an extra ordinary design and quality development features in low
                </p>

            </div>

            <div class="subs-social-options">
                <div class="row custom-row-footer">
                    <div class="col-md-6 custom-col-options">
                        <div class="left-side">
                            <div class="widget widget-footer news-letter-signup wow animated flipInY">
                                <h2>Newsletter Signup</h2>

                                <form class="subs-form" action="#" method="post">
                                    <div class="email-field">
                                        <input type="email" name="email" placeholder="Enter you email address"/>
                                        <button><i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="right-side">
                            <div class="widget widget-footer social-icons">
                                <h2 class="wow animated fadeInRight">Get Social with Us</h2>
                                <ul>
                                    <li class="wow animated bounceInRight"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="wow animated bounceInRight animation-delay100ms"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="wow animated bounceInRight animation-delay200ms" ><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="wow animated bounceInRight animation-delay300ms"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="wow animated bounceInRight animation-delay400ms" ><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                    <li class="wow animated bounceInRight animation-delay500ms"><a href="#"><i class="fa fa-flickr"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center">
                <p>&copy; Copyright 2015 All Rights Reserved by <a href="#">Majestic Themes</a></p>
            </div>
            <div class="corner-image wow animated fadeInRight">
                <img src="images/footer-corner-image.jpg" alt="image"/>
            </div>
        </div>
    </div>
</div>
<!--footer ends-->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/jquery.selectric.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.swipebox.js"></script>
<script src="js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-hover-dropdown/2.2.1/bootstrap-hover-dropdown.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="/js/jquery.flexslider-min.js"></script>
    <script src="/js/easyResponsiveTabs.js"></script>
    <script src="/js/owl.carousel.js"></script>
    <script src="/js/custom.js"></script>
</body>
</html>
