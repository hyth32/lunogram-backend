<?php

namespace Application\Interfaces\Controllers;

interface IPostController
{
    public function index(): array;

    public function store(): array;

    public function show(): array;

    public function destroy(): array;
}
