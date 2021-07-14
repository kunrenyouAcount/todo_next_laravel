<?php

namespace Tests\Unit\Todo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Todo;
use App\Services\Todo\TodoDeleteService;


class TodoDeleteServiceTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function 削除でき、削除したTodoのIDが返ってくる()
    {
        $user = User::factory()->create();
        $todo = Todo::factory()->create([
            'user_id' => $user->id,
        ]);

        $service = new TodoDeleteService();
        $todoId = $service->main($todo->id);

        $expected = [
            'id' => $todo->id
        ];

        $this->assertDeleted('todos', $expected);
        $this->assertSame($todo->id, $todoId);
    }

    /** @test */
    public function todoが存在しないため、ModelNotFoundExceptionが返ってくる()
    {
        $this->expectException(ModelNotFoundException::class);

        $service = new TodoDeleteService();
        $todoId = $service->main(100);
    }
}