<?php

namespace Nisimpo\Ui\Facades;

use Illuminate\Support\Facades\Facade;

class AuthorizationService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Nisimpo\Ui\Services\AuthorizationService::class;
    }
}
