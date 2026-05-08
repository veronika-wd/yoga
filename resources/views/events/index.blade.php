@extends('theme')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endpush
@section('content')
    <h1>Предстоящие события</h1>

    <section class="filter">
        <div class="input-container">
            <select name="date" id="date">
                <option value="" selected hidden>ДАТЫ</option>
                <option value="">Дата</option>
                <option value="">Дата</option>
                <option value="">Дата</option>
                <option value="">Дата</option>
            </select>
        </div>

        <div class="input-container">
            <select name="event" id="event">
                <option value="" selected hidden>ТИП СОБЫТИЯ</option>
                <option value="">Йога</option>
                <option value="">Кундалини-йога</option>
                <option value="">Звукотерапия</option>
                <option value="">Гвоздестояние</option>
            </select>
        </div>
    </section>

    <section class="subscription">
        <div class="blocks_subscription">
            <div class="block_subscription">
                <div class="img-container">
                    <img src="img/studio.png" alt="Абонимент">
                </div>

                <div class="content">
                    <h3>Звукотерапия</h3>
                    <p>Преподаватель</p>
                    <p>Цена</p>
                    <p><img src="img/icons/clock.png" alt="Часы"> 90 минут</p>
                </div>

                <div class="date">
                    <p>АПР.</p>
                    <p>22</p>
                </div>
            </div>
            <div class="block_subscription">
                <div class="img-container">
                    <img src="img/studio.png" alt="Абонимент">
                </div>

                <div class="content">
                    <h3>Звукотерапия</h3>
                    <p>Преподаватель</p>
                    <p>Цена</p>
                    <p><img src="img/icons/clock.png" alt="Часы"> 90 минут</p>
                </div>

                <div class="date">
                    <p>АПР.</p>
                    <p>22</p>
                </div>
            </div>
            <div class="block_subscription">
                <div class="img-container">
                    <img src="img/studio.png" alt="Абонимент">
                </div>

                <div class="content">
                    <h3>Звукотерапия</h3>
                    <p>Преподаватель</p>
                    <p>Цена</p>
                    <p><img src="img/icons/clock.png" alt="Часы"> 90 минут</p>
                </div>

                <div class="date">
                    <p>АПР.</p>
                    <p>22</p>
                </div>
            </div>
            <div class="block_subscription">
                <div class="img-container">
                    <img src="img/studio.png" alt="Абонимент">
                </div>

                <div class="content">
                    <h3>Звукотерапия</h3>
                    <p>Преподаватель</p>
                    <p>Цена</p>
                    <p><img src="img/icons/clock.png" alt="Часы"> 90 минут</p>
                </div>

                <div class="date">
                    <p>АПР.</p>
                    <p>22</p>
                </div>
            </div>
            <div class="block_subscription">
                <div class="img-container">
                    <img src="img/studio.png" alt="Абонимент">
                </div>

                <div class="content">
                    <h3>Звукотерапия</h3>
                    <p>Преподаватель</p>
                    <p>Цена</p>
                    <p><img src="img/icons/clock.png" alt="Часы"> 90 минут</p>
                </div>

                <div class="date">
                    <p>АПР.</p>
                    <p>22</p>
                </div>
            </div>
            <div class="block_subscription">
                <div class="img-container">
                    <img src="img/studio.png" alt="Абонимент">
                </div>

                <div class="content">
                    <h3>Звукотерапия</h3>
                    <p>Преподаватель</p>
                    <p>Цена</p>
                    <p><img src="img/icons/clock.png" alt="Часы"> 90 минут</p>
                </div>

                <div class="date">
                    <p>АПР.</p>
                    <p>22</p>
                </div>
            </div>
            <div class="block_subscription">
                <div class="img-container">
                    <img src="img/studio.png" alt="Абонимент">
                </div>

                <div class="content">
                    <h3>Звукотерапия</h3>
                    <p>Преподаватель</p>
                    <p>Цена</p>
                    <p><img src="img/icons/clock.png" alt="Часы"> 90 минут</p>
                </div>

                <div class="date">
                    <p>АПР.</p>
                    <p>22</p>
                </div>
            </div>
            <div class="block_subscription">
                <div class="img-container">
                    <img src="img/studio.png" alt="Абонимент">
                </div>

                <div class="content">
                    <h3>Звукотерапия</h3>
                    <p>Преподаватель</p>
                    <p>Цена</p>
                    <p><img src="img/icons/clock.png" alt="Часы"> 90 минут</p>
                </div>

                <div class="date">
                    <p>АПР.</p>
                    <p>22</p>
                </div>
            </div>
        </div>
    </section>

    <form class="start" id="startForm">
        <div class="header">
            <h2>Не знаете, с чего начать?</h2>
            <p>Заполните форму ниже, мы свяжемся с Вами и поможем подобрать направление</p>
        </div>

        <div class="fields">
            <input type="text" name="name" id="name" placeholder="Имя">
            <input type="tel" name="phone_number" id="phone_number" placeholder="Номер телефона">
            <button type="submit" class="btn">Отправить</button>
        </div>
    </form>

    <div id="modal">
        <div id="window">
            <img src="img/icons/Checkmark.png" alt="checkmark" id="checkmark">
            <p class="p_modal">Ваш запрос принят!</p>
            <p class="p_modal">Наш администратор свяжется с вами</p>
            <button id="closeModal">Закрыть</button>
        </div>
    </div>
@endsection
