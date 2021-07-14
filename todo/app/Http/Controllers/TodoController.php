<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use App\Models\User;
use App\Services\Todo\TodoCreateService;
use App\Services\Todo\TodoFetchService;
use App\Services\Todo\TodoFetchOneService;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}