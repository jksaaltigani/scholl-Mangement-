<?php

namespace App\Repo\Student;

use App\Models\Attachement;
use App\Models\Gender;
use App\Models\international;
use App\Models\ClassRoom;
use App\Models\Specialzation;
use App\Models\Student;
use App\Models\User;
use App\Models\Myparent;
use App\Models\bloods;
use App\Models\Clas;
use App\Models\FeeInvoice;
use App\Models\Fee1;
use App\Models\Gard1;
use App\Models\parent1;
use App\Models\Promotions;
use App\Models\Section;
use App\Models\Section1;
use App\Models\Student1;
use App\Models\StudentAcount;
use Database\Seeders\Spachliations;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentRepo implements StudentInterface
{

    public function getData()
    {
        $data['internationals'] = international::all();
        $data['gards'] = Gard1::all();
        $data['bloods'] = bloods::all();
        $data['gender'] = Gender::all();
        $data['parents'] = parent1::all();
        return $data;
    }
    public function CreateStudent()
    {
        $data  = $this->getData();
        return view('Student.create', $data);
    }
    public function EditStudent($val)
    {

        $data  = $this->getData();

        $data['student']  = Student1::findOrFail($val);
        // $data =  $this->StudentInterface->getData();
        // return $data['student'];
        return view('Student.Edit', $data);
    }
    public function GetGlass($id)
    {
        return Clas::where('gard_id', $id)->get();
    }
    public function GetSections($id)
    {
        return Section1::where('gard_id', $id)->get();
    }


    public function UpdateStudent($request, $Student)
    {
        // return $request;
        try {
            $Student->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $Student->email = $request->email;
            $Student->password = bcrypt($request->Password);
            $Student->international_id = $request->international_id;
            $Student->gender_id = $request->gender_id;
            $Student->blood_id = $request->blood_id;
            $Student->gard_id = $request->gard_id;
            $Student->class_id = $request->class_id;
            $Student->section_id = $request->section_id;
            $Student->join_date = $request->Joini_date;
            $Student->relagin_id = 1;
            $Student->parent_id = $request->parent_id;
            $Student->save();
            // tost()->succues('upadatedone succesdul');
            return redirect()->route('student.index');
        } catch (Exception $e) {
            return $e;
        }
    }

    public function GetAllStudent()
    {
        return Student1::with('gender', 'specialzations')->get();
    }

    public function StoreStudent($request)
    {
        // return $request;
        try {
            DB::beginTransaction();
            $Student  = new Student1();
            $Student->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $Student->email = $request->email;
            $Student->password = bcrypt($request->Password);
            $Student->international_id = $request->international_id;
            $Student->gender_id = $request->gender_id;
            $Student->blood_id = $request->blood_id;
            $Student->gard_id = $request->gard_id;
            $Student->class_id = $request->class_id;
            $Student->section_id = $request->section_id;
            $Student->join_date = $request->Joini_date;
            $Student->relagin_id = 1;
            $Student->parent_id = $request->parent_id;
            $Student->save();
            if ($request->hasFile('photos')) {
                $this->StorePhoto($request->file('photos'), $Student->id);
            }
            DB::commit();
            toastr()->success('insert done success ful');
            return redirect()->route('student.index');
        } catch (Exception $e) {
            DB::Rollback();
            return $e;
            toastr()->error('smoe thisng went worng');
            return redirect()->back();
        }
    }

    public function StorePhoto($photos, $id)
    {
        foreach ($photos as $photo) {
            $photo->storeAs('Student/' . $id, $photo->getClientOriginalName(), 'parent_attachment');
            $attachment  = new  Attachement();
            $attachment->file_name =  $photo->getClientOriginalName();
            $attachment->Attcahmentable_id = $id;
            $attachment->Attcahmentable_type = 'App\Models\Student1';
            $attachment->save();
        }
    }

    public function updateTeacher($request, $teacher_id)
    {
        try {
            $teacher = Student1::findOrFail($teacher_id);
            $teacher->name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
            $teacher->email = $request->Email;
            $teacher->password = bcrypt($request->Password);
            $teacher->Specialzation_id = $request->Specialization_id;
            $teacher->gander_id = $request->Gender_id;
            $teacher->join_data = $request->Joining_Date;
            $teacher->Address = $request->Address;
            $teacher->save();
            toastr()->success('insert done successfuly');
            return redirect()->route('sutudent.index');
        } catch (Exception $e) {
            return $e;
        }
    }

    public function destroyAndDeleteDirectory($student)
    {
        try {
            DB::beginTransaction();
            Storage::disk('parent_attachment')->deleteDirectory('student\\' . $student->id); #getAdapter()->applyPathPrefix()->deleteDirectory('student\\' . $student->id);
            $student->delete();
            DB::commit();
            toastr()->success('delete done success full');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function promotions_form()
    {
        $data['gards'] =  Gard1::all();
        return view('Student.promotions.promotions', $data);
    }

    public function promotions($request)
    {
        // return $request;
        $ids = Student1::where('gard_id', $request->gard_id_from)->where('class_id', $request->class_id_from)
            ->where('section_id', $request->section_id_from)->pluck('id');
        if (count($ids) == 0) {
            toastr()->error('some thing went worng');
            return redirect()->back();
        }
        try {
            $this->StudentSelfPromotion(
                $ids,
                $request->gard_id_to,
                $request->gard_id_from,
                $request->class_id_to
            );
            foreach ($ids as $id) {
                promotions::create([
                    'student_id' => $id,
                    'gard_to' => $request->gard_id_to,
                    'gard_from' => $request->gard_id_from,
                    'class_to' => $request->class_id_to,
                    'class_from' => $request->class_id_from,
                    'section_to' => $request->class_id_to,
                    'section_from' => $request->class_id_from,
                    'academy_year' => $request->academy_yaer,
                    'academy_new_year' => $request->academy_new_yaer,
                ]);
                toastr()->success('done succesfuly');
                return redirect()->route('student.index');
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function promotionTable()
    {
        $promo  = Promotions::all();
        return view('Student.promotions.index', compact('promo'));
    }

    public function resetPromtion()
    {
        $allPromotion = Promotions::all();
        foreach ($allPromotion as $Promotion) {
            $this->ReSetUserData($Promotion);

            promotions::truncate();
            toastr()->success('done successful');
            return redirect()->back();
        }
    }

    public function RestPromotionsOne($id)
    {
        $promotions =  promotions::find($id);
        $this->ReSetUserData($promotions);;
        $promotions->delete();
        toastr()->success('studetn back on his old class', 'School Mangement System');
        return redirect()->back();
    }


    public function InvoiceIndex()
    {
    }

    public function feeInvoice($id)
    {
        //     $student  = Student1::findOrFail($id);
        //     $fee = Fee1::where('class_id', $student->class_id)->first();
        //     // dd($fee);
        //     return view('Student.invoices.fee_invoice', compact('student', 'fee'));
        //
    }



    public function student_invoices($request)
    {
        // try {
        //     // return $request;
        //     DB::beginTransaction();

        //     $fee = new FeeInvoice();
        //     $fee->invoice_date = date('y - m - d');
        //     $fee->student_id   = $request->student_id;
        //     $fee->class_id     = $request->class_id;
        //     $fee->gard_id      = $request->gard_id;
        //     $fee->fee_id       = $request->fee_id;
        //     $fee->amount       = $request->mount;
        //     $fee->save();


        //     $acount = new StudentAcount();
        //     $acount->insert_date =  date('y - m - d');
        //     $acount->student_id  = $request->student_id;
        //     $acount->fee_id      =   $fee->id;
        //     $acount->debit       = $request->mount;
        //     // $acount->credi       = $request->mount;
        //     $acount->save();

        //     DB::commit();
        //     toastr()->success('insert done succeesful', "School Mangment");
        //     return redirect()->route('invoice.index');
        // } catch (Exception $e) {
        //     DB::rollback();
        //     return $e;
        // }
    }

    public function StudentSelfPromotion($ids, $v1, $v2, $v3)
    {
        Student1::whereIn('id', $ids)->update([
            'gard_id' => $v1,
            'class_id' => $v2,
            'section_id' => $v3
        ]);
    }

    public function ReSetUserData($Promotion)
    {
        $id =  explode(',', $Promotion->student_id);
        // return $Promotion;
        $gard = $Promotion->gard_from;
        $class = $Promotion->class_from;
        $section = $Promotion->section_from;
        $st = Student1::find($id);
        foreach ($st as $s) {
            $s->gard_id = $gard;
            $s->class_id  = $class;
            $s->section_id =  $section;
            $s->save();
        }
    }
}



	// more
