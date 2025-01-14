<?php
include '../../Controllers/Header.php';
?>
<div class="card">
    <div class="card-body">
        <div class="col-md-12">
            <div class="row text-center justify-content-center my-1 mb-2">
                <div class="col-md-12 mb-4">
                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link " id="pills-card-tab" data-toggle="pill" href="?tab=card" role="tab"
                                aria-controls="pills-card" onclick="$('.method').html('Thẻ cào')">
                                <div class="recharge-method-item false">
                                    <img alt="method" src="/Assets/Images/Card.png" data-pin-no-hover="true">
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade " id="pills-card" role="tabpanel" aria-labelledby="pills-card-tab">
                            <div class="row  justify-content-center">
                                <div class="col-md-6">
                                    <form class="form-horizontal" onsubmit="event.preventDefault(); PostCard();"
                                        style="text-align: left">
                                        <div class="mb-3">
                                            <label class="font-weight-bold">Nhà mạng</label>
                                            <select class="form-select" name="telco" id="telco">
                                                <option value="">-- Loại thẻ --</option>
                                                <option value="VIETTEL">VIETTEL</option>
                                                <option value="VINAPHONE">VINAPHONE</option>
                                                <option value="MOBIFONE">MOBIFONE</option>
                                                <option value="VNMOBI">VNMOBI</option>
                                                <option value="VCOIN">VCOIN</option>
                                                <option value="ZING">ZING</option>
                                                <option value="GATE">GATE</option>
                                                <option value="GARENA">GARENA</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="font-weight-bold">Mệnh giá</label>
                                            <select class="form-select" name="amount" id="amount" required="">
                                                <option value="">-- Mệnh giá --</option>
                                                <option value="10000">10.000</option>
                                                <option value="20000">20.000</option>
                                                <option value="30000">30.000</option>
                                                <option value="50000">50.000</option>
                                                <option value="100000">100.000</option>
                                                <option value="200000">200.000</option>
                                                <option value="300000">300.000</option>
                                                <option value="500000">500.000</option>
                                                <option value="1000000">1.000.000</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="font-weight-bold">Mã thẻ</label>
                                            <input class="form-control" type="text" name="code" id="code"
                                                placeholder="Mã thẻ" required="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="font-weight-bold">Mã serial</label>
                                            <input class="form-control" type="text" name="serial" id="serial"
                                                placeholder="Mã serial" required="">
                                        </div>
                                        <div class="form-group" style="text-align: center">
                                            <button class="btn btn-info btn-block text-white" type="submit"
                                                id="paymentSubmitBtn">Thực hiện</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="pt-2">

                                <a href="/Users/History">
                                    <p class="history">Lịch sử nạp thẻ</p>
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="pills-momo" role="tabpanel"
                            aria-labelledby="pills-momo-tab">
                            <div class="row" style="display: flex;">
                                <div class="mb-3" id="showChoosePaymentMomo">
                                    <div class="d-flex justify-content-center">
                                        <div class="col-md-8 mt-3">
                                            <div>
                                                <div id="selectedAmountMessage" class="mt-3 text-center"></div>
                                                <div id="list_momo"
                                                    class="row text-center justify-content-center row-cols-2 row-cols-lg-3 g-2 g-lg-2 my-1 mb-2">
                                                    <div>
                                                        <div class="col">
                                                            <div class="w-100 fw-semibold cursor-pointer">
                                                                <div class="recharge-method-item position-relative false"
                                                                    style="height: 90px;">
                                                                    <div class="price_momo">20,000 đ</div>
                                                                    <div class="center-text text-danger">
                                                                        <span>Nhận</span>
                                                                    </div>
                                                                    <div class="text-primary">20,000 Coin </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="col">
                                                            <div class="w-100 fw-semibold cursor-pointer">
                                                                <div class="recharge-method-item position-relative false"
                                                                    style="height: 90px;">
                                                                    <div class="price_momo">50,000 đ</div>
                                                                    <div class="center-text text-danger">
                                                                        <span>Nhận</span>
                                                                    </div>
                                                                    <div class="text-primary">50,000 Coin </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="col">
                                                            <div class="w-100 fw-semibold cursor-pointer">
                                                                <div class="recharge-method-item position-relative false"
                                                                    style="height: 90px;">
                                                                    <div class="price_momo">100,000 đ</div>
                                                                    <div class="center-text text-danger">
                                                                        <span>Nhận</span>
                                                                    </div>
                                                                    <div class="text-primary">100,000 Coin </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="col">
                                                            <div class="w-100 fw-semibold cursor-pointer">
                                                                <div class="recharge-method-item position-relative false"
                                                                    style="height: 90px;">
                                                                    <div class="price_momo">200,000 đ</div>
                                                                    <div class="center-text text-danger">
                                                                        <span>Nhận</span>
                                                                    </div>
                                                                    <div class="text-primary">200,000 Coin </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="col">
                                                            <div class="w-100 fw-semibold cursor-pointer">
                                                                <div class="recharge-method-item position-relative false"
                                                                    style="height: 90px;">
                                                                    <div class="price_momo">500,000 đ</div>
                                                                    <div class="center-text text-danger">
                                                                        <span>Nhận</span>
                                                                    </div>
                                                                    <div class="text-primary">500,000 Coin </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="col">
                                                            <div class="w-100 fw-semibold cursor-pointer">
                                                                <div class="recharge-method-item position-relative false"
                                                                    style="height: 90px;">
                                                                    <div class="price_momo">1,000,000 đ</div>
                                                                    <div class="center-text text-danger">
                                                                        <span>Nhận</span>
                                                                    </div>
                                                                    <div class="text-primary">1,030,000 Coin </div>
                                                                    <span
                                                                        class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                                        style="z-index: 1;">+3%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="col">
                                                            <div class="w-100 fw-semibold cursor-pointer">
                                                                <div class="recharge-method-item position-relative false"
                                                                    style="height: 90px;">
                                                                    <div class="price_momo">2,000,000 đ</div>
                                                                    <div class="center-text text-danger">
                                                                        <span>Nhận</span>
                                                                    </div>
                                                                    <div class="text-primary">2,080,000 Coin </div>
                                                                    <span
                                                                        class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                                        style="z-index: 1;">+4%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="col">
                                                            <div class="w-100 fw-semibold cursor-pointer">
                                                                <div class="recharge-method-item position-relative false"
                                                                    style="height: 90px;">
                                                                    <div class="price_momo">5,000,000 đ</div>
                                                                    <div class="center-text text-danger">
                                                                        <span>Nhận</span>
                                                                    </div>
                                                                    <div class="text-primary">5,250,000 Coin </div>
                                                                    <span
                                                                        class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                                        style="z-index: 1;">+5%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="col">
                                                            <div class="w-100 fw-semibold cursor-pointer">
                                                                <div class="recharge-method-item position-relative false"
                                                                    style="height: 90px;">
                                                                    <div class="price_momo">10,000,000 đ</div>
                                                                    <div class="center-text text-danger">
                                                                        <span>Nhận</span>
                                                                    </div>
                                                                    <div class="text-primary">10,250,000 Coin </div>
                                                                    <span
                                                                        class="text-white position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                                        style="z-index: 1;">+2.5%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="momo_info"></div>
                                                <div class="text-center mt-3 momo-btn">
                                                    <button type="button" id="payment_momo"
                                                        class="w-50 rounded-3 btn btn-primary btn-sm">Thanh toán
                                                    </button>
                                                    <div class="pt-2">
                                                        <a href="/Users/History">
                                                            <p class="history">Lịch sử nạp</p>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="momo_payment_info" class="mb-3" style="display: none;">
                                    <div class="row  justify-content-center">
                                        <div class="table-responsives col-md-6">
                                            <div class="post-detail">
                                                <table class="table" style="font-size:13px;">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="2" class="text-center"><strong>Thông Tin Nạp
                                                                    Tiền Qua Mbbank</strong>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left">Nội dung chuyển</td>
                                                            <td class="text-left">
                                                                <span class="copy"
                                                                    data-clipboard-text="naptien <?= $_Id ?>"
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    title="Copy">
                                                                    <i class="fa fa-clone"></i>
                                                                </span>
                                                                <strong>naptien <?= $_Id ?></strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Tên Tài Khoản</td>
                                                            <td class="text-left">
                                                                <span class="copy"
                                                                    data-clipboard-text="<?= $mbbank_name ?>"
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    title="Copy">
                                                                    <i class="fa fa-clone"></i>
                                                                </span>
                                                                <span><?= $mbbank_name ?></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Số Tài Khoản</td>
                                                            <td class="text-left">
                                                                <span class="copy"
                                                                    data-clipboard-text="<?= $stkmbbank_config ?>"
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    title="Copy">
                                                                    <i class="fa fa-clone"></i>
                                                                </span>
                                                                <span><?= $stkmbbank_config ?></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Ngân Hàng</td>
                                                            <td class="text-left">
                                                                <span class="copy" data-clipboard-text="Momo"
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    title="Copy"><i class="fa fa-clone"></i></span>
                                                                <span>Ngân Hàng Quân Đội | MBBank</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Số tiền</td>
                                                            <td class="text-left">
                                                                <span class="copy" data-clipboard-text="Momo"
                                                                    data-toggle="tooltip" data-placement="right"
                                                                    title="Copy">
                                                                    <i class="fa fa-clone"></i>
                                                                </span>
                                                                <span id="mount_momo">...</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <div class="text-center mt-3">
                                                    <div class="fs-5 fw-semibold text-center">Hoặc quét mã sau để
                                                        nạp tiền
                                                    </div>
                                                    <div class="text-center mt-2">
                                                        <div class="overlay">
                                                            <img id="qrMomo" width="250"
                                                                src="https://img.vietqr.io/image/MB-<?= $stkmbbank_config ?>-qr_only.png?&addInfo=naptien <?= $_Id ?>&accountName=<?= $mbbank_name ?>"
                                                                alt="">
                                                            <img class="momo-logo" src="/Assets/Images/Momo.png"
                                                                alt="Momo Logo">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function PostCard() {
        var telco = document.querySelector("[name=telco]").value;
        var amount = document.querySelector("[name=amount]").value;
        var serial = document.querySelector("[name=serial]").value;
        var code = document.querySelector("[name=code]").value;
        var username = '<?= $_Username ?>';

        fetch('/Api/Card', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                telco: telco,
                amount: amount,
                serial: serial,
                code: code,
                username: username
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showCustomToast(data.message, 'success');
                } else {
                    showCustomToast(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showCustomToast('Có lỗi xảy ra khi nạp thẻ.', 'error');
            });
    }

    $(document).ready(function () {
        $(".tab-pane").hide();
        $("#pills-card-tab").click(function (event) {
            event.preventDefault();
            $(".tab-pane").hide();
            $("#pills-card").show();
        });

        $("#pills-momo-tab").click(function (event) {
            event.preventDefault();
            $(".tab-pane").hide();
            $("#pills-momo").show();
        });

        $(".recharge-method-item").click(function () {
            var selectedAmount = $(this).find(".price_momo").text();
            $("#selectedAmountMessage").html("<b>Bạn đang chọn mốc nạp: " + selectedAmount + "</b>");
            $("#mount_momo").text(selectedAmount);
        });

        $("#pills-card-tab").trigger("click");
        $("#momo_payment_info").hide();
        $("#payment_momo").click(function () {
            $("#momo_payment_info").show();
            $("#showChoosePaymentMomo").hide();
        });

        // Bắt sự kiện click trên các phần tử có lớp .copy
        $(document).on('click', '.copy', function () {
            var dataToCopy = $(this).data("clipboard-text");
            var clipboard = new ClipboardJS('.copy', {
                text: function () {
                    return dataToCopy;
                }
            });

            clipboard.on('success', function (e) {
                toastr.success('<span style="color: #000000"><b>Đã sao chép thành công!</b></span>', '', { timeOut: 2000 });
            });
            clipboard.on('error', function (e) {
                toastr.error('<span style="color: #000000"><b>Không thể sao chép dữ liệu!</b></span>', '', { timeOut: 2000 });
            });
        });
    });

</script>
<?php
include '../../Controllers/Footer.php';
?>