<?php


namespace Tests\Feature;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubjectControllerTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    /**
     * @test
     */
    public function it_can_create_a_subject_for_a_student()
    {
        $student = Student::factory()->create();

        $response = $this->postJson("/api/students/{$student->id}/subjects", [
            'subject_code' => 'ABC123',
            'name' => 'Sample Subject',
            'description' => 'Sample description',
            'instructor' => 'Sample Instructor',
            'schedule' => 'MWF 8:00-10:00',
            'prelims' => 85,
            'midterms' => 90,
            'pre_finals' => 80,
            'finals' => 75,
            'date_taken' => '2024-01-01',
        ]);

        $response->assertStatus(201);
    }

public function it_can_update_a_subject_for_a_student()
{
    $student = Student::factory()->create();
    $subject = Subject::factory()->create(['student_id' => $student->id]);

    $response = $this->patchJson("/api/students/{$student->id}/subjects/{$subject->id}", [
        'name' => 'Updated Subject Name',
        'subject_code' => 'Updated Subject Code', // Example of another field to update
        'description' => 'Updated description',   // Example of another field to update
        'instructor' => 'Updated Instructor',     // Example of another field to update
        'schedule' => 'Updated Schedule',         // Example of another field to update
        'prelims' => 85,                          // Example of another field to update
        'midterms' => 88,                         // Example of another field to update
        'pre_finals' => 90,                       // Example of another field to update
        'finals' => 92,                           // Example of another field to update
        'date_taken' => '2024-06-30',             // Example of another field to update
    ]);

    $response->assertStatus(200);
    }
}