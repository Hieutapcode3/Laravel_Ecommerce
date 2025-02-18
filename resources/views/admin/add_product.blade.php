<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
    .div_deg {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 40px;
      background: #ffffffc9;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      width: 80%;
      margin-left: auto;
      margin-right: auto;
    }
    .product-form{
      width: 100%;
    }
    .input_deg {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      margin-bottom: 15px;
    }
    .input_deg label {
      font-size: 24px;
      color: black;
    }
    .input_deg:last-child {
      justify-content: end;
    }
    label {
      width: 40%;
      font-size: 16px;
      font-weight: bold;
      color: #333;
    }

    input[type='text'], 
    input[type='number'], 
    select {
      width: 55%;
      height: 40px;
      padding: 5px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="file"] {
      width: 55%;
      width: 55%;
      height: 40px;
      line-height: 34px;
      border: none;
    }

    textarea {
      width: 55%;
      height: 80px;
      padding: 5px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .btn-success {
      height: 45px;
      font-size: 16px;
      background-color: #28a745;
      border: none;
      border-radius: 5px;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    .btn-success:hover {
      background-color: #218838;
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
                <form class="product-form" action="upload_product" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="input_deg">
                        <label for="">Product Title</label>
                        <input type="text" name="title">
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
    @include('admin.scripts')
  </body>
</html>