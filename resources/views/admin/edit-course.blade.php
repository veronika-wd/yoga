@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Изменить курс</h2>
    <form action="{{ route('courses.update', $course) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" value="{{ $course->name }}" placeholder=" " required/>
                <label for="name">Название курса</label>
            </div>
            <div class="input-field">
                <textarea id="description" name="description" rows="3"
                          placeholder=" ">{{ $course->description }}</textarea>
                <label for="description">Описание</label>
            </div>
            <div class="input-field">
                <input type="number" id="price" name="price" value="{{ $course->price }}" placeholder=" " required/>
                <label for="price">Цена</label>
            </div>
            <div class="video-upload-wrapper" id="videoUploadWrapper">
                <!-- Лейбл поля (если нужен) -->
                <label style="display:block;margin-bottom:6px;font-weight:600;color:#5a4a3a;font-size:14px;">Видео-обложка</label>

                <!-- Зона перетаскивания и клика -->
                <div class="video-upload-zone" id="videoUploadZone">
                    <div class="video-upload-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                    <div class="video-upload-text">
                        <span class="video-upload-label">Загрузить видео</span>
                        <span class="video-upload-hint">MP4, WebM, MOV (макс. 50MB)</span>
                    </div>
                </div>

                <!-- Скрытый инпут -->
                <input type="file" id="videoInput" name="video" accept="video/*">

                <!-- Блок превью -->
                <div class="video-preview-wrapper" id="videoPreviewWrapper">
                    <video id="videoPreviewPlayer" controls preload="metadata">
                        <source src="" type="">
                        Ваш браузер не поддерживает видео.
                    </video>

                    <button type="button" class="video-remove-btn" id="videoRemoveBtn" title="Удалить видео">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <!-- Ошибка валидации -->
                <div class="video-upload-error" id="videoUploadError"></div>
            </div>
        </div>
        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Добавить событие</button>
        </div>
    </form>
@endsection
@push('scripts')
    <script src="{{ asset('js/uploadImg.js') }}"></script>
    <script src="{{ asset('js/uploadVideo.js') }}"></script>
    <script>
        @if(isset($room) && $room->video_cover)
        const source = previewPlayer.querySelector('source');
        source.src = '{{ asset("storage/" . $room->video_cover) }}';
        source.type = 'video/mp4';
        previewPlayer.load();
        previewWrapper.classList.add('visible');
        zone.style.display = 'none';
        @endif
    </script>
@endpush
