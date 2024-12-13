@extends('layouts.primarylayout')
@push('mystyle')
<style type="text/css">
  
  .top-section-area {
        background: #2e2972;
        color: white;
        padding: 50px 0;
    }

    .post_heading {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 50px;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.9);
    }

    .form_cont {
        background-color: rgba(255, 255, 255, 0.633);
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 800px;
        padding: 30px;
        margin: 2% auto;
        text-align: left;
    }

    .posttable {
        margin-bottom: 20px;
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

    .btn_sub{
        position: relative;
        margin-left: 40%;
        padding: 10px 50px;
        border: none;
        border-radius: 7px;
        background:#0224a1;
        color:white;
        font-size: 16px;
        cursor: pointer;
        overflow: hidden;
        transition: background 0.3s ease;
    }

    .btn_sub:hover {
        background:#0224a1;
    }

    .btn_sub .transition {
        position: absolute;
        display: block;
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

    .btn_sub.gradient {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:#0224a1;
        transition: opacity 0.3s ease;
    }

    .btn_sub:hover .gradient {

        background-color:black;
        color: white;
    }

    .btn_sub .label {
        position: relative;
        z-index: 1;
    }

    .alert {
        margin-top: 50px;
    }

    .post_t
    {
      font-weight: bold;
      color:#0224a1;


    }
</style>
@endpush

@section('content')
@include('sweetalert::alert')
<section class="top-section-area section-gap">
    <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">
                <h1 class="text-white mb-20">Post Details</h1>
                <ul>
                    <li><a href="/">Home</a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="/createblogpost">Create a Blog Post</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

  <!-- start banner Area -->
  <section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="img/main.jpeg">
    <div class="container">
      <div class="row fullscreen">
        <div class="container">
          <div class="row fullscreen align-items-center justify-content-center">
              <div class="form_cont">
                  <h1 class="post_heading">CREATE NEW BLOG POST</h1>
                  <form action="{{ url('new_user_post') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="posttable">
                          <label class="post_t">Post Title</label>
                          <input type="text" name="heading">
                      </div>
                      <div class="posttable">
                          <label class="post_t">Description</label>
                          <textarea name="about"></textarea>
                      </div>
                      <div class="posttable">
                          <label class="post_t">Include Picture</label>
                          <input type="file" name="picture">
                      </div>
                      <div class="posttable">
                          <button class="btn_sub" type="submit">
                              <span class="transition"></span>
                              <span class="gradient"></span>
                              <span class="label">Submit</span>
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      </div>
    </div>
  </section>
  <!-- End banner Area -->
   
</section>
<!-- End banner Area -->
@endsection
