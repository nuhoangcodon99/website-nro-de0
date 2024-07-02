<div class="modal fade" id="serverModal" tabindex="-1" aria-labelledby="serverModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="my-2">
                    <div class="text-center"><img alt="Logo" src="/Assets/Images/chatlogo.png" class="logo"
                            style="max-width: 200px;"></div>
                </div>
                <div class="text-center fw-semibold">
                    <div class="mb-2" style="font-size: 14px;">THÔNG BÁO</div>
                    <div class="mb-2" style="font-size: 11px;">Chào mừng đến với máy chủ
                    </div>

                    <div class="mt-2">
                        <a href="https://zalo.me/g/efmgjg604" id="serverTeamButton" target="_blank"
                            class="btn-rounded btn btn-primary btn-sm" style="padding: 10px;">Box Zalo 1</a>
                        <a href="https://zalo.me/g/shtswk962" id="serverTeamButton" target="_blank"
                            class="btn-rounded btn btn-primary btn-sm" style="margin-left: 20px; padding: 10px;">Box
                            Zalo
                            2</a>
                        <a href="https://www.facebook.com/groups/canht" id="serverTeamButton"
                            class="btn-rounded btn btn-primary btn-sm" style="margin-left: 20px; padding: 10px;">Group
                            FB</a>
                        <a href="https://www.facebook.com/haitacme" id="serverTeamButton"
                            class="btn-rounded btn btn-primary btn-sm" style="margin-left: 20px; padding: 10px;">Fanpage
                            FB</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        // Chỉ thực hiện các hành động khi trang là trang chính ("/", Home)
        if (window.location.pathname === '/' || window.location.pathname === '/home') {
            $('#serverModal').modal('show');

            $(document).click(function (event) {
                if ($(event.target).hasClass('modal')) {
                    $('#serverModal').modal('hide');
                }
            });

            $('#serverModal a').click(function () {
                $('#serverModal').modal('hide');
            });
        }
    });

    function activateAccount() {
        var status = '<?php echo $_Status; ?>';
        var coins = '<?php echo $_Coins; ?>';
        var username = '<?php echo $_Username; ?>';

        fetch('/Api/Active', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                status: status,
                coins: coins,
                username: username
            })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showCustomToast(data.message, 'success');
                } else {
                    showCustomToast(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showCustomToast('Có lỗi xảy ra. Vui lòng thử lại sau.', 'error');
            });
    }


    function showCustomToast(message, type) {
        var toast = document.getElementById('customToast');
        toast.innerText = message;
        toast.style.display = 'block';
        toast.classList.remove('alert', 'alert-success', 'alert-danger'); // Xóa các lớp hiện có trước khi thêm lớp mới
        if (type === 'success') {
            toast.classList.add('alert', 'alert-success');
        } else {
            toast.classList.add('alert', 'alert-danger');
        }

        // Tự đóng thông báo sau 3 giây
        setTimeout(function () {
            toast.style.display = 'none';
        }, 3000);
    }
</script>
<style>
    .custom-toast {
        position: fixed;
        padding: 15px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 5px;
        color: white;
        display: none;
        z-index: 9999;
    }

    .alert-success {
        background-color: #28a745;
    }

    .alert-danger {
        background-color: #dc3545;
    }

    .nsotien_logo {
        height: 120px;
        width: auto;
    }

    @media only screen and (max-width: 768px) {
        .nsotien_logo {
            height: 70px;
        }
    }

    .mt-3 a:hover {
        color: white;
        background-color: red;
        border-color: red;
    }

    .header-logo {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-radius: 10px;
        max-height: 100%;
        max-width: 100%;
    }

    .custom-success-alert {
        background-color: #4CAF50 !important;
        color: white !important;
        padding: 10px !important;
        text-align: center !important;
        border-radius: 5px;
    }

    .alert.alert-danger.alert-block {
        background: none;
        border-color: transparent;
        text-align: center;
    }

    /*a {*/
    /*    margin: 5px;*/
    /*}*/

    svg {
        width: 30px;
        height: 30px;
    }

    .age-rule a {
        background-color: #B4E3FF;
        color: #F4FFFF !important;
        border-radius: 10px !important;
        text-align: center;
        max-width: 10%;
        margin: 5px auto;
        padding: 5px 10px;
    }

    .age-rule a:hover {
        background-color: #ffcc99;
        color: #F4FFFF !important;
    }

    .page-layout-color {
        background: #b3afaf url("/Assets/Images/back.png");
        background-size: cover;
        background-attachment: fixed;
        height: auto;
    }

    #serverModal a#serverTeamButton {
        width: 100% !important;

        margin-bottom: 10px !important;

        align-items: flex-start !important;
        background-color: #8f34f5 !important;
        border-color: #8f34f5 !important;
        border-radius: 10px !important;
        color: #ffffff !important;
        display: inline-block !important;
        font-family: system-ui !important;
        font-size: 14px !important;
        line-height: 21px !important;
        margin: 10px 0px 0px !important;
        text-align: center !important;
    }

    #serverModal a#serverTeamButton:hover {
        background-color: #FF418C !important;
        border-color: #FF418C !important;
    }

    #serverModal .mt-2 {
        color: #212529 !important;
        font-weight: 600 !important;
        line-height: 24px !important;
        margin: 8px 0px 0px !important;
        text-align: center !important;
    }

    #serverModal .mb-2 {
        color: #212529 !important;
        font-weight: 600 !important;
        line-height: 30px !important;
        margin: 0px 0px 8px !important;
        text-align: center !important;
    }

    #serverModal .text-center {
        color: #212529 !important;
        font-weight: 300 !important;
        line-height: 24px !important;
        text-align: center !important;
    }

    #serverModal img.logo {
        color: #212529 !important;
        display: inline !important;
        font-weight: 300 !important;
        line-height: 24px !important;
        text-align: center !important;
    }

    #serverModal .modal-body {

        outline: 2px solid #000;
        border-radius: 10px;

        background-color: #FCE3C6 !important;
        color: #212529 !important;
        font-weight: 300 !important;
        line-height: 24px !important;

    }

    #serverModal .modal-content {
        margin: 2px 127px;

    }

    #serverModal .modal-content p {
        margin: 9px 30px;
        line-height: 1.5;
    }

    #serverModal .modal-content h2 {
        margin: 9px 30px;
        line-height: 1.5;
    }


    #serverModal .modal-content font[color="#FF0000"] {
        color: #FF0000;
        font-weight: bold;

    }

    @media (min-width: 768px) and (max-width: 1024px) {

        #serverModal html,
        body {
            overflow: visible;
        }
    }

    @media (max-width: 767px) {

        #serverModal html,
        body {
            overflow: visible;
        }

        #serverModal .modal-body {
            margin: 0 -36px;

            text-align: center;
        }

        #serverModal .modal-content {
            margin: 4px 55px
        }

        #serverModal .modal-content p {
            margin: 32px 30px;
            line-height: 1.5;
        }

    }
</style>
<footer class="pt-4 pt-md-5 border-top">
    <div class="text-center">

        <p class="fw-bold">Chơi quá 180 phút mỗi ngày sẽ có hại cho sức khỏe</p>

    </div>
</footer>
</div>

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
<!--<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>-->
</body>

</html>