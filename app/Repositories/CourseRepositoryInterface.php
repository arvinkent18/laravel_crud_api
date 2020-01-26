<?php

namespace App\Repositories;

interface CourseRepositoryInterface
{
    public function all();

    public function store($course, array $data);

    public function show($course);

    public function update($course, array $data);

    public function delete($course);
}