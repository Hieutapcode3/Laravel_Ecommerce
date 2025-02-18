<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .container-order {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 40px;
        width: 80%;
        margin: 60px auto;
    }

    .table-container {
        width: 75%;
    }

    .order-form {
        width: 25%;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    table {
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    th, td {
        border: 1px solid skyblue;
        padding: 12px;
    }

    th {
        background-color: black;
        color: white;
    }

    .product-img {
        width: 150px;
        height: 100px;
        object-fit: cover;
    }

    .total-row td {
        font-weight: bold;
        text-align: center;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"], input[type="number"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-submit {
        width: 100%;
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }


  </style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')
  </div>
  <div class="container-order">
    <div class="table-container">
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Delete</th>
            </tr>
            <?php $value = 0; ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}<span 
                    style="
                        position: relative;
                        top: -9px;
                        font-size: 10px;
                        right: 0px;"
                  >đ</span></td>
                <td><img class="product-img" src="products/{{$cart->product->image}}" alt=""></td>
                <td>
                    <a class="btn btn-danger" onclick="confirmation(event)" href="/delete_cart/{{$cart->id}}">Delete</a>
                </td>
                <?php $value += $cart->product->price; ?>
            </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="2">Total:</td>
                <td colspan="2">{{$value}}<span 
                    style="
                        position: relative;
                        top: -9px;
                        font-size: 10px;
                        right: 0px;"
                  >đ</span></td>
            </tr>
        </table>
    </div>

    <div class="order-form">
        <form action="confirm_order" method="post">
          @csrf
            <div class="form-group">
                <label for="">Receiver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label for="">Receiver Address</label>
                <input type="text" name="address" value="{{Auth::user()->address}}">
            </div>
            <div class="form-group">
                <label for="">Receiver Phone</label>
                <input type="number" name="phone" value="{{Auth::user()->phone}}">
            </div>
            <button class="btn-submit" type="submit">Order</button>
        </form>
    </div>
  </div>



  @include('home.footer')
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
</body>

</html>