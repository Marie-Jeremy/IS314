<!DOCTYPE html>
<html lang="en">

<style>

h1 {
  background-color: black;
  color: white;
  text-align: center;
  
}
/* Three image containers (use 25% for four, and 50% for two, etc) */
.column
{
float: left;
width: 300px;
padding: 10px;
position: relative;
width: 50%;
max-width: 300px;
}

/* Clear floats after image containers */
.row::after 
{
content: "";
clear: both;
display: table;
}

.overlay 
{
position: absolute;
bottom: 0;
background: rgb(0, 0, 0);
background: rgba(0, 0, 0, 0.5); /* Black see-through */
color: #f1f1f1;
width: 260px;
transition: .5s ease;
opacity:0;
color: white;
font-size: 20px;
padding: 20px;
text-align: center;
}

/* When you mouse over the container, fade in the overlay title */
.row:hover .overlay 
{
opacity: 1;
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
                        <i class="ti-location-pin"></i> 2109 WS 09 Oxford Rd #127 ParkVilla Hills, MI 48334
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
                        Food<span>Recipe</span>
                    </a>
                    <p>Call Us Now <b>+215 (362) 4579</b></p>
                </div>
                <div class="collapse navbar-collapse navbar-main-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li>
                            <a href="/home">Home</a>
                        </li>
                        
                        <li>
                            <a href="/policy">Breakfast</a>
                        </li>
                        <li>
                            <a href="/contact">Lunch</a>
                        </li>
                        <li>
                            <a href="/contact">Dinner</a>
                        </li>
                        <li>
                            <a href="/contact">Dessert</a>
                        </li>
                        <li>
                            <a href="/register">Register</a>
                        </li>
                        <li>
                            <a href="/login">Login</a>
                        </li>
                       <!-- <li>
                            <a href="/get-premium" class="btn-default">Buy Premium Version</a>
                        </li>-->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<div class="clear"></div>
<div id="page-content">
<section id ="policies">
	<div class="container">
    <h1> BreakFast Menu </h1>
    <div class="row">

      <div class="column">
        <img src="{{ asset('images/Honey-Fried-Chicken-and-Waffles.jpg') }}" alt="Honey-Fried-Chicken-and-Waffles" style="width:100%">
        <div class="overlay">Honey Fried Chicken and Waffles</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/TacosBreakFast.jpg') }}" alt="TacosBreakFast" style="width:100%" >
        <div class="overlay">BreakFast Tacos</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Pumpkin-Chocolate-Chip-Pancakes.jpg') }}" alt="Pumpkin-Chocolate-Chip-Pancakes" style="width:100%">
        <div class="overlay">Pumpkin Chocolate Chip Pancakes</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Pumpkin-Spice-Waffles.jpg') }}" alt="Pumpkin-Spice-Waffles" style="width:100%">
        <div class="overlay">Pumpkin Spice Waffles</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Bacon-and-Egg-Toast.jpg') }}" alt="Bacon-and-Egg-Toast" style="width:100%">
        <div class="overlay">Bacon and Egg Toast</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Smashed-Potatoes.jpg') }}" alt="Smashed-Potatoes" style="width:100%">
        <div class="overlay">Smashed Potatoes</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Hash-Browns.jpg') }}" alt="Hash-Browns" style="width:100%">
        <div class="overlay">Hash Browns</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Yogurt-in-an-Instant-Pot.jpg') }}" alt="Yogurt-in-an-Instant-Pot" style="width:100%">
        <div class="overlay">Yogurt in an Instant Pot</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Savory Herb French Toast.jpg') }}" alt="Savory Herb" style="width:100%">
        <div class="overlay">Savory Herb Toast</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Pancakes.jpg') }}" alt="Pancakes" style="width:100%">
        <div class="overlay">Pancakes</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Breakfast-SaladIMG.jpg') }}" alt="Salad BreakFast" style="width:100%">
        <div class="overlay">Salad BreakFast</div>
      </div>
      <div class="column">
        <img src="{{ asset('images/Banana Bread French Toast.jpg') }}" alt="Banana French Toast" style="width:100%">
        <div class="overlay">Banana French Toast</div>
      </div>

    </div>
  </section>
  </div>

  <footer>
        <div class="container">
            <div class="row contact-sec">
                <div class="col-md-5 col-lg-5">
                    <h2>Food<span>Recipe</span></h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>E104 Dharti -2 , Nr Silverstar Mall Chandlodia - Ahmedabad
                                <br/>Zip - 382481</p>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="#"><i class="fa fa-phone"></i> +91 123 456 7890</a></li>
                                <li><a href="#"><i class="ti-email"></i> info@bootstrapmart.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="#" class="btn-default">Contact Us</a>
                </div>
                <div class="col-md-5 col-lg-5 col-md-offset-2 col-lg-offset-2">
                    <h2>Food<span>Recipe</span></h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>E104 Dharti -2 , Nr Silverstar Mall Chandlodia - Ahmedabad
                                <br/>Zip - 382481</p>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="#"><i class="fa fa-phone"></i> +91 123 456 7890</a></li>
                                <li><a href="#"><i class="ti-email"></i> info@bootstrapmart.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="#" class="btn-default">Contact Us</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <ul class="footer-nav">
                        <li><a href="/home">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="#">Compnies represented</a></li>
                        <li><a href="contact-us.html">Contact us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Products</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-lg-2 col-md-offset-2 col-lg-offset-2">
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
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
