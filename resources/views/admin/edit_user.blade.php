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
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2>Edit User</h2>
          <div class="div_deg">
          <?php
                $userID = secure_url('/update_user/' . $data->id);
            ?>
            <form action="<?php echo $userID; ?>" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{$data->name}}">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{$data->email}}">
                </div>
                <div>
                    <label for="">Phone</label>
                    <input type="text" name="phone" value="{{$data->phone}}">
                </div>
                <div>
                    <label for="">Address</label>
                    <input type="text" name="address" value="{{$data->address}}">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="text" name="password" value="*********">
                </div>
                <div>
                    <label for="">User Type</label>
                    <select name="user_type">
                        <option value="user" {{$data->user_type == 'user' ? 'selected' : ''}}>User</option>
                        <option value="admin" {{$data->user_type == 'admin' ? 'selected' : ''}}>Admin</option>
                    </select>
                </div>
                <div>
                    <input class="btn btn-success" type="submit" value="Update User">
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('admin.scripts')
  </body>
</html>