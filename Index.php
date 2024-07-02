<?php
include 'Controllers/Header.php';
?>
<div class="card">
    <div class="card-body">
        <div class="card-title h5">Bài viết mới</div>
        <hr>
        <div>
            <div class="post-item d-flex align-items-center my-2 justify-content-between">
                <div class="post-image">
                    <img src="/Assets/Images/gender12.png" alt="htth-su-kien-gio-to-hung-vuong">
                </div>
                <div class="ant-list-item-meta">
                    <div>
                        <a class="fw-bold text-success" href="/">HTTH - SỰ KIỆN GIỖ TỔ HÙNG VƯƠNG</a>
                        <div class="post-date">13/04/2024 11:48:41 - Lượt
                            xem: 1,238</div>
                    </div>
                </div>
                <div>
                    <img width="30px" src="/Assets/Images/tick.png" alt="tick">
                </div>
            </div>
            <div class="card-title h5">Hướng dẫn-tính năng</div>
            <div class="post-item d-flex align-items-center my-2 justify-content-between">
                <div class="post-image">
                    <img src="/Assets/Images/gender12.png" alt="hd">
                </div>
                <div class="ant-list-item-meta">
                    <div>
                        <a class="fw-bold text-danger" href="/">Hướng dẫn-tính năng</a>
                        <div class="post-date">Các bài viết hướng dẫn về tính năng trên GAME</div>
                    </div>
                </div>
                <div>
                    <img width="30px" src="/Assets/Images/tick.png" alt="tick">
                </div>
            </div>
            <?php
            $currentMonth = date('m');
            $currentYear = date('Y');

            $vietnameseMonths = array(
                1 => 'Tháng 1',
                2 => 'Tháng 2',
                3 => 'Tháng 3',
                4 => 'Tháng 4',
                5 => 'Tháng 5',
                6 => 'Tháng 6',
                7 => 'Tháng 7',
                8 => 'Tháng 8',
                9 => 'Tháng 9',
                10 => 'Tháng 10',
                11 => 'Tháng 11',
                12 => 'Tháng 12'
            );

            $monthName = $vietnameseMonths[intval($currentMonth)];
            $queryNap = "
SELECT * FROM `account` WHERE `tongnap` > 0 ORDER BY `tongnap` DESC LIMIT 10";

            $stmtNap = $conn->prepare($queryNap);
            $stmtNap->execute(['currentMonth' => $currentMonth, 'currentYear' => $currentYear]);

            $querySucManh = "
SELECT * FROM `account` WHERE `tongnap` > 0 ORDER BY `tongnap` DESC LIMIT 10";

            $dataSucManh = $conn->query($querySucManh);
            ?>

            <div class="manage-body">
                <div class="alert d-flex"></div>

                <div class="buttons text-center">
                    <button class="btn btn-info btn-block text-white" onclick="showTable('nap')">Top Nạp</button>
                    <button class="btn btn-info btn-block text-white" onclick="showTable('sucmanh')">Top Sức
                        Mạnh</button>
                </div>

                <div id="nap-table" class="table-container">
                    <div class="card-title h5 text-center">
                        <img style="display: inline-block; height: 2rem;" src="/Assets/Images/Top.png" alt="iconTop"
                            class="icon">
                        <h1 style="display: inline-block; font-size: 1.25rem; line-height: 1.75rem;"
                            class="inline-title">BẢNG
                            XẾP HẠNG ĐUA TOP NẠP - <?= $monthName ?></h1>
                        <img style="display: inline-block; height: 2rem;" src="/Assets/Images/Top.png" alt="iconTop"
                            class="icon">
                    </div>
                    <?php if ($stmtNap->rowCount() > 0): ?>
                        <table class="table table-bordered table-hover mt-5">
                            <thead class="text-center">
                                <tr class="border-solid border-2">
                                    <th>#</th>
                                    <th>Nhân vật</th>
                                    <th>Điểm</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $stt = 1;
                                while ($row = $stmtNap->fetch(PDO::FETCH_ASSOC)): ?>
                                    <tr class="border-solid border-2 bg-orange-200">
                                        <th class="border-solid border-2"><?= $stt++ ?></th>
                                        <th class="border-solid border-2"><?= htmlspecialchars($row['name']) ?></th>
                                        <th class="border-solid border-2"><?= number_format($row['tongnap'], 0, ',') ?>đ</th>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <center>
                            <h6>Chưa có thống kê bảng xếp hạng top nạp tháng này!</h6>
                        </center>
                    <?php endif; ?>
                </div>

                <div id="sucmanh-table" class="table-container" style="display: none;">
                    <div class="card-title h5 text-center">
                        <img style="display: inline-block; height: 2rem;" src="/Assets/Images/Top.png" alt="iconTop"
                            class="icon">
                        <h1 style="display: inline-block; font-size: 1.25rem; line-height: 1.75rem;"
                            class="inline-title">BẢNG XẾP HẠNG ĐUA SỨC MẠNH</h1>
                        <img style="display: inline-block; height: 2rem;" src="/Assets/Images/Top.png" alt="iconTop"
                            class="icon">
                    </div>

                    <table class="table table-bordered table-hover mt-5">
                        <thead class="text-center">
                            <tr class="border-solid border-2">
                                <th>#ID</th>
                                <th>Nhân Vật</th>
                                <th>Sức Mạnh</th>
                                <th>Đệ Tử</th>
                                <th>Hành Tinh</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php if ($dataSucManh->rowCount() > 0):
                                $countTop = 1;
                                while ($row = $dataSucManh->fetch(PDO::FETCH_ASSOC)): ?>
                                    <tr class="border-solid border-2 bg-orange-200">
                                        <th class="border-solid border-2"><?= $countTop++ ?></th>
                                        <th class="border-solid border-2"><?= htmlspecialchars($row['name']) ?></th>
                                        <th class="border-solid border-2"><?= formatValue($row['second_value']) ?></th>
                                        <th class="border-solid border-2"><?= formatValue($row['detu_sm']) ?></th>
                                        <th class="border-solid border-2"><?= getPlanetName($row['gender']) ?></th>
                                        <th class="border-solid border-2"><?= formatValue($row['tongdiem']) ?></th>
                                    </tr>
                                <?php endwhile; else: ?>
                                <tr>
                                    <td colspan="6">Máy Chủ 1 chưa có thông kê bảng xếp hạng!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php
            function formatValue($value)
            {
                if ($value != '') {
                    if ($value > 1000000000) {
                        return number_format($value / 1000000000, 1, '.', '') . ' tỷ';
                    } elseif ($value > 1000000) {
                        return number_format($value / 1000000, 1, '.', '') . ' triệu';
                    } elseif ($value >= 1000) {
                        return number_format($value / 1000, 1, '.', '') . ' k';
                    } else {
                        return number_format($value, 0, ',', '');
                    }
                } else {
                    return 'Không có chỉ số';
                }
            }

            function getPlanetName($gender)
            {
                switch ($gender) {
                    case 0:
                        return "Trái Đất";
                    case 1:
                        return "Namec";
                    case 2:
                        return "Xayda";
                    default:
                        return "Không xác định";
                }
            }
            ?>
        </div>
        <script>
            function showTable(table) {
                var napTable = document.getElementById('nap-table');
                var sucManhTable = document.getElementById('sucmanh-table');

                if (table === 'nap') {
                    napTable.style.display = 'block';
                    sucManhTable.style.display = 'none';
                } else if (table === 'sucmanh') {
                    napTable.style.display = 'none';
                    sucManhTable.style.display = 'block';
                }
            }

        </script>
        <div class="mt-4">
            <br>
            <div class="card-title h5" style="text-align: center;">Giới thiệu
            </div>
            <hr>
            <div class="mx-2 fs-6">
                <div class="mx-2 fs-6"><p>Ngọc Rồng Online là Trò Chơi Trực Tuyến với cốt truyện xoay quanh bộ truyện tranh 7 viên Ngọc Rồng. Người chơi sẽ hóa thân thành một trong những anh hùng của 3 hành tinh: Trái Đất, Xayda, Namếc. Cùng luyện tập, tăng cường sức mạnh và kỹ năng. Đoàn kết cùng chiến đấu chống lại các thế lực hung ác. Cùng nhau tranh tài.<br>
Đặc điểm nổi bật:<br>
- Thể loại hành động, nhập vai. Trực tiếp điều khiển nhân vật hành động. Dễ chơi, dễ điều khiển nhân vật. Đồ họa sắc nét. Có phiên bản đồ họa cao cho điện thoại mạnh và phiên bản pixel cho máy cấu hình thấp.<br>
- Cốt truyện bám sát nguyên tác. Người chơi sẽ gặp tất cả nhân vật từ Bunma, Quy lão kame, Jacky-chun, Tàu Pảy Pảy... cho đến Fide, Pic, Poc, Xên, Broly, đội Bojack.<br>
- Đặc điểm nổi bật nhất: Tham gia đánh doanh trại độc nhãn. Tham gia đại hội võ thuật. Tham gia săn lùng ngọc rồng để mang lại điều ước cho bản thân.<br>
- Tương thích tất cả các dòng máy trên thị trường hiện nay: Máy tính PC, Điện thoại di động Nokia Java, Android, iPhone, Windows Phone, và máy tính bảng Android, iPad.</p>
<p style="color:red;text-align:center;margin-bottom: -10px;r">Cơ Bản</p><br>
<p style="text-align:center"><img alt="" src="https://ngocrongonline.com/gif//gif_maphongba.gif" style="">&nbsp;<img alt="" src="https://ngocrongonline.com/gif//gif_gif_Saiyain.gif" style="">&nbsp;<img alt="" src="https://ngocrongonline.com/gif/gif_supber_kame.gif" style="">&nbsp;</p>
<p></p>
<p style="color:red;text-align:center;margin-bottom: -10px;r">VIP</p><br>
<p style="text-align:center"><img alt="" src="https://ngocrongonline.com/gif//gif_maphongba_VIP.gif" style="">&nbsp;<img alt="" src="https://ngocrongonline.com/gif//gif_gif_Saiyain_VIP.gif" style="">&nbsp;<img alt="" src="https://ngocrongonline.com/gif/gif_supber_kame_VIP.gif" style="">&nbsp;</p>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
<?php
include 'Controllers/Footer.php';
?>