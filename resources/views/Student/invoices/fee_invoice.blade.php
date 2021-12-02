@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('site.add invoice') }}
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
                    <form action="{{ route('invoices.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value='{{ $student->id }}' name='student_id'>
                        <input type="hidden" name='class_id' value='{{ $fee->class_id }}' id='class_id'>
                        <input type="hidden" value='{{ $student->gard_id }}' name='gard_id' id='gard'>
                        <input type="hidden" name='fee_id' value='' id='fee_id'>
                        <div class="form-row">
                            <br>
                            <div class="form-group col-md-4">
                                <label for="inputCity">{{ trans('site.name') }}</label>
                                <input type="text" class="form-control" readonly value="{{ $student->name }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">{{ trans('site.gender') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="type" id="gard_id">
                                    <option value="1"> رسوم دراسيه </option>
                                    <option value="2"> رسوم ترحيل</option>
                                </select>
                                @error('Specialization_did')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">الرسوم</label>s
                                <input type="text" class="form-control" name='mount' id="salary_mount">
                            </div>
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
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    $(document).ready(function() {
        $('#gard_id').on('change', function() {
            var Grade_id = $(this).val(),
                typeId = $('#class_id').val();
            console.log(Grade_id, typeId);
            if (Grade_id) {
                $.ajax({
                    url: "http://localhost:8000/ar/fees/show/" + typeId + '/' + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('#salary_mount').val(data.fees)
                        $('#fee_id').val(data.id);
                        console.log($('#fee_id').val());
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
