<?php

namespace App\Http\Controllers;

use App\Models\ReceptStudent;
use App\Repo\Recept\ReceptFace;
use Illuminate\Http\Request;

class ReceptStudentController extends Controller
{

    public $interface;
    public function __construct(ReceptFace $InterFace)
    {
        $this->InterFace = $InterFace;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->InterFace->index();
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
        return  $this->InterFace->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceptStudent  $receptStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->InterFace->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceptStudent  $receptStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->InterFace->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceptStudent  $receptStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        return $this->InterFace->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceptStudent  $receptStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->InterFace->destroy($id);
    }
}