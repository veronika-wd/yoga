@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Добавить абонемент</h2>
    <form action="{{ route('subscriptions.store') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="input-field">
                <input type="text" id="name" name="name" placeholder=" " required/>
                <label for="name">Название абонемента</label>
            </div>
            <div class="input-field">
                <input type="number" id="price" name="price" placeholder=" " required/>
                <label for="price">Цена</label>
            </div>
            <div class="input-field">
                <input type="number" id="count" name="count" placeholder=" " required/>
                <label for="count">Количество занятий</label>
            </div>
            <div class="input-field">
                <textarea id="description" name="description" rows="3" placeholder=" "></textarea>
                <label for="description">Описание</label>
            </div>
        </div>
        <div style="text-align:center;">
            <button type="submit" class="submit-btn">Добавить абонемент</button>
        </div>
    </form>

    <table id="passesTable">
        <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Кол-во занятий</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subscriptions as $subscription)
            <tr>
                <td data-label="Название">{{ $subscription->name }}</td>
                <td data-label="Описание">{{ $subscription->description }}</td>
                <td data-label="Кол-во занятий">{{ $subscription->count }}</td>
                <td data-label="Цена">{{ $subscription->price }} ₽</td>
                <td data-label="Действия" class="actions">
                    <a href="{{ route('subscriptions.edit', $subscription) }}" class="delete-btn">Изменить</a>
                    <form action="{{ route('subscriptions.destroy', $subscription) }}" method="post">
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
