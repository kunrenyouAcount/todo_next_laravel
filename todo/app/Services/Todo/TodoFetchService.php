<?php

namespace App\Services\Todo;

use \App\Models\User;
use \App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

final class TodoFetchService
{
    public function main(): Collection
    {
        //1は仮置き
        $todos = Todo::where('user_id', 1)->get();
        return $todos;
    }
}