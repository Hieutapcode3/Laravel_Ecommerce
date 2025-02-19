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
        <h1> Users Table </h1>
          <form class="form-search" action="user_search" method="get">
            <div class="input-group">
              <input type="text" name="search" autocomplete="off" class="input" required>
              <label class="user-label">Search User Name</label>
            </div>
            <input type="submit" class="btn btn-secondary" value="Search">
          </form>
          <div class="div_deg">
            <table class="table_deg">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>UserType</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              @foreach($users as $user)
              <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->usertype}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <?php
                    $updateUrl = url('/edit_user/' . $user->id);
                    $deleteUrl = url('/delete_user/' . $user->id);
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
            {{$users->onEachSide(1)->links()}}
          </div>
        </div>
      </div>
    </div>
    @include('admin.scripts')
  </body>
</html>