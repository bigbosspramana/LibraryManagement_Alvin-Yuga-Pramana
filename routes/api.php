<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiLoginController;

Route::post('/login', [ApiLoginController::class, 'login']);

