@extends('layouts.primarylayout')

@push('mystyle')
<style type="text/css">
.top-section-area {
        background: #2e2972;
        color: white;
        padding: 50px 0;
    }
    
    .title {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.9);
    }

    .form_cont {
        background-color: rgba(255, 255, 255, 0.633);
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        width: 100%;
        padding-left: 10px;
        padding-right: 10px;
        max-width: 800px;
        margin: 1%;
        text-align: left;
    }

    .updatetable {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
        color: red;
    }

    input[type="text"], textarea, input[type="file"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    textarea {
        height: 100px;
    }

    .mypostpic {
        height: 200px;
        width: 300px;
        padding: 10px;
    }

    .btn_sub {
        position: relative;
        margin-left: 40%;
        padding: 10px 50px;
        border: none;
        border-radius: 7px;
        background: #0224a1;
        color: white;
        font-size: 16px;
        cursor: pointer;
        overflow: hidden;
        transition: background 0.3s ease;
    }

    .btn_sub:hover {
        background: #011b7e;
    }

    .btn_sub .transition {
        position: absolute;
        top: 0;
        left: 0;
        width: 300%;
        height: 300%;
        background: rgba(2, 36, 161, 0.722);
        transition: transform 0.5s ease;
    }

    .btn_sub:hover .transition {
        transform: scale(1.2);
    }

    .btn_sub .label {
        position: relative;
        z-index: 1;
    }

    .alert {
        margin-top: 50px;
    }

    .updatetitle {
        margin-bottom: 20px;
    }

    .post_t {
        font-weight: bold;
        color: #0224a1;
    }

    .banner-area {
        background: url('/img/main.jpeg') no-repeat center center/cover;
        background-attachment: scroll;
    }
</style>
@endpush

<base href="/public">

@section('content')
@include('sweetalert::alert')
<section class="top-section-area section-gap">
    <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">
                <h1 class="text-white mb-20">Post Details</h1>
                <ul>
                    <li><a href="/">Home</a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="/myblogposts">My Blog Post</a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="/postupdate">Update</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="banner-area" id="home">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
            <div class="form_cont">
                <h1 class="title">Update Your Post</h1>
                <form action="{{ url('update_user_post', $update->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="updatetable">
                        <label class="post_t">Post Heading</label>
                        <input type="text" name="heading" value="{{ $update->heading }}">
                    </div>
                    <div class="updatetable">
                        <label class="post_t">Post About</label>
                        <textarea name="about">{{ $update->about }}</textarea>
                    </div>
                    <div class="updatetable">
                        <label class="post_t">Current Picture</label>
                        <img src="/blogpostpic/{{ $update->picture }}" alt="" class="mypostpic">
                    </div>
                    <div class="updatetable">
                        <label class="post_t">New Picture</label>
                        <input type="file" name="picture">
                    </div>
                    <div class="updatetable">
                        <button class="btn_sub" type="submit">
                            <span class="transition"></span>
                            <span class="label">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
