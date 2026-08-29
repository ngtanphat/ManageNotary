<?php
require_once 'includes/role_config.php';
$currentPage = 'hoso';
$pageTitle = 'Soạn Hồ Sơ';
require_once 'includes/header.php';
?>

<style>
    .ruler-h {
        height: 14px;
        background-color: #f3f4f6;
        border-bottom: 1px solid #cbd5e1;
        background-image: repeating-linear-gradient(90deg, transparent, transparent 49px, #94a3b8 49px, #94a3b8 50px),
            repeating-linear-gradient(90deg, transparent, transparent 9px, #cbd5e1 9px, #cbd5e1 10px);
    }

    .protected-span {
        user-select: all;
        cursor: not-allowed;
        pointer-events: none;
    }

    .editor-scrollbar::-webkit-scrollbar {
        width: 14px;
    }

    .editor-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-left: 1px solid #e2e8f0;
    }

    .editor-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
        border: 4px solid #f1f5f9;
    }

    .editor-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>

<div class="h-[calc(100vh-64px)] flex w-full overflow-hidden bg-[#eaf1ff] animate-fade-in">

    <!-- ==========================================
         CỘT TRÁI: FORM NHẬP LIỆU
    =========================================== -->
    <section class="w-full md:w-[35%] xl:w-[30%] bg-white border-r border-slate-300 flex flex-col h-full z-10 shadow-[4px_0_24px_rgba(0,0,0,0.04)] relative shrink-0">
        <header class="px-6 py-4 border-b border-slate-200 bg-white/90 backdrop-blur-sm sticky top-0 z-20 flex justify-between items-center">
            <div>
                <h2 class="text-[20px] font-bold text-slate-900 tracking-tight">Nhập dữ liệu</h2>
                <p class="text-[12px] text-slate-500 mt-0.5">Điền thông tin chi tiết hợp đồng</p>
            </div>
        </header>

        <form id="form-hoso-data" class="flex-1 overflow-y-auto px-4 py-6 custom-scrollbar space-y-6 bg-[#f8f9ff]">

            <!-- SECTION A: BÊN BÁN -->
            <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                <div class="flex justify-between items-center mb-4 border-b border-slate-100 pb-2">
                    <h3 class="text-[13px] font-bold text-blue-800 uppercase tracking-wider">Bên Bán (Bên A)</h3>
                </div>

                <div id="container-ben-a" class="space-y-4">
                    <!-- Khối người dùng 1 -->
                    <div class="person-block bg-slate-50 p-4 rounded-lg border border-slate-200 relative">
                        <button type="button" class="btn-remove-person hidden absolute top-3 right-3 text-slate-400 hover:text-red-500 transition-colors" title="Xóa người này">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>

                        <div class="space-y-4">
                            <!-- Vai vế -->
                            <div class="space-y-1.5">
                                <label class="text-[12px] font-semibold text-blue-700 block uppercase tracking-wide">Vai vế / Mối quan hệ</label>
                                <input name="vai_ve_a[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all" type="text">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label class="text-[13px] font-semibold text-slate-700 block">Họ tên <span class="text-red-500">*</span></label>
                                    <input id="input-hoten-a" name="ho_ten_a[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all uppercase font-bold" type="text" value="NGUYỄN VĂN A">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-[13px] font-semibold text-slate-700 block">Ngày sinh</label>
                                    <input id="input-ngaysinh-a" name="ngay_sinh_a[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all" type="date">
                                </div>
                                <div class="space-y-1.5 col-span-2">
                                    <label class="text-[13px] font-semibold text-slate-700 block">Số CMND/CCCD</label>
                                    <div class="flex gap-2">
                                        <input id="input-cmnd-a" name="cmnd_a[]" class="w-1/2 bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all font-mono font-bold" type="text" placeholder="Số giấy tờ">
                                        <input id="input-ngaycap-a" name="ngay_cap_a[]" class="w-1/2 bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all" type="date" title="Ngày cấp">
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Nơi cấp</label>
                                <input id="input-noicap-a" name="noi_cap_a[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all" type="text">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Địa chỉ thường trú</label>
                                <textarea id="input-diachi-a" name="dia_chi_a[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all resize-none" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="addPerson('container-ben-a')" class="mt-4 w-full py-2 border border-dashed border-blue-400 text-blue-600 rounded-lg text-[13px] font-bold hover:bg-blue-50 transition-colors flex items-center justify-center gap-1.5">
                    <span class="material-symbols-outlined text-[18px]">person_add</span> Thêm người vào Bên A
                </button>
            </div>

            <!-- SECTION B: BÊN MUA -->
            <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                <div class="flex justify-between items-center mb-4 border-b border-slate-100 pb-2">
                    <h3 class="text-[13px] font-bold text-blue-800 uppercase tracking-wider">Bên Mua (Bên B)</h3>
                </div>

                <div id="container-ben-b" class="space-y-4">
                    <!-- Khối người dùng 1 -->
                    <div class="person-block bg-slate-50 p-4 rounded-lg border border-slate-200 relative">
                        <button type="button" class="btn-remove-person hidden absolute top-3 right-3 text-slate-400 hover:text-red-500 transition-colors" title="Xóa người này">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>

                        <div class="space-y-4">
                            <!-- Vai vế -->
                            <div class="space-y-1.5">
                                <label class="text-[12px] font-semibold text-blue-700 block uppercase tracking-wide">Vai vế / Mối quan hệ</label>
                                <input name="vai_ve_b[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all" type="text">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label class="text-[13px] font-semibold text-slate-700 block">Họ tên <span class="text-red-500">*</span></label>
                                    <input id="input-hoten-b" name="ho_ten_b[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-blue-900 font-bold uppercase focus:outline-none input-glow transition-all" type="text" value="TRẦN THỊ B">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-[13px] font-semibold text-slate-700 block">Ngày sinh</label>
                                    <input id="input-ngaysinh-b" name="ngay_sinh_b[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all" type="date">
                                </div>
                                <div class="space-y-1.5 col-span-2">
                                    <label class="text-[13px] font-semibold text-slate-700 block">Số CMND/CCCD</label>
                                    <div class="flex gap-2">
                                        <input id="input-cmnd-b" name="cmnd_b[]" class="w-1/2 bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 font-mono font-bold focus:outline-none input-glow transition-all" type="text" placeholder="Số giấy tờ">
                                        <input id="input-ngaycap-b" name="ngay_cap_b[]" class="w-1/2 bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all" type="date" title="Ngày cấp">
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Nơi cấp</label>
                                <input id="input-noicap-b" name="noi_cap_b[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all" type="text">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[13px] font-semibold text-slate-700 block">Địa chỉ thường trú</label>
                                <textarea id="input-diachi-b" name="dia_chi_b[]" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all resize-none" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="addPerson('container-ben-b')" class="mt-4 w-full py-2 border border-dashed border-blue-400 text-blue-600 rounded-lg text-[13px] font-bold hover:bg-blue-50 transition-colors flex items-center justify-center gap-1.5">
                    <span class="material-symbols-outlined text-[18px]">person_add</span> Thêm người vào Bên B
                </button>
            </div>

            <!-- SECTION C: TÀI SẢN -->
            <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm mb-6">
                <h3 class="text-[13px] font-bold text-blue-800 mb-4 border-b border-slate-100 pb-2 uppercase tracking-wider">Thông tin tài sản</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1.5 col-span-2">
                        <label class="text-[13px] font-semibold text-slate-700 block">Nhãn hiệu xe</label>
                        <input id="input-loaixe" name="nhan_hieu" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 focus:outline-none input-glow transition-all uppercase" type="text">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[13px] font-semibold text-slate-700 block">Số khung</label>
                        <input id="input-sokhung" name="so_khung" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 font-mono uppercase focus:outline-none input-glow transition-all" type="text">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[13px] font-semibold text-slate-800 block">Số máy</label>
                        <input id="input-somay" name="so_may" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 font-mono uppercase focus:outline-none input-glow transition-all" type="text">
                    </div>
                    <div class="space-y-1.5 col-span-2">
                        <label class="text-[13px] font-semibold text-slate-800 block">Biển kiểm soát</label>
                        <input id="input-bienso" name="bien_so" class="w-full bg-white border border-slate-300 rounded-md px-3 py-1.5 text-[13px] text-slate-900 font-mono font-bold uppercase focus:outline-none input-glow transition-all" type="text">
                    </div>
                </div>
            </div>
        </form>

        <footer class="px-6 py-4 border-t border-slate-200 bg-white sticky bottom-0 z-20 flex justify-between items-center shadow-[0_-4px_15px_rgba(0,0,0,0.02)] shrink-0">
            <span class="text-[12px] font-semibold text-slate-400 cursor-pointer hover:text-slate-600 transition-colors" onclick="luuDuLieuHoSo()">Lưu bản nháp</span>
            <button class="px-6 py-2 rounded-lg text-[13px] font-bold text-white bg-blue-800 hover:bg-blue-900 hover:shadow-md transition-all flex items-center gap-2" onclick="luuDuLieuHoSo()">
                Gửi phê duyệt <span class="material-symbols-outlined text-[16px]">send</span>
            </button>
        </footer>
    </section>

    <!-- ==========================================
         CỘT PHẢI: GIAO DIỆN SOẠN THẢO (MÔ PHỎNG WORD)
    =========================================== -->
    <section class="flex-1 flex flex-col h-full bg-[#f3f2f1] relative overflow-hidden">

        <!-- TOOLBAR SOẠN THẢO DUY NHẤT -->
        <div class="bg-white border-b border-slate-300 flex items-center px-4 py-2 gap-3 select-none shrink-0 z-20 overflow-x-auto custom-scrollbar">

            <!-- Font & Size -->
            <div class="flex items-center gap-1 shrink-0">
                <button class="flex items-center justify-between border border-slate-300 rounded px-2 py-1.5 text-[13px] text-slate-700 w-36 outline-none focus:border-blue-500 cursor-pointer hover:bg-slate-50">
                    <span>Times New Roman</span>
                </button>

                <input
                    type="number"
                    step="0.5"
                    placeholder="12.5"
                    class="border border-slate-300 rounded px-2 py-1.5 text-[13px] text-slate-700 w-16 outline-none focus:border-blue-500 hover:bg-slate-50 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" />

            </div>

            <div class="w-px h-6 bg-slate-300 mx-1 shrink-0"></div>

            <!-- B I U -->
            <div class="flex items-center gap-0.5 text-slate-700 shrink-0">
                <button title="Bold" data-cmd="bold" onmousedown="event.preventDefault();" class="hover:bg-slate-100 p-1.5 rounded font-serif font-bold text-[14px] w-8 transition-colors">B</button>
                <button title="Italic" data-cmd="italic" onmousedown="event.preventDefault();" class="hover:bg-slate-100 p-1.5 rounded font-serif italic text-[14px] w-8 transition-colors">I</button>
                <button title="Underline" data-cmd="underline" onmousedown="event.preventDefault();" class="hover:bg-slate-100 p-1.5 rounded font-serif underline text-[14px] w-8 transition-colors">U</button>
            </div>

            <div class="w-px h-6 bg-slate-300 mx-1 shrink-0"></div>

            <!-- Alignment -->
            <div class="flex items-center gap-0.5 text-slate-700 shrink-0">
                <button title="Align Left" data-cmd="justifyLeft" onmousedown="event.preventDefault();" class="hover:bg-slate-100 p-1.5 rounded transition-colors"><span class="material-symbols-outlined text-[18px]">format_align_left</span></button>
                <button title="Center" data-cmd="justifyCenter" onmousedown="event.preventDefault();" class="hover:bg-slate-100 p-1.5 rounded transition-colors"><span class="material-symbols-outlined text-[18px]">format_align_center</span></button>
                <button title="Align Right" data-cmd="justifyRight" onmousedown="event.preventDefault();" class="hover:bg-slate-100 p-1.5 rounded transition-colors"><span class="material-symbols-outlined text-[18px]">format_align_right</span></button>
                <button title="Justify" data-cmd="justifyFull" onmousedown="event.preventDefault();" class="bg-slate-200 p-1.5 rounded transition-colors"><span class="material-symbols-outlined text-[18px]">format_align_justify</span></button>
            </div>

            <div class="w-px h-6 bg-slate-300 mx-1 shrink-0"></div>

            <!-- Lists & Spacing -->
            <div class="flex items-center gap-0.5 text-slate-700 shrink-0">
                <button title="Bullets" data-cmd="insertUnorderedList" onmousedown="event.preventDefault();" class="hover:bg-slate-100 p-1.5 rounded transition-colors"><span class="material-symbols-outlined text-[18px]">format_list_bulleted</span></button>
                <button title="Numbering" data-cmd="insertOrderedList" onmousedown="event.preventDefault();" class="hover:bg-slate-100 p-1.5 rounded transition-colors"><span class="material-symbols-outlined text-[18px]">format_list_numbered</span></button>
                <button title="Khoảng cách dòng" onclick="showToast('Chức năng Line & Paragraph Spacing')" class="hover:bg-slate-100 p-1.5 rounded transition-colors"><span class="material-symbols-outlined text-[18px]">format_line_spacing</span></button>
            </div>

            <div class="w-px h-6 bg-slate-300 mx-1 shrink-0"></div>

            <!-- Header/Footer & Page Setup -->
            <div class="flex items-center gap-2 shrink-0 ml-auto">
                <button onclick="showToast('Mở công cụ sửa Header/Footer')" class="flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 hover:bg-slate-200 rounded-md text-[13px] font-medium text-slate-700 transition-colors">
                    <span class="material-symbols-outlined text-[16px]">web_asset</span> Header/Footer
                </button>
                <button onclick="showToast('Mở cài đặt căn lề (Page Setup)')" class="flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 hover:bg-slate-200 rounded-md text-[13px] font-medium text-slate-700 transition-colors">
                    <span class="material-symbols-outlined text-[16px]">margin</span> Page Setup
                </button>
            </div>
        </div>

        <!-- RULER NGANG -->
        <div class="w-full ruler-h z-10 shrink-0 relative shadow-sm"></div>

        <!-- VÙNG SOẠN THẢO SCROLL DỌC -->
        <div id="scroll-container" class="flex-1 overflow-y-auto overflow-x-hidden bg-[#e3e5e7] py-8 editor-scrollbar">

            <div id="word-editor-area" class="flex flex-col gap-8 w-[210mm] mx-auto origin-top transition-transform duration-200">

                <!-- TRANG 1 -->
                <article class="a4-page font-doc-body text-[15px] leading-[1.6] text-black" contenteditable="true">
                    <div class="flex items-center justify-center gap-4 mb-4 border-b pb-2" contenteditable="false">
                        <div class="bg-slate-400 text-white font-serif font-bold px-2 py-1 text-2xl tracking-widest">NTM</div>
                        <div class="text-center text-[11px] font-sans text-blue-900 font-bold leading-tight">
                            VĂN PHÒNG CÔNG CHỨNG NGUYỄN THÀNH MỸ<br>
                            <span class="font-normal text-black">1103-1105-1107 Đường 3 Tháng 2, Phường 11, Quận 11, TP.HCM</span><br>
                        </div>
                    </div>

                    <div class="text-center mb-6">
                        <h2 class="font-bold text-[16px] uppercase tracking-wide">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h2>
                        <h3 class="font-bold text-[15px] border-b border-black inline-block pb-0.5 mb-1">Độc lập - Tự do - Hạnh phúc</h3>
                    </div>

                    <div class="text-center mb-6">
                        <h1 class="font-bold text-[22px] uppercase tracking-wider">HỢP ĐỒNG MUA BÁN XE MÁY</h1>
                    </div>

                    <div class="text-justify space-y-3">
                        <p>Hôm nay, ngày <span contenteditable="false" class="protected-span font-bold font-sans">&lt;&lt;Ngay_Thang_Nam_Ky&gt;&gt;</span>, tại văn phòng công chứng Nguyễn Thành Mỹ, địa chỉ: 1103-1105-1107 Đường 3 Tháng 2, Phường 11, Quận 11, thành phố Hồ Chí Minh. Chúng tôi gồm có:</p>

                        <!-- Bên A -->
                        <div>
                            <p class="font-bold uppercase mb-1">BÊN BÁN <span class="font-normal italic">(Sau đây gọi tắt là Bên A):</span></p>
                            <div class="grid grid-cols-2 gap-x-2 gap-y-1">
                                <div>Ông/Bà: <span id="preview-hoten-a" contenteditable="false" class="protected-span font-bold font-sans">&lt;&lt;Ten_Dt_A1&gt;&gt;</span></div>
                                <div>Sinh năm: <span id="preview-ngaysinh-a" contenteditable="false" class="protected-span font-sans">&lt;&lt;NgaySinh_A1&gt;&gt;</span></div>
                            </div>
                            <div class="grid grid-cols-2 gap-x-2 gap-y-1">
                                <div>Chứng minh nhân dân số: <span id="preview-cmnd-a" contenteditable="false" class="protected-span font-sans">&lt;&lt;CCCD_A1&gt;&gt;</span></div>
                                <div>cấp ngày <span id="preview-ngaycap-a" contenteditable="false" class="protected-span font-sans">&lt;&lt;NgayCap_A1&gt;&gt;</span></div>
                            </div>
                            <div class="mb-1">Tại: <span id="preview-noicap-a" contenteditable="false" class="protected-span font-sans">&lt;&lt;NoiCap_A1&gt;&gt;</span></div>
                            <div>Thường trú: <span id="preview-diachi-a" contenteditable="false" class="protected-span font-sans">&lt;&lt;DiaChi_A1&gt;&gt;</span></div>
                        </div>

                        <!-- Bên B -->
                        <div class="pt-2">
                            <p class="font-bold uppercase mb-1">BÊN MUA <span class="font-normal italic">(Sau đây gọi tắt là Bên B):</span></p>
                            <div class="grid grid-cols-2 gap-x-2 gap-y-1">
                                <div>Ông/Bà: <span id="preview-hoten-b" contenteditable="false" class="protected-span font-bold font-sans">&lt;&lt;Ten_Dt_B1&gt;&gt;</span></div>
                                <div>Sinh năm: <span id="preview-ngaysinh-b" contenteditable="false" class="protected-span font-sans">&lt;&lt;NgaySinh_B1&gt;&gt;</span></div>
                            </div>
                            <div class="grid grid-cols-2 gap-x-2 gap-y-1">
                                <div>Chứng minh nhân dân số: <span id="preview-cmnd-b" contenteditable="false" class="protected-span font-sans">&lt;&lt;CCCD_B1&gt;&gt;</span></div>
                                <div>cấp ngày <span id="preview-ngaycap-b" contenteditable="false" class="protected-span font-sans">&lt;&lt;NgayCap_B1&gt;&gt;</span></div>
                            </div>
                            <div class="mb-1">Tại: <span id="preview-noicap-b" contenteditable="false" class="protected-span font-sans">&lt;&lt;NoiCap_B1&gt;&gt;</span></div>
                            <div>Thường trú: <span id="preview-diachi-b" contenteditable="false" class="protected-span font-sans">&lt;&lt;DiaChi_B1&gt;&gt;</span></div>
                        </div>

                        <p class="pt-2">Hai bên cùng bàn bạc và thỏa thuận lập hợp đồng mua bán xe máy với các điều khoản sau đây:</p>

                        <p class="font-bold uppercase mt-2">ĐIỀU 1. ĐẶC ĐIỂM TÀI SẢN MUA BÁN</p>
                        <p>Bên A đồng ý bán và Bên B đồng ý mua chiếc xe máy mang biển kiểm soát: <span id="preview-bienso" contenteditable="false" class="protected-span font-bold font-sans text-red-600">&lt;&lt;Bien_So&gt;&gt;</span>,
                            nhãn hiệu <span id="preview-loaixe" contenteditable="false" class="protected-span font-sans text-red-600">&lt;&lt;Nhan_Hieu&gt;&gt;</span>,
                            số khung: <span id="preview-sokhung" contenteditable="false" class="protected-span font-sans text-red-600">&lt;&lt;So_Khung&gt;&gt;</span>,
                            số máy: <span id="preview-somay" contenteditable="false" class="protected-span font-sans text-red-600">&lt;&lt;So_May&gt;&gt;</span>.</p>
                    </div>
                    <div class="mt-auto text-right text-slate-400 text-xs" contenteditable="false">1</div>
                </article>
            </div>
        </div>

    </section>
</div>

<?php require_once 'includes/footer.php'; ?>