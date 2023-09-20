<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets4/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets4/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Registration | DOLE - RO8</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets4/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets4/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets4/css/demo.css" rel="stylesheet" />
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('assets4/img/peso-congress.png')">
    <!--   Creative Tim Branding   -->
    {{-- <a href="http://creative-tim.com">
         <div class="logo-container">
            <div class="logo">
                <img src="assets4/img/new_logo.png">
            </div>
            <div class="brand">
                Creative Tim
            </div>
        </div>
    </a> --}}

	<!--  Made With Get Shit Done Kit  -->
		{{-- <a href="http://demos.creative-tim.com/get-shit-done/index.html?ref=get-shit-done-bootstrap-wizard" class="made-with-mk">
			<div class="brand">GK</div>
			<div class="made-with">Made with <strong>GSDK</strong></div>
		</a> --}}

    <!--   Big container   -->
    <div class="container" style="margin: 0px 0px 0px auto;">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="blue" id="wizardProfile">
                    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	<h3>
                        	   <b>23rd PESO Congress – Online Registration</b><br>
                        	   {{-- <small>This information will let us know more about you.</small> --}}
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">Basic Info</a></li>
	                            <li><a href="#account" data-toggle="tab">Delegation Info</a></li>
	                            <li><a href="#address" data-toggle="tab">Payment Info</a></li>
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text">Basic Information</h4>
                                  <div class="col-sm-4 col-sm-offset-1">
                                    <div class="picture-container">
                                         <div class="picture">
                                             <img src="assets3/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                             <input type="file" id="wizard-picture" name="profile_picture" class="form-control" required value="" accept="image/*">
                                         </div>
                                         <h6>Choose Picture</h6>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="first_name"><b>First Name</b> <small>(required)</small></label>
                                      <input name="first_name" type="text" id="first_name" class="form-control" placeholder="" required>

                                      @error('first_name')
                                          <span style="color: red">{{ $message }}</span>
                                      @enderror

                                    </div>
                                    <div class="form-group">
                                      <label for="middle_name"><b>Middle Name</b> <small>(required)</small></label>
                                      <input name="middle_name" id="middle_name" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="last_name"><b>Last Name</b> <small>(required)</small></label>
                                      <input name="last_name" id="last_name" type="text" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Sex</b> <small>(required)</small></label>
                                        <select name="gender" id="" class="form-control" required>
                                            <option  selected disabled>Select...</option>
                                            <option value="male.">Male</option>
                                            <option value="female.">Female</option>
                                        </select>
                                      </div>
                                    <div class="form-group">
                                      <label><b>Suffix</b> <small>(required)</small></label>
                                      <select name="suffix" id="" class="form-control">
                                          <option  selected disabled>Select...</option>
                                          <option value="Sr.">Sr.</option>
                                          <option value="Jr.">Jr.</option>
                                          <option value="III">III</option>
                                          <option value="IV">IV</option>
                                          <option>N/A</option>
                                      </select>
                                    </div>
                                </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Email <small>(required)</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="E.g. joey.cabelin.1@gmail.com" id="email-input" required>
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Contact number <small>(required)</small></label>
                                        <input name="contact_number" type="text" class="form-control" placeholder="E.g. 0992********" id="" required>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text">PESO Delegation Information</h4>
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="designation"><b>Position/Designation </b> <small>(required)</small></label>
                                            {{-- <input name="designation" id="designation" type="text" class="form-control" placeholder="" required> --}}
                                            <select name="designation" id="designation" class="form-control" required>
                                                <option value="" disabled selected>Select</option>
                                                <option value="PESO Manager">PESO Manager</option>
                                                <option value="PESO Staff">PESO Staff</option>
                                                <option value="DOLE Employee">DOLE Employee</option>
                                                <option value="DOLE Employee">Other/Staff</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="delegation"><b>Delegation </b> <small>(required)</small></label>
                                            {{-- <input name="delegation" type="text" class="form-control" placeholder="" required> --}}
                                            <select name="delegation" id="delegation" class="form-control" required>
                                                <option value="" disabled selected>Select</option>
                                                <option value="Region I">Region I</option>
                                                <option value="Region II">Region II</option>
                                                <option value="Region III">Region III</option>
                                                <option value="Region IV‑A">Region IV‑A</option>
                                                <option value="MIMAROPA Region">MIMAROPA Region</option>
                                                <option value="Region V">Region V</option>
                                                <option value="Region VI">Region VI</option>
                                                <option value="Region VII">Region VII</option>
                                                <option value="Region VIII">Region VIII</option>
                                                <option value="Region IX">Region IX</option>
                                                <option value="Region X">Region X</option>
                                                <option value="Region XI">Region XI</option>
                                                <option value="Region XII">Region XII</option>
                                                <option value="Region XIII">Region XIII</option>
                                                <option value="NCR">NCR</option>
                                                <option value="CAR">CAR</option>
                                                <option value="BARMM">BARMM</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="province_lgu_jpo"><b>LGU/SUCs </b> <small>(required)</small></label>
                                            <input name="province_lgu_jpo" id="province_lgu_jpo" type="text" class="form-control" placeholder="" required>
                                          </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text">Registration Payment Information</h4>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="">Bank Name for Deposit/Transfer</label>
                                            <input type="text"  id=" "name="bank_name" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="attached_file"><b>Upload any proof of payment. Only image formats are accepted.</b> <small>(required)</small></label>
                                            <input type="file"  id="attached_file "name="attached_file" class="form-control" required value="" accept="image/*">
                                          </div>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="">Date and Time of Deposit/Transfer</label>
                                            <input type="date"  id=" "name="dt_deposit_transfer" class="form-control"  value="">
                                          </div>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="">Amount</label>
                                            <input type="text"  id=" "name="amount" class="form-control">
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                {{-- <input type='button' type="submit" class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Register' /> --}}
                                <button type="" id="verify-button" class='btn btn-finish btn-fill btn-primary btn-wd btn-sm' name='finish'>Submit</button>
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             Made with <i class="fa fa-heart heart"></i> by <a href="">DOLE - RO8 | ICT Unit Team</a>. 
        </div>
    </div>

</div>
@include('sweetalert::alert')
</body>

	<!--   Core JS Files   -->
	<script src="assets4/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets4/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets4/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets4/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets4/js/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("input[name=next]").click(function(e) {
            e.preventDefault();

            var file = $("input[name=profile_picture]").val();
            if(!file){
                alert('Please upload your profile picture');
                return false;
            }
           
          });
        });
    </script>
</html>
