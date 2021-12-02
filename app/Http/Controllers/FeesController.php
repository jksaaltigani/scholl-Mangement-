<?php

namespace App\Http\Controllers;

use App\Models\Fee1 as Fees;
use App\Models\Gard1;
use Exception;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = Fees::all();
        return view('fess.index', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gards = Gard1::all();
        return view('fess.create', compact('gards'));
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
            // return $request;
            $fee = new Fees();
            $fee->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $fee->gard_id = $request->gard_id;
            $fee->class_id = $request->class_id;
            $fee->years = $request->year_id;
            $fee->fees = $request->price;
            $fee->type = $request->type;
            $fee->save();
            toastr()->success('Insert Done Success Full', 'School Mangement system');
            return redirect()->route('fees.index');
        } catch (Exception $e) {
            return $e;
            toastr()->error('Some Thing Went Wonrg', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function show($id, $type)
    {
        $response = Fees::where('class_id', $id)->where('type', $type)->first();
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fee = Fees::findOrfail($id);
        $gards = Gard1::all();
        return view('fess.Edit', compact('fee', 'gards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $fee = Fees::findOrfail($id);
            $fee->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $fee->gard_id = $request->gard_id;
            $fee->class_id = $request->class_id;
            $fee->years = $request->year_id;
            $fee->fees = $request->price;
            $fee->type = $request->type;
            $fee->save();
            toastr()->success('Insert Done Success Full', 'System');
            return redirect()->route('fees.index');
        } catch (Exception $e) {

            toastr()->error('some thing went wrong', 'Error');

            return redirect()->route('fees.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee = Fees::findOrfail($id)->delete();
        toastr()->success('Delete Done Success', 'Deleted');
        return redirect()->route('fees.index');
    }
}