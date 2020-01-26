<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Course;
use Illuminate\Http\Request;
use App\Repositories\CourseRepositoryInterface;

class CourseController extends Controller
{
    protected $user;

    protected $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->user = JWTAuth::parseToken()->authenticate();

        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->all($this->user);
        
        return response($courses, 200);
    }

    public function store(Request $request, Course $course)
    {
        $data = [
            'name' => $request->name
        ];

        $course = $this->courseRepository->store($this->user, $data);

        return response()->json([
            'course'  => $course,
            'message' => 'Course created successfully'
        ], 201);
    }

    public function show(Course $course)
    {
        if ($course->exists()) {
            $course = $this->courseRepository->show($this->user, $course);
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
            $data = [
                'name' => $request->name
            ];
            $updateCourse = $this->courseRepository->update($this->user, $course, $data);

            return response()->json([
                'course' => $updateCourse,
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
