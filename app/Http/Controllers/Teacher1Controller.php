<?php

namespace App\Http\Controllers;

use App\Models\Teacher1;
use App\Repo\Teacher\TeacherInterface;
use Exception;
use Illuminate\Http\Request;

class Teacher1Controller extends Controller
{
    protected $teacher;
    public function __construct(TeacherInterface $teacherInterface)
    {
        $this->teacher = $teacherInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Teachers  = $this->teacher->GetAllTeachers();
        // $Spcicalzations = $this->teacher->GetSpcicalzations();
        return view('Teachers.index', compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders  = $this->teacher->GetGender();
        $specializations  = $this->teacher->GetSpcicalzations();
        return view('Teachers.create', compact('genders', 'specializations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert_bol_val =   $this->teacher->storeTeacher($request);
        if ($insert_bol_val) {
            toastr()->success('insert done successfull', 'success');
            return redirect()->route('teachers.index');
        } else {
            toastr()->error('some thing went wong', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher1 $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try {
            $genders  = $this->teacher->GetGender();

            $specializations  = $this->teacher->GetSpcicalzations();
            $teacher = Teacher1::with('Specialzations', 'gender')->find($id);
            return view('Teachers.Edit', compact('teacher', 'genders', 'specializations'));
        } catch (Exception $e) {
            toastr()->error('some ting went worng', 'error !!');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teacher_id)
    {

        $update_bol_val = $this->teacher->updateTeacher($request, $teacher_id);
        if ($update_bol_val == true) {
            toastr()->success('update done successfull', 'success');
            return redirect()->route('teachers.index');
        } else {
            toastr()->error($update_bol_val, 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher1 $teacher)
    {
    }
}