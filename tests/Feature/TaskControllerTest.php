<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Task;
use App\User;

class TaskControllerTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $task = factory(Task::class)->create();
        $response = $this->get(route('tasks.edit', [$task]));
        $response->assertOk();
    }

    public function testStore()
    {

        $factoryData = factory(Task::class)->make(['user_id' => $this->user->id])->toArray();
        $data = \Arr::only($factoryData, ['name', 'user_id']);
        $response = $this->post(route('tasks.store'), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testUpdate()
    {

        $task = factory(Task::class)->create(['user_id' => $this->user->id]);

        $factoryData = factory(Task::class)->make(['user_id' => $this->user->id])->toArray();
        $data = \Arr::only($factoryData, ['name', 'user_id']);
        $response = $this->patch(route('tasks.update', $task), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testDestroy()
    {

        $task = factory(Task::class)->make();
        $task->user()->associate($this->user);
        $task->save();

        $response = $this->delete(route('tasks.destroy', $task));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
