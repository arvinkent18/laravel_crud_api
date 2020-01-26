<?php

namespace App\Repositories;

use App\Course;
use App\Repositories\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{
    public function all()
    {
        return Course::all();
    }

    public function store($course, array $data)
    {
        return $course->create($data);
    }

    public function show($course)
    {
        return $course;
    }

    public function update($course, array $data)
    {
        return $course->update($data);
    }

    public function delete($course)
    {
        return $course->delete();
    }
}