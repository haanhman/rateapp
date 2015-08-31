<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lấy lại mật khẩu</title>
</head>
<body>
    Hi, <?php echo $data['user']['fullname'] ?><br />
    <p>Bạn đã yêu cầu lấy lại mật khẩu cho tài khoản: <strong><?php echo $data['user']['email'] ?></strong></p>
    <p>
        Click vào link dưới để cập nhật mật khẩu mới cho tài khoản của bạn<br />
        <a href="<?php echo $data['url'] ?>"><?php echo $data['url'] ?></a><br />
         <i>Chú ý: Link này chỉ hoạt động đến <strong><?php echo date('d/m/Y H:i', $data['time_out']) ?></strong></i>
    </p>

    <p>
        Mọi thắc mắc cần được hỗ trợ vui lòng gọi điện tới số: 1900.1080 để được giải đáp
    </p>

</body>
</html>