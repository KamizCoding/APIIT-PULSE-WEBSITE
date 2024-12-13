@extends('layouts.primarylayout')
<base href="/public">
@push('mystyle')
<style>
    body {
        font-family: 'Roboto', sans-serif;
        color: #333;
    }

    #social-links ul li {
        margin-top: 30px;
        display: inline-block;
    }

    #social-links ul li a {
        padding: 10px;
        margin: 2px;
        font-size: 24px;
        color: #2e2972;
        background-color: #eee;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    #social-links ul li a:hover {
        background-color: #2e2972;
        color: white;
    }

    .like-button {
        display: inline-block;
        cursor: pointer;
        margin-left: 2%;
        font-size: 20px;
        font-weight: 500;
        color: #2e2972;
        background-color: #f0f0f0;
        padding: 8px 15px;
        border-radius: 5px;
        transition: all 0.3s ease;
        border: none;
    }

    .like-button:hover {
        background-color: #2e2972;
        color: white;
    }

    .img {
        margin-top: 2%;
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .comments {
        margin-left: 1%;
        margin-top: 1%;
    }

    #t1 {
        margin-left: 1.7%;
        font-size: 1rem;
        color: #2e2972;
    }

    .top-section-area {
        background: #2e2972;
        color: white;
        padding: 50px 0;
    }

    .top-section-area h1 {
        font-size: 36px;
        margin-bottom: 20px;
        font-weight: 700;
        text-align: left;
    }

    .top-section-area ul {
        list-style: none;
        padding: 0;
    }

    .top-section-area ul li {
        display: inline;
        font-size: 16px;
        margin-right: 10px;
    }

    .top-section-area ul li a {
        color: white;
        text-decoration: none;
    }

    .top-section-area ul li span {
        margin-left: 5px;
    }

    .date {
        color: #777;
        font-size: 14px;
        margin-top: 10px;
    }

    .post-details {
        margin: 3% auto;
        width: 80%;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .post-details h2 {
        font-size: 28px;
        font-weight: 600;
        margin-top: 20px;
        color: #2e2972;
    }

    .post-details h4 {
        text-align: justify;
        font-size: 17px;
        font-weight: 400;
        color: #555;
        line-height: 1.6;
        margin-top: 20px;
    }

    .post-details p {
        font-size: 16px;
        color: #666;
        margin-top: 10px;
    }

    .post-details p b {
        color: #2e2972;
    }
</style>
@endpush

@section('content')

<!-- Start top-section Area -->
<section class="top-section-area section-gap">
    <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">
                <h1 class="text-white mb-20">Post Details</h1>
                <ul>
                    <li><a href="/">Home</a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="/blog">Blog</a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="{{ url('expandpost', $post->id) }}">Read More</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End top-section Area -->

<div class="post-details">
    <img class="img" src="/blogpostpic/{{ $post->picture }}" alt="" class="newpostpic">
    <p class="date">{{ $post->created_at }}</p>
    <h2><b>{{ $post->heading }}</b></h2>
    <br>
    <h4>{{ $post->about }}</h4>
    <p>Posted by <b>{{ $post->name }}</b></p>

    {!! $sharebuttons !!}

</div>

<br>
<div class="comments">
    @if (Auth::check())
        @if (!$post->likedBy(Auth::user()))
            <form action="{{ route('post.like', $post) }}" method="POST">
                @csrf
                <button class="like-button" type="submit">Like</button>
            </form>
        @else
            <form action="{{ route('post.unlike', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="like-button" type="submit">Unlike</button>
            </form>
        @endif
    @else
        <a id="t1" href="{{ route('login') }}">Like</a>
    @endif
    <div style="width: 70%">
        <livewire:comments :model="$post"/>
    </div>
</div>

@endsection
