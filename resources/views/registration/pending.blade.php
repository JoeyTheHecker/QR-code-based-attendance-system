@extends('layouts.app')

@section('content')
{{-- <div class="container-fluid">

   <h1>This is admin</h1>

</div> --}}
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Default Datatable</h4>
                                <p class="card-title-desc">DataTables has most features enabled by
                                    default, so all you need to do to use it with your own tables is to call
                                    the construction function: <code>$().DataTable();</code>.
                                </p>


                                </div>



                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        {{-- <th>TRACKING NUMBER</th> --}}
                                        <th>CODE</th>
                                        <th>FULLNAME</th>
                                        <th>DESIGNATION</th>
                                        <th>EMAIL</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($statuses as $status)
                                    <tr>
                                        <td>{{ strtoupper($status->employee->employee_code)}}</td>
                                        <td>{{ strtoupper($status->employee->first_name)}} {{ strtoupper($status->employee->middle_name)}} {{ strtoupper($status->employee->last_name)}} @if ($status->employee->suffix){{{ strtoupper($status->employee->suffix) }}}@endif</td>
                                        <td>{{ strtoupper($status->employee->designation) }}</td>
                                        <td>{{ strtoupper($status->employee->email) }}</td>
                                        <td>{{ strtoupper($status->employee->created_at) }}</td>
                                        <td>{{ strtoupper($status->employee->status->status) }}</td>
                                        {{-- <td><a type="button" class="ri ri-eye-fill btn btn-info" href="{{ asset('/soft_copy/'. $documentTracking->documentDetail->file_name) }}" target="_blank"></a></td> --}}
                                        <td><button  class="ri ri-eye-fill btn btn-warning"  data-bs-toggle="modal" data-bs-target="#myModal-{{ $status->employee->id }}"></button></td>
                                            <div class="modal" id="myModal-{{ $status->employee->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title secondary">Profile</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-body">

                                                                <div class="mb-3">
                                                                    <div class="mb-4">
                                                                        {{-- <label class="form-label"><b>Type</b></label> --}}
                                                                        <div class="text-center mt-3">
                                                                            <div class="">
                                                                                <img src="{{ asset('profile_pictures/'. $status->employee->profile_picture) }}" alt="" class="avatar-lg rounded-circle">
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <h4 class="font-size-16 mb-1">{{ strtoupper($status->employee->first_name)}} {{ strtoupper($status->employee->middle_name)}} {{ strtoupper($status->employee->last_name)}} @if ($status->employee->suffix){{{ strtoupper($status->employee->suffix) }}}@endif</h4>
                                                                                <span class="text-muted"></span>
                                                                            </div>
                                                                        </div>
                                                                            {{-- <input type="text" value="{{ strtoupper($documentTracking->documentDetail->type) }}" readonly class="form-control"> --}}
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        {{-- <label class="form-label">Document Code</label> --}}
                                                                        {{-- <input type="text" value="{{ strtoupper($documentTracking->documentDetail->document_code) }}" class="form-control" readonly> --}}
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        {{-- <label class="form-label">Origin</label> --}}
                                                                        {{-- <textarea id="" class="form-control" required readonly>{{ $documentTracking->documentDetail->origin }}</textarea> --}}
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        {{-- <label class="form-label">Subject</label> --}}
                                                                        {{-- <textarea name="" id="" cols="30" rows="5" class="form-control"  required readonly>{{ $documentTracking->documentDetail->subject }}</textarea> --}}
                                                                    </div>
                                                                    <div class="mb-4">
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Approved</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

</div>
@endsection
