document.addEventListener('DOMContentLoaded', () => {
    
    // =========================================================================
    // 1. LOGIC THÊM/XÓA NGƯỜI VÀO FORM (BÊN A / BÊN B)
    // =========================================================================
    
    // Đưa hàm addPerson ra global để gọi được từ onclick trong HTML
    window.addPerson = function(containerId) {
        const container = document.getElementById(containerId);
        if (!container) return;

        // Lấy block người đầu tiên để làm mẫu (template)
        const firstBlock = container.querySelector('.person-block');
        if (!firstBlock) return;

        // Nhân bản block
        const newBlock = firstBlock.cloneNode(true);

        // Reset tất cả các giá trị input/textarea trong block mới
        const inputs = newBlock.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.value = '';
            // Gỡ bỏ các class nhấp nháy hay màu xanh nếu đang bị dính từ người số 1
            input.classList.remove('bg-blue-50', 'border-blue-300');
        });

        // Hiển thị nút Xóa (thùng rác)
        const deleteBtn = newBlock.querySelector('.btn-remove-person');
        if (deleteBtn) {
            deleteBtn.classList.remove('hidden');
            // Gắn sự kiện xóa cho block mới này
            deleteBtn.addEventListener('click', function() {
                container.removeChild(newBlock);
            });
        }

        // Chèn block mới vào cuối container
        container.appendChild(newBlock);
    };

    // Gắn sự kiện xóa cho các nút Xóa đã có sẵn (nếu tải lại trang có sẵn nhiều người)
    document.querySelectorAll('.btn-remove-person').forEach(btn => {
        btn.addEventListener('click', function() {
            const block = this.closest('.person-block');
            if (block && block.parentNode) {
                block.parentNode.removeChild(block);
            }
        });
    });


    // =========================================================================
    // 2. LOGIC BƠM DỮ LIỆU TỪ FORM QUA A4 (LIVE BINDING CƠ BẢN)
    // =========================================================================
    const baseClasses = 'px-1.5 py-0.5 rounded font-mono text-[13px] inline-block transition-all protected-span';
    const emptyClasses = `${baseClasses} bg-blue-50 text-blue-700 border border-blue-200 font-bold`; 
    const filledClasses = `${baseClasses} text-slate-900 bg-transparent border border-transparent font-bold`;
    const flashClasses = `${baseClasses} text-blue-800 bg-blue-100 border border-blue-300 font-bold`;

    const fieldMappings = [
        { inputId: 'input-hoten-a', previewIds: ['preview-hoten-a'], isUppercase: true, defaultVal: '<<Ten_Dt_A1>>' },
        { inputId: 'input-ngaysinh-a', previewIds: ['preview-ngaysinh-a'], isUppercase: false, defaultVal: '<<NgaySinh_A1>>' },
        { inputId: 'input-cmnd-a', previewIds: ['preview-cmnd-a'], isUppercase: false, defaultVal: '<<CCCD_A1>>' },
        { inputId: 'input-ngaycap-a', previewIds: ['preview-ngaycap-a'], isUppercase: false, defaultVal: '<<NgayCap_A1>>' },
        { inputId: 'input-noicap-a', previewIds: ['preview-noicap-a'], isUppercase: false, defaultVal: '<<NoiCap_A1>>' },
        { inputId: 'input-diachi-a', previewIds: ['preview-diachi-a'], isUppercase: false, defaultVal: '<<DiaChi_A1>>' },
        
        { inputId: 'input-hoten-b', previewIds: ['preview-hoten-b'], isUppercase: true, defaultVal: '<<Ten_Dt_B1>>' },
        { inputId: 'input-ngaysinh-b', previewIds: ['preview-ngaysinh-b'], isUppercase: false, defaultVal: '<<NgaySinh_B1>>' },
        { inputId: 'input-cmnd-b', previewIds: ['preview-cmnd-b'], isUppercase: false, defaultVal: '<<CCCD_B1>>' },
        { inputId: 'input-ngaycap-b', previewIds: ['preview-ngaycap-b'], isUppercase: false, defaultVal: '<<NgayCap_B1>>' },
        { inputId: 'input-noicap-b', previewIds: ['preview-noicap-b'], isUppercase: false, defaultVal: '<<NoiCap_B1>>' },
        { inputId: 'input-diachi-b', previewIds: ['preview-diachi-b'], isUppercase: false, defaultVal: '<<DiaChi_B1>>' },
        
        { inputId: 'input-loaixe', previewIds: ['preview-loaixe'], isUppercase: true, defaultVal: '<<Nhan_Hieu>>' },
        { inputId: 'input-bienso', previewIds: ['preview-bienso'], isUppercase: true, defaultVal: '<<Bien_So>>' },
        { inputId: 'input-sokhung', previewIds: ['preview-sokhung'], isUppercase: true, defaultVal: '<<So_Khung>>' },
        { inputId: 'input-somay', previewIds: ['preview-somay'], isUppercase: true, defaultVal: '<<So_May>>' },
    ];

    fieldMappings.forEach(mapping => {
        const inputEl = document.getElementById(mapping.inputId);
        if (!inputEl) return;

        if (inputEl.value) updatePreviews(mapping, inputEl.value);

        inputEl.addEventListener('input', (e) => {
            let val = e.target.value;
            if (mapping.isUppercase) {
                val = val.toUpperCase();
                e.target.value = val;
            }
            updatePreviews(mapping, val);
        });
    });

    function updatePreviews(mapping, val) {
        mapping.previewIds.forEach(previewId => {
            const previewEl = document.getElementById(previewId);
            if (!previewEl) return;

            if (val.trim() === "") {
                previewEl.textContent = mapping.defaultVal;
                previewEl.className = emptyClasses;
            } else {
                if ((mapping.inputId.includes('ngaycap') || mapping.inputId.includes('ngaysinh')) && val.includes('-')) {
                    const dateParts = val.split('-');
                    val = `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}`;
                }

                previewEl.textContent = val;
                previewEl.className = flashClasses;
                
                setTimeout(() => {
                    previewEl.className = filledClasses;
                }, 300);
            }
        });
    }

    // =========================================================================
    // 3. LOGIC THANH CÔNG CỤ (FORMAT TEXT)
    // =========================================================================
    const formatButtons = document.querySelectorAll('[data-cmd]');
    formatButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault(); 
            const cmd = btn.getAttribute('data-cmd');
            document.execCommand(cmd, false, null);
        });
    });

    // =========================================================================
    // 4. LOGIC ZOOM TỰ ĐỘNG (AUTO-FIT WIDTH)
    // =========================================================================
    const editorArea = document.getElementById('word-editor-area');
    const scrollContainer = document.getElementById('scroll-container');

    function autoFitZoom() {
        if (!scrollContainer || !editorArea) return;
        const availableWidth = scrollContainer.clientWidth - 60; 
        const a4Width = 794; 
        let scale = availableWidth / a4Width;
        scale = Math.max(0.4, Math.min(scale, 1.5));
        editorArea.style.transform = `scale(${scale})`;
        let scaledHeight = editorArea.offsetHeight * scale;
        let originalHeight = editorArea.offsetHeight;
        editorArea.style.marginBottom = `${scaledHeight - originalHeight}px`;
    }

    setTimeout(autoFitZoom, 50);
    window.addEventListener('resize', autoFitZoom);

    // =========================================================================
    // 5. GOM DỮ LIỆU ĐỂ LƯU
    // =========================================================================
    window.luuDuLieuHoSo = function() {
        const formData = new FormData(document.getElementById('form-hoso-data'));
        const pages = document.querySelectorAll('.a4-page');
        const documentHTML = Array.from(pages).map(page => page.innerHTML).join('<br style="page-break-before: always;">');
        formData.append('document_html', documentHTML);

        showToast('Đang đóng gói dữ liệu và gửi về Server...');
    };
});