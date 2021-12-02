<?php

namespace App\Repo\Teacher;

use App\Models\Gender;
use App\Models\international;
use App\Models\Specialzation;
use App\Models\Teacher;
use App\Models\Teacher1;
use App\Models\User;
use Database\Seeders\Spachliations;
use Exception;
use Illuminate\Support\Facades\Auth;

class TeacherRepo implements TeacherInterface
{
    public function GetGender()
    {
        return Gender::all();
    }

    public function GetSpcicalzations()
    {
        return Specialzation::all();
    }
    public function GetAllTeachers()
    {
        return Teacher1::with('gender', 'specialzations')->get();
    }

    public function storeTeacher($request)
    {
        // return $request;
        try {

            $teacher  = new Teacher1();
            $teacher->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $teacher->email = $request->Email;
            $teacher->password = bcrypt($request->Password);
            $teacher->Specialzation_id = $request->Specialization_id;
            $teacher->gander_id = $request->Gender_id;
            $teacher->join_data = $request->Joining_Date;
            $teacher->Address = $request->Address;
            $teacher->save();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }



    public function updateTeacher($request, $teacher_id)
    {
        try {
            $teacher = Teacher1::findOrFail($teacher_id);
            $teacher->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $teacher->email = $request->Email;
            $teacher->password = bcrypt($request->Password);
            $teacher->Specialzation_id = $request->Specialization_id;
            $teacher->gander_id = $request->Gender_id;
            $teacher->join_data = $request->Joining_Date;
            $teacher->Address = $request->Address;
            $teacher->save();
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
}



	// more
