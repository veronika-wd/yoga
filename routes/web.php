<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

// Публичные

// Главная
Route::get('/', [HomeController::class, 'index'])->name('home');

// Практики
Route::view('/practices', 'practices')->name('practices');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Абонементы
Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');

// Преподаватели
Route::view('/teachers', 'teachers')->name('teachers');

// Курсы
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// Не авторизованный пользователь
Route::middleware('guest')->group(function () {
    // Регистрация
    Route::view('/register', 'auth.register')->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    // Авторизация
    Route::view('/login', 'auth.login')->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

// Авторизованный пользователь
Route::middleware('auth')->group(function () {
    // Выход
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Профиль
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

    // Практики
    Route::post('/events/{event}/application', [EventController::class, 'application'])->name('events.application');

    // Курсы
    Route::post('/courses/{course}/appointment', [CourseController::class, 'appointment'])->name('courses.appointment');

    // Звонки
    Route::post('/calls', [CallController::class, 'store'])->name('calls.store');

    // Отзывы
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

// Админ
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    // Абонементы
    Route::get('/subscriptions', [\App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::post('/subscriptions', [\App\Http\Controllers\Admin\SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::get('/subscriptions/{subscription}/edit', [\App\Http\Controllers\Admin\SubscriptionController::class, 'edit'])->name('subscriptions.edit');
    Route::patch('/subscriptions/{subscription}', [\App\Http\Controllers\Admin\SubscriptionController::class, 'update'])->name('subscriptions.update');
    Route::delete('/subscriptions/{subscription}', [\App\Http\Controllers\Admin\SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');

    // Практики
    Route::get('/events', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('events.index');
    Route::post('/events', [\App\Http\Controllers\Admin\EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('events.edit');
    Route::patch('/events/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [\App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('events.destroy');

    // Записи
    Route::view('/applications', 'admin.applications.index')->name('applications.index');

    // Преподаватели
    Route::get('/teachers', [\App\Http\Controllers\Admin\TeacherController::class, 'index'])->name('teachers.index');
    Route::post('/teachers', [\App\Http\Controllers\Admin\TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/{teacher}/edit', [\App\Http\Controllers\Admin\TeacherController::class, 'edit'])->name('teachers.edit');
    Route::patch('/teachers/{teacher}', [\App\Http\Controllers\Admin\TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/{teacher}', [\App\Http\Controllers\Admin\TeacherController::class, 'destroy'])->name('teachers.destroy');

    // Курсы
    Route::get('/courses', [\App\Http\Controllers\Admin\CourseController::class, 'index'])->name('courses.index');

    // Звонки
    Route::get('/calls', [\App\Http\Controllers\Admin\CallController::class, 'index'])->name('calls.index');

    // Курсы
    Route::post('/courses', [\App\Http\Controllers\Admin\CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [\App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('courses.edit');
    Route::patch('/courses/{course}', [\App\Http\Controllers\Admin\CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [\App\Http\Controllers\Admin\CourseController::class, 'destroy'])->name('courses.destroy');
});
