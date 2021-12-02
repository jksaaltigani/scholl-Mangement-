<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gard1;
use App\Models\Clas;
use Exception;


class ClasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $classRoom = Clas::get();
        $Grades  = Gard1::get();
        return view('classroom.index', compact('classRoom', 'Grades'));
    }



    public function store(Request $request)
    {

        // return $request;
        try {
            foreach ($request->List_Classes as $clas) {

                $classRoom = new Clas();
                $classRoom->name = ['en' => $clas['name_en'], 'ar' => $clas['Name']];
                $classRoom->gard_id = $clas['gard_id'];
                $classRoom->save();
            }

            // Set a success toast, with a title
            toastr()->success('insert done successful ', 'Scholl System Mangement');
            return redirect()->route('classrooms.index');
        } catch (Exception $ex) {
            return $ex;
            toastr()->error('I do not think that word means what you think it means.', 'Inconceivable!');
            return redirect()->back();
        }
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $gard = Clas::find($id)->delete();
            // Set a success toast, with a title
            toastr()->success('delete done successfull', 'Scholl Mangement System');
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
            $delete = Clas::whereIn('id', $id_array)->delete();
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
        $Grades = Gard1::all();
        $classRoom = Clas::where('gard_id', $id)->get();
        return view('classroom.index', compact('classRoom', 'Grades', 'id'));
    }
}