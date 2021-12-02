<?php

namespace  App\Repo\Student;

interface StudentInterface
{

    public function GetAllStudent();

    public function getData();

    public function CreateStudent();

    public function EditStudent($val);

    public function GetGlass($id);

    public function GetSections($id);

    public function StorePhoto($photo, $id);

    public function destroyAndDeleteDirectory($student);

    public function StoreStudent($request);

    public function UpdateStudent($request, $teacher_id);

    public function promotions_form();
    public function promotions($re);
    public function promotionTable();
    public function resetPromtion();
    public function RestPromotionsOne($id);

    public function feeInvoice($id);

    public function student_invoices($request);
    public function InvoiceIndex();
}