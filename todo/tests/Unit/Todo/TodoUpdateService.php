<?php

namespace Tests\Unit\Todo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use \Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Todo;
use App\Services\Todo\TodoUpdateService;

class TodoUpdateServiceTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function 入力値が正しく更新ができる()
    {
        $user = User::factory()->create();
        $todo = Todo::factory()->create([
            'user_id' => $user->id
        ]);

        $input = [
            'id' => $todo->id,
            'title' => 'title',
            'description' => 'description',
        ];
        $service = new TodoUpdateService();
        $todo = $service->main($todo->id, $input);

        $expected = [
            'id' => $todo->id,
            'title' => 'title',
            'description' => 'description',
        ];
        $this->assertDatabaseHas('todos', $expected);
    }

    /** @test */
    public function todoが存在しないため、ModelNotFoundExceptionが返ってくる()
    {
        $this->expectException(ModelNotFoundException::class);

        $service = new TodoUpdateService();
        $input = [
            'id' => 0,
            'title' => 'title',
            'description' => 'description',
        ];
        $todoId = $service->main($input);
    }
}