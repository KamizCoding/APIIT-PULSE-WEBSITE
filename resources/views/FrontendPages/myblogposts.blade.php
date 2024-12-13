@extends('layouts.primarylayout')
@push('mystyle')
<style type="text/css">
    .myposttable {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 800px;
        padding: 30px;
        margin: 2% auto;
        text-align: center;
    }

    .posthdg {
        font-size: 30px;
        font-weight: bold;
        padding: 15px;
        color: #0224a1;
    }

    .postabt {
        font-size: 18px;
        font-weight: 600;
        padding: 15px;
        color: #555;
    }

    .mypostpic {
        height: 200px;
        width: 300px;
        padding: 15px;
        margin: auto;
        border-radius: 10px;
        object-fit: cover;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

   
    .top-section-area {
        background: url('/img/f4.jpg') no-repeat center center/cover;
        padding: 60px 0;
    }

    .top-section-area h1 {
        font-size: 36px;
        font-weight: bold;
    }

    .top-section-area ul {
        padding: 0;
        list-style: none;
        display: flex;
    }

    .top-section-area ul li {
        margin-right: 10px;
        color: white;
    }

    .top-section-area ul li a {
        color: white;
        text-decoration: none;
    }

    .top-section-area ul li span {
        color: white;
        margin-left: 5px;
    }
</style>
@endpush

@section('content')
@include('sweetalert::alert')
<section class="top-section-area section-gap">
    <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">
                <h1 class="text-white mb-20">My Post Details</h1>
                <ul>
                    <li><a href="/">Home</a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="/myblogposts">My Blog Posts</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="post-section">
    @foreach ($post as $post)
    <div class="myposttable">
        <img src="/blogpostpic/{{ $post->picture }}" alt="{{ $post->heading }}" class="mypostpic">
        <h4 class="posthdg">{{ $post->heading }}</h4>
        <p class="postabt">{{ $post->about }}</p>
        <a onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-danger" href="{{ url('delete_my_blog_post', $post->id) }}">Delete Post</a>
        <a href="{{ url('my_post_update', $post->id) }}" class="btn btn-primary">Update</a>
    </div>
    @endforeach
</section>
@endsection
