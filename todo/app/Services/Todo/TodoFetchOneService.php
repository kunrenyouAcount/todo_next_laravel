<?php

namespace App\Services\Todo;

use \App\Models\User;
use \App\Models\Todo;

final class TodoFetchOneService
{
    public function main(int $todoId): Todo
    {
        $todo = Todo::findOrFail($todoId);
        return $todo;
    }
}