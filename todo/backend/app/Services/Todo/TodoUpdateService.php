<?php

namespace App\Services\Todo;

use \App\Models\Todo;

final class TodoUpdateService
{
    public function main(array $parameters): Todo
    {
        $todo = Todo::findOrFail($parameters['id']);
        $todo->title = $parameters['title'];
        $todo->description = $parameters['description'];
        $todo->save();

        return $todo;
    }
}