@extends('layouts.primarylayout')
@push('mystyle')
<style>
    .post-item {
        margin-bottom: 40px; /* Increase space between posts for better readability */
        border-bottom: 1px solid #ddd; /* Add a bottom border to separate posts */
        padding-bottom: 20px;
    }
    #main_topic {
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        margin-top: 15%;
        padding: 50px;
        color: #fff; /* Ensure text is visible on a dark background */
        background-color: rgba(0, 0, 0, 0.5); /* Add a semi-transparent background */
    }

    #topic_link {
        margin-top: 6%;
        margin-bottom: 1%;
        font-size: 24px; /* Make the heading larger for emphasis */
        color: #333; /* Darker color for better contrast */
        text-decoration: none; /* Remove underline */
    }
    
    #topic_link:hover {
        text-decoration: underline; /* Underline on hover */
        color: #d9534f; /* Change color on hover */
    }

    #textcol {
        color: white;
    }

    .newpostpic {
        width: 100%; /* Make images responsive */
        height: auto;
        border-radius: 5px; /* Add slight rounding to image corners */
        margin-top: 10px;
    }

    .btn-secondary {
        background-color: #d9534f; /* Change button color to match theme */
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-align: center;
        margin-top: 10px;
    }

    .btn-secondary a {
        color: #fff; /* Ensure the link text is white */
        text-decoration: none;
    }

    .btn-secondary:hover {
        background-color: #c9302c; /* Darker shade on hover */
    }

    .container {
        padding-top: 30px;
    }

    h1 {
        font-size: 36px; /* Increase the main heading size */
        color: #333; /* Darker color for main heading */
        margin-bottom: 40px;
    }

    p {
        font-size: 16px; /* Set a standard font size for paragraphs */
        color: #666; /* Slightly lighter text color for paragraphs */
    }
</style>
@endpush

@section('content')

<!-- Start category Area -->
<section class="category-area section-gap" id="news">
    <div class="container">
        <div class="row d-flex justify-content-center">

            <h1>Search Results for "{{ $query }}"</h1>

            @if ($posts->count() > 0)
                @foreach ($posts as $post)

                <div class="post-item">
                    <h2 id="topic_link"><a href="{{ url('expandpost', $post->id) }}">{{ $post->heading }}</a></h2>
                    <img src="/blogpostpic/{{ $post->picture }}" alt="" class="newpostpic">
                    <p>{{ Str::limit($post->about, 150) }}</p>
                    <div class="btn btn-secondary"><a id="textcol" href="{{ url('expandpost', $post->id) }}">Read More</a></div>
                </div>
                @endforeach

                {{ $posts->links() }}
            @else
                <p>No posts found for your search query.</p>
            @endif
        </div>
    </div>
</section>
<!-- End category Area -->
@endsection
