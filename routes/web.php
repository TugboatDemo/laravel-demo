<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SpeakerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/schedule');

Route::get('/schedule', ScheduleController::class)->name('schedule');
Route::get('/speakers', [SpeakerController::class, 'index'])->name('speakers.index');
Route::get('/speakers/{speaker:slug}', [SpeakerController::class, 'show'])->name('speakers.show');
