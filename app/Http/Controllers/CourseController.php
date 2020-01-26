<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Course;
use Illuminate\Http\Request;
use App\Repositories\CourseRepositoryInterface;

class CourseController extends Controller
{
    private $user;

    private $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->user = JWTAuth::parseToken()->authenticate();

        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->all();
        
        return response($courses, 200);
    }

    public function store(Request $request, Course $course)
    {
        $data = [
            'name' => $request->name
        ];

        $course = $this->courseRepository->store($course, $data);

        return response()->json([
            'course'  => $course,
            'message' => 'Course created successfully'
        ], 201);
    }

    public function show(Course $course)
    {
        if ($course->exists()) {
            return response($course, 200);
        } else {
            return response()->json([
                'message' => 'Course not found'
            ], 404);
        }
    }

    public function update(Request $request, Course $course)
    {
        if ($course->exists()) {
            $course->update([
                'name' => $request->name
            ]);

            return response()->json([
                'message' => 'Course updated successfuly'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Course not found'
            ], 404);
        }
    }

    public function delete(Course $course)
    {
        if($course->exists()) {
            $course->delete();

            return response()->json([
                'message' => 'Course deleted'
            ], 204);
        } else {
            return response()->json([
                'message' => 'Course not found'
            ], 404);
        }
    }
}
