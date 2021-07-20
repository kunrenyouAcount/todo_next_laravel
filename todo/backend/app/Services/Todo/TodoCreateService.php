<?php

namespace App\Services\Todo;

use \App\Models\Todo;

final class TodoCreateService
{
    public function main(array $parameters): Todo
    {
        $todo = new Todo();
        $todo->title = $parameters['title'];
        $todo->description = $parameters['description'];
        $todo->user_id = $parameters['user_id'];
        $todo->save();

        return $todo;
    }
}