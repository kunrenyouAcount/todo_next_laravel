<?php

namespace Tests\Unit\Todo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use \Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Services\Todo\TodoCreateService;

class TodoCreateServiceTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function 入力値が正しく登録ができる()
    {
        $user = User::factory()->create();

        $input = [
            'user_id' => $user->id,
            'title' => 'title',
            'description' => 'description',
        ];
        $service = new TodoCreateService();
        $todo = $service->main($input);

        $expected = [
            'id' => $todo->id,
            'user_id' => $user->id,
            'title' => 'title',
            'description' => 'description',
        ];
        $this->assertDatabaseHas('todos', $expected);
    }
}