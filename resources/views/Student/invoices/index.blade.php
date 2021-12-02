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
                <a href="{{ route('pormation.reset') }}" class="btn btn-outline-danger btn-sm" role="button"
                    aria-pressed="true">{{ trans('site.reset all') }}</a><br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class='alert-success'>{{ trans('site.Name_Student') }}</th>
                                <th class='alert-success'>{{ trans('site.gard') }}</th>
                                <th class='alert-success'>{{ trans('site.classroom') }}</th>
                                <th class='alert-success'>{{ trans('site.price') }}</th>
                                <th class='alert-success'>{{ trans('site.the_data') }}</th>
                                <th class='alert-success'>{{ trans('site.type') }}</th>
                                <th class='alert-success'>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($student as $Student)
                                <tr>
                                    <td>{{ $Student->id }}</td>
                                    <td>{{ $Student->Student->name }}</td>
                                    <td>{{ $Student->Gard->name }}</td>
                                    <td>{{ $Student->Class->name }}</td>
                                    <td>{{ $Student->amount }}</td>
                                    <td>{{-- $student->updated_at->diffForHumans() --}}</td>
                                    <td>{{ $Student->type ?? 'رسوم ترحيل' }}</td>

                                    <td>
                                        <a href="{{ route('invoices.edit', $Student->id) }}"
                                            class="btn btn-outline-info btn-sm" role="button" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#delete_Student{{ $Student->id }}"
                                            title="{{ trans('site.Delete') }}"><i
                                                class="fa fa-trash"></i></button>


                                    </td>
                                </tr>
                                <div class="modal fade" id="delete_Student{{ $Student->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('invoices.destroy', $Student->id) }}" method="post">
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
