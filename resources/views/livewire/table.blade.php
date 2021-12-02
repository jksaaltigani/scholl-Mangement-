<!-- breadcrumb -->

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
                <button type="button" class='button' wire:click='addnewdata'>
                    {{ trans('site.add new data') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('site.Name_Father') }}</th>
                                <th>{{ trans('site.Name_Mother') }}</th>
                                <th>{{ __('site.Nationality_Father_id') }}</th>
                                <th>{{ __('site.Phone_Father') }}</th>
                                <th>{{ __('site.Phone_Mother') }}</th>
                                <th>{{ __('site.Passport_ID_Father') }}</th>
                                <th>{{ __('site.Passport_ID_Mother') }}</th>
                                <th>{{ trans('site.oprations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Parents as $Parent)
                                <tr>
                                    <td>{{ $Parent->id }}</td>
                                    <td>{{ $Parent->Name_Father }}</td>
                                    <td>{{ $Parent->Name_Mother }}</td>
                                    <td>{{ $Parent->Nationality_Father_id }}</td>
                                    <td>{{ $Parent->Phone_Father }}</td>
                                    <td>{{ $Parent->Phone_Mother }}</td>
                                    <td>{{ $Parent->Passport_ID_Father }}</td>
                                    <td>{{ $Parent->Phone_Mother }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                            data-target="#edit-{{ $Parent->id }}"
                                            title="{{ trans('Grades_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#delete-{{ $Parent->id }}"
                                            title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>



                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete-{{ $Parent->id }}" tabindex="-1" role="dialog"
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
                                                <form action="#" wire:submit.prevent='deleteUser({{ $Parent->id }})'
                                                    method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('site.name') }}
                                                    <input id="id" type="text" name="id" class="form-control"
                                                        value="{{ $Parent->Name_Father }}" readonly>
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

</div>
</div>

</div>
<!-- row closed -->
