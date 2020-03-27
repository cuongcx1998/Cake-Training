<?php $now = getdate(); ?>
<img align="left" src="C:\xampp\htdocs\Cake-Training\webroot\img\Capture.PNG" >
<div align="right">
    <b> <font size="5">CÔNG TY CỔ PHẦN NGHIÊN CỨU VÀ PHÁT TRIỂN FABBI</font></b>
    <br>
    <i><font size="2">Tầng 11, Tòa nhà Detech II, số 107 Nguyễn Phong Sắc, Dịch Vọng Hậu, Cầu Giấy, Hà Nội</font></i>
    <br>
    <i><font size="2">Hà Nội, <?php echo date('d/m/Y');?></font></i>
</div>
<br><br><br><br><br><br>
<div align="center">
    <b><font size="5">PHIẾU THANH TOÁN TIỀN LƯƠNG</font></b>
    <br>
        <i><font size="3">Tháng <?php echo date('m/Y', strtotime($month));?></font></i>
</div>
<br><br><br>
<div align="left">
    Họ và tên : <?php echo $data[1]?> <br><br>
    Loại hợp đồng : <?php echo $data[3]?> <br><br>
    Số TK : <?php echo $data[4]?> <br><br>
    Ngày công chuẩn (1) : <?php echo $data[5]?> <br><br>
    Ngày công thử việc (2) : <?php echo $data[6]?> <br><br>
    Mức lương thử việc (3) : <?php echo $data[7]?> <br><br>
    Ngày công đi làm CT (4) : <?php echo $data[8]?> <br><br>
    Mức lương chính thức (5) : <?php echo $data[9]?> <br><br>
    Thưởng, trợ cấp ngôn ngữ or khác (6) : <?php echo $data[10]?> <br><br>
    Bảo hiểm : <br><br>
    - <i>Công ty đóng : </i> <?php echo $data[11]?> <br><br>
    - <i>Người lao động đóng (7) : </i> <?php echo $data[12]?> <br><br>
    Thuế thu nhập cá nhân (8) : <?php echo $data[13]?> <br><br>
    Tạm ứng hoặc đã nhận (9) : <?php echo $data[14]?> <br><br>
    Lương thực nhận (10) = [(2)*(3) +(4)*(5)] /(1) + (6)-(7) -(8) - (9) :  <?php echo $data[15]?> <br>
    VNĐ <br><br>
    <b>( Lưu ý:  chỉ tiêu (7), (8) nếu hợp đồng Net thì không bị trừ trong lương thực nhận)</b>
</div>
