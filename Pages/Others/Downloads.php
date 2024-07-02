<?php
include '../../Controllers/Header.php';
?>
<div class="container pb-5">
    <div class="row">
        <div class="col-md-12 px-0">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4 mt-1">
                            <div class="card download-bg suggestion">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Tải game cho Java</h5>
                                    <p class="card-text">Nhấn vào đây để tải game cho điện thoại Java của bạn.</p>
                                    <a class="btn btn-danger me-1 mt-1" href="#" data-bs-toggle="modal"
                                        data-bs-target="#java">Tải Ngay</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-1">
                            <div class="card download-bg false">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Tải game cho IOS</h5>
                                    <p class="card-text">Nhấn vào đây để tải game cho điện thoại iphone của bạn.</p>
                                    <a class="btn btn-danger me-1 mt-1"
                                        href="<?= $_IPhone ?>">Bản
                                        TestFlight</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-1">
                            <div class="card download-bg suggestion">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Tải game cho Android</h5>
                                    <p class="card-text">Nhấn vào đây để tải game cho điện thoại Android của bạn.</p>
                                    <a class="btn btn-danger me-1 mt-1"
                                        href="<?= $_Android ?>">Tải
                                        Ngay</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-1">
                            <div class="card download-bg false">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Tải game cho PC</h5>
                                    <p class="card-text">Nhấn vào đây để tải game cho máy tính để bàn của bạn.</p><a
                                        href="<?= $_Windows ?>"
                                        class="btn btn-danger me-1 mt-1">Tải Ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="java" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="my-2">
                    <a href="<?= $_JavaX1 ?>"
                        class="btn btn-menu btn-danger w-100 fw-semibold my-1">JAVA X1</a>
                    <a href="<?= $_JavaX3 ?>"
                        class="btn btn-menu btn-danger w-100 fw-semibold my-1">JAVA X3</a>
                    <a href="<?= $_JavaX5 ?>"
                        class="btn btn-menu btn-danger w-100 fw-semibold my-1">JAVA X5</a>
                    <a href="<?= $_JavaX10 ?>"
                        class="btn btn-menu btn-danger w-100 fw-semibold my-1">JAVA X10</a>
                    <a href="<?= $_JavaX20 ?>"
                        class="btn btn-menu btn-danger w-100 fw-semibold my-1">JAVA X20</a>
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
<?php
include '../../Controllers/Footer.php';
?>