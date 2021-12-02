<?php

namespace App\Repo\Recept;

use App\Models\Fee1;
use App\Models\FeeInvoice;
use App\Models\FundAcount;
use App\Models\Gard1;
use App\Models\ReceptStudent;
use App\Models\Student1;
use App\Models\StudentAcount;
use Exception;
use Illuminate\Support\Facades\DB;

class ReceptRepo implements ReceptFace
{
    public function index()
    {
        $student = ReceptStudent::with('Student')->get();
        return view('Student.Recept.index', compact('student'));
    }
    public function show($id)
    {
        $student  = Student1::findOrFail($id);
        return view('Student.Recept.create', compact('student'));
    }
    public function store($request)
    {
        try {
            // return $request;
            DB::beginTransaction();

            $recept = new ReceptStudent();
            $recept->student_id = $request->student_id;
            $recept->debit       = $request->debit;
            $recept->save();

            $fundAcount = new FundAcount();
            $fundAcount->recept_id = $recept->id;
            $fundAcount->debit     = $request->debit;
            $fundAcount->save();






            $acount = new StudentAcount();
            $acount->insert_date =  date('y - m - d');
            $acount->student_id  = $request->student_id;
            $acount->type = 'recept';
            $acount->recept_id      =   $recept->id;
            $acount->debit       = $request->debit;
            // $acount->credi       = $request->mount;
            $acount->save();

            DB::commit();
            toastr()->success('insert done succeesful', "School Mangment");
            return redirect()->route('recept.index');
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }
    }
    public function edit($id)
    {
        $feeInv = ReceptStudent::findOrFail($id);
        $student  = Student1::findOrFail($feeInv->student_id);
        // dd($fee);
        return view('Student.Recept.Edit', compact('student', 'feeInv'));
    }
    public function update($request, $id)
    {
        try {
            // return $request;
            DB::beginTransaction();

            $recept = ReceptStudent::findOrFail($id);
            $recept->debit       = $request->debit;
            $recept->save();

            $fundAcount = FundAcount::where('recept_id', $id)->first();
            $fundAcount->debit     = $request->debit;
            $fundAcount->save();

            $acount = StudentAcount::where('recept_id', $id)->first();
            $acount->debit       = $request->debit;
            // $acount->credi       = $request->mount;
            $acount->save();

            DB::commit();
            toastr()->success('insert done succeesful', "School Mangment");
            return redirect()->route('recept.index');
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function destroy($id)
    {
        ReceptStudent::findOrFail($id)->delete();
        toastr()->success('Delelte Student Data Done Succuessfuly ', 'School Mangment System');
        return redirect()->back();
    }
}




	// more