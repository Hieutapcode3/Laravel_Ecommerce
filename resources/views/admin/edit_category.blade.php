<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style>
    .div_deg{
        display: flex;
        justify-content: center;
        align-item: center;
        margin: 60px;
    }
    input[type='text']{
        width: 400px;
        height: 40px;
    }
  </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1 style="color: white; text-align:center">Update Category</h1>
            <div class="div_deg">
                <?php
                    $dataId = $data->id; 
                    $deleteUrl = '/update_category/' . $dataId;
                ?>
                <form action="<?php echo $deleteUrl; ?>" method="post">
                @csrf
                    <input type="text" name="category" value="{{$data->category_name}}">
                    <input type="submit" class="btn btn-primary" value="Update Category">
                </form>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="../admincss/vendor/jquery/jquery.min.js"></script>
    <script src="../admincss/vendor/popper.js/umd/popper.min.js"></script>
    <script src="../admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../admincss/vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="../admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="../admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../admincss/js/charts-home.js"></script>
    <script src="../admincss/js/front.js"></script>
  </body>
</html>