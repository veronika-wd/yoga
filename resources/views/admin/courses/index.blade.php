@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Добавить курс</h2>
    <form action="{{ route('admin.courses.store') }}" method="post" enctype="multipart/form-data">
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
        </div>
        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Добавить курс</button>
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
                    <a href="{{ route('admin.courses.edit', $course) }}" class="delete-btn">Изменить</a>
                    <form action="{{ route('admin.courses.destroy', $course) }}" method="post">
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
