<?php

namespace App\Http\Controllers;

use App\Models\Attachement;
use App\Models\Student1;
use Illuminate\Http\Request;
use App\Repo\Student\StudentInterface;
use App\Models\bloods;
use App\Models\Fees;
use App\Models\FeeInvoice;
use App\Models\StudentAcount;
use Dflydev\DotAccessData\Data;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Student1Controller extends Controller
{

    public $StudentInterface;
    public function __construct(StudentInterface  $StudentInterface)
    {
        $this->StudentInterface = $StudentInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Students = Student1::with('Gender', 'International', 'Section', 'Gard', 'Classroom')->get();
        return view('Student.index', compact('Students'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->StudentInterface->CreateStudent(null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->StudentInterface->StoreStudent($request);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Attachement::all();
        $student =  Student1::findOrFail($id);
        // return $student;
        // return $student->Attachments;
        return view('Student.show', compact("student"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student_id)
    {
        return $this->StudentInterface->EditStudent($student_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student1 $student)
    {
        // return $student;
        return $this->StudentInterface->UpdateStudent($request, $student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student1 $student)
    {
        $this->StudentInterface->destroyAndDeleteDirectory($student);
    }

    public function get_class($id)
    {
        return response()->json($this->StudentInterface->GetGlass($id));
    }


    public function get_sections($id)
    {
        return response()->json($this->StudentInterface->GetSections($id));
    }


    public function promotions_form()
    {
        return $this->StudentInterface->promotions_form();
    }

    public function promotions(Request $request)
    {
        return $this->StudentInterface->promotions($request);
    }

    public function promotionsTable()
    {
        return $this->StudentInterface->promotionTable();
    }


    public function resetPromotions($id)
    {
        return $this->StudentInterface->resetPromtion($id);
    }

    public function RestPromotionsOne($id)
    {
        return $this->StudentInterface->RestPromotionsOne($id);
    }


    public function feeInvoice($id)
    {
        return $this->StudentInterface->feeInvoice($id);
    }

    public function student_invoices(Request $request)
    {
        return   $this->StudentInterface->student_invoices($request);
    }

    public function InvoiceIndex()
    {
        return $this->StudentInterface->InvoiceIndex();
    }
}