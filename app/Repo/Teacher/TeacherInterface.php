<?php

namespace  App\Repo\Teacher;

interface TeacherInterface
{

    public function GetGender();

    public function GetSpcicalzations();

    public function GetAllTeachers();

    public function storeTeacher($request);

    public function updateTeacher($request, $teacher_id);
}
