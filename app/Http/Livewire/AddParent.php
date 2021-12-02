<?php

namespace App\Http\Livewire;

use App\Models\bloods;
use App\Models\international;
use App\Models\MYParent;
use App\Models\parentAttachment;
use App\Models\Religion;
use Exception;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\Parent_;

class AddParent extends Component
{
    use WithFileUploads;
    public $currentStep = 1, $showparent = true,
        $Email, $Password,
        $successMessage,
        $Name_Father, $Name_Father_en,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,

        // Mother_INPUTS
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id, $photos;


    public function addnewdata()
    {
        $this->showparent = false;
    }
    public function render()
    {
        return view('livewire.add-parent', [
            'Religions' => Religion::all(),
            'Type_Bloods' => bloods::all(),
            'Nationalities' => international::all(),
            'Parents' => MYParent::paginate(10),
        ]);
    }
    protected $rules = [
        'Password' => 'required|min:6',
        'Email' => 'required|email',
        'Passport_ID_Father' => 'required',
        'Phone_Father' => 'required',
        'National_ID_Father' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate();
        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->currentStep = 3;
    }

    public function submitForm()
    {
        try {
            $Myparent = new MYParent();
            $Myparent->Email = $this->Email;
            $Myparent->Password = $this->Password;
            $Myparent->Name_Father = ['ar' => $this->Name_Father, 'en' => $this->Name_Father_en];
            $Myparent->National_ID_Father = $this->National_ID_Father;
            $Myparent->Passport_ID_Father = $this->Passport_ID_Father;
            $Myparent->Phone_Father = $this->Phone_Father;
            $Myparent->Job_Father = ['ar' => $this->Job_Father, 'en' => $this->Job_Father_en];
            $Myparent->Nationality_Father_id = $this->Nationality_Father_id;
            $Myparent->Blood_Type_Father_id = $this->Blood_Type_Father_id;
            $Myparent->Address_Father = $this->Address_Father;
            $Myparent->Religion_Father_id = $this->Religion_Father_id;
            $Myparent->Name_Mother =  ['ar' => $this->Name_Mother, 'en' => $this->Name_Mother_en];
            $Myparent->National_ID_Mother = $this->National_ID_Mother;
            $Myparent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $Myparent->Phone_Mother = $this->Phone_Mother;
            $Myparent->Job_Mother = ['ar' => $this->Job_Mother, 'en' => $this->Job_Mother];
            $Myparent->Nationality_Mother_id = $this->Nationality_Mother_id;
            $Myparent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
            $Myparent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
            $Myparent->Religion_Mother_id = $this->Religion_Mother_id;
            $Myparent->Address_Mother = $this->Address_Mother;
            $Myparent->save();
            $this->clearForm();
            $this->successMessage = 'insert done succesfully';
            return redirect()->route('add_parent');
        } catch (Exception $ex) {
            $this->error = $ex;
        }
    }

    public function clearForm()
    {
        $this->currentStep = 1;
        $this->Email =   '';
        $this->Password =    '';
        $this->Name_Father = '';
        $this->National_ID_Father = '';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Job_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father = '';
        $this->Religion_Father_id = '';
        $this->Name_Mother =  '';
        $this->National_ID_Mother = '';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Religion_Mother_id = '';
        $this->Address_Mother = '';
        $this->Name_Father_en = '';
        $this->Name_Mother_en = '';
    }

    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function deleteUser($id)
    {
        $parent  = MYParent::find($id)->delete();
        return redirect()->route('add_parent');
    }
}
