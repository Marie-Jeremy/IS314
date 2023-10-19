<!DOCTYPE html>
<html>
<head>
    <title>Recipe PDF</title>
</head>
<body>
    <h1>{{ $recipe->title }}</h1>
    <p>{{ $recipe->content }}</p>
    <p>Steps{{ $recipe->steps }}</p>
    <p>Ingredients{{ $recipe->ingredients }}</p>
    <!-- Add more details as needed -->
</body>
</html>
