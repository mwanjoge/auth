<?php

namespace Illuminate\Foundation\Auth;

use Nisimpo\Auth\Facades\AuthorizationService;

trait AuthorizeUserTrait
{
    public function assignRoleToUser($role)
    {
//        $authorizationService = new AuthorizationService();
//        $authorizationService->assignRoleToUser($this,$role);
        AuthorizationService::assignRoleToUser($this,$role);
    }
}
