<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Gards;
use Exception;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $classRoom = ClassRoom::get();
        $Grades  = Gards::get();
        return view('classroom.index', compact('classRoom', 'Grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $classRoom = new ClassRoom();
            $classRoom->name = ['en' => $request->name_en, 'ar' => $request->Name];
            $classRoom->gard_id = $request->gard_id;
            $classRoom->save();

            // Set a success toast, with a title
            toastr()->success('insert done successful ', 'system !!');
            return redirect()->route('classrooms.index');
        } catch (Exception $ex) {
            return $ex;
            toastr()->error('I do not think that word means what you think it means.', 'Inconceivable!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $gard = ClassRoom::find($id)->delete();
            // Set a success toast, with a title
            toastr()->success('delete done successfull', 'scholl mangement system');
            return redirect()->route('classrooms.index');
        } catch (Exception $ex) {
            toastr()->error('smoe thing wnet wrong', 'system !!!');
            return redirect()->back();
        }
    }

    public function delete_all(Request $request)
    {
        try {
            $id_array = explode(',', $request->array_id);
            $delete = ClassRoom::whereIn('id', $id_array)->delete();
            toastr()->success('delete done successfull', 'scholl mangement system');
            return redirect()->route('classrooms.index');
        } catch (Exception $ex) {
            toastr()->error('smoe thing wnet wrong', 'system !!!');
            return redirect()->back();
        }
    }

    public function gardsClass(Request $request)
    {
        $id = $request->garde_id;
        $Grades = Gards::all();
        $classRoom = ClassRoom::where('gard_id', $id)->get();
        return view('classroom.index', compact('classRoom', 'Grades', 'id'));
    }
}