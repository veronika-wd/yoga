@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Добавить курс</h2>
    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" placeholder=" " required/>
                <label for="name">Название курса</label>
            </div>
            <div class="input-field">
                <textarea id="description" name="description" rows="3" placeholder=" "></textarea>
                <label for="description">Описание</label>
            </div>
            <div class="input-field">
                <input type="number" id="price" name="price" placeholder=" " required/>
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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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

    <table id="servicesTable">
        <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td data-label="Название">{{ $course->name }}</td>
                <td data-label="Описание">{{ Str::limit($course->description, 70) }}</td>
                <td data-label="Цена">{{ $course->price }} ₽</td>
                <td data-label="Действия" class="actions">
                    <a href="{{ route('courses.edit', $course) }}" class="delete-btn">Изменить</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="delete-btn">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@push('scripts')
    <script src="{{ asset('js/uploadImg.js') }}"></script>
    <script src="{{ asset('js/uploadVideo.js') }}"></script>
@endpush
