<?php

namespace App\Repositories;

use App\Repositories\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{
    public function all($user)
    {
        return $user->courses()->get()->toArray();
    }

    public function store($user, array $data)
    {
        return $user->courses()->create($data);
    }

    public function show($user, $course)
    {
        return $user->courses()->find($course);
    }

    public function update($user, $course, array $data)
    {
        $targetCourse = $user->courses()->find($course->id);
        return $targetCourse->update($data);
    }

    public function delete($user, $course)
    {
        return $user->find($course)->delete();
    }
}