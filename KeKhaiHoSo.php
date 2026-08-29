<?php
require_once 'includes/role_config.php';
$currentPage = 'kekhaihoso';
$pageTitle = 'Kê Khai Hồ Sơ';
require_once 'includes/header.php';

// Mockup data (Bạn sẽ thay bằng kết quả truy vấn DB thực tế)
$dsHoSo = [
    ['Ngay' => '12/10/2023', 'So_CC' => 'HS-2026-001', 'Ten' => 'Hợp đồng mua bán xe máy', 'NV' => 'Nguyễn Văn A', 'CCV' => 'Nguyễn Thành Mỹ', 'GiaTri' => '50.000.000', 'PhanNhom' => 'Nhóm 1', 'Diem' => 1.5, 'TrangThai' => 1],
    ['Ngay' => '11/10/2023', 'So_CC' => 'HS-2026-002', 'Ten' => 'Ủy quyền sử dụng đất', 'NV' => 'Trần Thị B', 'CCV' => 'Nguyễn Hoàng Nguyên', 'GiaTri' => '-', 'PhanNhom' => 'Nhóm 2', 'Diem' => 2.0, 'TrangThai' => 3],
];
?>

<div class="p-4 sm:p-6 overflow-y-auto custom-scrollbar animate-fade-in w-full h-[calc(100vh-64px)] bg-[#eaf1ff] pb-24">
    <div class="w-full flex flex-col gap-6 sm:gap-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Kê Khai Hồ Sơ</h1>
                <p class="text-sm sm:text-base text-slate-500 mt-1 font-medium">Nhập liệu, theo dõi và tính điểm nghiệp vụ hồ sơ.</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center gap-2 px-5 py-2.5 bg-amber-500 text-white rounded-xl font-bold text-sm shadow-md hover:bg-amber-600 transition-all active:scale-95">
                    <span class="material-symbols-outlined text-[20px]">shield_lock</span> Yêu cầu file Scan
                </button>
            </div>
        </div>

        <!-- Bộ Lọc Nâng Cao -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 flex flex-col gap-4">
            <div class="flex flex-col xl:flex-row gap-4 justify-between items-center">
                <div class="flex flex-wrap items-center gap-3 w-full xl:w-auto">
                    <select class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 outline-none focus:border-blue-500">
                        <option>Tháng 10</option>
                        <option>Tháng 11</option>
                    </select>
                    <select class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 outline-none focus:border-blue-500">
                        <option>Năm 2026</option>
                    </select>
                    <select class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 outline-none focus:border-blue-500">
                        <option>-- Trạng thái --</option>
                        <option>Chờ duyệt</option>
                        <option>Hoàn tất</option>
                    </select>
                    <select class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 outline-none focus:border-blue-500">
                        <option>-- Tất cả thư ký --</option>
                    </select>
                </div>
                
                <div class="flex items-center gap-3 w-full xl:w-auto">
                    <div class="relative w-full xl:w-64">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                        <input type="text" placeholder="Tìm số CC, tên hồ sơ..." class="pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm w-full focus:outline-none focus:border-blue-500">
                    </div>
                    <button class="px-5 py-2 bg-blue-600 text-white rounded-xl font-bold text-sm hover:bg-blue-700 transition-all whitespace-nowrap">Lọc</button>
                    <button class="px-5 py-2 bg-emerald-600 text-white rounded-xl font-bold text-sm hover:bg-emerald-700 transition-all flex items-center gap-2 whitespace-nowrap">
                        <span class="material-symbols-outlined text-[18px]">download</span> Excel
                    </button>
                </div>
            </div>
        </div>

        <!-- Box Tổng Điểm -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 rounded-2xl p-5 flex justify-between items-center shadow-sm">
            <div class="flex items-center gap-3 text-blue-800">
                <span class="material-symbols-outlined text-3xl">bar_chart</span>
                <span class="font-bold text-lg">Tổng điểm nghiệp vụ danh sách hiện tại:</span>
            </div>
            <div class="bg-white px-6 py-2 rounded-full shadow-sm border border-blue-200 text-2xl font-black text-indigo-700">
                34.50
            </div>
        </div>

        <!-- Bảng Dữ Liệu -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
            <div class="w-full overflow-x-auto custom-scrollbar pb-2">
                <table class="w-full text-left border-collapse min-w-[1100px]">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-200">
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center w-12">STT</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest">Ngày</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest">Số CC</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest w-[25%]">Tên Hồ Sơ</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-right">Giá Trị TS</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">SL Bản</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">Điểm</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest">Trạng Thái</th>
                            <th class="p-4 font-bold text-[11px] text-slate-500 uppercase tracking-widest text-center">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php foreach($dsHoSo as $i => $row): ?>
                        <tr class="hover:bg-blue-50/40 transition-colors">
                            <td class="p-4 text-center font-medium text-slate-500"><?= $i + 1 ?></td>
                            <td class="p-4 text-[13px] text-slate-600 font-medium"><?= $row['Ngay'] ?></td>
                            <td class="p-4 text-[13px] font-mono font-bold text-blue-700"><?= $row['So_CC'] ?></td>
                            <td class="p-4">
                                <div class="font-bold text-slate-900 text-[13px]"><?= $row['Ten'] ?></div>
                                <div class="text-[11px] text-slate-500 mt-1">NV: <?= $row['NV'] ?> | CCV: <?= $row['CCV'] ?></div>
                            </td>
                            <td class="p-4 text-right text-[13px] font-semibold text-slate-700"><?= $row['GiaTri'] ?></td>
                            <td class="p-4 text-center text-[13px] font-medium text-slate-700">2</td>
                            <td class="p-4 text-center">
                                <span class="bg-blue-100 text-blue-800 font-bold px-3 py-1 rounded-lg text-[12px]"><?= number_format($row['Diem'], 2) ?></span>
                            </td>
                            <td class="p-4">
                                <?php if($row['TrangThai'] == 1): ?>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-700 rounded-full font-bold text-[10px] uppercase border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Chờ Duyệt
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full font-bold text-[10px] uppercase border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Hoàn Tất
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="p-4 text-center">
                                <button onclick="openChamDiemModal()" class="p-2 hover:bg-slate-200 rounded-xl text-blue-600 transition-all font-bold text-[13px] border border-slate-200 shadow-sm">
                                    <span class="material-symbols-outlined text-[18px]">edit_document</span>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ==============================================
     MODAL CHẤM ĐIỂM (Phiên bản Tailwind)
=============================================== -->
<div id="chamDiemModal" class="fixed inset-0 z-[100] bg-slate-900/60 hidden items-center justify-center backdrop-blur-sm transition-opacity opacity-0">
    <div class="bg-white rounded-3xl w-[95vw] lg:w-[1200px] h-[90vh] flex flex-col shadow-2xl transform scale-95 transition-transform duration-300">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-slate-50 rounded-t-3xl">
            <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <span class="material-symbols-outlined text-blue-600">assignment_turned_in</span> 
                Đánh giá hồ sơ: <span class="text-blue-600 font-mono tracking-wider">HS-2026-001</span>
            </h3>
            <button onclick="closeChamDiemModal()" class="text-slate-400 hover:text-red-500 transition-colors">
                <span class="material-symbols-outlined text-3xl">close</span>
            </button>
        </div>

        <!-- Modal Body (Split Layout) -->
        <div class="flex-1 flex flex-col lg:flex-row overflow-hidden">
            
            <!-- Cột trái: Dữ liệu / PDF (70%) -->
            <div class="w-full lg:w-[70%] border-r border-slate-200 flex flex-col bg-[#f8f9ff]">
                
                <!-- Tabs -->
                <div class="flex px-6 pt-4 border-b border-slate-200 gap-6">
                    <button class="pb-3 text-[14px] font-bold text-blue-700 border-b-2 border-blue-600 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">data_table</span> Dữ liệu hệ thống
                    </button>
                    <button class="pb-3 text-[14px] font-bold text-slate-500 hover:text-slate-800 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">picture_as_pdf</span> Bản Scan PDF
                    </button>
                </div>

                <!-- Dữ liệu Tab Content -->
                <div class="flex-1 overflow-y-auto p-6 custom-scrollbar space-y-6">
                    <div class="space-y-2 text-[14px] text-slate-700">
                        <p><strong class="text-slate-900">Tên hồ sơ:</strong> Hợp đồng mua bán xe máy</p>
                        <p><strong class="text-slate-900">Thư ký:</strong> Nguyễn Văn A</p>
                        <p><strong class="text-slate-900">Công chứng viên:</strong> Nguyễn Thành Mỹ</p>
                        <p><strong class="text-slate-900">Tổng giá trị:</strong> 50.000.000 VNĐ</p>
                    </div>

                    <div class="border border-slate-200 bg-white rounded-xl p-4 shadow-sm">
                        <h4 class="font-bold text-blue-800 text-[13px] uppercase mb-3 border-b border-slate-100 pb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">group</span> Thông tin khách hàng
                        </h4>
                        <div class="text-[13px] text-slate-600">
                            <div class="mb-2"><span class="bg-blue-100 text-blue-800 font-bold px-2 py-0.5 rounded text-[11px] mr-2">BÊN A</span> NGUYỄN VĂN A</div>
                            <div><span class="bg-red-100 text-red-800 font-bold px-2 py-0.5 rounded text-[11px] mr-2">BÊN B</span> TRẦN THỊ B</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cột phải: Chấm điểm (30%) -->
            <div class="w-full lg:w-[30%] p-6 flex flex-col overflow-y-auto bg-white">
                <h4 class="font-bold text-slate-900 text-[15px] uppercase mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-600">fact_check</span> Đánh giá nghiệp vụ
                </h4>

                <div class="space-y-6">
                    <div>
                        <label class="block text-[13px] font-bold text-slate-700 mb-2">1. Thư ký đề xuất điểm:</label>
                        <input type="number" step="0.1" class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-[15px] font-bold text-slate-900 outline-none focus:border-blue-500" placeholder="VD: 1.5">
                    </div>

                    <div>
                        <label class="block text-[13px] font-bold text-slate-700 mb-2">2. CCV duyệt điểm:</label>
                        <input type="number" step="0.1" class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-[15px] font-bold text-slate-900 outline-none focus:border-blue-500" placeholder="VD: 1.5">
                        <button class="mt-3 bg-emerald-100 text-emerald-800 font-bold text-[12px] px-3 py-1.5 rounded-lg w-full hover:bg-emerald-200 transition-colors">
                            <i class="bi bi-check-circle"></i> Đồng ý với điểm thư ký
                        </button>
                    </div>

                    <?php if($userRole === 'ADMIN'): ?>
                    <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
                        <label class="block text-[13px] font-bold text-red-800 mb-2">3. Trưởng VP chốt điểm (Admin):</label>
                        <input type="number" step="0.1" class="w-full bg-white border border-red-300 rounded-lg px-3 py-2 text-[15px] font-bold text-red-900 outline-none focus:border-red-500" placeholder="Chốt điểm">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-3xl">
            <button onclick="closeChamDiemModal()" class="px-5 py-2.5 rounded-xl font-bold text-[13px] text-slate-600 bg-white border border-slate-300 hover:bg-slate-100 transition-colors">Đóng</button>
            <button class="px-6 py-2.5 rounded-xl font-bold text-[13px] text-white bg-blue-600 hover:bg-blue-700 shadow-md transition-colors">Lưu Đánh Giá</button>
        </div>

    </div>
</div>

<?php require_once 'includes/footer.php'; ?>