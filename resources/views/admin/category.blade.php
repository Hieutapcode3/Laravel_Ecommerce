<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1> Add Category </h1>
            <div class="div_deg">
                <form class="input-category" action="add_category" method="post">
                @csrf
                <div class="input-group">
                  <input type="text" name="category" autocomplete="off" class="input" required>
                  <label class="user-label">Enter Category</label>
                </div>
                <input class="btn btn-primary" type="submit" value="Add Category">
                </form>
            </div>
            <div style="display: flex; justify-content: center;">
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
    @include('admin.scripts')
  </body>
</html>