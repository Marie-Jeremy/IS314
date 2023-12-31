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
                    <div style="float: right;">
                        <p><span class="user-name"><b>{{ auth()->user()->username }}</b></span></p>                        
                        <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/search') }}">
                            <input class="form-control" name="query" type="search" placeholder="search recipe title"/>
                            
                            <button type="submit"><i class="fa fa-search"></i></button>
                         </form>
                    </div>
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
                            </form>
                        </li>
                       
                       
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/search') }}">
                        <input class="form-control mr-sm-2" name="query" type="search" placeholder="search recipe title"/>
                        <button type="submit">Search<button>
                  </form> -->
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
            <h1>Recipe details page</h1>
        </div>

    </div>
</div>

@if(isset($successMessage))
<div class="alert alert-success">
    {{ $successMessage }}
</div>
@endif

<section class="wrapper-main-contents all-chefs">
<div class="container">
<div class="line-heading">
                <!-- Breadcrumbs -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user-home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">My Recipes</li>
    </ol>
</nav>
    <h2>My Recipes</h2>
</div>
@foreach ($recipes as $recipe)
<div class="wrapper-head-chef">
    <div class=head-chef>
        <div class="left-side">
            <a href="#"><img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image"/></a>
        </div>
        <div class="right-side">
            <h3><a href="#">{{ $recipe->title }}</a></h3>
            
            <div class="separator-chef"></div>
            <p>
            {{ $recipe->short_description }}
            </p>
            @if (!empty($recipe->yield))
        <p>Yield: {{ $recipe->yield }}</p>
    @endif
    @if (!empty($recipe->servings))
        <p>Servings: {{ $recipe->servings }}</p>
    @endif
    @if (!empty($recipe->prep_time))
        <p>Prep-time: {{ $recipe->prep_time }}</p>
    @endif
    @if (!empty($recipe->cook_time))
        <p>Cook-time: {{ $recipe->cook_time }}</p>
    @endif
    @if (!empty($recipe->ready_in))
        <p>Ready-in: {{ $recipe->ready_in }}</p>
    @endif


            @if (!empty($recipe->video_path))
    <div class="recipe-video">
        <a href="{{ asset('storage/' . $recipe->video_path) }}" target="_blank" class="btn btn-primary">Watch Video</a>
    </div>
@elseif ($recipe->video_recipe === 'yes' && !empty($recipe->video_embed_code))
    <div class="recipe-video">
        <a href="{{ $recipe->video_embed_code }}" target="_blank" class="btn btn-primary">Watch Video</a>
    </div>
@endif




            <ul class="social-icons-chef">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>

    </div>
</div>

                    <div class="recipe-detail-body">
                    <a href="{{ route('edit-recipe', ['id' => $recipe->id]) }}" class="print-button"><i class="fa fa-pencil"></i>Edit Recipe</a>
                    <form action="{{ route('delete-recipe', ['id' => $recipe->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="print-button"><i class="fa fa-trash"></i>Delete Recipe</button>
            </form>

                    <ul class="pre-tags">
                        <li><span>Cuisine : </span> {{ $recipe->cuisine }}</li>
                        <li><span>Recipe Type : </span> {{ $recipe->recipe_type }}</li>
                        <li><span>Skill Level : </span> {{ $recipe->skill }}</li>
                    </ul>
                    <div class="separator-post"></div>
                    <p>
                    {{ $recipe->content }}
                    </p>
                    <br/>
                    <div class="ingredients-checkbox">
                        <div class="ingredients">
                            <h3>Ingredients</h3>
                            <ul>
                            @foreach (json_decode($recipe->ingredients) as $ingredient)
                                <li>
                                    <label>
                                        <input type="checkbox"/>
                                        {{ $ingredient }}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                       
                    </div>

                    <div class="recipe-steps">
                        <h3 class="lined">Step by Step method</h3>
                        <ul class="steps-list">
                        @foreach($recipe->steps as $index => $step)
                            <li>
                                <div class="step-single">
                                    <div class="step-detail">
                                        <h3>Step {{ $index + 1 }}.</h3>
                                        <p>
                                        {{ $step }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="separator-post"></div>
                    <div class="tags-icons">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="details-tags">
                                    <ul>
                                    @php
                                        $tagsArray = explode(',', $recipe->tags);
                                    @endphp
                                    @foreach ($tagsArray as $tag)
                                        <li><a href="#">{{ trim($tag) }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="details-social-icons">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    </div>


                    <div class="related-recipes">
                    <h3 class="lined">Related Recipes</h3>
                    <div class="boxed-recipes text-center">
                    <!--single recipe-->
                    <div class="recipe-single">
                        <div class="recipe-image">
                            <a href="#"><img src="images/temp-images/main-recipe1.jpg" alt="image"></a>
                        </div>
                        <div class="outer-detail">
                            <div class="detail">
                                <h3><a href="#">Pasto Pizza with fillas
                                    Cheese Toppings</a></h3>

                                <div class="short-separator"></div>
                                <div class="rating-box">
                                    <span class="rating-icons">
                                        <svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                                            <g>
                                                <title>background</title>
                                                <rect fill="none" height="21" width="27" y="-1" x="-1"/>
                                            </g>
                                            <g>
                                                <title>Layer 1</title>
                                                <path class="icon-svg"
                                                      d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z"
                                                      clip-rule="evenodd" fill-rule="evenodd"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="rating-icons">
                                        <svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                                            <g>
                                                <title>background</title>
                                                <rect fill="none" height="21" width="27" y="-1" x="-1"/>
                                            </g>
                                            <g>
                                                <title>Layer 1</title>
                                                <path class="icon-svg"
                                                      d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z"
                                                      clip-rule="evenodd" fill-rule="evenodd"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="rating-icons">
                                        <svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                                            <g>
                                                <title>background</title>
                                                <rect fill="none" height="21" width="27" y="-1" x="-1"/>
                                            </g>
                                            <g>
                                                <title>Layer 1</title>
                                                <path class="icon-svg"
                                                      d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z"
                                                      clip-rule="evenodd" fill-rule="evenodd"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="rating-icons">
                                        <svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                                            <g>
                                                <title>background</title>
                                                <rect fill="none" height="21" width="27" y="-1" x="-1"/>
                                            </g>
                                            <g>
                                                <title>Layer 1</title>
                                                <path class="icon-svg"
                                                      d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z"
                                                      clip-rule="evenodd" fill-rule="evenodd"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="rating-icons">
                                        <svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                                            <g>
                                                <title>background</title>
                                                <rect fill="none" height="21" width="27" y="-1" x="-1"/>
                                            </g>
                                            <g>
                                                <title>Layer 1</title>
                                                <path class="icon-svg"
                                                      d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z"
                                                      clip-rule="evenodd" fill-rule="evenodd"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="rating-figure">(4.1 / 5)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--single recipe ends-->

                    <!--single recipe-->
                    <div class="recipe-single">
                        <div class="recipe-image">
                            <a href="#"><img src="images/temp-images/main-recipe2.jpg" alt="image"></a>
                        </div>
                        <div class="outer-detail">
                            <div class="detail">
                                <h3><a href="#">Pasto Pizza with fillas
                                    Cheese Toppings</a></h3>
                                <div class="short-separator"></div>
                                <div class="rating-box">
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                                    <span class="rating-figure">(4.1 / 5)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--single recipe ends-->

                    <!--single recipe-->
                    <div class="recipe-single">
                        <div class="recipe-image">
                            <a href="#"><img src="images/temp-images/main-recipe3.jpg" alt="image"></a>
                        </div>
                        <div class="outer-detail">
                            <div class="detail">
                                <h3><a href="#">Pasto Pizza with fillas
                                    Cheese Toppings</a></h3>
                                <div class="short-separator"></div>
                                <div class="rating-box">
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                        <span class="rating-icons"><svg class="icon-container" width="25" height="19" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 19">

                            <g>
                                <title>background</title>
                                <rect fill="none"  height="21" width="27" y="-1" x="-1"/>
                            </g>
                            <g>
                                <title>Layer 1</title>
                                <path class="icon-svg"  d="m24.671816,17.625433c0,0.438 -0.286999,0.801001 -0.681,0.935001c-0.095001,0.036999 -0.198002,0.064999 -0.318001,0.064999l-16.000998,0c-0.553,0 -1,-0.448 -1,-1c0,-0.553999 0.447,-1 1,-1l14.950999,0c-0.500999,-5.053999 -4.764997,-9 -9.950999,-9c-5.523,0 -10,4.477001 -10,10c0,0 0.063,1 -1,1c-1.062,0 -1,-1 -1,-1c0,-5.769999 4.071,-10.581999 9.495001,-11.734999c-0.306002,-0.52 -0.495001,-1.117001 -0.495001,-1.765001c0,-1.933999 1.566999,-3.499999 3.5,-3.499999c1.931999,0 3.499,1.567 3.499,3.499999c0,0.739 -0.232998,1.423 -0.624998,1.989c4.984999,1.459 8.625998,6.056 8.625998,11.511l0,0zm-11.499,-15c-0.828999,0 -1.500999,0.670001 -1.500999,1.499001c0,0.827999 0.672001,1.5 1.500999,1.5c0.828001,0 1.499001,-0.672001 1.499001,-1.5c0,-0.829 -0.671,-1.499001 -1.499001,-1.499001l0,0z" clip-rule="evenodd" fill-rule="evenodd"/>
                            </g>
                        </svg></span>
                                    <span class="rating-figure">(4.1 / 5)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--single recipe ends-->
                    </div>
                    </div>
       
</div>              
</div>
</section>

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
<script src="js/flexslider/jquery.flexslider-min.js"></script>
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