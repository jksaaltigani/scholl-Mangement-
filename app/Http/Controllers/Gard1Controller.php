<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Gard1;
use Exception;
use Illuminate\Http\Request;


class Gard1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $gards = Gard1::all();

        return view('Gardes.index', compact('gards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        try {
            $gard = new Gard1();
            $gard->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $gard->note = $request->notes;
            $gard->save();
            // Set a warning toast, with no title
            // Notification::send('jksaaltigani', new Adduser);

            // toastr()->warning('My name is Inigo Montoya. You killed my father, prepare to die!');

            // Set a success toast, with a title
            toastr()->success('Have fun storming the castle!', 'Miracle Max Says');

            return redirect()->route('grades.index');
        } catch (Exception $ex) {
            toastr()->error('I do not think that word means what you think it means.', 'Inconceivable!');
            return redirect()->back();
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gards  $gards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $gard = Gard1::find($id);
            $gard->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $gard->note = $request->notes;
            $gard->save();
            // Set a success toast, with a title
            toastr()->success('update done successfull', 'scholl mangement system');
            return redirect()->route('grades.index');
        } catch (Exception $ex) {
            toastr()->error('I do not think that word means what you think it means.', 'Inconceivable!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gards  $gards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $classroom = Clas::where('gard_id', $id)->get()->count();

        try {
            if ($classroom > 0) {
                toastr()->error('cant delet this has children in this delet the child firest', 'system!');
                return redirect()->back();
            }
            $gard = Gard1::with('classRoom')->where('id', $id)->first();
            $gard->delete();     // Set a success toast, with a title
            toastr()->success('delete done successfull', 'School Mangement System');
            return redirect()->route('grades.index');
        } catch (Exception $ex) {
            toastr()->error('smoe thing wnet wrong', 'system!');
            return redirect()->back();
        }
    }
}