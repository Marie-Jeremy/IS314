@extends('layouts.app') <!-- Extend your main layout, adjust as needed -->

@section('content')
    <div class="container">
        <h1>Community Forum</h1>

        <!-- Categories or Sections -->
        <div class="forum-sections">
            <!-- Display a list of forum categories or sections -->
            <div class="forum-section">
                <h2>Category 1</h2>
                <p>Description of Category 1</p>
                <!-- List of topics within this category -->
                <ul>
                    <li><a href="{{ route('topics.show', 1) }}">Topic 1</a></li>
                    <li><a href="{{ route('topics.show', 2) }}">Topic 2</a></li>
                    <!-- Add more topics as needed -->
                </ul>
            </div>

            <!-- Add more forum sections (categories) as needed -->
        </div>

        <!-- Latest Forum Topics -->
        <div class="latest-topics">
            <h2>Latest Topics</h2>
            <ul>
                <li><a href="{{ route('topics.show', 3) }}">Topic 3</a></li>
                <li><a href="{{ route('topics.show', 4) }}">Topic 4</a></li>
                <!-- Add more latest topics as needed -->
            </ul>
        </div>
    </div>
@endsection
