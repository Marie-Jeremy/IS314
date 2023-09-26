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
                        Food<span>Recipes</span>
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
                            <a href="/login">Login</a>
                        </li>
                           <li>
                            <a href="/register">Register</a>
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
    <main id="main">
        <h2>Recipes & Cooking Ideas</h2>
        <p>We know the deal. We feel your pain. Here are our superstar workhorse recipes, designed and tested to help you cook a great family meal.</p>
        <div id="cta">
            <a href="/home">Get Recipes</a>
        </div>
    </main>

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
                    <a href="#" class="btn-default">Contact Agent</a>
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
        <!--<div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        Copyright &copy; 2018 distributed by <a href="https://themewagon.com/">ThemeWagon</a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 text-right">
                        <a href="#">Terms & Conditions</a>
                        <a href="#">Policy</a>
                    </div>
                </div>
            </div>
        </div>-->

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
