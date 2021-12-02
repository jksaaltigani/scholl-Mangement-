<?php

namespace App\Repo\Invoice;

use App\Models\Fee1;
use App\Models\FeeInvoice;
use App\Models\Gard1;
use App\Models\Student1;
use App\Models\StudentAcount;
use Exception;
use Illuminate\Support\Facades\DB;

class InvoiceRepo implements InvoiceFace
{
    public function index()
    {
        $student = FeeInvoice::with('Student')->get();
        return view('Student.invoices.index', compact('student'));
    }
    public function create($id)
    {
        $student  = Student1::findOrFail($id);
        $fee = Fee1::where('class_id', $student->class_id)->first();
        // dd($fee);
        return view('Student.invoices.fee_invoice', compact('student', 'fee'));
    }
    public function store($request)
    {
        try {
            // return $request;
            DB::beginTransaction();

            $fee = new FeeInvoice();
            $fee->invoice_date = date('y - m - d');
            $fee->student_id   = $request->student_id;
            $fee->class_id     = $request->class_id;
            $fee->gard_id      = $request->gard_id;
            $fee->fee_id       = $request->fee_id;
            $fee->amount       = $request->mount;
            $fee->save();


            $acount = new StudentAcount();
            $acount->insert_date =  date('y - m - d');
            $acount->student_id  = $request->student_id;
            $acount->fee_id      =   $fee->id;
            $acount->debit       = $request->mount;
            // $acount->credi       = $request->mount;
            $acount->save();

            DB::commit();
            toastr()->success('insert done succeesful', "School Mangment");
            return redirect()->route('invoices.index');
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }
    }
    public function edit($id)
    {
        $feeInv = FeeInvoice::findOrFail($id);
        $student  = Student1::findOrFail($feeInv->student_id);
        $fee = Fee1::where('class_id', $student->class_id)->first();
        // dd($fee);
        return view('Student.invoices.Edit', compact('student', 'fee', 'feeInv'));
    }
    public function update($request, $id)
    {

        try {
            // return $request;
            DB::beginTransaction();

            $fee =  FeeInvoice::findOrFail($id);
            // $fee->student_id   = $request->student_id;
            // $fee->class_id     = $request->class_id;
            // $fee->gard_id      = $request->gard_id;
            // $fee->fee_id       = $request->fee_id;
            $fee->amount       = $request->mount;
            $fee->save();


            // dd($fee->fee_id);
            $acount = StudentAcount::where('fee_id', $fee->fee_id)->first();
            // dd($acount);
            $acount->debit  = $request->mount;
            $acount->save();

            DB::commit();
            toastr()->success('updated done succeesful', "School Mangment");
            return redirect()->route('invoices.index');
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }
    }
    public function destroy($id)
    {
        FeeInvoice::findOrFail($id)->delete();
        toastr()->success('Delelte Student Data Done Succuessfuly ', 'School Mangment System');
        return redirect()->back();
    }
}




	// more
