<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="<?= $this->request->getParam('_csrfToken') ?>"/>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('fontawesome.min.css') ?>
    <?= $this->Html->css('datatable.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->element('header') ?>
<div class="container">
    <form>
        <strong>
            <div class="container row">
                <div class="form-group col-md-6">
                    <label for="email_sender">Email Người Gửi</label>
                    <input type="email" class="form-control" placeholder="Enter email" id="email_sender" name="email_sender">
                </div>
                <div class="form-group col-md-6">
                    <label for="host">Host Mail</label>
                    <input type="text" class="form-control" placeholder="Enter host" id="host" name="host">
                </div>
            </div>
            <div class="container row">
                <div class="form-group col-md-6">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Tên Người Gửi</label>
                    <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                </div>
            </div>
            <div class="container row">
                <div class="form-group col-md-6">
                    <label for="company">Công ty</label>
                    <input type="text" class="form-control" placeholder="Fabbi JSC" id="company" name="company">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Số Điện Thoại</label>
                    <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone">
                </div>
            </div>
            <div class="container row">
                <div class="form-group col-md-6">
                    <label for="date">Ngày</label>
                    <input type="date" id="date" name="date" class="form-control" >

                </div>
                <div class="form-group col-md-6">
                    <label for="file">File Import</label>
                    <input type="file" class="form-control"  id="file" name="file" accept=".xls, .xlsx">
                </div>
            </div>
            <div class="container">
                <label for="title">Chủ Đề</label>
                <input type="text" class="form-control" placeholder="Title" id="title" name="title">
            </div>
        </strong>
    </form>
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
<table id="result"></table>
<?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('popper.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('datatable.js') ?>
<?= $this->Html->script('xlsx.js') ?>
<script>
    $("#file").on("change", function (e) {
        var file = e.target.files[0];
        // input canceled, return
        if (!file) return;

        var FR = new FileReader();
        FR.onload = function(e) {
            var data = new Uint8Array(e.target.result);
            var workbook = XLSX.read(data, {type: 'array'});
            var firstSheet = workbook.Sheets[workbook.SheetNames[0]];
            var result = XLSX.utils.sheet_to_json(firstSheet);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                data: result,
                dataType: "json",
                url: "<?= \Cake\Routing\Router::url(['controller' => 'Salaries', 'action' => 'index'])?>",
                success: function (response) {
                    alert("ok");
                },
                error: function (response) {
                    console.log(response);
                }
            });
        };
        FR.readAsArrayBuffer(file);
    });

</script>
</body>
</html>
