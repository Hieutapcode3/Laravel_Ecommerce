<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      input[type='text']
      {
        width: 400px;
        height: 50px;
      }
      .div_deg{
          display:flex;
          justify-content: center;
          align-items:center;
          margin: 30px;
      }
      .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 50px;
        width:100%;
      }
      th{
        text-align: center;
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
      }
      td{
        color: white;
        padding: 10px;
        border: 1px solid yellowgreen;
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
            <h1 style="color: white; text-align:center" > Add Category </h1>
            <div class="div_deg">
                <form action="add_category" method="post">
                @csrf
                    <div>
                        <input type="text" name="category">
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </div>
                </form>
            </div>
            <div>
              <table class="table_deg">
                <tr>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach($data as $data)
                <tr>
                  <td>{{$data->category_name}}</td>
                  <td>
                  <?php
                    $dataId = $data->id; 
                    $deleteUrl = '/edit_category/' . $dataId;
                    ?>
                    <a class="btn btn-success" href="<?php echo $deleteUrl; ?>">Edit</a>
                  </td>
                  <td>
                    <?php
                    $dataId = $data->id; 
                    $deleteUrl = '/delete_category/' . $dataId;
                    ?>
                    <a class="btn btn-danger" onclick="confirmation(event)" href="<?php echo $deleteUrl; ?>">Delete</a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script>
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal ({
          title: "Are you Sure to Delete",
          text: "This delete will be parmanent",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willCancle) => {
          if(willCancle){
            window.location.href = urlToRedirect;
          }
        })
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