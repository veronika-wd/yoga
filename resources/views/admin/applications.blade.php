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
        <tr>
            <td data-label="Имя">Анна Иванова</td>
            <td data-label="Телефон">+7 999 123-45-67</td>
            <td data-label="Услуга / Абонемент">Абонемент на 10 занятий</td>
            <td data-label="Дата">2025-04-05</td>
            <td data-label="Действия" class="actions">
                <button class="delete-btn">Удалить</button>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
