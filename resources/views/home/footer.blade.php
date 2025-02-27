<section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="dashboard">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="dashboard">
          <i class="fa fa-envelope" aria-hidden="true"></i>
        </a>
        <a href="dashboard">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row" style="display: flex;justify-content: space-evenly; padding-bottom: 25px;">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT ME
            </h6>
            <p style="text-align: justify;">
            This project was developed by Pham Trung Hieu with the goal of providing an efficient solution for product and user management. We are committed to delivering an optimal experience with an intuitive design and powerful features.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 style="text-align: justify;"> 
              NEED HELP
            </h6>
            <p>
              If you need any assistance, feel free to reach out. We’re here to help and ensure you have the best experience possible!
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="dashboard">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Phenikaa University </span>
              </a>
              <a href="dashboard">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>098285jqk</span>
              </a>
              <a href="dashboard">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>hieupham9155@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.nav-link').on('click', function(e) {
      e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
      var category = $(this).text(); // Lấy tên danh mục từ text của thẻ <a>
      var url = '/filter-products/' + category; // Tạo URL để gửi yêu cầu AJAX

      $.ajax({
        url: url,
        method: 'GET',
        success: function(response) {
          $('#product-list').html(''); // Xóa nội dung cũ
          response.forEach(function(product) {
            var productHtml = `
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                  <div class="img-box">
                    <img src="products/${product.image}" alt="">
                  </div>
                  <div class="detail-box">
                    <h6 style="font-size: 18px;font-weight">${product.title}</h6>
                    <h6> <span style="font-size: 18px;font-weight; color: #101010">Price</span> <span>${product.price}</span><span 
                        style="
                            position: relative;
                            top: -9px;
                            font-size: 10px;
                            right: 0px;"
                      >đ</span></h6>
                  </div>
                  <div style="align-items: center;display: flex;justify-content: center; padding-bottom: 10px;">
                    <a class="btn btn-primary" href="/add_cart/${product.id}">Add to Cart</a>
                  </div>
                </div>
              </div>
            `;
            $('#product-list').append(productHtml); // Thêm sản phẩm mới vào danh sách
          });
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
        }
      });
    });
  });
</script>
  