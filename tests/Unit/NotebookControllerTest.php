<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Notebook;
use Database\Seeders\NotebookSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotebookControllerTest extends TestCase
{
    use RefreshDatabase; 

    public function testStoreNotebook()
    {
        $data = [
            'full_name' => 'Lena Turuzkina',
            'phone' => '79236855653',
            'email' => 'Lena.sabitova123@mail.ru'
        ];

        $response = $this->postJson('/api/v1/notebook', $data);

        $response->assertStatus(201)
                 ->assertJson(['message' => 'note created']);
        
        $this->assertDatabaseHas('notebooks', $data);
    }

    public function testUpdateNotebook()
    {
        $notebook = Notebook::create([
            'full_name' => 'Lena Turuzkina',
            'phone' => '79236855653',
            'email' => 'Lena.sabitova12@mail.ru'
        ]);

        $data = [
            'full_name' => 'Lena Turuzkina',
            'phone' => '79236855653',
            'email' => 'Lena.sabitova132@mail.ru'
        ];

        $response = $this->putJson('/api/v1/notebook/' . $notebook->id, $data);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Запись обновлена']);

        $this->assertDatabaseHas('notebooks', $data);
    }

    public function testDeleteNotebook()
    {
        $notebook = Notebook::create([
            'full_name' => 'Lena Turuzkina',
            'phone' => '79236855653',
            'email' => 'Lena.sabitova@mail.ru'
        ]);

        $response = $this->deleteJson('/api/v1/notebook/' . $notebook->id);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Запись удаленна']);

        $this->assertDatabaseMissing($notebook);
    }

    public function testIndexNotebook()
    {
        $this->seed(NotebookSeeder::class);
        $response = $this->getJson('/api/v1/notebook/');
    
        $response->assertStatus(200);
    
        $response->assertJsonStructure([
            '*' => [
                'id',
                'full_name',
                'company',
                'phone',
                'email',
                'birth_date',
                'photo',
                'created_at',
                'updated_at',
            ],
        ]);
    }
}