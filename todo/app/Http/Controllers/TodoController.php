<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Http\Resources\TodoResource;
use App\Http\Resources\TodoIdResource;
use App\Models\Todo;
use App\Models\User;
use App\Services\Todo\TodoCreateService;
use App\Services\Todo\TodoFetchService;
use App\Services\Todo\TodoFetchOneService;
use App\Services\Todo\TodoDeleteService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create(TodoCreateRequest $request)
    {
        $parameters = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->userId,
        ];
        $service = new TodoCreateService();
        $todo = $service->main($parameters);
        return TodoResource::make($todo);
    }

    public function fetch()
    {
        $service = new TodoFetchService();
        $todos = $service->main();
        return TodoResource::collection($todos);
    }

    public function fetchOne(int $todoId)
    {
        $service = new TodoFetchOneService();
        $todo = $service->main($todoId);
        return TodoResource::make($todo);
    }

    public function delete(int $todoId)
    {
        $service = new TodoDeleteService();
        $deleteId = $service->main($todoId);
        return TodoIdResource::make($deleteId);
    }
}