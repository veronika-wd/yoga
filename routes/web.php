<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/practices', [PracticeController::class, 'index'])->name('practices.index');
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CoursesController::class, 'show'])->name('courses.show');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::prefix('admin')->group(function () {
    Route::get('/subscriptions', [SubscriptionController::class, 'adminSubscription'])->name('admin.subscriptions');
    Route::get('/applications', function () {
        return view('admin.applications');
    })->name('admin.applications');
    Route::get('/events', [EventController::class, 'adminEvents'])->name('admin.events');
    Route::get('/teachers', [TeacherController::class, 'adminTeachers'])->name('admin.teachers');
    Route::get('/courses', [CoursesController::class, 'adminCourses'])->name('admin.courses');
    Route::get('/calls', [CallController::class, 'adminCalls'])->name('admin.calls');
});

Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::patch('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::post('/events/{event}/application', [EventController::class, 'application'])->name('events.application');

Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::patch('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

Route::post('/subscriptions/store', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::get('/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
Route::patch('/subscriptions/{subscription}', [SubscriptionController::class, 'update'])->name('subscriptions.update');
Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');

Route::post('/courses/store', [CoursesController::class, 'store'])->name('courses.store');
Route::get('/courses/{course}/edit', [CoursesController::class, 'edit'])->name('courses.edit');
Route::patch('/courses/{course}', [CoursesController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CoursesController::class, 'destroy'])->name('courses.destroy');

Route::post('/calls/store', [CallController::class, 'store'])->name('calls.store');
Route::post('/reviews/store', [ReviewController::class, 'store'])->name('review.store');
