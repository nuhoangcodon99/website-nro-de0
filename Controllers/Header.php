<?php
include 'Connections.php';
include 'Sessions.php';
include 'Configs.php';

if (($_Login === null && strpos($_SERVER['REQUEST_URI'], '/Users/') !== false) || ($_Login == true && strpos($_SERVER['REQUEST_URI'], '/Auth/') !== false)) {
    echo '<script>window.location.href = "/";</script>';
}

if (isset($_FixWeb) && $_FixWeb == 1) {
    echo "Máy chủ đang bảo trì website. Vui lòng chờ nhé!";
    exit;
}
?>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="theme-color" content="#000000">
    <meta name="title" content="<?= $_Description ?>">
    <meta name="description" content="<?= $_Description ?>">
    <meta name="keywords" content="<?= $_Keyword ?>">
    <meta name="author" content="<?= $_Description ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="index">
    <meta property="og:title" content="Sever haitac">
    <meta property="og:description" content="<?= $_Description ?>">
    <meta property="og:image" content="/Assets/Images/<?= $_Logo ?>">
    <meta property="og:image:alt" content="THAM GIA NGAY">
    <link rel="apple-touch-icon" href="/Assets/Images/<?= $_Logo ?>">
    <link rel="icon" href="/Assets/Images/<?= $_Logo ?>">
    <link rel="shortcut icon" href="#">
    <title><?= $_Title ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

    <link href="/Assets/Css/bootstrap.min.css" rel="stylesheet">
    <script src="/Assets/Css/bootstrap.min.js"></script>
</head>

<body class="page-layout-color">
    <div id="root">
        <div class="container">
            <div class="main">
                <div class="text-center h-auto">
                    <img src="/Assets/Images/chatlogo.png" class="header-logo" width="50%">
                </div>
                <div id="customToast" class="custom-toast"></div>
                <?php if ($_Login != null && $_Status == 0) { ?>
                        <div class="alert alert-info">
                            <p style="color: black!important;"><span class="text-danger fw-bold">Phần quà kích hoạt:</span>
                                Null. </p>
                            <a onclick="activateAccount()" class="btn btn-danger">Kích hoạt tài khoản</a>
                        </div>
                <?php } ?>
                <div class="row text-center justify-content-center row-cols-2 row-cols-lg-6 g-2 g-lg-2 my-1 mb-2">
                    <?php if ($_Login === null) { ?>
                            <div class="col">
                                <div class="px-2">
                                    <a class="btn btn-menu btn-success w-100 fw-semibold false" href="/Auth/Login">Đăng nhập</a>
                                </div>

                            </div>
                            <div class="col">
                                <div class="px-2">
                                    <a class="btn btn-menu btn-success w-100 fw-semibold false" href="/Auth/Register">Đăng
                                        kí</a>
                                </div>
                            </div>
                    <?php } else { ?>
                            <div class="col">
                                <div class="px-2">
                                    <a class="btn btn-menu btn-success w-100 fw-semibold false" href="/Users/Profile">Tài
                                        khoản</a>
                                </div>
                            </div>
                    <?php } ?>
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-success w-100 fw-semibold false" href="/Others/Downloads">Tải
                                game</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-success w-100 fw-semibold false"
                                href="<?= $_Fanpage ?>">Fanpage</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-success w-100 fw-semibold false" href="<?= $_Zalo ?>">Group</a>
                        </div>
                    </div>

                </div>
                <div class="row text-center justify-content-center row-cols-2 row-cols-lg-6 g-2 g-lg-2 my-1 mb-2">
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-danger w-100 fw-semibold false" href="/">Trang
                                Chủ</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-danger w-100 fw-semibold false" href="/Users/Payment">Nạp
                                Tiền</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-danger w-100 fw-semibold false" href="#" data-bs-toggle="modal"
                                data-bs-target="#myModal">Box Zalo</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="px-2">
                            <a class="btn btn-menu btn-danger w-100 fw-semibold false" href="/Users/Gold">Đổi
                                Thỏi Vàng</a>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="my-2">
                                    <a href="<?= $_ZaloX1 ?>"
                                        class="btn btn-menu btn-danger w-100 fw-semibold my-1">Box Zalo 1</a>
                                    <a href="<?= $_ZaloX2 ?>"
                                        class="btn btn-menu btn-danger w-100 fw-semibold my-1">Box Zalo 2</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    $(document).ready(function () {

                        $('[data-bs-toggle="modal"]').click(function (e) {
                            e.preventDefault(); // Ngăn chặn liên kết mở trang web khác

                            var targetModal = $(this).attr('data-bs-target');

                            $(targetModal).modal('show');
                        });

                        $('.modal .btn-close').click(function () {

                            $(this).closest('.modal').modal('hide');
                        });
                    });
                </script>

                <style>
                    #myModal .modal-content {
                        background-color: #FCE3C6 !important;
                    }

                    #myModal a.btn.btn-menu.btn-danger.w-100.fw-semibold.my-1 {
                        border-radius: 10px;
                        background-color: #8f34f5 !important;
                        color: #ffffff !important;
                        box-shadow: none !important;
                    }
                </style>
                <style>
                    .ant-list-item-meta {
                        display: flex;
                        flex: 1 1;
                        align-items: flex-start;
                        max-width: 100%;
                    }

                    .ant-list-item-meta-content {
                        flex: 1 0;
                        width: 0;
                        color: rgba(0, 0, 0, .85);
                    }

                    .ant-list-item-meta-title {
                        margin-bottom: 4px;
                        color: rgba(0, 0, 0, .85);
                        font-size: 14px;
                        line-height: 1.5715;
                    }

                    .ant-list-item-meta-description {
                        color: rgba(0, 0, 0, .45);
                        font-size: 14px;
                        line-height: 1.5715;
                    }
                </style>