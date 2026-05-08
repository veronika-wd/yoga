document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.getElementById('videoUploadWrapper');
    const zone = document.getElementById('videoUploadZone');
    const input = document.getElementById('videoInput');
    const previewWrapper = document.getElementById('videoPreviewWrapper');
    const previewPlayer = document.getElementById('videoPreviewPlayer');
    const removeBtn = document.getElementById('videoRemoveBtn');
    const errorBlock = document.getElementById('videoUploadError');

    // Настройки
    const MAX_SIZE = 500 * 1024 * 1024; // 500MB (для видео норм)
    const ALLOWED_TYPES = [
        'video/mp4',
        'video/webm',
        'video/ogg',
        'video/quicktime' // .mov
    ];

    // 1. Клик по зоне
    zone.addEventListener('click', () => input.click());

    // 2. Drag & Drop
    zone.addEventListener('dragover', (e) => {
        e.preventDefault();
        zone.classList.add('dragover');
    });

    zone.addEventListener('dragleave', () => {
        zone.classList.remove('dragover');
    });

    zone.addEventListener('drop', (e) => {
        e.preventDefault();
        zone.classList.remove('dragover');
        if (e.dataTransfer.files.length) {
            handleFile(e.dataTransfer.files[0]);
        }
    });

    // 3. Выбор через диалог
    input.addEventListener('change', () => {
        if (input.files.length) {
            handleFile(input.files[0]);
        }
    });

    // 4. Удаление видео
    removeBtn.addEventListener('click', () => {
        resetVideoInput();
    });

    // --- Основная логика ---

    function handleFile(file) {
        clearError();

        // Валидация типа
        if (!ALLOWED_TYPES.includes(file.type)) {
            showError('Неверный формат. Разрешены: MP4, WebM, MOV');
            return;
        }

        // Валидация размера
        if (file.size > MAX_SIZE) {
            showError('Файл слишком большой! Максимум 500MB.');
            return;
        }

        // Показываем превью
        const fileUrl = URL.createObjectURL(file);

        // Находим source внутри video и обновляем его
        const source = previewPlayer.querySelector('source');
        source.src = fileUrl;
        source.type = file.type;

        previewPlayer.load(); // Перезагружаем плеер
        previewWrapper.classList.add('visible');
        zone.style.display = 'none'; // Скрываем зону загрузки, чтобы не мешала
    }

    function resetVideoInput() {
        input.value = '';
        previewWrapper.classList.remove('visible');
        zone.style.display = 'flex'; // Возвращаем зону загрузки

        // Очищаем URL (память)
        const source = previewPlayer.querySelector('source');
        if (source.src && source.src.startsWith('blob:')) {
            URL.revokeObjectURL(source.src);
        }
        source.src = '';
        source.type = '';
        previewPlayer.load();

        clearError();
    }

    function showError(msg) {
        errorBlock.textContent = msg;
        wrapper.classList.add('has-error');
    }

    function clearError() {
        errorBlock.textContent = '';
        wrapper.classList.remove('has-error');
    }
});
