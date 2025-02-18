<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style>
    form {
      display: flex;
      justify-content: center;
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
            <h1>Update Category</h1>
            <div class="div_deg">
                <?php
                    $dataId = $data->id; 
                    $deleteUrl = '/update_category/' . $dataId;
                ?>
                <form action="<?php echo $deleteUrl; ?>" method="post">
                @csrf
                  <div class="input-group">
                      <input type="text" name="category" autocomplete="off" class="input" required>
                      <label class="user-label">{{$data->category_name}}</label>
                  </div>
                    <input type="submit" class="btn btn-primary" value="Update Category">
                </form>
            </div>
          </div>
      </div>
    </div>
    @include('admin.scripts')
  </body>
</html>