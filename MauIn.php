<?php
require_once 'includes/role_config.php';
$currentPage = 'template';
$pageTitle = 'Quản Lý Mẫu In';
require_once 'includes/header.php';
?>

<div class="h-[calc(100vh-64px)] flex w-full overflow-hidden bg-[#eaf1ff] animate-fade-in">

    <!-- Cột Trái: Danh sách Biến (25%) -->
    <section class="w-full md:w-[25%] bg-white border-r border-slate-300 flex flex-col h-full z-10 shadow-[4px_0_24px_rgba(0,0,0,0.04)]">
        <header class="px-6 py-4 border-b border-slate-200 bg-white/90 backdrop-blur-sm sticky top-0 z-20">
            <h2 class="text-[20px] font-semibold text-slate-900 tracking-tight flex items-center gap-2">
                <span class="material-symbols-outlined text-purple-600 bg-purple-50 p-1.5 rounded-lg">data_object</span> Biến Hệ Thống
            </h2>
            <div class="relative mt-4">
                <span class="material-symbols-outlined absolute left-3 top-2 text-slate-400 text-[20px]">search</span>
                <input class="w-full pl-10 pr-3 py-2 bg-[#f8f9ff] border border-slate-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none text-[13px] text-slate-900 transition-all" placeholder="Tìm kiếm biến..." type="text" />
            </div>
        </header>

        <div class="flex-1 overflow-y-auto px-6 py-4 custom-scrollbar space-y-3 bg-[#f8f9ff]">
            <p class="text-[12px] font-bold text-slate-500 mb-2 uppercase tracking-wider">Thông tin Bên A</p>
            <button class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 hover:border-blue-400 hover:shadow-sm active:scale-[0.98] transition-all bg-white group flex justify-between items-center" onclick="copyVariable('<<Ten_Dt_A1>>')">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;Ten_Dt_A1&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300 group-hover:text-blue-600">content_copy</span>
            </button>
            <button class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 hover:border-blue-400 hover:shadow-sm active:scale-[0.98] transition-all bg-white group flex justify-between items-center" onclick="copyVariable('<<NgaySinh_A1>>')">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;NgaySinh_A1&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300 group-hover:text-blue-600">content_copy</span>
            </button>
            <button class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 hover:border-blue-400 hover:shadow-sm active:scale-[0.98] transition-all bg-white group flex justify-between items-center" onclick="copyVariable('<<CCCD_A1>>')">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;CCCD_A1&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300 group-hover:text-blue-600">content_copy</span>
            </button>

            <p class="text-[12px] font-bold text-slate-500 mb-2 mt-6 uppercase tracking-wider">Thông tin Bên B</p>
            <button class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 hover:border-blue-400 hover:shadow-sm active:scale-[0.98] transition-all bg-white group flex justify-between items-center" onclick="copyVariable('<<Ten_Dt_B1>>')">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;Ten_Dt_B1&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300 group-hover:text-blue-600">content_copy</span>
            </button>
            <button class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 hover:border-blue-400 hover:shadow-sm active:scale-[0.98] transition-all bg-white group flex justify-between items-center" onclick="copyVariable('<<NgaySinh_B1>>')">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;NgaySinh_B1&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300 group-hover:text-blue-600">content_copy</span>
            </button>

            <p class="text-[12px] font-bold text-slate-500 mb-2 mt-6 uppercase tracking-wider">Thông tin Tài Sản</p>
            <button class="w-full text-left p-3 border border-blue-200 rounded-xl hover:bg-blue-50 hover:border-blue-400 hover:shadow-sm active:scale-[0.98] transition-all bg-white group flex justify-between items-center" onclick="copyVariable('<<Bien_So>>')">
                <span class="font-mono text-[13px] text-blue-800 font-semibold">&lt;&lt;Bien_So&gt;&gt;</span>
                <span class="material-symbols-outlined text-[16px] text-slate-300 group-hover:text-blue-600">content_copy</span>
            </button>
        </div>
    </section>

    <!-- Cột Phải: Trình Soạn Thảo (75%) -->
    <section class="flex-1 overflow-y-auto relative flex flex-col items-center py-10 custom-scrollbar pt-24 bg-gray-200">
        
        <div class="fixed top-[88px] bg-white border border-slate-200 rounded-xl shadow-md px-4 py-2 flex items-center gap-4 z-30 transform -translate-x-1/2 left-[62%]">
            <div class="flex items-center gap-1">
                <button class="p-1.5 rounded hover:bg-[#eff4ff] text-slate-700 transition-colors"><span class="material-symbols-outlined text-[20px]">format_bold</span></button>
                <button class="p-1.5 rounded hover:bg-[#eff4ff] text-slate-700 transition-colors"><span class="material-symbols-outlined text-[20px]">format_italic</span></button>
                <button class="p-1.5 rounded hover:bg-[#eff4ff] text-slate-700 transition-colors"><span class="material-symbols-outlined text-[20px]">format_underlined</span></button>
            </div>
            <div class="w-px h-5 bg-slate-300"></div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-lg text-[13px] font-semibold transition-colors flex items-center gap-1 active:scale-95" onclick="showToast('Đã lưu mẫu in thành công!')">
                <span class="material-symbols-outlined text-[16px]">save</span> Lưu Mẫu
            </button>
        </div>

        <article class="a4-page relative flex flex-col font-doc-body text-[16px] leading-[24px] text-slate-900 ring-1 ring-slate-200 outline-none" contenteditable="true">
            <!-- <div class="text-center mb-6">
                <h2 class="font-bold text-[18px] uppercase tracking-wide">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h2>
                <h3 class="font-bold text-[16px] border-b border-black inline-block pb-0.5">Độc lập - Tự do - Hạnh phúc</h3>
            </div>
            <div class="text-center mb-8 mt-12">
                <h1 class="font-bold text-[28px] uppercase tracking-wider mb-2">HỢP ĐỒNG ỦY QUYỀN</h1>
            </div>
            <div class="space-y-6 flex-1 text-justify">
                <p>Chúng tôi gồm có:</p>
                <div class="space-y-2">
                    <h4 class="font-bold uppercase text-[15px] mb-2">BÊN ỦY QUYỀN (BÊN A)</h4>
                    <p>Ông/Bà: <span class="bg-amber-100 px-1 rounded font-bold uppercase">&lt;&lt;Ten_Dt_A1&gt;&gt;</span></p>
                    <p>Ngày sinh: <span class="bg-amber-100 px-1 rounded">&lt;&lt;NgaySinh_A1&gt;&gt;</span></p>
                </div>
                <p class="mt-8 text-slate-400 italic text-[14px] font-sans text-center border-2 border-dashed border-slate-200 p-4 rounded-xl">(Soạn thảo nội dung mẫu in và dán các biến hệ thống vào đây...)</p>
            </div> -->
        </article>
    </section>
</div>

<?php require_once 'includes/footer.php'; ?>