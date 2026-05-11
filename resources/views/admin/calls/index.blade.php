@extends('admin.admin-theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
    <h2 class="section-title">Звонки клиентов</h2>

    <table id="recordsTable">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Телефон</th>
        </tr>
        </thead>
        <tbody>
        @foreach($calls as $call)
            <tr>
                <td data-label="Имя">{{ $call->name }}</td>
                <td data-label="Телефон">{{ $call->phone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
