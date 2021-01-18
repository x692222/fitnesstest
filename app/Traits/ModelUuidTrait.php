<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ModelUuidTrait
{

    protected static function bootModelUuidTrait()
    {
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });

        static::saving(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function getKeyType()
    {
        return 'string';
    }

    public static function bootHasUlid()
    {
        // when creating models, we will generate a new ULID before saving
        static::creating(function ($model) {
            if (!isset($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function initializeHasUlid()
    {
        // initialize for this trait runs for every new instance, here
        // we can change some default parameters for this model, specifically
        // we can turn off incrementing and tell Eloquent the PK is a string

        $this->incrementing = false;

        $this->keyType = 'string';
    }



}
