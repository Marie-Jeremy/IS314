<!DOCTYPE html>
<html lang="en" dir="ltr">
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
                        <span class="details">Email<span class="required">*</span>
                        <input type="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phone_number" placeholder="Enter your number">
                    </div>
                    <div class="input-box">
                        <span class="details">Password<span class="required">*</span>
                        <input type="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm <span class="required">*</span>
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
