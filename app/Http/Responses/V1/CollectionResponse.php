<?php

declare(strict_types=1);

namespace App\Http\Responses\V1;

use JustSteveKing\StatusCode\Http;
use Illuminate\Contracts\Support\Responsable;
use App\Http\Responses\Concerns\ReturnsJsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class CollectionResponse implements Responsable
{
    use ReturnsJsonResponse;

    public function __construct(
        private readonly ResourceCollection $data,
        private readonly Http $status = Http::OK,
    ) {}
}
