<!DOCTYPE html>
<html lang="en" dir="ltr">
<style>
    /* Add this CSS to your Blade template or an external CSS file */
    .checkboxes {
        display: flex;
        flex-wrap: wrap;
    }

    .checkbox {
        display: flex;
        align-items: center;
        margin-right: 20px; /* Adjust the spacing as needed */
    }

    .checkbox input {
        margin-right: 5px; /* Adjust the spacing between the checkbox and label */
    }

    /* CSS to make the asterisk red */
.required {
    color: red;
}

</style>

<head>
    <meta charset="UTF-8">
    <title>Food Recipe Website | Savory Secrets</title>
    <link href="/css/register.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <a href="{{ url()->previous() }}" class="back-button">Back</a>
        <p><strong>Asterisk<span class="required">*</span></strong> Indicates a required field.</p>
            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name<span class="required">*</span></span>
                        <input type="text" name="name" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <span class="details">Username<span class="required">*</span></span>
                        <input type="text" name="username" placeholder="Enter your username">
                    </div>
                    <div class="input-box">
                        <span class="details">Email<span class="required">*</span></span>
                        <input type="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phone_number" placeholder="Enter your number">
                    </div>
                    <div class="input-box">
                        <span class="details">Password<span class="required">*</span></span>
                        <input type="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm <span class="required">*</span></span>
                        <input type="password" name="password_confirmation" placeholder="Confirm your password">
                    </div>
                 
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1" value="male">
                    <input type="radio" name="gender" id="dot-2" value="female">
                    <input type="radio" name="gender" id="dot-3" value="prefer not to say">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>

                <p>Select the type of recipe you prefer to see to personalize according to your preference</p>

                <div class="gender-details">
                <span class="gender-title">Cuisine</span>
                <div class="checkboxes">
        <div class="checkbox">
            <input type="checkbox" id="cuisine-indian" name="cuisine[]" value="Indian">
            <label for="cuisine-indian">Indian</label>
        </div>

        <div class="checkbox">
            <input type="checkbox" id="cuisine-chinese" name="cuisine[]" value="Chinese">
            <label for="cuisine-chinese">Chinese</label>
        </div>

        <div class="checkbox">
            <input type="checkbox" id="cuisine-italian" name="cuisine[]" value="Italian">
            <label for="cuisine-italian">Italian</label>
        </div>

        <div class="checkbox">
            <input type="checkbox" id="cuisine-european" name="cuisine[]" value="European">
            <label for="cuisine-european">European</label>
        </div>
    </div>
    </div>

    <div class="gender-details">
    <span class="gender-title">Recipe Type</span>
    <div class="checkboxes">
        <div class="checkbox">
            <input type="checkbox" id="recipe-breakfast" name="recipe_type[]" value="Breakfast">
            <label for="recipe-breakfast">Breakfast</label>
        </div>

        <div class="checkbox">
            <input type="checkbox" id="recipe-lunch" name="recipe_type[]" value="Lunch">
            <label for="recipe-lunch">Lunch</label>
        </div>

        <div class="checkbox">
            <input type="checkbox" id="recipe-dinner" name="recipe_type[]" value="Dinner">
            <label for="recipe-dinner">Dinner</label>
        </div>

        <div class="checkbox">
            <input type="checkbox" id="recipe-dessert" name="recipe_type[]" value="Dessert">
            <label for="recipe-dessert">Dessert</label>
        </div>
    </div>
</div>
                    


                  
                
                <div class="button">
                    <input type="submit" value="Register">
                </div>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

@endif
            </form>
        </div>
    </div>
</body>
</html>
