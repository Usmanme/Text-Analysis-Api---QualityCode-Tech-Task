<?php


use App\Http\Controllers\api\TextAnalysisController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'throttle:10,1'])
    ->name('api.')
    ->group(function () {
        Route::post('/text-analysis', [TextAnalysisController::class, 'analyzeText'])
            ->name('text-analysis.analyze');
    });