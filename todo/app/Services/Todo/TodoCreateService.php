<?php

namespace App\Services\Todo;

use \App\Models\User;
use \App\Models\Todo;

final class TodoCreateService
{
    public function main(array $parameters): Todo
    {
        $todo = new Todo();
        return $todo;
    }
}