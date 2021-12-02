@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('site.gards') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('site.gards') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('site.add new gards') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('site.name') }}</th>
                                <th>{{ __('site.notes') }}</th>
                                <th>{{ trans('site.oprations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gards as $gard)
                                <tr>

                                    <td>{{ $gard->id }}</td>
                                    <td>{{ $gard->name }}</td>
                                    <td>{{ $gard->note }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                            data-target="#edit-{{ $gard->id }}"
                                            title="{{ trans('Grades_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#delete-{{ $gard->id }}"
                                            title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit-{{ $gard->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('site.edit gards') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('grades.update', $gard->id) }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                class="mr-sm-2">{{ trans('site.class name_en') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="name_ar"
                                                                class="form-control" value="" required>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $gard->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('site.name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control" value=""
                                                                name="Name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('site.notes') }}
                                                            :</label>
                                                        <textarea class="form-control" name="notes"
                                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('site.cansel') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('site.save') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete-{{ $gard->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('site.delete class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('grades.destroy', $gard->id) }}"
                                                    method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('site.name') }}
                                                    <input id="id" type="text" name="id" class="form-control"
                                                        value="{{ $gard->name }}" readonly>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('site.cansel') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('site.delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('site.edit gards') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('grades.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ trans('site.name') }}
                                    :</label>
                                <input id="Name" type="text" name="name_ar" class="form-control" value="" required>
                                <input id="id" type="hidden" name="id" class="form-control"
                                    value="{{ 1 }}">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ trans('site.name_en') }}
                                    :</label>
                                <input type="text" class="form-control" value="" name="name_en" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('site.notes') }}
                                :</label>
                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <br><br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('site.cansel') }}</button>
                            <button type="submit" class="btn btn-success">{{ trans('site.save') }}</button>
                        </div>
                    </form>

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
<script>
    let repeter = document.querySelector('.repeater');

    let list = document.getElementById('List_Classes');
    let btn = document.getElementById('new_row');
    btn.onclick = function() {
        list.innerHTML += list.innerHTML;
    }
</script>
@endsection
