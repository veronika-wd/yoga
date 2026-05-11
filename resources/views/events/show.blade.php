@extends('theme')
@section('content')
    <div class="event-show">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <h1>{{ $event->name }}</h1>
                <p class="description">{{ $event->description }}</p>

                <div class="event-details">
                    <div class="event-detail-item">
                        <b>Преподаватель:</b>
                        <span>{{ $event->teacher->name }}</span>
                    </div>
                    <div class="event-detail-item">
                        <b>Продолжительность:</b>
                        <span>{{ $event->time }}</span>
                    </div>
                    <div class="event-detail-item">
                        <b>Дата проведения:</b>
                        <span>{{ $event->datetime }}</span>
                    </div>
                    <div class="event-detail-item">
                        <b>Цена:</b>
                        <span>{{ $event->price }} ₽</span>
                    </div>
                </div>

                <div class="event-actions">
                    <form action="{{ route('events.application', $event) }}" method="post">
                        @csrf
                        <button type="submit" class="btn-enroll">Записаться</button>
                        @error('alreadyApplied')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 border-box h-100">
                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->name }}">
            </div>
        </div>
    </div>
@endsection
