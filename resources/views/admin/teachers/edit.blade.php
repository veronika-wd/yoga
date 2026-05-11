@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Изменить преподавателя</h2>
    <form action="{{ route('admin.teachers.update', $teacher) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" value="{{ $teacher->name }}" placeholder=" " required/>
                <label for="name">Имя</label>
            </div>
            <div class="input-field">
                <input type="text" name="status" id="status" value="{{ $teacher->status }}">
                <label for="status">Статус</label>
            </div>
            <div class="input-field">
                <textarea id="description" name="description" rows="3"
                          placeholder=" ">{{ $teacher->description }}</textarea>
                <label for="description">Описание</label>
            </div>
            <div class="file-upload-wrapper" id="fileUploadWrapper">
                <label class="file-upload-label"
                       style="display:block;margin-bottom:6px;font-weight:600;color:#5a4a3a;font-size:14px;">Обложка</label>

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

                <input type="file" id="image" name="image" accept="image/*">

                @error('image')
                <div class="file-upload-error" id="fileUploadError">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Изменить преподавателя</button>
        </div>
    </form>
@endsection
@push('scripts')
    <script src="{{ asset('js/uploadImg.js') }}"></script>
@endpush
