<section class="shop_section layout_padding">
    <div class="container">
      <div class="row">
        @foreach($product as $products)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
              <div class="img-box">
                <img src="products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$products->title}}</h6>
                <h6>Price<span>{{$products->price}}</span></h6>
              </div>
              <?php
                $productID = $products->id; 
                $url = '/add_cart/' . $productID;
              ?>
              <div>
                <a class="btn btn-primary" href="<?php echo $url; ?>">Add to Cart</a>
              </div>
          </div>
        </div>
        @endforeach
    </div>
  </section>