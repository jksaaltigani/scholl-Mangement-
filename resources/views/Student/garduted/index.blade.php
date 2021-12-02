@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('site.list_student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('site.list_Student') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{ route('student.create') }}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">{{ trans('site.Add_Student') }}</a><br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('site.Name_Student') }}</th>
                                <th>{{ trans('site.Gender') }}</th>
                                <th>{{ trans('site.gard') }}</th>
                                <th>{{ trans('site.classroom') }}</th>
                                <th>{{ trans('site.section') }}</th>
                                <th>{{ trans('site.international') }}</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($garduteds as $Student)
                                <tr>
                                    <td>{{ $Student->id }}</td>
                                    <td>{{ $Student->name }}</td>
                                    <td>{{ $Student->Gender->name }}</td>
                                    <td>{{ $Student->Gard->name }}</td>
                                    <td>{{ $Student->Class->name }}</td>
                                    <td>{{ $Student->Section->name }}</td>
                                    <td>{{ $Student->International->name }}</td>
                                    <td>
                                        <a href="{{ route('stgarduted.destroy', $Student->id) }}"
                                            class="btn btn-outline-danger btn-sm" role="button" aria-pressed="true"><i
                                                class="fa fa-trash"></i> Destroy</a> <a
                                            href="{{ route('stgarduted.reset', $Student->id) }}"
                                            class="btn btn-outline-info btn-sm" role="button" aria-pressed="true"><i
                                                class="fa fa-check"></i> Resotre</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete_Student{{ $Student->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('student.destroy', $Student->id) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('site.Delete_Student') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> {{ trans('site.Warning_Grade') }}</p>
                                                    <input type="hidden" name="id" value="{{ $Student->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('site.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('site.submit') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
