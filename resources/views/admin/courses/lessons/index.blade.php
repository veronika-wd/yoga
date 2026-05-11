@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Добавить урок</h2>
    <form action="{{ route('admin.lessons.store', $course) }}" method="post">
        @csrf

        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" placeholder="" required/>
                <label for="name">Название урока</label>
            </div>

            <div class="input-field">
                <textarea id="content" name="content" rows="3" placeholder="" required></textarea>
                <label for="content">Текст</label>
            </div>

            <div class="input-field">
                <input type="url" id="url" name="url" placeholder="" required/>
                <label for="url">Ссылка на урок</label>
            </div>
        </div>

        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Добавить урок</button>
        </div>
    </form>

    <table id="servicesTable">
        <thead>
        <tr>
            <th>Название</th>
            <th>Текст</th>
            <th>Ссылка</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lessons as $lesson)
            <tr>
                <td data-label="Название">{{ $lesson->name }}</td>
                <td data-label="Текст">{{ Str::limit($lesson->content, 50) }}</td>
                <td data-label="Ссылка">{{ Str::limit($lesson->url, 50) }}</td>
                <td data-label="Действия" class="actions">
                    <a href="{{ route('admin.lessons.edit', [$course, $lesson]) }}" class="delete-btn">Изменить</a>
                    <form action="{{ route('admin.lessons.destroy', [$course, $lesson]) }}" method="post">
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
