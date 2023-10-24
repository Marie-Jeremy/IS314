<!DOCTYPE html>
<html>
<head>
    <title>Recipe PDF</title>
</head>
<body>
    <h1>{{ $recipe->title }}</h1>
   
    <p>{{ $recipe->short_description }}</p>

    <table style="width: 100%;">
        <tr>
            <td><strong>Servings:</strong> {{ $recipe->servings }}</td>
            <td><strong>Prep Time:</strong> {{ $recipe->prep_time }}</td>
            <td><strong>Cook Time:</strong> {{ $recipe->cook_time }}</td>
            <td><strong>Ready In:</strong> {{ $recipe->ready_in }}</td>
        </tr>
    </table>

    <img src="{{ $imagePath }}" alt="Recipe Image" style="max-width: 700px; max-height: 500px;"/>

    <table style="width: 100%;">
        <tr>
            <td><strong>Cuisine:</strong> {{ $recipe->cuisine }}</td>
            <td><strong> Recipe Type:</strong> {{ $recipe->recipe_type }}</td>
            <td><strong>Skill Level:</strong> {{ $recipe->skill }}</td>
        </tr>
    </table>

    <h2>Ingredients</h2>
@foreach(json_decode($recipe->ingredients) as $index => $ingredient)
    <div>
        <input type="checkbox" id="ingredient_{{ $index }}" name="ingredients[]" value="{{ $ingredient }}">
        <label for="ingredient_{{ $index }}">{{ $ingredient }}</label>
    </div>
@endforeach

    <h2>Steps</h2>
@foreach(json_decode($recipe->steps) as $index => $step)
    <div>
        <input type="checkbox" id="step_{{ $index }}" name="steps[]" value="{{ $step }}">
        <label for="step_{{ $index }}"><strong>Step {{ $index + 1 }}:</strong> {{ $step }}</label>
    </div>
@endforeach

    <!-- Add more details as needed -->
</body>
</html>

