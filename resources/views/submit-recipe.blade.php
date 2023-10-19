<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

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
    <!--google fonts-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!--jquery ui stylesheet-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- site favicon -->
    <link rel="icon" href="images/favicon.png" />

    <!--selectric stylesheet-->
    <link rel="stylesheet" href="css/selectric.css"/>
    <!--font awesome stylesheet-->
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <!--swipe box stylesheet-->
    <link rel="stylesheet" href="css/swipebox.css"/>
    <!-- mean menu stylesheet-->
    <link rel="stylesheet" href="css/meanmenu.css"/>
    <!--slick slider stylesheet-->
    <link rel="stylesheet" href="css/slick.css"/>
    <link rel="stylesheet" href="css/slick-theme.css"/>
    <!--bootstrap stylesheets-->
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css"/>
    <!--animate stylesheet-->
    <link rel="stylesheet" href="css/animate.css"/>
    <!--main stylesheet-->
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>


<!--header-->
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
                        Food<span>Recipe</span>
                    </a>
                    @if(auth()->check())
                        <p><span class="user-name"><b>{{ auth()->user()->name }}</b></span></p>
                    @endif
                </div>
                <div class="collapse navbar-collapse navbar-main-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li>
                            <a href="/user_home">Home</a>
                        </li>
                        <li>
                            <a href="/submit-recipe">Submit Recipe</a>
                        </li>
                        <li>
                            <a href="/my-recipe">My Recipes</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<!--header ends-->

<!--banner-->
<div class="clear"></div>
    <div id="page-content">

<div class="banner banner-blog">
    <div class="container ">
        <div class="main-heading">
            <h1>Submit Recipe</h1>
        </div>

    </div>
</div>

<div class="recipes-home-body inner-page">
<div class="container">
<div class="row">
<div class="col-md-8 col-lg-9">
    <div class="recipe-set submit-recipe-set">
        <h2>Submit Recipe</h2>
       
        <p><strong>Asterisk<span class="required">( * )</span> Indicates a required field.</p>
        <div class="submit-recipe-form">
        @if ($errors->any())
            <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        </div>
        @endif
            <form action="{{ url('/submit-recipe') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title">Recipe Title<span class="required">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"/>
                <br/>

                <label for="short-description">Short Description<span class="required">*</span></label>
                <textarea class="short-text" name="short-des" id="short-description" cols="30" rows="10">{{ old('short-des') }}</textarea>
                
                <label for="upload-image">Upload Images<span class="required">*</span></label>
                <p>Please upload images in formats such as JPG, PNG, or GIF, and make sure they are clear and well-lit to showcase your delicious recipes.</p>
                <input type="file" name="fileUpload" id="upload-image">

                <fieldset class="ingredient-set">
                    <label for="ingredients">Ingredients<span class="required">*</span></label>
                    <p>Enter the ingredients required for your recipe. Each ingredient should be added in a separate block. To add a new ingredient, click the "Add Ingredient(+)" button and continue this process for each ingredient.</p>
                    <ul class="list-sortable ingredients-list">
                    @if(old('ingredients'))
            @foreach(old('ingredients') as $ingredient)
                        <li>
                            <div class="add-fields">
                                <span class="handler-list"><i class="fa fa-arrows"></i></span>
                                <input type="text" name="ingredients[]" value="{{ $ingredient }}" id="ingredients"/>
                                <span class="del-list"><i class="fa fa-trash delete-ingredient"></i></span>
                            </div>
                        </li>
                        @endforeach
        @else
            <li>
                <div class="add-fields">
                    <span class="handler-list"><i class="fa fa-arrows"></i></span>
                    <input type="text" name="ingredients[]" id="ingredients" />
                    <span class="del-list"><i class="fa fa-trash delete-ingredient"></i></span>
                </div>
            </li>
        @endif
                    </ul>
                                         <span class="add-button add-ing" id="add-ingredient">
                                            <i class="fa fa-plus"></i>
                                        </span>
                </fieldset>

                <fieldset class="ingredient-set">
                    <label for="steps">Steps<span class="required">*</span></label>
                    <p>Provide the preparation steps for your recipe. Each step should be added in a separate block. To add a new step, click the "Add Step(+)" button, and continue this process for each step in your recipe.</p>
                    <ul class="list-sortable steps">
                    @if(old('steps'))
            @foreach(old('steps') as $step)
                        <li>
                            <div class="add-fields">
                                <span class="handler-list"><i class="fa fa-arrows"></i></span>
                                <input type="short-text" name="steps[]" value="{{ $step }}" id="steps" />
                                <span class="del-list"><i class="fa fa-trash delete-step"></i></span>
                            </div>
                        </li>
                        @endforeach
        @else
            <li>
                <div class="add-fields">
                    <span class="handler-list"><i class="fa fa-arrows"></i></span>
                    <textarea class="short-text" name="steps[]" id="steps" cols="30" rows="10"></textarea>
                    <span class="del-list"><i class="fa fa-trash delete-step"></i></span>
                </div>
            </li>
        @endif
                    </ul>
                                         <span class="add-button add-steps" id="add-step">
                                            <i class="fa fa-plus"></i>
                                        </span>
                </fieldset>

                <label class="video-based-recipe">Video Based Recipe</label>
                <br/>
                <label for="radio-yes">
                    <input class="radio-btn" id="radio-yes" type="radio" name="video-recipe" value="yes" /><span class="radio-text">yes</span>
                </label>
                <label for="radio-no">
                    <input class="radio-btn" id="radio-no" type="radio" name="video-recipe" value="no" checked /> <span class="radio-text">no</span>
                </label>
                <br/>
                <br/>
                <div id="video-embed-code-container" style="display: none;">

                <label for="video-embed">Video Url</label>
                <p>Please provide either the url of your video or upload the video file. If you choose to upload a video, make sure it's in a supported format (e.g., MP4).</p>
                <textarea class="short-text" name="embed-code" id="video-embed" cols="30" rows="10"></textarea>
                <label for="video-upload">Upload Video</label>
                <input type="file" name="video-upload" id="video-upload">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="servings">Servings</label>
                        <input type="text" name="servings" id="servings"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label for="prep-time">Preparation Time</label>
                        <input type="text" name="prep-time" id="prep-time"/>
                    </div>
                    <div class="col-sm-4">
                        <label for="cook-time">Cook Time</label>
                        <input type="text" name="cook-time" id="cook-time"/>
                    </div>
                    <div class="col-sm-4">
                        <label for="ready-in">Ready In</label>
                        <input type="text" name="ready-in" id="ready-in"/>
                    </div>
                </div>

                <label for="tags">Tags</label>
                <input type="text" name="tags" id="tags"/>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="recipe-type">Recipe Type</label>
                        <select name="recipe-type" id="recipe-type" class="advance-selectable">
                            <option selected="selected">None</option>
                            <option>Breakfast</option>
                            <option>Lunch</option>
                            <option>Dinner</option>
                            <option>Dessert</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="cuisine-select">Cuisine</label>
                        <select name="cuisine" id="cuisine-select" class="advance-selectable">
                            <option selected="selected">None</option>
                            <option>Indian</option>
                            <option>Chinese</option>
                            <option>Italian</option>
                            <option>European</option>
                        </select>
                    </div>
 
                    <div class="col-sm-6">
                        <label for="skill">Skill Level</label>
                        <select name="skill" id="skill" class="advance-selectable">
                            <option selected="selected">None</option>
                            <option>Easy</option>
                            <option>Medium</option>
                            <option>Professional</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="recipe-submit-btn">Submit Your Recipe</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--popular recipes widget-->
<div class="widget latest-news-widget">
    <h2>popular recipes</h2>
    <ul>
        <li>
            <div class="thumb">
                <a href="#">
                    <img src="images/temp-images/widget-thumbnail.jpg" alt="thumbnail"/>
                </a>
            </div>
            <div class="detail">
                <a href="#">Pimento Cheese Potato Skins</a>
                <span class="post-date">March 21,2015</span>
            </div>
        </li>

        <li>
            <div class="thumb">
                <a href="#">
                    <img src="images/temp-images/widget-thumbnail.jpg" alt="thumbnail"/>
                </a>
            </div>
            <div class="detail">
                <a href="#">Pimento Cheese Potato Skins</a>
                <span class="post-date">March 21,2015</span>
            </div>
        </li>

        <li>
            <div class="thumb">
                <a href="#">
                    <img src="images/temp-images/widget-thumbnail.jpg" alt="thumbnail"/>
                </a>
            </div>
            <div class="detail">
                <a href="#">Pimento Cheese Potato Skins</a>
                <span class="post-date">March 21,2015</span>
            </div>
        </li>

        <li>
            <div class="thumb">
                <a href="#">
                    <img src="images/temp-images/widget-thumbnail.jpg" alt="thumbnail"/>
                </a>
            </div>
            <div class="detail">
                <a href="#">Pimento Cheese Potato Skins</a>
                <span class="post-date">March 21,2015</span>
            </div>
        </li>

    </ul>
</div>
<!--popular recipes widget ends-->
<div class="widget">
    <a href="#">
        <img src="images/temp-images/add-side.jpg" alt="Add"/>
    </a>
</div>
<!--latest news widget-->
<div class="widget latest-news-widget">
    <h2>Latest News</h2>
    <ul>
        <li>
            <div class="thumb">
                <a href="#">
                    <img src="images/temp-images/widget-thumbnail.jpg" alt="thumbnail"/>
                </a>
            </div>
            <div class="detail">
                <a href="#">Pimento Cheese Potato Skins</a>
                <span class="post-date">March 21,2015</span>
            </div>
        </li>

        <li>
            <div class="thumb">
                <a href="#">
                    <img src="images/temp-images/widget-thumbnail.jpg" alt="thumbnail"/>
                </a>
            </div>
            <div class="detail">
                <a href="#">Pimento Cheese Potato Skins</a>
                <span class="post-date">March 21,2015</span>
            </div>
        </li>

        <li>
            <div class="thumb">
                <a href="#">
                    <img src="images/temp-images/widget-thumbnail.jpg" alt="thumbnail"/>
                </a>
            </div>
            <div class="detail">
                <a href="#">Pimento Cheese Potato Skins</a>
                <span class="post-date">March 21,2015</span>
            </div>
        </li>

        <li>
            <div class="thumb">
                <a href="#">
                    <img src="images/temp-images/widget-thumbnail.jpg" alt="thumbnail"/>
                </a>
            </div>
            <div class="detail">
                <a href="#">Pimento Cheese Potato Skins</a>
                <span class="post-date">March 21,2015</span>
            </div>
        </li>

    </ul>
</div>
<!--latest news widget ends-->
<!--get social-->
<div class="widget widget-get-social">
    <h2>get social</h2>
    <ul>
        <li class="facebook">
            <a href="#">
                <i class="fa fa-facebook"></i>
                <span class="count">23.5K</span>
                <span class="count-type">Likes</span>
            </a>
        </li>
        <li class="twitter">
            <a href="#">
                <i class="fa fa-twitter"></i>
                <span class="count">23.5K</span>
                <span class="count-type">Likes</span>
            </a>
        </li>
        <li class="google-plus">
            <a href="#">
                <i class="fa fa-google-plus"></i>
                <span class="count">23.5K</span>
                <span class="count-type">Likes</span>
            </a>
        </li>

    </ul>
</div>
<!--get social ends-->
</div>
</aside>
</div>
</div>

</div>
</div>

<!--footer-->
<div class="footer footer-variant-one footer-fluid">
    <div class="container">
        <div class="footer-inner">
            <div class="text-center">
                <a class="logo-footer wow animated zoomIn" href="index.html"><img src="" ></a>
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
            <div class="footer-copyright text-center wow animated flipInX">
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

<script>
    // Get references to the radio buttons and the video embed container
    const radioYes = document.getElementById('radio-yes');
    const radioNo = document.getElementById('radio-no');
    const videoEmbedContainer = document.getElementById('video-embed-code-container');

    // Add event listeners to the radio buttons
    radioYes.addEventListener('change', function () {
        // If "Yes" is selected, show the video embed container
        videoEmbedContainer.style.display = 'block';
    });

    radioNo.addEventListener('change', function () {
        // If "No" is selected, hide the video embed container
        videoEmbedContainer.style.display = 'none';
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addStepButton = document.getElementById('add-step');
        const stepsList = document.querySelector('.list-sortable.steps');

        // Add new step
        addStepButton.addEventListener('click', function() {
            const newStepItem = document.createElement('li');
            newStepItem.innerHTML = `
                <div class="add-fields">
                    <span class="handler-list"><i class="fa fa-arrows"></i></span>
                    <textarea class="short-text" name="steps[]" cols="30" rows="10"></textarea>
                    <span class="del-list"><i class="fa fa-trash delete-step"></i></span>
                </div>
            `;
            stepsList.appendChild(newStepItem);
        });

        // Delete step
        stepsList.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-step')) {
                const stepItem = event.target.closest('li');
                stepItem.remove();
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addIngredientButton = document.getElementById('add-ingredient');
        const ingredientsList = document.querySelector('.list-sortable.ingredients-list');

        // Add new ingredient
        addIngredientButton.addEventListener('click', function() {
            const newIngredientItem = document.createElement('li');
            newIngredientItem.innerHTML = `
                <div class="add-fields">
                    <span class="handler-list"><i class="fa fa-arrows"></i></span>
                    <input type="text" name="ingredients[]" />
                    <span class="del-list"><i class="fa fa-trash delete-ingredient"></i></span>
                </div>
            `;
            ingredientsList.appendChild(newIngredientItem);
        });

        // Delete ingredient
        ingredientsList.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-ingredient')) {
                const ingredientItem = event.target.closest('li');
                ingredientItem.remove();
            }
        });
    });
</script>

</body>
</html>