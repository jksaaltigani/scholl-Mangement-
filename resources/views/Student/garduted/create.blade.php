@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('site.add student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('site.add student') }}
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
                        <form action="{{ route('stgarduted.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">{{ trans('site.blood_type') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gard_id" id="gard_id_from">
                                        <option selected disabled>{{ trans('site.Choose') }}...</option>
                                        @foreach ($gards as $gard)
                                            <option value="{{ $gard->id }}">{{ $gard->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('Specialization_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">{{ trans('site.classroom') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="class_id" id="class_id_from">
                                        <option selected disabled>{{ trans('site.Choose') }}...</option>
                                    </select>
                                    @error('class_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">{{ trans('site.section') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="section_id" id="section_id_from">
                                        <option selected disabled>{{ trans('site.Choose') }}...</option>
                                    </select>
                                    @error('section_id')
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
                        $('#section_id').append(option)
                    },
                });
            } else {
                alert('some thisng went worng');
                console.log('AJAX load did not work');
            }
        });

        $('#gard_id_from').on('change', function() {
            var Grade_id = $(this).val();
            $('#class_id_from').empty();
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
                        $('#class_id_from').append(option);
                    },
                });
            } else {
                alert('some thisng went worng');
                console.log('AJAX load did not work');
            }
        });

        $('#class_id_from').on('change', function() {
            var Grade_id = $(this).val();
            $('#section_id_from').empty();
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
                        $('#section_id_from').append(option)
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
