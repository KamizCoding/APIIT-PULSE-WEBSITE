<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @include('css')
    <style type="text/css">
       .displaytitle{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 50px;
       }

       .displaytable{
        border: 1px solid white;
        width: 80%;
        text-align: center;
        margin-left: 70px;
       }

       .titlerow{
        background-color:grey;
       }

       .postpic{
        height: 100px;
        width: 150px;
        padding: 10px;
       }

       .alert{
            margin-top: 50px;
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

            <div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
            </div>

            @endif

            <h1 class="displaytitle">Blog Users</h1>

            <table class="displaytable">

                <tr class="titlerow">
                    <th>User ID</th>

                    <th>User Name</th>

                    <th>User Email</th>

                    <th>User Type</th>

                    <th>Delete User</th>

                </tr>

                @foreach ($post as $post)
                <tr>
                    <td>{{ $post->id }}</td>

                    <td>{{ $post->name }}</td>

                    <td>{{ $post->email }}</td>

                    <td>{{ $post->usertype }}</td>

                    <td>

                        <a onclick="return confirm('Are you sure about deleting this user??')" href="{{ url('delete_user', $post->id) }}" class="btn btn-danger">Delete User</a>

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
