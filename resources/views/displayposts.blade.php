
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
        @include('css')
    
        <!-- Internal CSS styling -->
        <style type="text/css">
            /* General styles */
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
            }
    
            /* Header styles */
            .displaytitle {
                font-size: 30px;
                font-weight: bold;
                text-align: center;
                padding: 50px;
                color:white;
            }
    
            /* Table styles */
            .displaytable {
                border-collapse: collapse;
                width: 80%;
                margin: 0 auto; /* Center the table */
            }
    
            .titlerow {
                background-color: #007bff; /* Blue header background */
                color: #fff;
            }
    
            /* Table cell styles */
            th, td {
                border: 1px solid #ccc;
                padding: 10px;
                text-align: center;
            }
    
            /* Post picture styles */
            .postpic {
                height: 100px;
                width: 150px;
                object-fit: cover;
                border-radius: 5px;
            }
    
            /* Alert message styles */
            .alert {
                margin-top: 20px;
                padding: 15px;
                background-color: #f44336; /* Red alert background */
                color: #fff;
                border-radius: 5px;
            }
    
            /* Close button in alert */
            .close {
                color: #fff;
                float: right;
                font-size: 20px;
                font-weight: bold;
            }
    
            /* Button styles */
            .btn {
                padding: 8px 16px;
                margin: 5px;
                cursor: pointer;
                border-radius: 5px;
                text-decoration: none;
                color: #fff;
                transition: background-color 0.3s;
            }
    
            .btn-danger {
                background-color: #dc3545; /* Red button background */
            }
    
            .btn-primary {
                background-color: #007bff; /* Blue button background */
            }
    
            .btn-outline-secondary {
                background-color: transparent;
                border: 1px solid #6c757d;
                color: #6c757d;
            }
    
            /* Hover effect for buttons */
            .btn:hover {
                background-color: #555;
            }
        </style>
    </head>
    <body>
    </body>
    </html>
    
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

            <div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
            </div>

            @endif

            <h1 class="displaytitle">All Active Posts</h1>

            <table class="displaytable">

                <tr class="titlerow">
                    <th>Post Heading</th>

                    <th>About Post</th>

                    <th>Post Creator</th>

                    <th>Status</th>

                    <th>User Type</th>

                    <th>Picture</th>

                    <th>Delete Post</th>

                    <th>Accept Post</th>

                    <th>Reject Post</th>
                </tr>

                @foreach ($post as $post)
                <tr>
                    <td>{{ $post->heading }}</td>

                    <td>{{ $post->about }}</td>

                    <td>{{ $post->name }}</td>

                    <td>{{ $post->post_status }}</td>

                    <td>{{ $post->usertype }}</td>

                    <td>

                        <img class="postpic" src="blogpostpic/{{ $post->picture }}" alt="">

                    </td>

                    <td>

                        <a onclick="return confirm('Are you sure about deleting this post??')" href="{{ url('delete_blog_post', $post->id) }}" class="btn btn-danger">Delete Post</a>

                    </td>

                    <td>

                        <a onclick="return confirm('Are you sure about accepting this post??')" href="{{ url('accept_post', $post->id) }}" class="btn btn-primary">Accept Post</a>

                    </td>

                    <td>

                        <a onclick="return confirm('Are you sure about rejecting this post??')" href="{{ url('reject_post', $post->id) }}" class="btn btn-outline-secondary">Reject Post</a>

                    </td>

                </tr>
                @endforeach
            </table>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('script')
    <!-- End custom js for this page -->
  </body>
</html>
