<?php

namespace App\Services\Todo;

use \App\Models\User;
use \App\Models\Todo;

final class TodoDeleteService
{
    public function main(int $todoId): int
    {
        $todo = Todo::findOrFail($todoId);
        $todo->delete();
        return $todoId;
    }
}