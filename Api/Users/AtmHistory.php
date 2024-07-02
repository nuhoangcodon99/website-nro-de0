<?php
include '../../Controllers/Connections.php';
include '../../Controllers/Sessions.php';
include '../../Controllers/Configs.php';

if (isset($_Id)) {
    $itemsPerPage = 5;
    $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $startIndex = ($currentPage - 1) * $itemsPerPage;
    $stmt = $conn->prepare("SELECT * FROM atm_lichsu WHERE user_nap = :id ORDER BY id DESC LIMIT $startIndex, $itemsPerPage");
    $stmt->bindParam(":id", $_Id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        echo '<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT:</th>
                        <th>Số Tiền</th>
                        <th>Trạng Thái</th>
                        <th>Mã Giao Dịch</th>
                        <th>Ngày Tháng</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($result as $index => $row) {
            $count = $startIndex + $index + 1;
            $status = '';
            switch ($row['status']) {
                case 1:
                    $status = '<span>Đã thanh toán</span>';
                    break;
                case 2:
                    $status = '<span>Chưa thanh toán</span>';
                    break;
                default:
                    $status = '<span>Đang xử lý</span>';
            }

            echo '
                    <tr class="border-solid border border-transparent border-b-orange-300">
                        <td class="px-6 py-4 font-medium break-words">
                            <span class="text-red-600 font-semibold text-base">#' . $count . '</span>
                        </td>
                        <td class="px-6 py-4 break-words">' . formatMoney($row['sotien']) . '</td>
                        <td class="px-6 py-4 break-words">' . $status . '</td>
                        <td class="px-6 py-4 break-words">' . $row['magiaodich'] . '</td>
                        <td class="px-6 py-4 break-words">' . $row['thoigian'] . '</td>
                    </tr>';
        }
        echo '</tbody></table>';

        echo '<div class="col text-right">';
        echo '<ul class="pagination justify-content-end pagination-custom-style2">';
        if ($currentPage > 1) {
            echo '<li><a class="btn btn-sm btn-light" href="?page=' . ($currentPage - 1) . '"><</a></li>';
        }
        // Tính số trang cần hiển thị
        $totalItems = $conn->query("SELECT count(*) FROM `atm_lichsu` WHERE user_nap = '$_Id'")->fetchColumn();
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
        echo '<div class="text-center">Không có dữ liệu lịch sử giao dịch ATM.</div>';
    }
} else {
    echo '<div class="text-center">Không tìm thấy tên người dùng trong bảng account.</div>';
}