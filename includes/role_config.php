<?php
// Giả lập session người dùng đăng nhập
$userRole = 'TK'; // 'CCV' (Công chứng viên) hoặc 'TK' (Thư ký)
$userName = 'Nguyễn Văn A';

// Hàm kiểm tra quyền hiển thị các block tính năng
function canView($feature, $role) {
    $permissions = [
        'duyet_ho_so' => ['CCV'],
        'soan_ho_so' => ['TK', 'CCV'],
        'quan_ly_mau' => ['Admin', 'CCV'],
        'xem_tat_ca' => ['TK', 'CCV']
    ];
    return in_array($role, $permissions[$feature] ?? []);
}
?>