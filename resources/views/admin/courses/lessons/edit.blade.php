@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Изменить урок</h2>
    <form action="{{ route('admin.lessons.update', [$course, $lesson]) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" placeholder="" value="{{ $lesson->name }}" required/>
                <label for="name">Название урока</label>
            </div>

            <div class="input-field">
                <textarea id="content" name="content" rows="3" placeholder="">{{ $lesson->content }}</textarea>
                <label for="content">Текст</label>
            </div>

            <div class="input-field">
                <input type="url" id="url" name="url" placeholder="" value="{{ $lesson->url }}" required/>
                <label for="url">Ссылка на урок</label>
            </div>
        </div>

        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Изменить урок</button>
        </div>
    </form>
@endsection
