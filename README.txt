Cách khởi tạo chương trình: 
	Sau khi tải file zip về ta cần xampp để chạy chương trình, nếu chưa có thì tải tại: 
		https://www.apachefriends.org/index.html
	Copy file zip và giải nén ở htdocs, ta được folder Cinema-Reservation.
	Khởi động xampp Apache, MySQL.
	Import file cinema_db(trong thư mục database) vào phpMyAdmin.
	Khách hàng:
		http://localhost/Cinema-Reservation/ ta đăng nhập bằng tài khoản: haidang pass:123456 hoặc tài khoản: tronghien pass:123456
	Admin:  
		http://localhost/Cinema-Reservation/admin/admin.php

Cách chạy phpunit test:
	Điều kiện tiên quyết: đã cài đặt
	- php-xml  
	- php-json
	- php-mbstring
	- php-mysqli
	- composer v2 
	
	Thực thi chương trình bằng cách gõ lệnh:  " php vendor/bin/phpunit --testdox "
