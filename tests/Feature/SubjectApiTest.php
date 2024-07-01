<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Student;
use App\Models\Subject;

class SubjectApiTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    /** @test */
    public function it_can_retrieve_subjects_for_a_student()
    {
        $student = Student::factory()->create();
        $subject = Subject::factory()->create(['student_id' => $student->id]);

        $response = $this->get("/api/students/{$student->id}/subjects");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $subject->name]);
    }

    /** @test */
    public function it_can_retrieve_a_specific_subject_for_a_student()
    {
        $student = Student::factory()->create();
        $subject = Subject::factory()->create(['student_id' => $student->id]);

        $response = $this->get("/api/students/{$student->id}/subjects/{$subject->id}");

        $response->assertStatus(200)
                 ->assertJson(['name' => $subject->name]);
    }
}
