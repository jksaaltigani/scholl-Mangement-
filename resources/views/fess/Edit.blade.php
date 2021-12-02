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
                <form action="{{ route('fees.update', $fee->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{ trans('site.Name_ar') }}</label>
                            <input type="text" name="Name_ar" class="form-control" value='{{ $fee->name }}'>
                            @error('Name_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">{{ trans('site.Name_en') }}</label>
                            <input type="text" name="Name_en" value='{{ $fee->getTranslation('name', 'en') }}'
                                class="form-control">
                            @error('Name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <br>
                        <div class="form-group col-md-3">
                            <label for="inputCity">{{ trans('site.blood_type') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="gard_id" id="gard_id">
                                <option selected value='{{ $fee->Gard->id }}'>
                                    {{ $fee->Gard->name }}...
                                </option>
                                @foreach ($gards as $gard)
                                    <option value="{{ $gard->id }}">{{ $gard->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Specialization_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity">{{ trans('site.blood_type') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="class_id" id="class_id">
                                <option selected value='{{ $fee->Class->id }}'>
                                    {{ $fee->Class->name }}...
                                </option>
                            </select>
                            @error('class_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity">{{ trans('site.year') }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="year_id" id="year_name">
                                <option selected value='{{ $fee->years }}'>{{ $fee->years }}...
                                </option>
                                <option value="2021">2020 - 2021</option>
                                <option value="2021">2021 - 2022</option>
                            </select>
                            @error('section_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="title">{{ trans('site.price') }}</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text" name="price" value='{{ $fee->fees }}'
                                    required>
                            </div>
                            @error('Joining_Date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputCity">{{ trans('site.year') }}</label>
                        <select class="custom-select my-1 mr-sm-2" name="type" id="year_name">
                            <option selected disabled>{{ trans('site.Choose') }}...</option>
                            <option value="1"> رسوم دراسيه </option>
                            <option value="2"> رسوم ترحيل</option>
                        </select>
                        @error('section_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="col-md-3">
                     <input class='form-control' type='file' name='photos[]' accept='image/*' multiple />
            </div> --}}
            </div>
            <button class="btn btn-success btn-sm m-4 nextBtn btn-lg pull-right"
                type="submit">{{ trans('site.Next') }}</button>
            </form>
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
