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
                <h4 class="mb-sm-0">Attended</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        {{-- <th>TRACKING NUMBER</th> --}}
                                        <th>EMPLOYEE CODE</th>
                                        <th>FULLNAME</th>
                                        <th>DESIGNATION</th>
                                        <th>PROVINCE/LGU/JPO</th>
                                        <th>DELEGATION</th>
                                        <th>GENDER</th>
                                        <th>CONTACT NO.</th>
                                        <th>ATTENDED</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($attended_employees as $attended_employee)
                                    <tr>
                                        <td>{{ strtoupper($attended_employee->employee->employee_code)}}</td>
                                        <td>{{ strtoupper($attended_employee->employee->first_name)}} {{ strtoupper(Str::substr($attended_employee->employee->middle_name, 0, 1))}}. {{ strtoupper($attended_employee->employee->last_name)}} @if ($attended_employee->employee->suffix != "N/A"){{{ strtoupper($attended_employee->employee->suffix) }}}@endif</td>
                                        <td>{{ strtoupper($attended_employee->employee->designation) }}</td>
                                        <td>{{ strtoupper($attended_employee->employee->province_lgu_jpo) }}</td>
                                        <td>{{ strtoupper($attended_employee->employee->delegation) }}</td>
                                        <td>{{ strtoupper($attended_employee->employee->gender) }}</td>
                                        <td>{{ strtoupper($attended_employee->employee->contact_number) }}</td>
                                        <td>{{ strtoupper($attended_employee->attended_date) }}</td>
                                        <td><button  class="ri ri-eye-fill btn btn-warning"  data-bs-toggle="modal" data-bs-target="#myModal-{{ $attended_employee->employee->id }}"></button></td>
                                            <div class="modal" id="myModal-{{ $attended_employee->employee->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title secondary">Employee Profile</h5>
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
                                                                                <img src="{{ asset('profile_pictures/'. $attended_employee->employee->profile_picture) }}" alt="" class="avatar-lg rounded-circle" style="width: 150px; height: 150px">
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <h4 class="font-size-16 mb-1">{{ strtoupper($attended_employee->employee->first_name) }} {{ strtoupper(Str::substr($attended_employee->employee->middle_name, 0, 1)) }}. {{ strtoupper($attended_employee->employee->last_name)}} @if ($attended_employee->employee->suffix){{{ strtoupper($attended_employee->employee->suffix) }}}@endif</h4>
                                                                                <span class="text-muted"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Employee Code:</label>
                                                                        <input type="text" value="{{ strtoupper($attended_employee->employee->employee_code) }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Designation:</label>
                                                                        <input type="text" value="{{ strtoupper($attended_employee->employee->designation) }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Province/LGU/JPO:</label>
                                                                        <input type="text" value="{{ strtoupper($attended_employee->employee->province_lgu_jpo) }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Delegation:</label>
                                                                        <input type="text" value="{{ strtoupper($attended_employee->employee->delegation) }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Email:</label>
                                                                        <input type="text" value="{{ $attended_employee->employee->email }}" class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
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
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

</div>
@endsection
