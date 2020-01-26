<?php

namespace App\Repositories;

interface CourseRepositoryInterface
{
    public function all($user);

    public function store($user, array $data);

    public function show($user, $course);

    public function update($user, $course, array $data);

    public function delete($user, $course);
}