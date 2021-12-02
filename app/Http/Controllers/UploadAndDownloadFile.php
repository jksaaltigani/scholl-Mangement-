<?php

namespace App\Http\Controllers;

use App\Models\Attachement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadAndDownloadFile extends Controller
{
    public function DownloadFile($id, $type = 'student')
    {
        $file = Attachement::find($id);
        $pathToFile = Storage::disk('parent_attachment')->getAdapter()->applyPathPrefix($file->Attcahmentable_id . '\\' . $file->file_name);
        // $fileLocation = public_path("parent_attachment/{$type}/{$file->Attcahmentable_id}/{$file->file_name}");
        response()->download($pathToFile);
    }

    public function destroy($id)
    {

        $attach = Attachement::find($id);
        Storage::delete(' $pathToFile ');
        $pathToFile = Storage::disk('parent_attachment')->getAdapter()->applyPathPrefix($attach->employee_id . '\\' . $attach->file_name);
        $attach->delete();
        return redirect()->route('employee.show', $attach->employee_id)->with(['success' => 'done']);
    }


    public  function file($emp_id, $file_name)
    {
        $pathToFile = Attachement::disk('parent_attachment')->getAdapter()->applyPathPrefix($emp_id . '\\' . $file_name);

        return response()->file($pathToFile);
    }

    public  function download($emp_id, $file_name)
    {
        $pathToFile = Storage::disk('Attachment')->getAdapter()->applyPathPrefix($emp_id . '\\' . $file_name);
        return response()->download($pathToFile);
    }
}