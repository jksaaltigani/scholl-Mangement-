<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Gard1;
use App\Models\Section1;
use App\Models\Teacher1;
use Exception;
use Illuminate\Http\Request;

class Section1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades =  Gard1::with('sections')->get();
        $teachers = Teacher1::all();
        return view('sections.index', compact('Grades', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $section  = new Section1();
            $section->name = ['en' => $request->name_Section_En, 'ar' => $request->name_Section_Ar];
            $section->gard_id = $request->Grade_id;
            $section->Class_id = $request->Class_id;
            $section->notes = 'jksa say hello';
            $section->save();
            $section->teachers()->attach($request->teachers_id);
            toastr()->success('insert done successfully');
            return redirect()->back();
        } catch (Exception $ex) {

            toastr()->error('some thing went worng try again');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $section_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($section_id)
    {
    }

    public function classes($id)
    {
        $classes = Clas::where('gard_id', $id)->get();
        return response()->json($classes);
    }
}