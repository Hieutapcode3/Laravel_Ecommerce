<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <form class="form-search" action="product_search" method="get">
            <div class="input-group">
              <input type="text" name="search" autocomplete="off" class="input" required>
              <label class="user-label">Search Product</label>
            </div>
            <input type="submit" class="btn btn-secondary" value="Search">
          </form>
          <div class="div_deg">
            <table class="table_deg">
              <tr>
                <th class="col-small">Product Title</th>
                <th class="col-small">Category</th>
                <th class="col-small">Price</th>
                <th class="col-small">Quantity</th>
                <th class="col-large">Image</th>
                <th class="col-small">Edit</th>
                <th class="col-small">Delete</th>
              </tr>
              @foreach($product as $products)
              <tr>
                <td>{{$products->title}}</td>
                <td>{{$products->category}}</td>
                <td>{{$products->price}} 
                  <span 
                    style="
                        position: relative;
                        top: -9px;
                        font-size: 10px;
                        right: 4px;"
                  >đ</span>
                </td>
                <td>{{$products->quantity}}</td>
                <td>
                  <img class="product-img" src="products/{{$products->image}}" alt="">
                </td>
                <?php
                    $updateUrl = url('/update_product/' . $products->id);
                    $deleteUrl = url('/delete_product/' . $products->id);
                ?>
                <td>
                  <a class="btn btn-success" href="<?php echo $updateUrl; ?>">Edit</a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="<?php echo $deleteUrl; ?>">Delete</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
          <div class="div_deg">
            {{$product->onEachSide(1)->links()}}
          </div>
        </div>
      </div>
    </div>
    @include('admin.scripts')
  </body>
</html>
