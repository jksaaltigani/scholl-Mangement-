<?php

namespace App\Http\Controllers;

use App\Repo\Outer\OuterInter;
use Illuminate\Http\Request;

class GardutedStudentController extends Controller
{
    public $Interface;

    public function __construct(OuterInter $Interface)
    {
        $this->Interface = $Interface;
    }


    public function index()
    {
        return $this->Interface->index();
    }

    public function create()
    {

        return $this->Interface->create();
    }
    public function store(Request $request)
    {
        return $this->Interface->store($request);
    }
    public function reSet($id)
    {
        return $this->Interface->reSet($id);
    }

    public function destory($id)
    {
        return $this->Interface->destroy($id);
    }
}