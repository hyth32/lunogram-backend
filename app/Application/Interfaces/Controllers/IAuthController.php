<?php

namespace Application\Interfaces\Controllers;

use Application\Requests\RegisterUserRequest;

interface IAuthController
{
    public function register(RegisterUserRequest $request): array;
    
    public function login(): void;

    public function logout(): void;

    public function resetPassword(): void;

    public function refresh(): void;
}
