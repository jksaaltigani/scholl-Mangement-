<?php

namespace App\Repo\Outer;

use App\Models\Gard1;
use App\Models\Student1;
use Exception;

class OuterRepo implements OuterInter
{
    public function index()
    {
        $garduteds = Student1::onlyTrashed()->get();
        return view('Student.garduted.index', compact('garduteds'));
    }
    public function create()
    {
        $gards = Gard1::all();
        return view('Student.garduted.create', compact('gards'));
    }
    public function store($re)
    {
        // return $re;
        $ids = Student1::where('gard_id', $re->gard_id)->where('class_id', $re->class_id)->where('section_id', $re->section_id)->get();
        if ($ids->count() == 0) {
            toastr()->error('some thing went worng');
            return redirect()->back();
        }

        try {
            Student1::whereIn('id', $ids)->delete();
            toastr()->success('student Was Garduted Succussful', 'Scholl Mangement System');
            return redirect()->route('stgarduted.index');
        } catch (Exception $ex) {
            return $ex;
        }
    }
    public function reSet($id)
    {
        Student1::onlyTrashed()->where('id', $id)->first()->restore();
        toastr()->success('Resotr Student Data Done Succuessfuly ', 'School Mangment System');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Student1::onlyTrashed()->where('id', $id)->first()->forceDelete();
        toastr()->success('Delelte Student Data Done Succuessfuly ', 'School Mangment System');
        return redirect()->back();
    }
}




	// more
