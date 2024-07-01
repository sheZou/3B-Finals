<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Student;

class StudentApiTest extends TestCase
{
    use RefreshDatabase; // Refreshes the database after each test

    /**
     * Test GET /api/students endpoint.
     *
     * @return void
     */
    public function testGetStudents()
    {
        $response = $this->getJson('/api/students');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'metadata' => [
                         'count',
                         'search',
                         'limit',
                         'offset',
                         'fields',
                     ],
                     'students' => [],
                 ]);
    }

    /**
     * Test POST /api/students endpoint.
     *
     * @return void
     */
    public function testCreateStudent()
    {
        $data = [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'birthdate' => '2001-01-01',
            'sex' => 'MALE',
            'address' => 'Tacloban',
            'year' => 3,
            'course' => 'BSIT',
            'section' => 'B',
        ];

        $response = $this->postJson('/api/students', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);
    }

    /**
     * Test PATCH /api/students/{id} endpoint.
     *
     * @return void
     */
    public function testUpdateStudent()
    {
        $student = Student::factory()->create();

        $updateData = [
            'firstname' => 'Updated Firstname',
            'lastname' => 'Updated Lastname',
        ];

        $response = $this->patchJson("/api/students/{$student->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updateData);
    }
}
