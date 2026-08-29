<?php
require_once 'includes/role_config.php';
$currentPage = 'tracuu';
$pageTitle = 'Tra Cứu Ngăn Chặn';
require_once 'includes/header.php';
?>

<div class="p-4 sm:p-6 overflow-hidden w-full h-[calc(100vh-64px)] bg-[#eaf1ff] flex flex-col gap-4 sm:gap-6 animate-fade-in">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 shrink-0">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                <span class="material-symbols-outlined text-red-600 bg-red-100 p-2 rounded-xl text-3xl">policy</span>
                Tra Cứu Ngăn Chặn
            </h1>
            <p class="text-sm sm:text-base text-slate-500 mt-1 font-medium">Hệ thống tra cứu dữ liệu ngăn chặn (nguồn: http://210.245.111.1/dsnc/Default.aspx).</p>
        </div>
        <div class="flex items-center gap-3">
            <!-- <button onclick="openDsncPopup()" class="flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-xl font-bold text-sm shadow-md hover:bg-blue-700 hover:shadow-lg transition-all active:scale-95">
                <span class="material-symbols-outlined text-[20px]">open_in_new</span> Mở Tab / Cửa sổ mới
            </button> -->
        </div>
    </div>

    <div class="flex-1 bg-white rounded-3xl border border-slate-200 shadow-sm relative overflow-hidden flex flex-col">

        <div id="httpWarning" class="bg-amber-50 border-b border-amber-200 text-amber-800 text-[13px] px-6 py-2 flex justify-between items-center shrink-0">
            <div class="flex items-center gap-2 font-medium">
                <span class="material-symbols-outlined text-[18px] text-amber-600">warning</span>
                <!-- <span class="hidden sm:inline">Trang đích sử dụng giao thức HTTP. Nếu màn hình dưới đây bị trắng, trình duyệt của bạn đang chặn hiển thị.</span>
                <span class="sm:hidden">Nếu màn hình trắng, hãy dùng nút Mở Tab mới.</span> -->
            </div>
            <button onclick="document.getElementById('httpWarning').style.display='none'" class="text-amber-500 hover:text-amber-800 transition-colors p-1 rounded-lg hover:bg-amber-100">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </button>
        </div>

        <div class="flex-1 w-full bg-slate-50 relative">
            <iframe
                src="http://210.245.111.1/dsnc/Default.aspx"
                class="absolute inset-0 w-full h-full border-none"
                title="Hệ thống tra cứu ngăn chặn"
                allowfullscreen>
            </iframe>
        </div>

    </div>
</div>

<script>
    // Hàm mở popup nếu iframe bị lỗi
    function openDsncPopup() {
        window.open(
            'http://210.245.111.1/dsnc/Default.aspx',
            'DSNCPopup',
            'width=1280,height=800,scrollbars=yes,resizable=yes,status=yes,toolbar=no,menubar=no,location=no'
        );
        showToast('Đang mở trang tra cứu ở cửa sổ mới...');
    }
</script>

<?php require_once 'includes/footer.php'; ?>