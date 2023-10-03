
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>QRcode | DOLE RO8 Client Portal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/DOLE-Logo-1.png') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


    </head>
<style>
    #barcode-container {
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
    <body class="auth-body-bg">
        <div class=""></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
                        {{-- <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a> --}}
                        <div id="image" style="padding-top: 15px; border: solid 5px;">
                            <div class="text-center mt-4" style="margin: 0px">
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <img class="" style="width: 20rem;" src="{{ asset('id-logo-peso-congress.png') }}"
                                    alt="Header Avatar">

                                    {{-- <h3 class="text-muted text-center font-size-28"><b>DOLE RO8</b></h3> --}}
                                </div>
                            </div>
                            <div class="p-3">
                                {{-- <h4 class="text-muted text-center font-size-15"><b>{{ $employee->employee_code }}</b></h4> --}}
                                <div class="form-horizontal mt-1">
                                    <div class="form-group mb-3 row text-center" >
                                        <h4 class="text-muted text-center font-size-30" style="margin: 0; font-size: 30px"><b>{{ Str::ucfirst($employee->first_name) }} {{ Str::ucfirst(Str::substr($employee->middle_name, 0, 1)) }}. {{ Str::ucfirst($employee->last_name) }} @if ($employee->suffix != "N/A"){{{ ucfirst($employee->suffix) }}}@endif</b></h4>
                                        <h4 class="text-muted text-center font-size-18" style="margin: 0;">{{ strtoupper($employee->designation) }}</h4>
                                        <h4 class="text-muted text-center font-size-18" style="margin: 0;">{{ $employee->province_lgu_jpo }}</h4>
                                        <h4 class="text-muted text-center font-size-18" style="margin: 0;">{{ $employee->delegation }}</h4>
                                        <br>
                                        <br>
                                        <div id="barcode-container">{!! DNS2D::getBarcodeSVG("$employee->employee_code",'QRCODE',10,10) !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 text-center row mt-3 pt-1">
                            <div class="col-12">
                                <button class="btn btn-info w-100 waves-effect waves-light" type="submit" id="dl-png">Download as Image</button>
                            </div>
                        </div>

                        <div class="form-group mb-0 row mt-2">
                            <div class="col-sm-7 mt-3">
                                {{-- <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i>Back to home</a> --}}
                            </div>
                            {{-- <div class="col-sm-5 mt-3">
                                <a href="auth-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                            </div> --}}
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->
        <script src="{{ asset('assets/libs/html2canvas.min.js') }}"></script>

        <script>
            document.getElementById("dl-png").onclick = function() {
                const screenshotTarget = document.getElementById('image');

                html2canvas(screenshotTarget).then((canvas) => {
                    const base64image   = canvas.toDataURL("image/png");
                    var anchor = document.createElement('a');
                    anchor.setAttribute("href", base64image);
                    anchor.setAttribute("download", "my-qrcode.png");
                    anchor.click();
                    anchor.remove();
                });
            }
        </script>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>


    </body>
</html>
