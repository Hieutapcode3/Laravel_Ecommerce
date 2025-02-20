---

# 🍽️ Food Ecommerce  
## 🌐 Giới thiệu  
Food Ecommerce là một nền tảng thương mại điện tử chuyên cung cấp thực phẩm tươi sống, rau củ, trái cây, hải sản, thịt cá và các mặt hàng tiêu dùng khác. Ứng dụng được phát triển trên PHP Laravel, kết hợp với MySQL trên Aiven Cloud để đảm bảo hiệu suất và khả năng mở rộng. Người dùng có thể dễ dàng tìm kiếm, đặt hàng và theo dõi đơn hàng, trong khi quản trị viên có toàn quyền quản lý sản phẩm, danh mục và đơn hàng.  

👉 **Bạn có thể xem tại:** [hieutapcode3.github.io/Laravel_Ecommerce](https://hieutapcode3.github.io/Laravel_Ecommerce/)  

---

## ⚙️ Công nghệ sử dụng  
- **Backend:** Laravel (PHP)  
- **Database:** MySQL trên Aiven Cloud  
- **Frontend:** HTML, CSS, JavaScript (Bootstrap)  
- **Xác thực:** Laravel Breeze  
- **Triển khai:** GitHub Codespaces  

---

## 🚀 Tính năng chính  

### 🛒 Người dùng  
- Duyệt danh sách sản phẩm theo danh mục: **Thịt, Hải sản, Rau củ, Hoa quả, Thực phẩm chế biến sẵn, Thực phẩm bổ sung**.  
- Đăng ký tài khoản, đăng nhập, thêm sản phẩm vào giỏ hàng và tiến hành thanh toán.  
- Quản lý đơn hàng cá nhân, kiểm tra trạng thái và lịch sử mua hàng.  

### 🔧 Quản trị viên  
- **Quản lý sản phẩm:** Thêm mới, chỉnh sửa, xóa sản phẩm.  
- **Quản lý danh mục:** Cập nhật và tổ chức các danh mục sản phẩm.  
- **Quản lý đơn hàng:** Xác nhận, xử lý và hủy đơn hàng khi cần thiết.  
- **Quản lý người dùng:** Quản lý tài khoản, phân quyền truy cập.  
- **Quản lý kho hàng:** Theo dõi số lượng hàng tồn kho.  

---

## 📦 Hướng dẫn cài đặt  

### 1️⃣ **Sao chép mã nguồn**  
```sh  
git clone https://github.com/Hieutapcode3/Laravel_Ecommerce  
cd FoodEcommerce  
```

### 2️⃣ **Cấu hình môi trường**  
Tạo file `.env` trong thư mục gốc và nhập thông tin cơ sở dữ liệu như sau:  
```ini  
App_Url=<yourUrl>
DB_CONNECTION=mysql  
DB_HOST=<AIVEN_DATABASE_HOST>  
DB_PORT=<AIVEN_DATABASE_PORT>  
DB_DATABASE=<AIVEN_DATABASE_NAME>  
DB_USERNAME=<AIVEN_DATABASE_USER>  
DB_PASSWORD=<AIVEN_DATABASE_PASSWORD>  
```

### 3️⃣ **Cài đặt các thư viện cần thiết**  
```sh  
composer install  
npm install  
```

### 4️⃣ **Tạo key và cấu trúc database**  
```sh  
php artisan key:generate  
php artisan migrate --seed  
```

### 5️⃣ **Chạy ứng dụng**  
```sh  
php artisan serve  
```
Sau đó, mở trình duyệt và truy cập tại đường dẫn app_url của bạn.

---

## 🔍 Hướng dẫn sử dụng  
- **Trang chủ:** Hiển thị sản phẩm nổi bật và các danh mục.  
- **Phân loại sản phẩm:** Người dùng có thể lọc theo danh mục và tìm kiếm sản phẩm.  
- **Giỏ hàng:** Quản lý sản phẩm đã chọn và tiến hành thanh toán.  
- **Trang quản trị:** `/admin`  
- **Thêm, sửa, xóa các sản phẩm và thông tin người dùng.**  

---

## 📂 Cấu trúc thư mục  
```
├── app
│   ├── Http\Controllers
│   ├── Models
│   └── Services
├── database
│   └── migrations
├── resources
│   ├── views
│   └── js
├── routes
│   └── web.php
└── public
```

---

## ⚠️ Lưu ý  
- Cần đảm bảo kết nối với cơ sở dữ liệu Aiven trước khi chạy ứng dụng.  
- Không chia sẻ thông tin `.env` khi triển khai lên server.  

---
