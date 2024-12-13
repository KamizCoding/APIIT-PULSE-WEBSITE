<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('sidebar')
      <!-- partial -->
      @include('header')
        <!-- partial -->
      @include('body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('script')
    <!-- End custom js for this page -->
  </body>
</html>