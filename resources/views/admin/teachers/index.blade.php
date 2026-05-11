@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Добавить преподавателя</h2>
    <form action="{{ route('admin.teachers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" placeholder=" " required/>
                <label for="name">Имя</label>
            </div>
            <div class="input-field">
                <input type="text" name="status" id="status" placeholder=" " required>
                <label for="status">Статус</label>
            </div>
            <div class="input-field">
                <textarea id="description" name="description" rows="3" placeholder=" "></textarea>
                <label for="description">Описание</label>
            </div>
            <div class="file-upload-wrapper" id="fileUploadWrapper">
                <label class="file-upload-label"
                       style="display:block;margin-bottom:6px;font-weight:600;color:#5a4a3a;font-size:14px;">Фотография</label>

                <div class="file-upload-zone" id="fileUploadZone">
                    <div class="file-upload-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                    </div>
                    <div class="file-upload-text">
                        <span class="file-upload-label">Выберите файл</span>
                        <span class="file-upload-hint">PNG, JPG до 5MB</span>
                    </div>
                </div>

                <input type="file" id="fileInput" name="image" accept="image/*">

                <!-- Превью изображения -->
                <div class="file-preview-wrapper" id="filePreviewWrapper">
                    <div class="file-preview">
                        <img id="filePreviewImg" src="" alt="Preview">
                        <button type="button" class="file-preview-remove" id="filePreviewRemove"
                                title="Удалить">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>

                @error('image')
                <div class="file-upload-error" id="fileUploadError">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="submit-btn">Добавить преподавателя</button>
            </div>
        </div>
    </form>

    <table id="passesTable">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Статус</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td data-label="Имя">{{ $teacher->name }}</td>
                <td data-label="Статус">{{ $teacher->status }}</td>
                <td data-label="Описание">{{ $teacher->description }}</td>
                <td data-label="Действия" class="actions">
                    <a href="{{ route('admin.teachers.edit',  $teacher) }}" class="delete-btn">Изменить</a>
                    <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="post">
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
@endpush
