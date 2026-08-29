<!DOCTYPE html>
<html class="light" lang="vi">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?= isset($pageTitle) ? $pageTitle : 'Hệ thống Quản lý Công chứng' ?> - NotaryOS</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Courier+Prime&family=Source+Serif+4:wght@400;700&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com/3.4.4?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#0f172a",
                        "surface": "#f8fafc",
                        "on-surface": "#1e293b",
                        "on-surface-variant": "#475569",
                        "outline-variant": "#cbd5e1",
                        "secondary": "#64748b",
                    },
                    fontFamily: {
                        "body-md": ["Inter", "sans-serif"],
                        "mono-data": ["Courier Prime", "monospace"],
                        "doc-body": ["'Source Serif 4'", "serif"],
                    }
                },
            },
        }
    </script>
    
    <!-- CSS Core -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-[#f4f7fb] text-on-surface font-body-md min-h-screen flex flex-col overflow-hidden selection:bg-blue-200">
    
    <!-- Top Navigation -->
    <nav class="sticky top-0 z-[100] flex items-center justify-between px-4 sm:px-6 h-16 w-full bg-white/90 backdrop-blur-md border-b border-slate-200 shadow-sm shrink-0">
        
        <!-- Khối Logo & Nút Menu Mobile -->
        <div class="flex items-center gap-3 h-full">
            
            <!-- Nút Hamburger (Chỉ hiện trên Mobile) -->
            <button onclick="toggleMobileMenu()" class="xl:hidden p-1.5 text-slate-600 rounded-lg hover:bg-slate-100 focus:outline-none transition-colors">
                <span class="material-symbols-outlined text-[26px]">menu</span>
            </button>

            <!-- Logo -->
            <a href="TrangChu.php" class="flex items-center gap-2.5 shrink-0 group">
                <img src="img/logo-NTM.png" alt="VPCC Nguyễn Thành Mỹ" class="h-8 sm:h-9 w-auto object-contain group-hover:scale-105 transition-transform duration-200">
                <div class="w-px h-8 bg-slate-300 hidden sm:block"></div>
                <div class="hidden sm:flex flex-col justify-center">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest leading-none mb-1">Văn Phòng Công Chứng</span>
                    <span class="font-black text-blue-900 uppercase tracking-tight text-[15px] leading-none">Nguyễn Thành Mỹ</span>
                </div>
            </a>
        </div>
        
        <!-- Khối Menu Ngang (Chỉ hiện trên màn hình lớn xl) -->
        <div class="hidden xl:flex gap-1 lg:gap-3 items-end h-full pt-3 flex-1 justify-center">
            <a href="TrangChu.php" class="<?= ($currentPage === 'dashboard') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Trang Chủ</a>
            
            <a href="SoanHoSo.php" class="<?= ($currentPage === 'hoso') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Soạn Hồ Sơ</a>
            
            <a href="MauIn.php" class="<?= ($currentPage === 'template') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Mẫu In</a>

            <a href="KeKhaiHoSo.php" class="<?= ($currentPage === 'kekhaihoso') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Kê Khai Hồ Sơ</a>
            
            <a href="VanPhongPham.php" class="<?= ($currentPage === 'vpp') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Quản Lý VPP</a>

            <a href="TraCuuNganChan.php" class="<?= ($currentPage === 'tracuu') ? 'text-red-700 font-bold border-b-[3px] border-red-600 bg-red-50/50' : 'text-slate-500 hover:text-red-700 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Tra Cứu</a>

            <!-- Dropdown Quản Lý (Admin) -->
            <?php if($userRole === 'ADMIN' || true): /* Tạm để true cho bạn test giao diện */ ?>
            <div class="relative h-full flex items-end">
                <button onclick="toggleDropdown('admin-dropdown', event)" class="<?= ($currentPage === 'users' || $currentPage === 'settings') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap flex items-center gap-1 cursor-pointer">
                    Quản Lý <span class="material-symbols-outlined text-[18px]">expand_more</span>
                </button>

                <div id="admin-dropdown" class="dropdown-menu absolute left-0 top-[60px] w-48 bg-white rounded-b-xl rounded-tr-xl shadow-xl border border-slate-200 opacity-0 invisible transition-all duration-200 z-50 overflow-hidden transform origin-top-left scale-95">
                    <div class="py-1 flex flex-col">
                        <a href="QuanLyTaiKhoan.php" class="px-4 py-2.5 text-[13px] font-semibold <?= ($currentPage === 'users') ? 'text-blue-700 bg-blue-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' ?> flex items-center gap-3 transition-colors">
                            <span class="material-symbols-outlined text-[18px]">group</span> Quản lý tài khoản
                        </a>
                        <a href="CaiDatHeThong.php" class="px-4 py-2.5 text-[13px] font-semibold <?= ($currentPage === 'settings') ? 'text-blue-700 bg-blue-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' ?> flex items-center gap-3 transition-colors">
                            <span class="material-symbols-outlined text-[18px]">settings</span> Cài đặt hệ thống
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- Khối Avatar Phải -->
        <div class="flex items-center gap-4 shrink-0 relative z-50">
            <div>
                <button onclick="toggleDropdown('user-dropdown', event)" class="flex items-center gap-1.5 p-1 rounded-full hover:bg-slate-100 transition-colors active:scale-95 border border-transparent hover:border-slate-200 focus:outline-none">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-700 to-blue-900 text-white flex items-center justify-center font-bold text-[13px] shadow-sm ring-2 ring-white">
                        <?= substr($userName ?? 'A', 0, 1) ?>
                    </div>
                    <span class="material-symbols-outlined text-slate-400 text-[18px]">expand_more</span>
                </button>

                <!-- Bảng Dropdown User xổ xuống -->
                <div id="user-dropdown" class="dropdown-menu absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.15)] border border-slate-200 opacity-0 invisible transition-all duration-200 z-50 overflow-hidden transform origin-top-right scale-95">
                    <div class="px-4 py-3 border-b border-slate-100 bg-slate-50/50">
                        <p class="text-[13px] font-bold text-slate-900 truncate" title="<?= $userName ?? 'Nguyễn Văn A' ?>">
                            <?= $userName ?? 'Nguyễn Văn A' ?>
                        </p>
                        <p class="text-[11px] font-bold text-blue-600 uppercase tracking-wider mt-0.5">
                            <?= $userRole ?? 'TK' ?>
                        </p>
                    </div>
                    <div class="py-1 flex flex-col">
                        <a href="TaiKhoan.php" class="px-4 py-2.5 text-[13px] font-medium text-slate-700 hover:bg-slate-50 hover:text-blue-600 flex items-center gap-2.5 transition-colors">
                            <span class="material-symbols-outlined text-[18px] text-slate-400">manage_accounts</span> Hồ sơ cá nhân
                        </a>
                        <div class="h-px bg-slate-100 w-full my-1"></div>
                        <a href="logout.php" class="px-4 py-2.5 text-[13px] font-medium text-red-600 hover:bg-red-50 flex items-center gap-2.5 transition-colors">
                            <span class="material-symbols-outlined text-[18px] text-red-400">logout</span> Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- ==========================================
         MENU MOBILE (Chỉ xuất hiện khi bấm Hamburger)
    =========================================== -->
    <div id="mobile-menu" class="hidden absolute top-16 left-0 w-full bg-white border-b border-slate-200 shadow-xl z-40 overflow-y-auto max-h-[calc(100vh-64px)] xl:hidden">
        <div class="flex flex-col p-4 space-y-1">
            <a href="TrangChu.php" class="px-4 py-3 rounded-xl text-[15px] font-semibold <?= ($currentPage === 'dashboard') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 active:bg-slate-50' ?>">Trang Chủ</a>
            <a href="SoanHoSo.php" class="px-4 py-3 rounded-xl text-[15px] font-semibold <?= ($currentPage === 'hoso') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 active:bg-slate-50' ?>">Soạn Hồ Sơ</a>
            <a href="MauIn.php" class="px-4 py-3 rounded-xl text-[15px] font-semibold <?= ($currentPage === 'template') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 active:bg-slate-50' ?>">Mẫu In</a>
            <a href="KeKhaiHoSo.php" class="px-4 py-3 rounded-xl text-[15px] font-semibold <?= ($currentPage === 'kekhaihoso') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 active:bg-slate-50' ?>">Kê Khai Hồ Sơ</a>
            <a href="VanPhongPham.php" class="px-4 py-3 rounded-xl text-[15px] font-semibold <?= ($currentPage === 'vpp') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 active:bg-slate-50' ?>">Quản Lý VPP</a>
            <a href="TraCuuNganChan.php" class="px-4 py-3 rounded-xl text-[15px] font-semibold <?= ($currentPage === 'tracuu') ? 'bg-red-50 text-red-700' : 'text-slate-600 active:bg-slate-50' ?>">Tra Cứu</a>

            <?php if($userRole === 'ADMIN' || true): ?>
            <div class="h-px bg-slate-200 my-2"></div>
            <p class="px-4 py-1 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Dành cho Admin</p>
            <a href="QuanLyTaiKhoan.php" class="px-4 py-3 rounded-xl text-[15px] font-semibold <?= ($currentPage === 'users') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 active:bg-slate-50' ?>">Quản lý tài khoản</a>
            <a href="CaiDatHeThong.php" class="px-4 py-3 rounded-xl text-[15px] font-semibold <?= ($currentPage === 'settings') ? 'bg-slate-100 text-slate-900' : 'text-slate-600 active:bg-slate-50' ?>">Cài đặt hệ thống</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Script điều khiển Dropdown và Menu Mobile -->
    <script>
        // Hàm đóng mở Dropdown bằng Javascript
        function toggleDropdown(id, event) {
            event.stopPropagation(); // Ngăn chặn sự kiện click lan ra ngoài
            const el = document.getElementById(id);
            
            // Đóng tất cả các menu khác trước
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu.id !== id) {
                    menu.classList.add('opacity-0', 'invisible', 'scale-95');
                    menu.classList.remove('scale-100');
                }
            });

            // Mở hoặc đóng menu hiện tại
            if (el.classList.contains('invisible')) {
                el.classList.remove('opacity-0', 'invisible', 'scale-95');
                el.classList.add('scale-100');
            } else {
                el.classList.add('opacity-0', 'invisible', 'scale-95');
                el.classList.remove('scale-100');
            }
        }

        // Đóng Dropdown khi bấm ra bất kỳ đâu trên màn hình
        document.addEventListener('click', function(event) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (!menu.contains(event.target)) {
                    menu.classList.add('opacity-0', 'invisible', 'scale-95');
                    menu.classList.remove('scale-100');
                }
            });
        });

        // Đóng/Mở Menu Hamburger trên Điện thoại
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>

    <!-- Main Workspace -->
    <main class="flex-1 relative overflow-hidden flex flex-col bg-transparent">