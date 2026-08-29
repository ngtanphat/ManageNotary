// Quản lý Modal Chấm Điểm (Tailwind Version)
function openChamDiemModal() {
    const modal = document.getElementById('chamDiemModal');
    if (!modal) return;
    
    // Xóa class hidden, đợi 10ms rồi đổi opacity và scale để tạo animation
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    setTimeout(() => {
        modal.classList.remove('opacity-0');
        modal.firstElementChild.classList.remove('scale-95');
        modal.firstElementChild.classList.add('scale-100');
    }, 10);
}

function closeChamDiemModal() {
    const modal = document.getElementById('chamDiemModal');
    if (!modal) return;
    
    // Add hiệu ứng mờ dần
    modal.classList.add('opacity-0');
    modal.firstElementChild.classList.remove('scale-100');
    modal.firstElementChild.classList.add('scale-95');
    
    // Đợi transition xong thì gán class hidden
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300); // 300ms khớp với duration-300
}

// Bấm ra màng đen tự tắt Modal
document.addEventListener('click', function(e) {
    const modal = document.getElementById('chamDiemModal');
    if (e.target === modal) {
        closeChamDiemModal();
    }
});