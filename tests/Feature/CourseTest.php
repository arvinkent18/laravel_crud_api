<?php

namespace Tests\Feature;

use App\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    public function testCoursesAreListedCorrectly()
    {
        factory(Course::class)->create([
            'name' => 'Test Course #1'
        ]);

        factory(Course::class)->create([
            'name' => 'Test Course #2'
        ]);

        $this->json('GET', '/api/courses')
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Test Course #1'
            ],[
                'name' => 'Test Course #2'    
            ])
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    public function testRequireCourseName()
    {
        $this->json('POST', '/api/course')
            ->assertStatus(422)
            ->assertJson([
                'name' => ['The name field is required.']
            ]);
    }

    public function testCourseIsCreatedCorrectly()
    {
        $this->json('POST', '/api/course')
            ->assertStatus(201)
            ->assertJson([
                'name' => 'Test Course'
            ]);
    }

    public function testCourseIsUpdatedCorrectly()
    {
        $this->json('PATCH', '/api/course')
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Updated Test Course'
            ]); 
    }

    public function testCourseIsDeletedCorrectly()
    {
        $course = factory(Course::class)->create([
            'name' => 'Test Course'
        ]); 

        $this->json('DELETE', '/api/course' . $course->id)->assertStatus(204);
    }
}
