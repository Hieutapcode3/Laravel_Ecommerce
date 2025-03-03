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
      label{
        display: inline-block;
        width: 200px;
        padding: 20px;
      }
      .product-img{
        display: unset;
      }
      form label{
        font-size: 22px;
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
            <h2>Update Product</h2>
            <div class="div_deg">
            <?php
                $productId = secure_url('/edit_product/' . $data->id);
            ?>
                <form action="<?php echo $productId; ?>" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{$data->title}}">
                    </div>
                    <div>
                        <label for="">Price</label>
                        <input type="text" name="price" value="{{$data->price}}">
                    </div>
                    <div>
                        <label for="">Quantity</label>
                        <input type="text" name="quantity" value="{{$data->quantity}}">
                    </div>
                    <div>
                        <label for="">Category</label>
                        <select name="category" id="">
                            @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Current Image</label>
                        <img class="product-img" src="/products/{{$data->image}}" alt="">
                    </div>
                    <div>
                        <label for="">New Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="Update Product">
                    </div>
                </form>
            </div>
          </div>
      </div>
    </div>
    @include('admin.scripts')
  </body>
</html>