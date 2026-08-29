// Hàm hiển thị thông báo góc phải (Toast)
function showToast(message) {
    const container = document.getElementById('toast-container');
    if(!container) return;

    const toast = document.createElement('div');
    toast.className = 'bg-slate-900 text-white px-5 py-3 rounded-xl shadow-2xl font-medium text-[13px] flex items-center gap-3 transform transition-all duration-300 translate-y-full opacity-0 border border-slate-700 z-[9999]';
    toast.innerHTML = `<span class="material-symbols-outlined text-emerald-400">check_circle</span> ${message}`;

    container.appendChild(toast);
    
    requestAnimationFrame(() => {
        toast.classList.remove('translate-y-full', 'opacity-0');
    });
    
    setTimeout(() => {
        toast.classList.add('translate-y-full', 'opacity-0');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Hàm Copy text dùng chung
function copyVariable(variable) {
    navigator.clipboard.writeText(variable).then(() => {
        showToast(`Đã copy biến: <span class="font-mono font-bold text-blue-300 tracking-wider">${variable}</span>`);
    });
}