@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Изменить абонемент</h2>
    <form action="{{ route('admin.subscriptions.update', $subscription) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" value="{{ $subscription->name }}" placeholder=" " required/>
                <label for="name">Название абонемента</label>
            </div>
            <div class="input-field">
                <input type="number" id="price" name="price" value="{{ $subscription->price }}" placeholder=" " required/>
                <label for="price">Цена</label>
            </div>
            <div class="input-field">
                <input type="number" id="count" name="count" value="{{ $subscription->count }}" placeholder=" " required/>
                <label for="count">Количество занятий</label>
            </div>
            <div class="input-field">
                <textarea id="description" name="description" rows="3" placeholder=" ">{{ $subscription->description }}</textarea>
                <label for="description">Описание</label>
            </div>
        </div>
        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Добавить абонемент</button>
        </div>
    </form>
@endsection
