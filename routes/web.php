<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;


Route::get('/{locale?}', [LandingController::class,'index']);
