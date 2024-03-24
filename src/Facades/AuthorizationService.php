<?php

namespace Laravel\Ui\Facades;

use Illuminate\Support\Facades\Facade;

class AuthorizationService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Laravel\Ui\Services\AuthorizationService::class;
    }
}
