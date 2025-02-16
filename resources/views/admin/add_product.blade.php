<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      .div_deg {
        display: flex;
        justify-content: center;
        align-item:center;
        margin-top: 60px;
      }
      h1{
        text-align: center;
        color: white;
      }
      label{
        display: inline-block;
        width: 250px;
        font-size: 18px !important;
        color: white !important;
      }
      input[type='text']{
        width: 350px;
        height: 50px;
      }
      textarea {
        width: 450px;
        height: 80px;
      }
      .input_deg{
        padding: 15px;

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
            <h1>Add Product</h1>
            <div class="div_deg">
                <form action="upload_product" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="input_deg">
                        <label for="">Product Title</label>
                        <input type="text" name="title">
                    </div>
                    <div class="input_deg">
                        <label for="">Description</label>
                        <textarea name="description" required></textarea>
                    </div>
                    <div class="input_deg">
                        <label for="">Price</label>
                        <input type="number" name="price">
                    </div>
                    <div class="input_deg">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity">
                    </div>
                    <div class="input_deg">
                        <label for="">Product category</label>
                        <select name="category" required>
                          <option>Select a option</option>
                            @foreach($category as $category)
                              <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input_deg">
                        <label for="">Product Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="input_deg">
                        <input class="btn btn-success" type="submit" value="Add Product">
                    </div>
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