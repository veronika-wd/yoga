@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Изменить курс</h2>
    <form action="{{ route('admin.courses.update', $course) }}" method="post" enctype="multipart/form-data">
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
        </div>
        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Изменить курс</button>
        </div>
    </form>
@endsection

