<?php

declare(strict_types=1);

namespace App\Traits;

use RuntimeException;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait HasUuid
{
    protected static function bootHasUuid(): void
    {
        static::creating(function (Model $model) {
            if (! $model->isFillable('public_id')) {
                throw new RuntimeException("The 'public_id' field must be fillable in the model using this trait.");
            }
            $model->public_id = (string) Str::uuid();
        });
    }
}
