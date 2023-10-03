@extends('layouts.app')

@section('content')
     <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Pending</p>
                                                <h4 class="mb-2">{{ $pending }}</h4>
                                                {{-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p> --}}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-danger rounded-3">
                                                    <i class="mdi mdi-file-document-multiple font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>                                            
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Approved</p>
                                                <h4 class="mb-2">{{ $approved }}</h4>
                                                {{-- <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p> --}}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-check-bold font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Attended(Day 1)</p>
                                                <h4 class="mb-2">{{ $attended }}</h4>
                                                {{-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p> --}}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-secondary rounded-3">
                                                    <i class="mdi mdi-file-document-multiple font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Attended(Day 2)</p>
                                                <h4 class="mb-2">{{ $attended_two }}</h4>
                                                {{-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p> --}}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-secondary rounded-3">
                                                    <i class="mdi mdi-file-document-multiple font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Attended(Day 3)</p>
                                                <h4 class="mb-2">{{ $attended_three }}</h4>
                                                {{-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p> --}}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-secondary rounded-3">
                                                    <i class="mdi mdi-file-document-multiple font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->


                        {{-- <div id="piechart" style="width: 900px; height: 500px; margin: auto;"></div> --}}
                </div>
                
                <!-- End Page-content -->

                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChart);
            
                  function drawChart() {
            
                    var data = google.visualization.arrayToDataTable([
                      ['Task', 'Hours per Day'],
                      <?php echo $total_pending?>
                      <?php echo $total_approved?>
                      <?php echo $total_attended?>
                    ]);
            
                    var options = {
                      title: '',
                      is3D: true
                    };
            
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            
                    chart.draw(data, options);
                  }
                </script>
@endsection
