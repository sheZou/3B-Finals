<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    /** @test */
    public function it_can_create_a_student()
    {
        $data = [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'birthdate' => $this->faker->date(),
            'sex' => $this->faker->randomElement(['MALE', 'FEMALE']),
            'address' => $this->faker->address,
            'year' => $this->faker->year,
            'course' => $this->faker->randomElement(['BSCS', 'BSIT', 'BSIS']),
            'section' => $this->faker->randomLetter,
        ];

        $response = $this->postJson('/api/students', $data);

        $response->assertStatus(201); // Assuming 201 is the status code for successful creation
    }

    /** @test */
    public function it_can_update_a_student()
    {
        $student = Student::factory()->create();

        $response = $this->patchJson("/api/students/{$student->id}", [
            'firstname' => 'Jane', // Update with new data
        ]);

        $response->assertStatus(200); // Assuming 200 is the status code for successful update
    }
}
