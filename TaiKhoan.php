<?php
require_once 'includes/role_config.php';
$currentPage = 'taikhoan';
$pageTitle = 'Thông Tin Tài Khoản';
require_once 'includes/header.php';
?>

<div class="p-6 overflow-y-auto animate-fade-in w-full h-full flex justify-center bg-slate-50/50">
    <div class="max-w-2xl w-full bg-white rounded-2xl border border-outline-variant shadow-md p-8 mt-10 h-max">
        <div class="flex items-center gap-4 border-b border-slate-100 pb-6 mb-6">
            <div class="w-16 h-16 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold text-2xl shadow-sm"><?= substr($userName, 0, 1) ?></div>
            <div>
                <h1 class="text-2xl font-bold text-primary"><?= $userName ?></h1>
                <span class="px-3 py-1 mt-1 inline-block bg-blue-100 text-blue-700 rounded-full font-bold text-xs uppercase"><?= $userRole === 'CCV' ? 'Công Chứng Viên' : 'Thư Ký' ?></span>
            </div>
        </div>

        <form class="space-y-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="form-label">Họ và Tên</label>
                    <input class="form-input bg-slate-50 text-slate-500" type="text" value="<?= $userName ?>" readonly>
                </div>
                <div>
                    <label class="form-label">Email / Tài khoản</label>
                    <input class="form-input bg-slate-50 text-slate-500" type="email" value="nva@congchung.vn" readonly>
                </div>
            </div>
            
            <div class="border-t border-slate-100 pt-6">
                <h3 class="font-bold text-primary mb-4 text-lg">Đổi Mật Khẩu</h3>
                <div class="space-y-4">
                    <div>
                        <label class="form-label">Mật khẩu hiện tại</label>
                        <input class="form-input input-glow" type="password" placeholder="••••••••">
                    </div>
                    <div>
                        <label class="form-label">Mật khẩu mới</label>
                        <input class="form-input input-glow" type="password" placeholder="••••••••">
                    </div>
                    <div class="pt-2">
                        <button type="button" onclick="showToast('Đã cập nhật mật khẩu!')" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-md transition-all active:scale-95">Lưu Thay Đổi</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>