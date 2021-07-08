<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use \Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Services\Todo\TodoCreateService;

class TodoCreateTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function 指定したuserIDが存在しない場合、ModelNotFoundException例外を返す()
    {
        $this->expectException(ModelNotFoundException::class);
        $input = [
            'userId' => 0,
            'title' => 'title',
            'description' => 'description',
        ];
        $service = new TodoCreateService();
        $service->main($input);
    }

    /** @test */
    public function 入力値が正しく登録ができる()
    {
        $user = User::factory()->create();

        $input = [
            'userId' => $user->id,
            'title' => 'title',
            'description' => 'description',
        ];
        $service = new TodoCreateService();
        $todo = $service->main($input);

        $expected = [
            'id' => $todo->id,
            'userId' => $user->id,
            'title' => 'title',
            'description' => 'description',
        ];
        $this->assertDatabaseHas('todos', $expected);
    }
}