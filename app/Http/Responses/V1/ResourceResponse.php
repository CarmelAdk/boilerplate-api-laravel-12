<?php

declare(strict_types=1);

namespace App\Http\Responses\V1;

use JustSteveKing\StatusCode\Http;
use Illuminate\Contracts\Support\Responsable;
use App\Http\Responses\Concerns\ReturnsJsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

final class ResourceResponse implements Responsable
{
    use ReturnsJsonResponse;

    public function __construct(
        private readonly JsonResource $data,
        private readonly Http $status = Http::OK,
    ) {}
}
