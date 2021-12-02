@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('site.class_room') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('site.class_room') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
{{ $new_id = $id ?? 10 }}
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
            <div class="row">
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('site.add class') }}
                </button>
                <div class="col-md-2">
                    <form method="post" action="{{ route('gardsclass') }}">
                        @csrf
                        <select class="form-control" name='garde_id' onchange="this.form.submit()">
                            @foreach ($Grades as $gard)
                                <option value="{{ $gard->id }}"
                                    {{ $gard->id == $new_id ? 'selected' : 'none-selected' }}>{{ $gard->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <button type="button" class=" button danger x-small" id="delete_btn" onclick="delete_all()"
                    data-toggle="modal" data-target="#delete_all">
                    {{ trans('site.delete all') }}
                </button>
            </div>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="check_all" onclick='checkall(this)'></th>
                            <th>#</th>
                            <th>{{ trans('site.name') }}</th>
                            <th>{{ trans('site.gard name') }}</th>
                            <th>{{ trans('site.oprations') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($classRoom) && count($classRoom) > 0)
                            @foreach ($classRoom as $My_Class)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="check_all" value={{ $My_Class->id }}>
                                    </td>
                                    <td>{{ $My_Class->id }}</td>
                                    <td>{{ $My_Class->name }}</td>
                                    <td>{{ $My_Class->gard->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-sm"
                                            data-toggle="modal" data-target="#edit-{{ $My_Class->id }}"
                                            title="{{ trans('Grades_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                            data-toggle="modal" data-target="#delete-{{ $My_Class->id }}"
                                            title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit-{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Grades_trans.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('classrooms.update', $My_Class->id) }}"
                                                    method="post">
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
                                                                class="form-control" value="{{ $My_Class->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control" value=""
                                                                name="Name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}
                                                            :</label>
                                                        <textarea class="form-control" name="Notes"
                                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete-{{ $My_Class->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="{{ route('classrooms.destroy', $My_Class->id) }}"
                                                    method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('Grades_trans.Warning_Grade') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $My_Class->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('Grades_trans.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                </table>
            </div>

            <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                id="exampleModalLabel">
                                {{ trans('site.delete class') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('delete_all') }}" method="post">
                                @csrf
                                {{ trans('site.do you sure for delete this class') }}
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
                    {{ trans('site.add class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes" id='List_Classes'>
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">{{ trans('site.class name') }}
                                                :</label>
                                            <input class="form-control" type="text" name="Name" />
                                        </div>
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">{{ trans('csite.class name_ar') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_en" />
                                        </div>
                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('site.gard name') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="gard_id">
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('site.delete') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('site.delete') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" id="new_row" value="{{ trans('site.add new row') }}" />
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('site.cansel') }}</button>
                                <button type="submit" class="btn btn-success">{{ trans('site.save') }}</button>
                            </div>
                        </div>
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


    function checkall(elem) {
        checkbox = document.querySelectorAll('input[type="checkbox"]');
        if (elem.checked) {
            checkbox.forEach(element => {
                element.checked = true;
            });
        } else {
            checkbox.forEach(element => {
                element.checked = false;
            });
        }
    }

    function delete_all() {
        checkbox = document.querySelectorAll('input[type="checkbox"]');
        select = new Array();
        checkbox.forEach(el => {
            if (el.checked == true) {
                select.push(el.value);
            }
        });
        document.getElementById('array_id').value = select;
        // console.log(select);
    }

    document.getElementById('delete_btn').style.display = 'none';
    let array_count = 0;

    document.querySelectorAll('input[type="checkbox"]').forEach(input => {
        input.addEventListener('click', (e) => {
            if (e.target.checked) {
                array_count++;
                if (array_count > 0) {
                    document.getElementById('delete_btn').style.display = 'inline-block';
                }
            } else {
                array_count--;
                if (array_count <= 0) {
                    document.getElementById('delete_btn').style.display = 'none';
                }
            }
        })

    });
</script>
@endsection
