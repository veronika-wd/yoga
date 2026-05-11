@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Записи клиентов</h2>

    <table id="recordsTable">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Услуга / Абонемент</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applications as $app)
        <tr>
            <td data-label="Имя">{{ $app->user->name }}</td>
            <td data-label="Телефон">{{ $app->user->phone }}</td>
            <td data-label="Услуга / Абонемент">{{ $app->applicable->name }}</td>
            <td data-label="Дата">{{ date_format($app->created_at, 'd/m/y') }}</td>
            <td data-label="Действия" class="actions">
                <button class="delete-btn">Удалить</button>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
