@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Добавить преподавателя</h2>
    <form action="{{ route('teachers.store') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" placeholder=" " required/>
                <label for="name">Имя</label>
            </div>
            <div class="input-field">
                <select name="status" id="status">
                    <option value="s1">s1</option>
                </select>
                <label for="status">Статус</label>
            </div>
            <div class="input-field">
                <textarea id="description" name="description" rows="3" placeholder=" "></textarea>
                <label for="description">Описание</label>
            </div>
        </div>
        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Добавить преподавателя</button>
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
                <td data-label="Статус">На 10 занятий</td>
                <td data-label="Описание">{{ $teacher->description }}</td>
                <td data-label="Действия" class="actions">
                    <a href="{{ route('teachers.edit',  $teacher) }}" class="delete-btn">Изменить</a>
                    <form action="{{ route('teachers.destroy', $teacher) }}" method="post">
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
