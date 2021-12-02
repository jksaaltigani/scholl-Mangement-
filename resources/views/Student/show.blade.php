@extends('layouts.master')
@section('title', __('site.app_name') . ' | ' . __('site.show employee'))
@section('css')
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('site.students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('site.personal information') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="card col-md-12">
            <div class="text-wrap ">
                <div class="example ">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="panel panel-primary tabs-style-2  ">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                    data-toggle="tab">
                                                    {{ __('site.personal information') }}</a>
                                            </li>

                                            <li class="nav-item"><a href="#tab3" class="nav-link"
                                                    data-toggle="tab">{{ __('site.attachment') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mg-b-0">{{ __('site.Personal Information') }}</h4>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                                    data-page-length="50" style="text-align: center">
                                                    <thead>
                                                        <tr>
                                                            <th class=" border-bottom-0"> {{ __('site.id') }}</th>
                                                            <th class=" border-bottom-0"> {{ __('site.name') }}</th>
                                                            <th class=" border-bottom-0">{{ __('site.age') }}</th>
                                                            <th>{{ trans('site.Gender') }}</th>
                                                            <th>{{ trans('site.gard') }}</th>
                                                            <th>{{ trans('site.classroom') }}</th>
                                                            <th>{{ trans('site.section') }}</th>
                                                            <th>{{ trans('site.international') }}</th>
                                                            <th class=" border-bottom-0">{{ __('site.oprations') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td class=" "> {{ $student->id }}</td>
                                                        <td class=" "> {{ $student->name }}</td>
                                                        <td class=" "> {{ $student->email }}</td>
                                                        <td class=" "> {{ $student->Gender->name }}</td>
                                                        <td class=" "> {{ $student->Gard->name }}</td>
                                                        <td class=" "> {{ $student->Class->name }}</td>
                                                        <td class=" "> {{ $student->Section->name }}</td>
                                                        <td class=" "> {{ $student->International->name }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('student.show', $student->id) }}"
                                                                class="btn btn-outline-success btn-sm" role="button"
                                                                aria-pressed="true"><i class="fa fa-gear"></i></a>
                                                            <a href="{{ route('insert_invoice', $student->id) }}"
                                                                class="btn btn-outline-success btn-sm" role="button"
                                                                aria-pressed="true"><i class="fa fa-check"></i></a>
                                                        </td>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <div class="row mt-4">
                                                <div class="d-flex justify-content-between m-2" style="width: 98%">
                                                    <h4 class="card-title mg-b-0">{{ __('site.employee attachment') }}
                                                    </h4>
                                                    <div>
                                                        <a class="btn ripple btn-primary" data-target="#modaldemo1"
                                                            data-toggle="modal" href="#">
                                                            {{ __('site.new attachmet') }}
                                                        </a>



                                                        <i class="mdi mdi-view-dashboard-outline"></i> </a>
                                                    </div>
                                                </div>
                                                <table class="table striped-table" id="example2">
                                                    <thead>
                                                        <tr>
                                                            <th class=" border-bottom-0">{{ __('site.id') }}</th>
                                                            <th class=" border-bottom-0"> {{ __('site.name') }} </th>
                                                            <th class=" border-bottom-0"> {{ __('site.attachmet name') }}
                                                            </th>
                                                            <th class=" border-bottom-0"> العمليات </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($student->Attachments) > 0)
                                                            @foreach ($student->Attachments as $attachment)
                                                                <tr>
                                                                    <td class=" ">
                                                                        {{ $attachment->employee_id }}
                                                                    </td>
                                                                    <td class=" "> {{ $student->name }}</td>
                                                                    <td class=" ">
                                                                        {{ $attachment->file_name }}</td>
                                                                    <td class=" ">
                                                                        <div>
                                                                            <a href="{{ route('attchment.file', $student->id) }}"
                                                                                class="btn btn-outline-success btn-sm"
                                                                                role="button" aria-pressed="true"><i
                                                                                    class="fa fa-gear"></i></a>
                                                                            <a href="{{ route('attachment.destroy', [$student->id, 'student']) }}"
                                                                                class="btn btn-outline-danger btn-sm"
                                                                                role="button" aria-pressed="true"><i
                                                                                    class="fa fa-trash"></i></a>
                                                                            <a href="{{ route('attachment.download', [$student->id, 'student']) }}"
                                                                                class="btn btn-outline-info btn-sm"
                                                                                role="button" aria-pressed="true"><i
                                                                                    class="fa fa-check"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row closed -->
                </div>
            </div>
        </div>
        <div class="modal" id="modaldemo1">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo ">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('site.new attachmet') }} </h6><button aria-label="Close"
                            class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="p-5">
                        <form action="{{-- route('attachment.store') --}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>{{ __('site.new attachmet') }}:</div>
                            <input type="hidden" name="emp_id" value='{{ $student->id }}'>
                            <input type="file" class="dropify"
                                data-default-file="{{ URL::asset('assets/img/photos/1.jpg') }}" data-height="200"
                                name='pic' />
                            <button class='btn btn-primary'>حفظ</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modaldemo5">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button> <i
                            class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                        <h4 class="tx-danger mg-b-20">هل تريد حذف هذا العنصر</h4>
                        <p class="mg-b-20 mg-x-20">بل الضغط علي هذا الرز سوف يتم حذف العنصر</p>
                        <form action="#{{--  --}}">
                            @csrf
                            <input type="hidden" name="id" value='{{ $student->id }}'>
                            <button aria-label="Close" class="btn ripple btn-danger pd-x-25" data-dismiss="modal"
                                type="button">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container closed -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

@endsection
