<?php
require_once 'includes/role_config.php';
$currentPage = 'dashboard';
$pageTitle = 'Trang Chủ';
require_once 'includes/header.php';
?>

<!-- Thiết lập cuộn trang toàn cục: w-full giúp giao diện full màn hình, bỏ căn giữa -->
<div class="p-4 sm:p-6 overflow-y-auto custom-scrollbar animate-fade-in w-full h-[calc(100vh-64px)] bg-[#eaf1ff]">
    <div class="w-full flex flex-col gap-6 sm:gap-8">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Tổng Quan Hệ Thống</h1>
                <!-- <p class="text-sm sm:text-base text-slate-500 mt-1 font-medium">Chào mừng trở lại! Dưới đây là tóm tắt hoạt động hồ sơ cá nhân của bạn.</p> -->
            </div>
            <div class="flex items-center gap-3">
                <a href="SoanHoSo.php" class="flex items-center gap-2 px-6 py-3 bg-blue-600 rounded-xl font-bold text-sm text-white shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-0.5 transition-all active:scale-95">
                    <span class="material-symbols-outlined text-[20px]">add</span> Tạo hồ sơ mới
                </a>
            </div>
        </div>
        
        <!-- 1. Stats Grid (4 Thẻ thống kê) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
            <!-- Tổng hồ sơ trong năm -->
            <div class="group bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col gap-4 hover:border-indigo-300 hover:shadow-xl hover:shadow-indigo-50 transition-all cursor-pointer relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-6xl text-indigo-600">folder_copy</span>
                </div>
                <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">folder_copy</span>
                </div>
                <div>
                    <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Tổng hồ sơ (Năm)</p>
                    <div class="flex items-end gap-2 mt-1">
                        <span class="text-4xl font-black text-slate-900">342</span>
                        <span class="text-indigo-500 text-xs font-bold mb-1.5 ml-1">Năm 2026</span>
                    </div>
                </div>
            </div>

            <!-- Tổng hồ sơ trong tháng -->
            <div class="group bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col gap-4 hover:border-blue-300 hover:shadow-xl hover:shadow-blue-50 transition-all cursor-pointer relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-6xl text-blue-600">calendar_month</span>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">calendar_month</span>
                </div>
                <div>
                    <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Tổng hồ sơ (Tháng)</p>
                    <div class="flex items-end gap-2 mt-1">
                        <span class="text-4xl font-black text-slate-900">45</span>
                        <span class="text-blue-500 text-xs font-bold mb-1.5 ml-1 flex items-center"><span class="material-symbols-outlined text-[14px]">trending_up</span> +12%</span>
                    </div>
                </div>
            </div>
            
            <!-- Đã xuất bản (Hôm nay) -->
            <div class="group bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col gap-4 hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-50 transition-all cursor-pointer relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-6xl text-emerald-600">task_alt</span>
                </div>
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">task_alt</span>
                </div>
                <div>
                    <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Đã xuất bản (Hôm nay)</p>
                    <div class="flex items-end gap-2 mt-1">
                        <span class="text-4xl font-black text-slate-900">08</span>
                        <span class="text-emerald-500 text-xs font-bold mb-1.5 ml-1">Hoàn tất</span>
                    </div>
                </div>
            </div>

            <!-- Nháp chưa xuất bản -->
            <div class="group bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col gap-4 hover:border-amber-300 hover:shadow-xl hover:shadow-amber-50 transition-all cursor-pointer relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-6xl text-amber-600">draft</span>
                </div>
                <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">draft</span>
                </div>
                <div>
                    <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Nháp (Chưa xuất bản)</p>
                    <div class="flex items-end gap-2 mt-1">
                        <span class="text-4xl font-black text-slate-900">12</span>
                        <span class="text-amber-500 text-xs font-bold mb-1.5 ml-1">Đang chờ xử lý</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- LAYOUT GRID CHÍNH (3 Cột Bảng : 2 Cột Biểu đồ) -->
        <div class="grid grid-cols-1 xl:grid-cols-5 gap-6 items-start relative z-10 pb-10">
            
            <!-- Phần 2: Bảng Danh Sách Hồ Sơ (Chiếm 3/5 chiều rộng) -->
            <div class="xl:col-span-3 bg-white rounded-3xl border border-slate-200 shadow-sm flex flex-col w-full">
                <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between sm:items-center gap-4 bg-white rounded-t-3xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                            <span class="material-symbols-outlined">folder_open</span>
                        </div>
                        <h2 class="font-bold text-xl text-slate-900 tracking-tight">Danh Sách Hồ Sơ</h2>
                    </div>
                    <div class="relative w-full sm:w-auto shrink-0">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                        <input type="text" placeholder="Tìm mã, tên KH..." class="pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all w-full sm:w-64">
                    </div>
                </div>
                
                <!-- Bỏ giới hạn chiều cao, cho bảng hiển thị 100% nội dung để liền mạch với Footer -->
                <div class="w-full overflow-x-auto xl:overflow-visible pb-2">
                    <table class="w-full text-left border-collapse min-w-[900px]">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-200">
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[25%]">Loại Hồ Sơ</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[25%]">Bên A (Bán/Ủy Quyền)</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[25%]">Bên B (Mua/Nhận)</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[10%]">Trạng Thái</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[10%]">Ngày XB</th>
                                <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center w-[5%]">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Row 1: Hồ sơ NHÁP -->
                            <tr class="group hover:bg-blue-50/40 transition-colors">
                                <td class="p-4 align-top">
                                    <div class="flex flex-col mt-1">
                                        <span class="font-bold text-slate-900 text-[13px]">Hợp đồng mua bán xe máy</span>
                                        <span class="text-[11px] text-slate-400 font-mono mt-0.5">HS-2026-001</span>
                                    </div>
                                </td>
                                <td class="p-4 align-top">
                                    <div class="flex flex-col gap-1.5">
                                        <span class="font-bold text-blue-900 text-[13px] uppercase">Nguyễn A</span>
                                        <span class="text-[11px] text-slate-500 flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px] text-slate-400">badge</span> 079090123456</span>
                                        <span class="text-[11px] text-slate-500 flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px] text-slate-400">call</span> 0901.234.567</span>
                                    </div>
                                </td>
                                <td class="p-4 align-top">
                                    <div class="flex flex-col gap-1.5">
                                        <span class="font-bold text-slate-800 text-[13px] uppercase">Trần Thị B</span>
                                        <span class="text-[11px] text-slate-500 flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px] text-slate-400">badge</span> 012345678912</span>
                                        <span class="text-[11px] text-slate-500 flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px] text-slate-400">call</span> 0987.654.321</span>
                                    </div>
                                </td>
                                <td class="p-4 align-top pt-5">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-700 rounded-full font-bold text-[10px] uppercase tracking-wide border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Nháp
                                    </span>
                                </td>
                                <td class="p-4 text-[13px] text-slate-400 font-medium italic align-top pt-5">Chưa XB</td>
                                
                                <td class="p-4 text-center align-top pt-3">
                                    <div class="relative inline-block text-left group/menu">
                                        <button class="p-2 hover:bg-slate-200 rounded-full text-slate-500 transition-all flex items-center justify-center">
                                            <span class="material-symbols-outlined">more_horiz</span>
                                        </button>
                                        <div class="absolute right-0 z-50 mt-1 w-40 origin-top-right rounded-xl bg-white shadow-xl ring-1 ring-slate-200 opacity-0 invisible group-hover/menu:opacity-100 group-hover/menu:visible transition-all duration-200">
                                            <div class="py-1 flex flex-col">
                                                <a href="#" class="px-4 py-2.5 text-[13px] font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600 flex items-center gap-3 transition-colors">
                                                    <span class="material-symbols-outlined text-[18px]">visibility</span> Xem hồ sơ
                                                </a>
                                                <a href="SoanHoSo.php" class="px-4 py-2.5 text-[13px] font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600 flex items-center gap-3 transition-colors">
                                                    <span class="material-symbols-outlined text-[18px]">edit</span> Sửa hồ sơ
                                                </a>
                                                <div class="h-px bg-slate-100 my-1 w-full"></div>
                                                <a href="#" class="px-4 py-2.5 text-[13px] font-semibold text-red-600 hover:bg-red-50 flex items-center gap-3 transition-colors">
                                                    <span class="material-symbols-outlined text-[18px]">delete</span> Xóa hồ sơ
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2: Hồ sơ ĐÃ XB -->
                            <tr class="group hover:bg-blue-50/40 transition-colors">
                                <td class="p-4 align-top">
                                    <div class="flex flex-col mt-1">
                                        <span class="font-bold text-slate-900 text-[13px]">Ủy quyền sử dụng đất</span>
                                        <span class="text-[11px] text-slate-400 font-mono mt-0.5">HS-2026-002</span>
                                    </div>
                                </td>
                                <td class="p-4 align-top">
                                    <div class="flex flex-col gap-1.5">
                                        <span class="font-bold text-blue-900 text-[13px] uppercase">Lê Văn C</span>
                                        <span class="text-[11px] text-slate-500 flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px] text-slate-400">badge</span> 045090987654</span>
                                        <span class="text-[11px] text-slate-500 flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px] text-slate-400">call</span> 0912.345.678</span>
                                    </div>
                                </td>
                                <td class="p-4 align-top">
                                    <div class="flex flex-col gap-1.5">
                                        <span class="font-bold text-slate-800 text-[13px] uppercase">Phạm Thị D</span>
                                        <span class="text-[11px] text-slate-500 flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px] text-slate-400">badge</span> 036080112233</span>
                                        <span class="text-[11px] text-slate-500 flex items-center gap-1.5"><span class="material-symbols-outlined text-[14px] text-slate-400">call</span> 0933.445.566</span>
                                    </div>
                                </td>
                                <td class="p-4 align-top pt-5">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full font-bold text-[10px] uppercase tracking-wide border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Đã XB
                                    </span>
                                </td>
                                <td class="p-4 text-[13px] text-slate-700 font-bold align-top pt-5">28/08/2026</td>
                                
                                <td class="p-4 text-center align-top pt-3">
                                    <div class="relative inline-block text-left group/menu">
                                        <button class="p-2 hover:bg-slate-200 rounded-full text-slate-500 transition-all flex items-center justify-center">
                                            <span class="material-symbols-outlined">more_horiz</span>
                                        </button>
                                        
                                        <!-- Dropdown Menu (Đã XB) mở lên trên (bottom-full mb-1) để tránh bị lấp ở dòng cuối -->
                                        <div class="absolute right-0 bottom-full mb-1 z-50 w-48 origin-bottom-right rounded-xl bg-white shadow-xl ring-1 ring-slate-200 opacity-0 invisible group-hover/menu:opacity-100 group-hover/menu:visible transition-all duration-200">
                                            <div class="py-1 flex flex-col">
                                                <a href="#" class="px-4 py-2.5 text-[13px] font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600 flex items-center gap-3 transition-colors">
                                                    <span class="material-symbols-outlined text-[18px]">visibility</span> Xem hồ sơ
                                                </a>
                                                <a href="#" class="px-4 py-2.5 text-[13px] font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600 flex items-center gap-3 transition-colors">
                                                    <span class="material-symbols-outlined text-[18px]">local_shipping</span> Yêu cầu xuất kho
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Table Footer -->
                <div class="p-5 border-t border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row items-center justify-between rounded-b-3xl gap-4">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Hiển thị 10 / 45 hồ sơ cá nhân</span>
                    <div class="flex gap-2">
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-400 hover:bg-slate-50 disabled:opacity-50" disabled>
                            <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-blue-600 hover:bg-blue-50 font-bold">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 font-semibold">2</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-slate-50">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Phần 3: Biểu đồ Thống kê (Chiếm 2/5 chiều rộng) - Chuyển sang biểu đồ Ngang -->
            <div class="xl:col-span-2 bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sticky top-0 w-full">
                <div class="flex flex-col justify-between items-start mb-6 gap-5">
                    <div class="flex items-center justify-between w-full">
                        <h2 class="font-bold text-xl text-slate-900 tracking-tight flex items-center gap-2">
                            <span class="material-symbols-outlined text-purple-600">pie_chart</span> Thống Kê Hồ Sơ
                        </h2>
                    </div>
                    
                    <!-- Toggle Tabs: Tháng / Năm -->
                    <div class="flex bg-slate-100 p-1.5 rounded-xl w-full sm:w-auto">
                        <button class="flex-1 sm:flex-none px-6 py-2 bg-white rounded-lg shadow-sm text-[13px] font-bold text-blue-700 transition-all">Tháng này</button>
                        <button class="flex-1 sm:flex-none px-6 py-2 rounded-lg text-[13px] font-bold text-slate-500 hover:text-slate-800 transition-all">Năm 2026</button>
                    </div>
                </div>
                
                <div class="flex items-center justify-between py-3 border-b border-slate-100 mb-4">
                    <span class="text-sm font-semibold text-slate-500">Tổng số lượng:</span>
                    <span class="text-blue-700 text-lg font-black">10 Hồ sơ</span>
                </div>

                <!-- Biểu đồ Hàng Ngang (Horizontal Bar Chart) -->
                <div class="space-y-6 mt-4">
                    
                    <!-- Bar 1 -->
                    <div>
                        <div class="flex justify-between items-center text-[13px] font-bold text-slate-700 mb-2.5">
                            <span>Hợp đồng ủy quyền</span>
                            <span class="text-blue-600 bg-blue-50 px-2 py-0.5 rounded-md">7 Hồ sơ (70%)</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                            <div class="bg-blue-500 h-3 rounded-full transition-all duration-1000" style="width: 70%"></div>
                        </div>
                    </div>
                    
                    <!-- Bar 2 -->
                    <div>
                        <div class="flex justify-between items-center text-[13px] font-bold text-slate-700 mb-2.5">
                            <span>Mua bán xe máy</span>
                            <span class="text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">2 Hồ sơ (20%)</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                            <div class="bg-emerald-400 h-3 rounded-full transition-all duration-1000" style="width: 20%"></div>
                        </div>
                    </div>

                    <!-- Bar 3 -->
                    <div>
                        <div class="flex justify-between items-center text-[13px] font-bold text-slate-700 mb-2.5">
                            <span>Mua bán nhà đất</span>
                            <span class="text-amber-600 bg-amber-50 px-2 py-0.5 rounded-md">1 Hồ sơ (10%)</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                            <div class="bg-amber-400 h-3 rounded-full transition-all duration-1000" style="width: 10%"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>