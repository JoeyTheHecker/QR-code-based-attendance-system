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
                <h4 class="mb-sm-0">Pendings</h4>
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
                                        <th>REGISTER DATE</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($pending_employees as $pending_employee)
                                    <tr>
                                        <td>{{ strtoupper($pending_employee->employee->employee_code)}}</td>
                                        <td>{{ strtoupper($pending_employee->employee->first_name)}} {{ strtoupper(Str::substr($pending_employee->employee->middle_name, 0, 1))}}. {{ strtoupper($pending_employee->employee->last_name)}} @if ($pending_employee->employee->suffix){{{ strtoupper($pending_employee->employee->suffix) }}}@endif</td>
                                        <td>{{ strtoupper($pending_employee->employee->designation) }}</td>
                                        <td>{{ strtoupper($pending_employee->employee->province_lgu_jpo) }}</td>
                                        <td>{{ strtoupper($pending_employee->employee->delegation) }}</td>
                                        <td>{{ strtoupper($pending_employee->employee->created_at) }}</td>
                                        <td><a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle-{{ $pending_employee->employee->id }}" role="button">ACTION</a></td>
                                        {{-- <td><button  class="ri ri-eye-fill btn btn-warning"  data-bs-toggle="modal" data-bs-target="#myModal-{{ $pending_employee->employee->id }}"></button></td> --}}
                                        <div class="modal fade" id="exampleModalToggle-{{ $pending_employee->employee->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalToggleLabel">Employee Profile</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('update', $pending_employee->employee->id) }}" method="POST" enctype="multipart/form-data">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="modal-body">

                                                        <div class="mb-3">
                                                            <div class="mb-4">
                                                                <div class="text-center mt-3">
                                                                    <div class="">
                                                                        <img src="https://pesocongress2023.freshfromuspng.store/profile_pictures/{{ $pending_employee->employee->profile_picture }}" alt="" class="avatar-lg rounded-circle" style="width: 150px; height: 150px">
                                                                    </div>
                                                                    <div class="mt-3">
                                                                        <h4 class="font-size-16 mb-1">{{ strtoupper($pending_employee->employee->first_name) }} {{ strtoupper(Str::substr($pending_employee->employee->middle_name, 0, 1)) }}. {{ strtoupper($pending_employee->employee->last_name)}} @if ($pending_employee->employee->suffix){{{ strtoupper($pending_employee->employee->suffix) }}}@endif</h4>
                                                                        <span class="text-muted"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Employee Code:</label>
                                                                <input type="text" value="{{ strtoupper($pending_employee->employee->employee_code) }}" class="form-control" readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Designation:</label>
                                                                <input type="text" value="{{ strtoupper($pending_employee->employee->designation) }}" class="form-control" readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Province/LGU/JPO:</label>
                                                                <input type="text" value="{{ strtoupper($pending_employee->employee->province_lgu_jpo) }}" class="form-control" readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Delegation:</label>
                                                                <input type="text" value="{{ strtoupper($pending_employee->employee->delegation) }}" class="form-control" readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Email:</label>
                                                                <input type="text" value="{{ $pending_employee->employee->email }}" class="form-control" readonly>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label"><b>Proof of Payment: </b></label>
                                                                <a type="button" class="btn btn-info center form-control" href="{{ asset('attached_files/'. $pending_employee->employee->attached_file) }}" target="_blank">View</a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        {{-- <div class="modal-footer"> --}}
                                                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                                            {{-- <button type="submit" class="btn btn-primary" hidden id="SubmitApplication"></button> --}}
                                                        {{-- </div> --}}
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary">Approved</button>
                                                </div>
                                            </form>

                                              </div>
                                            </div>
                                          </div>
                                          {{-- <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalToggleLabel2"></h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <h3>Are you sure you want to approved?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-success" onclick="btnApplication()">Yes</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div> --}}
                                        {{-- <div class="modal" id="myModal-{{ $pending_employee->employee->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title secondary">Employee Profile</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="{{ route('update', $pending_employee->employee->id) }}" method="POST" enctype="multipart/form-data">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-body">

                                                                <div class="mb-3">
                                                                    <div class="mb-4">
                                                                        <div class="text-center mt-3">
                                                                            <div class="">
                                                                                <img src="{{ asset('profile_pictures/'. $pending_employee->employee->profile_picture) }}" alt="" class="avatar-lg rounded-circle" style="width: 150px; height: 150px">
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <h4 class="font-size-16 mb-1">{{ strtoupper($pending_employee->employee->first_name) }} {{ strtoupper(Str::substr($pending_employee->employee->middle_name, 0, 1)) }}. {{ strtoupper($pending_employee->employee->last_name)}} @if ($pending_employee->employee->suffix){{{ strtoupper($pending_employee->employee->suffix) }}}@endif</h4>
                                                                                <span class="text-muted"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Employee Code:</label>
                                                                        <input type="text" value="{{ strtoupper($pending_employee->employee->employee_code) }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Designation:</label>
                                                                        <input type="text" value="{{ strtoupper($pending_employee->employee->designation) }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Province/LGU/JPO:</label>
                                                                        <input type="text" value="{{ strtoupper($pending_employee->employee->province_lgu_jpo) }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Delegation:</label>
                                                                        <input type="text" value="{{ strtoupper($pending_employee->employee->delegation) }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Email:</label>
                                                                        <input type="text" value="{{ $pending_employee->employee->email }}" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label"><b>Payment receipt: </b></label>
                                                                        <a type="button" class="btn btn-info center form-control" href="{{ asset('attached_files/'. $pending_employee->employee->attached_file) }}" target="_blank">View</a>
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
                                            </div> --}}
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


<script type="text/javascript">
                    function btnApplication(){
                        $("#SubmitApplication").click();
                    }
</script>

@endsection
