
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Directory of Attendees | DOLE - RO8</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="http://12.0.0.105/assets/images/favicon.png">

        <!-- jquery.vectormap css -->
        <link href="http://12.0.0.105/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="http://12.0.0.105/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="http://12.0.0.105/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="http://12.0.0.105/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="http://12.0.0.105/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="http://12.0.0.105/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="http://12.0.0.105/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="http://12.0.0.105/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="http://12.0.0.105/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>



    <body data-topbar="dark" data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">






            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content" style="margin-left: 0px">

                <div class="page-content">
                    
{{-- <div class="container-fluid"> --}}

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">23rd PESO Congress Directory of Attendees</h4>
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
                            <th>NO.</th>
                            <th>FULLNAME</th>
                            <th>DESIGNATION/POSITION</th>
                            <th>DELEGATION/REGION</th>
                            <th>PROVINCE/LGU/JPO</th>
                            <th>SEX</th>
                            <th>CONTACT NUMBER</th>
                            <th>EMAIL ADDRESS</th>
                            <th>BANK DEPOSIT</th>
                            <th>AMOUNT</th>
                            <th>REGISTERED DATE</th>
                            <th>QRCODE</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($approved_employees as $approved_employee)
                        <tr>
                            @php
                                $count++;
                            @endphp
                            <td>{{ $count }}</td>
                            <td>{{ strtoupper($approved_employee->employee->first_name)}} {{ strtoupper(Str::substr($approved_employee->employee->middle_name, 0, 1))}}. {{ strtoupper($approved_employee->employee->last_name)}} @if ($approved_employee->employee->suffix != 'N/A'){{{ strtoupper($approved_employee->employee->suffix) }}}@endif</td>
                            <td>{{ strtoupper($approved_employee->employee->designation) }}</td>
                            <td>{{ strtoupper($approved_employee->employee->delegation) }}</td>
                            <td>{{ strtoupper($approved_employee->employee->province_lgu_jpo) }}</td>
                            <td>{{ strtoupper($approved_employee->employee->gender) }}</td>
                            <td>{{ strtoupper($approved_employee->employee->contact_number) }}</td>
                            <td>{{ $approved_employee->employee->email }}</td>
                            <td>{{ $approved_employee->employee->bank_name }}</td>
                            <td>{{ $approved_employee->employee->amount }}</td>
                            <td>{{ $approved_employee->employee->created_at }}</td>
                            <td><a href="https://pesocongress2023.freshfromuspng.store/employee/{{ $approved_employee->employee->employee_code }}" target="_blank" rel="noopener noreferrer">LINK</a></td>
                            <td><button  class="ri ri-eye-fill btn btn-warning"  data-bs-toggle="modal" data-bs-target="#myModal-{{ $approved_employee->employee->id }}"></button></td>
                                <div class="modal" id="myModal-{{ $approved_employee->employee->id }}">
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
                                                                    <img src="{{ asset('profile_pictures/'. $approved_employee->employee->profile_picture) }}" alt="" class="avatar-lg rounded-circle" style="width: 150px; height: 150px">
                                                                </div>
                                                                <div class="mt-3">
                                                                    <h4 class="font-size-16 mb-1">{{ strtoupper($approved_employee->employee->first_name) }} {{ strtoupper(Str::substr($approved_employee->employee->middle_name, 0, 1)) }}. {{ strtoupper($approved_employee->employee->last_name)}} @if ($approved_employee->employee->suffix != 'N/A'){{{ strtoupper($approved_employee->employee->suffix) }}}@endif</h4>
                                                                    <span class="text-muted"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Employee Code:</label>
                                                            <input type="text" value="{{ strtoupper($approved_employee->employee->employee_code) }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Designation:</label>
                                                            <input type="text" value="{{ strtoupper($approved_employee->employee->designation) }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Province/LGU/JPO:</label>
                                                            <input type="text" value="{{ strtoupper($approved_employee->employee->province_lgu_jpo) }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Delegation:</label>
                                                            <input type="text" value="{{ strtoupper($approved_employee->employee->delegation) }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Email:</label>
                                                            <input type="text" value="{{ $approved_employee->employee->email }}" class="form-control" readonly>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label"><b>Proof of Payment: </b></label>
                                                            <a type="button" class="btn btn-info center form-control" href="{{ asset('attached_files/'. $approved_employee->employee->attached_file) }}" target="_blank">View</a>
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
{{-- </div> --}}
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>2023</script> © DOLE | Region Office VII
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by ICT Unit Team
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="http://12.0.0.105/assets/libs/jquery/jquery.min.js"></script>
        <script src="http://12.0.0.105/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="http://12.0.0.105/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="http://12.0.0.105/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="http://12.0.0.105/assets/libs/node-waves/waves.min.js"></script>


        <!-- apexcharts -->
        

        <!-- jquery.vectormap map -->
        <script src="http://12.0.0.105/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="http://12.0.0.105/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

         <!-- Required datatable js -->
         <script src="http://12.0.0.105/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
         <script src="http://12.0.0.105/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="http://12.0.0.105/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
         <script src="http://12.0.0.105/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
         <script src="http://12.0.0.105/assets/libs/jszip/jszip.min.js"></script>
         <script src="http://12.0.0.105/assets/libs/pdfmake/build/pdfmake.min.js"></script>
         <script src="http://12.0.0.105/assets/libs/pdfmake/build/vfs_fonts.js"></script>
         <script src="http://12.0.0.105/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
         <script src="http://12.0.0.105/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
         <script src="http://12.0.0.105/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

         <script src="http://12.0.0.105/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
         <script src="http://12.0.0.105/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- Responsive examples -->
        <script src="http://12.0.0.105/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="http://12.0.0.105/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="http://12.0.0.105/assets/js/pages/dashboard.init.js"></script>
         <!-- Datatable init js -->
         <script src="http://12.0.0.105/assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="http://12.0.0.105/assets/js/app.js"></script>
         <script>
            $(document).ready( function () {
                $('#datatable-buttons').DataTable();
                } );
        </script>

    </body>

</html>
