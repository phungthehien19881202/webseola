<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From đặt hàng từ web</title>
</head>
<body>
    <h2>Đơn đặt hàng mới</h2>
    <p><strong>Tên sản phẩm:</strong> {{ $data['tensp'] }}</p>
    <p><strong>Giá sản phẩm:</strong> {{ $data['giasp'] }}</p>
    <p><strong>Tên khách:</strong> {{ $data['tenkhach'] }}</p>
    <p><strong>Số điện thoại khách:</strong> {{ $data['sdtkhach'] }}</p>
    <p><strong>Ghi chú:</strong> {{ $data['ghichu'] }}</p>
</body>
</html>
