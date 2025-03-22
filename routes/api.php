<?php

use App\Http\Responses\V1\MessageResponse;
use Illuminate\Support\Facades\Route;
use JustSteveKing\StatusCode\Http;

Route::fallback(function() {
    return new MessageResponse(
        data: ['message' => 'You seem try to access for a non existing endpoint or using a wrong method.'],
        status: Http::NOT_FOUND
    );
});