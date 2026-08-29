<!DOCTYPE html>
<html class="light" lang="vi">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?= isset($pageTitle) ? $pageTitle : 'Hệ thống Quản lý Hồ Sơ' ?></title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Courier+Prime&family=Source+Serif+4:wght@400;700&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS (Locked Version 3.4.4) -->
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
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.4s ease-in-out forwards',
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
    <nav class="sticky top-0 z-50 flex items-center justify-between px-6 h-16 w-full bg-white/80 backdrop-blur-md border-b border-outline-variant shadow-sm shrink-0">
        <div class="flex items-center gap-4 lg:gap-8">
            <span class="font-black text-blue-900 uppercase tracking-tight text-lg shrink-0">VPCC <span class="text-blue-500">NGUYỄN THÀNH MỸ</span></span>
            
            <!-- Danh sách Menu đã được bổ sung -->
            <div class="hidden md:flex gap-1 lg:gap-3 overflow-x-auto custom-scrollbar">
                <a href="TrangChu.php" class="<?= ($currentPage === 'dashboard') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Trang Chủ</a>
                
                <a href="SoanHoSo.php" class="<?= ($currentPage === 'hoso') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Soạn Hồ Sơ</a>
                
                <a href="MauIn.php" class="<?= ($currentPage === 'template') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Mẫu In</a>

                <!-- MENU MỚI THÊM -->
                <a href="KeKhaiHoSo.php" class="<?= ($currentPage === 'kekhaihoso') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Kê Khai Hồ Sơ</a>
                
                <a href="VanPhongPham.php" class="<?= ($currentPage === 'vpp') ? 'text-blue-700 font-bold border-b-[3px] border-blue-600 bg-blue-50/50' : 'text-slate-500 hover:text-blue-900 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Quản Lý VPP</a>

                <a href="TraCuuNganChan.php" class="<?= ($currentPage === 'tracuu') ? 'text-red-700 font-bold border-b-[3px] border-red-600 bg-red-50/50' : 'text-slate-500 hover:text-red-700 hover:bg-slate-100/80 border-b-[3px] border-transparent font-semibold' ?> transition-colors px-3 py-2 pb-1 rounded-t-lg whitespace-nowrap">Tra Cứu</a>
            </div>
        </div>
        
        <div class="flex items-center gap-4 shrink-0">
            <div class="relative group">
                <button class="flex items-center gap-2 hover:bg-slate-100 p-1.5 rounded-xl transition-colors active:scale-95 border border-transparent hover:border-slate-200">
                    <div class="w-8 h-8 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold text-sm shadow-sm"><?= substr($userName ?? 'A', 0, 1) ?></div>
                    <div class="text-left hidden sm:block">
                        <div class="font-semibold text-sm text-primary"><?= $userName ?? 'Nguyễn Văn A' ?> (<?= $userRole ?? 'TK' ?>)</div>
                    </div>
                </button>
                <div class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-outline-variant opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden transform origin-top-right scale-95 group-hover:scale-100">
                    <a href="TaiKhoan.php" class="w-full text-left px-4 py-3 hover:bg-slate-50 text-primary transition-colors flex items-center gap-3 text-sm font-medium">
                        <span class="material-symbols-outlined text-[20px] text-blue-600">manage_accounts</span> Cài đặt tài khoản
                    </a>
                    <div class="h-px bg-outline-variant w-full my-1"></div>
                    <a href="#" class="w-full text-left px-4 py-3 hover:bg-red-50 text-red-600 transition-colors flex items-center gap-3 text-sm font-medium">
                        <span class="material-symbols-outlined text-[20px]">logout</span> Đăng xuất
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Workspace -->
    <main class="flex-1 relative overflow-hidden flex flex-col bg-transparent">