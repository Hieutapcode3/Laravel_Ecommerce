<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
      .div_deg {
        display: flex;
        justify-content: center;
        margin-top: 40px;
      }
      .table_deg {
        width: 100%;
        background-color: #ffffffc9;
        border-radius: 10px;
        box-shadow: 6px 7px 8px 0px rgba(255, 255, 255, 0.5);
        overflow: hidden;
      }
      th, td {
        text-align: center;
        padding: 12px;
        font-size: 18px;
      }
      th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
      }
      td {
        border-bottom: 1px solid #ddd;
        color: black;
      }
      .product-img {
        width: 250px;
        height: 150px;
        object-fit: cover;
        display: block;
        margin: auto;
      }
      tr {
        border-bottom: 2px solid #00000047;
      }
      tr:hover {
        background-color: #f1f1f1;
      }
      input[type="search"] {
        width: 500px;
        height: 50px;
        margin: 20px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
      }
      .btn {
        padding: 8px 12px;
        border-radius: 5px;
        text-decoration: none;
      }
      .btn-success {
        background-color: #28a745;
        color: white;
      }
      .btn-danger {
        background-color: #dc3545;
        color: white;
      }
      .col-small {
        width: 12%;
      }
      .form-search{
        align-items: center;
        justify-content: center;
        display: flex;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <form class="form-search" action="product_search" method="get">
            <input type="search" name="search" placeholder="Search products...">
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
                <td>{{$products->price}}</td>
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
    <script>
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
          title: "Are you Sure to Delete?",
          text: "This action cannot be undone.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if(willDelete){
            window.location.href = urlToRedirect;
          }
        });
      }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
