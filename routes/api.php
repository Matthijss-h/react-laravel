<?php

use App\Http\Controllers\Api\ParticipantController;
use App\Http\Controllers\Api\RelationController;
use Illuminate\Support\Facades\Route;

Route::apiResource('participants', ParticipantController::class);
Route::apiResource('relations', RelationController::class);
