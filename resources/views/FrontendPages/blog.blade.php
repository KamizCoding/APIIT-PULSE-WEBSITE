@extends('layouts.primarylayout')
@push('mystyle')
<style>
    .search-box {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .search-box input[type="text"] {
        width: 50%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px 0 0 5px;
        font-size: 16px;
    }

    .search-box button {
        padding: 10px 20px;
        border: none;
        background-color:gray;
        color: white;
        font-size: 16px;
        cursor: pointer;
        border-radius: 0 5px 5px 0;
    }

    .search-box button:hover {
        background-color: #011b7e;
    }

    .title.text-center {
        margin-bottom: 40px;
    }

    .topich {
        font-weight: bold;
        font-size: 30pt;
        color: #0224a1;
    }

    .about {
        font-size: 17px;
        text-align: center;
        color: #555;
    }

    .single-cat {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        margin: 20px;
        padding: 20px;
        text-align: center;
        width: 100%;
        max-width: 400px;
        transition: transform 0.3s;
    }

    .single-cat:hover {
        transform: translateY(-10px);
    }

    .postpic {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }

    .date {
        color: #000;
        margin-top: 1px;
        font-size: 9px;
        margin-left: -1%;
    }

    .topic {
        font-weight: bold;
        font-size: 18px;
        margin-top: 10px;
    }

    .btn-secondary {
        background-color: gray;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
        transition: background 0.3s;
    }

    .btn-secondary:hover {
        background-color: #011b7e;
    }

    .pagination {
        justify-content: center;
        margin-top: 30px;
    }

    .pagination .page-item .page-link {
        color:black;
        border: none;
        background-color: transparent;
    }

    .pagination .page-item.active .page-link {
        background-color: gray;
        border-color: #0224a1;
    }
</style>
@endpush

@section('content')
    <form action="{{ url('search') }}" method="GET">
        <div class="search-box">
            <input type="text" name="query" placeholder="Search for posts...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <!-- Start category Area -->
    <section class="category-area section-gap" id="news">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="topich">Latest Posts</h1>
                        <br>
                        <p class="about">Welcome to the APIIT Student Blog, where you can find exciting updates and insights from our vibrant student community.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($post as $newpost)
                    <div class="col-md-4 col-sm-6">
                        <div class="item single-cat">
                            <img src="/blogpostpic/{{ $newpost->picture }}" alt="" class="postpic">
                            <p class="date">{{ $newpost->created_at->format('F d, Y') }}</p>
                            <h4 class="topic">{{ $newpost->heading }}</h4>
                            <p>Posted by <b>{{ $newpost->name }}</b></p>
                            <a href="{{ url('expandpost', $newpost->id) }}" class="btn btn-secondary">Read More</a>
                        </div>
                    </div>
                @endforeach

                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        {!! $post->withQueryString()->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End category Area -->
@endsection
