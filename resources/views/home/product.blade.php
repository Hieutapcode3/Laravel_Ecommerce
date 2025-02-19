<section class="shop_section layout_padding" id="product-section">
    <div class="container">
      <div class="row" id="product-list">
        @foreach($product as $products)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
              <div class="img-box">
                <img src="products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6 style="font-size: 18px;font-weight">{{$products->title}}</h6>
                <h6> <span style="font-size: 18px;font-weight; color: #101010">Price</span> <span>{{$products->price}}</span><span 
                    style="
                        position: relative;
                        top: -9px;
                        font-size: 10px;
                        right: 0px;"
                  >đ</span></h6>
              </div>
              <?php
                $productID = $products->id; 
                $url = '/add_cart/' . $productID;
              ?>
              <div style="align-items: center;display: flex;justify-content: center; padding-bottom: 10px;">
                <a class="btn btn-primary" href="<?php echo $url; ?>">Add to Cart</a>
              </div>
          </div>
        </div>
        @endforeach
    </div>
  </section>