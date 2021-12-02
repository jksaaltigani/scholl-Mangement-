<?php

namespace App\Providers;

use App\Repo\Garduted\FaceIterFace;
use App\Repo\Garduted\GardutedInterface;
use App\Repo\Garduted\GardutedRepo;
use App\Repo\Invoice\InvoiceFace;
use App\Repo\Invoice\InvoiceRepo;
use App\Repo\Outer\OuterInter;
use App\Repo\Outer\OuterRepo;
use App\Repo\Recept\ReceptFace;
use App\Repo\Recept\ReceptRepo;


use App\Repo\Student\StudentInterface as StudentStudentInterface;
use App\Repo\Student\StudentRepo as StudentStudentRepo;
use App\Repo\Teacher\TeacherRepo;
use App\Repo\Teacher\TeacherInterface;

use App\Repo\Teacher\StudentInterface;
use App\Repo\Teacher\StudentRepo;

use CreateTeachersTable;
use Illuminate\Support\ServiceProvider;

class TeacherProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            TeacherInterface::class,
            TeacherRepo::class
        );
        $this->app->bind(
            StudentStudentInterface::class,
            StudentStudentRepo::class
        );





        $this->app->bind(
            OuterInter::class,
            OuterRepo::class
        );

        $this->app->bind(
            InvoiceFace::class,
            InvoiceRepo::class
        );

        $this->app->bind(
            ReceptFace::class,
            ReceptRepo::class
        );
    }


    public function boot()
    {
        //
    }
}