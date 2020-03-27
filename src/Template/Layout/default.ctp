<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
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
    <?= $this->fetch('content') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('datatable.js') ?>
    <?= $this->Html->script('xlsx.js') ?>
    <script>
        $(document).ready(function() {
            $('#import').click(function () {
                var i = 0;
                var file = $('#file')[0].files[0];
                var fd = new FormData();
                fd.append('file', file);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'json',
                    url: "/salaries/load-file-import",
                    success: function (response) {
                        $("#mytable").dataTable({
                            data: response,
                            columns: [
                                {title: 'Stt'},
                                {title: 'Họ và tên'},
                                {title: 'Email'},
                                {title: 'Loại hợp đồng'},
                                {title: 'Số TK (text)'},
                                {title: 'Ngày công chuẩn'},
                                {title: 'Ngày công Thử Việc'},
                                {title: 'Mức lương thử việc'},
                                {title: 'Ngày công chính thức'},
                                {title: 'Mức lương chính thức'},
                                {title: 'Thưởng DA or trợ cấp khác'},
                                {title: 'Bảo hiểm công ty chịu'},
                                {title: 'Bảo hiểm trừ lương NLĐ'},
                                {title: 'Thuế TNCN'},
                                {title: 'Tạm ứng hoặc đã nhận'},
                                {title: 'Lương thực nhận'},
                                {title: 'Action'}
                            ],
                            columnDefs: [
                                {
                                    targets: [16],
                                    render:function(){
                                        i++;
                                        return '<button data-id="' + i + '" class="btn btn-secondary data-row">send</button>';
                                    }
                                },
                                {
                                    targets:   [0],
                                    orderable: false,
                                    className: 'select-checkbox'
                                }
                            ],
                            select: {
                                style:    'os',
                                selector: 'td:first-child'
                            },
                        });
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            });

            $(document).on('click', '.data-row', function ()  {

                $.ajax({
                    type: 'post',
                    data: {
                        'id': $(this).data('id'),
                        'email_sender': $("#email_sender").val(),
                        'host': $("#host").val(),
                        'password': $("#password").val(),
                        'sender': $("#sender").val(),
                        'company': $("#company").val(),
                        'phone': $("#phone").val(),
                        'month': $("#month").val(),
                        'title': $("#title").val()
                    },
                    url: '/salaries/',
                    success: function () {
                        $(this).closest("tr").find("td:nth-child(16)").append('<span class="badge badge-success">ok</span>');
                    },
                    error: function () {

                    }
                });
            });
        });
    </script>
</body>
</html>
