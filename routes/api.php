<?php
use App\Http\Controllers\Api\AssignmentApiController;
use Illuminate\Support\Facades\Route;


Route::get('/assignments', [AssignmentApiController::class, 'index']);