<?php
include '../../Controllers/Connections.php';
include '../../Controllers/Sessions.php';
include '../../Controllers/Configs.php';

if (isset($_Username)) {
    $itemsPerPage = 5;
    $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $startIndex = ($currentPage - 1) * $itemsPerPage;
    $stmt = $conn->prepare("SELECT * FROM `napthe` WHERE user_nap = :username ORDER BY created_at DESC LIMIT $startIndex, $itemsPerPage");
    $stmt->bindParam(":username", $_Username);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Loại Thẻ</th>
                <th>Giá Trị</th>
                <th>Trạng Thái</th>
                <th>Thời Gian</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($result) > 0) {
                echo '<div class="table-responsive">';
                foreach ($result as $index => $row) {
                    $count = $startIndex + $index + 1;
                    switch ($row['status']) {
                        case 1:
                            $status = 'Thẻ đúng';
                            break;
                        case 2:
                            $status = 'Thẻ sai';
                            break;
                        case 3:
                            $status = 'Thẻ lỗi';
                            break;
                        default:
                            $status = 'Chờ Duyệt';
                    }
                    $formattedDate = date('H:i d/m/Y', strtotime($row['created_at']));

                    ?>
                    <tr class="border-solid border border-transparent border-b-orange-300">
                        <td class="px-6 py-4 font-medium break-words">
                            <span class="text-red-600 font-semibold text-base">#<?= $count ?></span>
                        </td>
                        <td class="px-6 py-4 break-words"><?= $row['telco'] ?></td>
                        <td class="px-6 py-4 break-words"><?= formatMoney($row['amount']) ?></td>
                        <td class="px-6 py-4 break-words"><?= $status ?></td>
                        <td class="px-6 py-4 break-words"><?= $formattedDate ?></td>
                    </tr>
                    <?php
                }
                echo '</tbody></table></div>';
                echo '<div class="col text-right">';
                echo '<ul class="pagination justify-content-end pagination-custom-style">';
                if ($currentPage > 1) {
                    echo '<li><a class="btn btn-sm btn-light" href="?page=' . ($currentPage - 1) . '"><</a></li>';
                }
                $totalItems = $conn->query("SELECT count(*) FROM `napthe` WHERE user_nap = '$_Username'")->fetchColumn();
                $totalPages = ceil($totalItems / $itemsPerPage);
                $numLinks = min(3, $totalPages);
                $middlePage = floor($numLinks / 2);
                $startPage = max(1, $currentPage - $middlePage);
                $endPage = min($totalPages, $startPage + $numLinks - 1);
                for ($i = $startPage; $i <= $endPage; $i++) {
                    if ($i == $currentPage) {
                        echo '<li><a class="btn btn-sm page-active">' . $i . '</a></li>';
                    } else {
                        echo '<li><a class="btn btn-sm btn-light" href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                if ($currentPage < $totalPages) {
                    echo '<li><a class="btn btn-sm btn-light" href="?page=' . ($currentPage + 1) . '">></a></li>';
                }
                echo '</ul>';
                echo '</div>';
            } else {
                echo '<div class="text-center">Không có dữ liệu lịch sử nạp thẻ.</div>';
            }
} else {
    echo '<div class="text-center">Bạn cần đăng nhập để xem lịch sử nạp thẻ.</div>';
}