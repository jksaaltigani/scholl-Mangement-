@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('site.Edit student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('site.Edit student') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('student.update', $student->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('site.Email') }}</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $student->emial ?? '' }}" @error('Email') <div
                                            class="alert alert-danger">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('site.Password') }}</label>
                                <input type="password" name="password" value="{{ $student->password ?? '' }}"
                                    class="form-control">
                                @error('Password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    <br>


                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{ trans('site.Name_ar') }}</label>
                            <input type="text" name="Name_ar" value="{{ $student->name ?? '' }}"
                                class="form-control">
                            @error('Name_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{ trans('site.Name_en') }}</label>
                            <input type="text" name="Name_en" class="form-control">
                            @error('Name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="inputState">{{ trans('site.Gender') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                <option selected value={{ $student->gender_id }}>
                                    {{ $student->Gender->name }}...</option>
                                @foreach ($gender as $gender)
                                    <option value="{{ $gender->id }}">
                                        {{ $gender->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Gender_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity">{{ trans('site.specialization') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="international_id">
                                <option selected value='{{ $student->international->id }}'>
                                    {{ $student->International->name }}...</option>
                                @foreach ($internationals as $international)
                                    <option @if ($international->id == $student->international->id)
                                        selected
                                @endif
                                value="{{ $international->id }}" >
                                {{ $international->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('Specialization_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputCity">{{ trans('site.blood_type') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="blood_id">
                                <option selected>defualt option...</option>
                                @foreach ($bloods as $blood)

                                    <option @if ($blood->id == $student->blood_id)
                                        selected
                                @endif
                                value="{{ $blood->id }}">{{ $blood->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('Specialization_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="title">{{ trans('site.Joining_Date') }}</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text" id="datepicker-action" name="Join_date"
                                    data-date-format="yyyy-mm-dd" required value="{{ $student->Join_date }}">
                            </div>
                            @error('Joining_Date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <br>
                        <div class="form-group col-md-2">
                            <label for="inputCity">{{ trans('site.Name_Grade') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="gard_id" id="gard_id">
                                <option selected disabled value="{{ $student->gard_id ?? '' }}"">defual option...</option>
                                                                     @foreach ($gards as
                                    $gard)
                                <option @if ($gard->id == $student->gard_id)
                                    selected
                                    @endif value="{{ $gard->id }}">{{ $gard->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('Specialization_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputCity">{{ trans('site.Name_Class') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="class_id" id="class_id">
                                <option selected value="{{ $student->class_id }}">
                                    {{ $student->Class->name }} ...</option>
                            </select>
                            @error('class_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputCity">{{ trans('site.Section_name_ar') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="section_id" id="section_id">
                                <option selected value="{{ $student->section_id }}">
                                    {{ $student->Section->name }}...</option>
                            </select>
                            @error('section_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity">{{ trans('site.parent') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="parent_id" id="gard_id">
                                <option selected disabled value="{{ $student->parent->id ?? '' }}">
                                    {{ $student->Parent->Name_Father }}..</option>
                                @foreach ($parents as $parent)
                                    <option @if ($parent->id == $student->parent_id)
                                        selected
                                        @endif value="{{ $parent->id }}">{{ $parent->Name_Father }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Specialization_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="title">{{ trans('site.Joining_Date') }}</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text" id="datepicker-action" name="Joining_Date"
                                    data-date-format="yyyy-mm-dd" required value="{{ $student->joing_data ?? '' }}">
                            </div>
                            @error('Joining_Date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                type="submit">{{ trans('site.Next') }}</button>
            </form>
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
<script>
    $(document).ready(function() {
        $('#gard_id').on('change', function() {
            var Grade_id = $(this).val();
            $('#class_id').empty();
            if (Grade_id) {
                $.ajax({
                    url: "http://localhost:8000/ar/student/get_class/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data, data.length)
                        var option = '';
                        data.forEach(el => {
                            console.log(el);
                            option +=
                                `<option value='${el.id}'> ${el.name['ar'] } </option>`;
                        });
                        $('#class_id').append(option);
                    },
                });
            } else {
                alert('some thisng went worng');
                console.log('AJAX load did not work');
            }
        });

        $('#class_id').on('change', function() {
            var Grade_id = $(this).val();
            $('#section_id').empty();
            if (Grade_id) {
                $.ajax({
                    url: "http://localhost:8000/ar/student/get_sections/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data, data.length)
                        var option = '';
                        data.forEach(el => {
                            console.log(el);
                            option +=
                                `<option value='${el.id}'> ${el.name['ar'] } </option>`;
                        });
                        $('#section_id').append(option);
                    },
                });
            } else {
                alert('some thisng went worng');
                console.log('AJAX load did not work');
            }
        });


    });
</script>
@endsection
