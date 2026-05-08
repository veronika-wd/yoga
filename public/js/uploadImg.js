document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.getElementById('fileUploadWrapper');
    const zone = document.getElementById('fileUploadZone');
    const input = document.getElementById('fileInput');
    const previewWrapper = document.getElementById('filePreviewWrapper');
    const previewImg = document.getElementById('filePreviewImg');
    const previewRemove = document.getElementById('filePreviewRemove');
    const nameBlock = document.getElementById('fileName');
    const nameText = document.getElementById('fileNameText');
    const fileRemoveBtn = document.getElementById('fileRemoveBtn');
    const errorBlock = document.getElementById('fileUploadError');

    const MAX_SIZE = 5 * 1024 * 1024; // 5MB
    const ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

    // Клик по зоне → открытие диалога
    zone.addEventListener('click', () => input.click());

    // Drag & Drop
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

    // Выбор файла через диалог
    input.addEventListener('change', () => {
        if (input.files.length) {
            handleFile(input.files[0]);
        }
    });

    // Удаление через кнопку в превью
    previewRemove.addEventListener('click', (e) => {
        e.stopPropagation();
        resetFileInput();
    });

    // Удаление через кнопку в имени файла
    fileRemoveBtn.addEventListener('click', () => {
        resetFileInput();
    });

    // Основная логика обработки файла
    function handleFile(file) {
        clearError();

        // Валидация типа
        if (!ALLOWED_TYPES.includes(file.type)) {
            showError('Только изображения: JPG, PNG, GIF, WebP');
            return;
        }

        // Валидация размера
        if (file.size > MAX_SIZE) {
            showError('Файл слишком большой (макс. 5MB)');
            return;
        }

        // Показываем превью для изображений
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                previewWrapper.classList.add('visible');
                nameBlock.classList.remove('visible');
            };
            reader.readAsDataURL(file);
        } else {
            // Для других файлов показываем имя
            nameText.textContent = file.name;
            nameBlock.classList.add('visible');
            previewWrapper.classList.remove('visible');
        }
    }

    // Сброс инпута и интерфейса
    function resetFileInput() {
        input.value = '';
        previewWrapper.classList.remove('visible');
        nameBlock.classList.remove('visible');
        previewImg.src = '';
        clearError();
    }

    // Показать ошибку
    function showError(message) {
        errorBlock.textContent = message;
        wrapper.classList.add('has-error');
    }

    // Очистить ошибку
    function clearError() {
        errorBlock.textContent = '';
        wrapper.classList.remove('has-error');
    }
});
