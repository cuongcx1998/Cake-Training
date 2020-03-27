<div class="container">
    <strong>
        <div class="container row">
            <div class="form-group col-md-6">
                <label for="email_sender">Email Người Gửi</label>
                <input id="email_sender" class="form-control" name="email_sender" type="email" placeholder="Enter email" required>
            </div>
            <div class="form-group col-md-6">
                <label for="host">Host Mail</label>
                <input id="host" class="form-control" name="host" type="text"  placeholder="Enter host"  >
            </div>
        </div>
        <div class="container row">
            <div class="form-group col-md-6">
                <label for="password">Mật Khẩu</label>
                <input id="password" class="form-control" name="password" type="password"  placeholder="Enter password"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="sender">Tên Người Gửi</label>
                <input id="sender" class="form-control" name="sender" type="text"  placeholder="Name"  required>
            </div>
        </div>
        <div class="container row">
            <div class="form-group col-md-6">
                <label for="company">Công ty</label>
                <input id="company" class="form-control" name="company" type="text"  placeholder="Fabbi JSC"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Số Điện Thoại</label>
                <input id="phone" class="form-control" name="phone" type="text"  placeholder="Phone" required>
            </div>
        </div>
        <div class="container row">
            <div class="form-group col-md-6">
                <label for="month">Tháng</label>
                <input id="month" class="form-control" name="month" type="month" required>

            </div>
            <div class="form-group col-md-6">
                <div class="container">
                    <label for="file">File Import</label>
                    <input id="file" class="form-control" name="file" type="file" accept=".xls, .xlsx" required>
                    <button id="import" class="btn btn-info">Import</button>
                </div>
            </div>
        </div>
        <div class="container row">
            <label for="title">Chủ Đề</label>
            <input id="title" class="form-control" name="title" type="text"  placeholder="Title" required>
        </div>
    </strong>
</div>
<hr>
<strong class="p-lg-3">Hiển Thị Cột</strong>
<div class="p-lg-3">
    <div class="row">
        <div class="col-md-2">
            <input type="checkbox" id="stt" name="stt"> (0) Stt
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="hoten" name="hoten"> (1) Họ và tên
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="email" name="email"> (2) Email
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="hop_dong" name="hop_dong"> (3) Loại hợp đồng
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="stk" name="stk"> (4) Số TK
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="ngay_cong_chuan" name="ngay-cong_chuan"> (5) Ngày công chuẩn
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <input type="checkbox" id="ngay_cong_tv" name="ngay_cong_tv"> (6) Ngày công thử việc
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="luong_tv" name="luong_tv"> (7) Mức lương thử việc
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="ngay_cong_ct" name="ngay_cong_ct"> (8) Ngày công chính thức
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="luong_ct" name="luong_ct"> (9) Mức lương chính thức
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="thuong_trocap" name="thuong_trocap"> (10) Thưởng DA ỏ trợ cấp khác
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="bh_congty_chiu" name="bh_congty_chiu"> (11) Bảo hiểm công ty chịu
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <input type="checkbox" id="bh_tru_luong_nld" name="bh_tru_luong_nld"> (12) Bảo hiểm trừ lương NLĐ
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="thue_tncn" name="thue_tncn"> (13) Thuế TNCN
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="da_nhan" name="da_nhan"> (14) Tạm ứng hoặc đã nhận
        </div>
        <div class="col-md-2">
            <input type="checkbox" id="luong_thuc_nhan" name="luong_thuc_nhan"> (15) Lương thực nhận
        </div>
    </div>
</div>
<hr>
<table id="mytable" class="table table-bordered">

</table>
