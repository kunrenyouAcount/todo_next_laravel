<?php

namespace App\Services\Todo;

use \App\Models\User;
use \App\Models\Todo;

final class TodoCreateService
{
    public function main(array $parameters): Todo
    {
        $user = User::findOrFail($parameters['user_id']);

        $todo = new Todo();
        $todo->title = $parameters['title'];
        $todo->description = $parameters['description'];
        $todo->user_id = $user->id;
        $todo->save();

        return $todo;
    }
}