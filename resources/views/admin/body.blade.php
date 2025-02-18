<h2 class="h5 no-margin-bottom">New Order</h2>
</div>
</div>
<form class="form-search" action="order_search" method="get">
    <div class="input-group">
        <input type="text" name="search" autocomplete="off" class="input" required>
        <label class="user-label">Search User Name Order</label>
    </div>
    <input type="submit" class="btn btn-secondary" value="Search">
</form>
<div class="div_deg">
    <table class="table_deg" style="width: 90%;">
        <tr>
            <th class="col-small">Receiver Name</th>
            <th class="col-small">Receiver Address</th>
            <th class="col-small">Receiver Phone</th>
            <th class="col-small">Product</th>
            <th class="col-small">Price</th>
            <th class="col-large">Image</th>
            <th class="col-small">State</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->name}}</td>
            <td>{{$order->rec_address}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->product->title}}</td>
            <td>{{$order->product->price}}<span 
                    style="
                        position: relative;
                        top: -9px;
                        font-size: 12px;
                        right: 0px;"
                  >đ</span></td>
            <td>
                <img class="product-img" src="products/{{$order->product->image}}" alt="">
            </td>
            <td>{{$order->status}}</td>
            <?php
                $deleteUrl = url('/delete_order/' . $order->id);
            ?>
        </tr>
        @endforeach
    </table>
</div>
<div class="div_deg">
    {{$orders->onEachSide(1)->links()}}
</div>
