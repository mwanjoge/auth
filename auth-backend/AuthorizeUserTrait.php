<?php

namespace Illuminate\Foundation\Auth;

use Laravel\Ui\Services\AuthorizationService;

trait AuthorizeUserTrait
{
    public function assignRoleToUser($role)
    {
//        $authorizationService = new AuthorizationService();
//        $authorizationService->assignRoleToUser($this,$role);
        \Laravel\Ui\Facades\AuthorizationService::assignRoleToUser($this,$role);
    }
}
