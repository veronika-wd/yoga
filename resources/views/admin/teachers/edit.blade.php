@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Изменить преподавателя</h2>
    <form action="{{ route('admin.teachers.update', $teacher) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" value="{{ $teacher->name }}" placeholder=" " required/>
                <label for="name">Имя</label>
            </div>
            <div class="input-field">
                <select name="status" id="status">
                    <option value="s1">s1</option>
                </select>
                <label for="status">Статус</label>
            </div>
            <div class="input-field">
                <textarea id="description" name="description" rows="3"
                          placeholder=" ">{{ $teacher->description }}</textarea>
                <label for="description">Описание</label>
            </div>
        </div>
        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Изменить преподавателя</button>
        </div>
    </form>
@endsection
