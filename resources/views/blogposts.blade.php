<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('css')
    <style type="text/css">
        .post_heading {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            margin: 50px 0;
        }

        .posttable {
            text-align: left;
            padding: 10px 30px;
            margin: 0 auto;
            max-width: 600px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .alert {
            margin-top: 50px;
        }

        .field, .posttable input[type="text"], .posttable textarea, .posttable input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .field {
            background-color: #333;
            color: white;
            border: 1px solid #333;
        }

        .posttable input[type="text"][name="heading"] {
            background-color: #333;
            color: white;
            border: 1px solid #333;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('sidebar')
      <!-- partial -->
      @include('header')     
      <!-- partial -->
        <div class="content-wrapper">

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
            @endif

            <h1 class="post_heading">Blog Posts</h1>
            <div>
                <form action="{{ url('new_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="posttable">
                        <label>Post Heading</label>
                        <input type="text" name="heading">
                    </div>
                    <div class="posttable">
                        <label>Post Description</label>
                        <textarea name="about" class="field"></textarea>
                    </div>
                    <div class="posttable">
                        <label>Include Picture</label>
                        <input type="file" name="picture">
                    </div>
                    <div class="posttable">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('script')
    <!-- End custom js for this page -->
  </body>
</html>
