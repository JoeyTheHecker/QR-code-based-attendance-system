<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets3/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets3/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Registration | DOLE - RO8</title>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets3/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets3/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets3/css/demo.css" rel="stylesheet" />
</head>
<body>
    <style>
        /* Rest of your existing styles */
        
        .custom-file-container {
          position: relative;
          display: inline-block;
          width: 100%;
        }
    
        .custom-file-input {
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          opacity: 0;
          cursor: pointer;
        }
    
        .custom-file-label {
          display: inline-block;
          width: 100%;
          padding: 8px 12px;
          background-color: #fff;
          border: 1px solid #ccc;
          border-radius: 4px;
          cursor: pointer;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
        }
    
        .custom-file-label::after {
          content: 'Browse';
          display: inline-block;
          vertical-align: middle;
          background-color: #007bff;
          color: #fff;
          border-radius: 4px;
          padding: 8px 12px;
          margin-left: 10px;
          cursor: pointer;
        }
    
        .custom-file-label:hover::after {
          background-color: #0069d9;
        }
    
        .custom-file-label:active::after {
          background-color: #0056b3;
        }
    
        .custom-file-label[disabled]::after {
          background-color: #e9ecef;
          cursor: not-allowed;
        }
    
        .custom-file-label:focus-visible {
          box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
      </style>
<div class="image-container set-full-height" style="background-image: url('assets3/img/peso-congress.png');">
    <!--   LOGO here   -->
    {{-- <a href="">
         <div class="logo-container">
            <div class="logo">
                <img src="assets3/img/new_logo.png">
            </div>
            <div class="brand">
                DOLE RO8
            </div>
        </div>
    </a> --}}

	<!--  Made With Get Shit Done Kit  -->
		{{-- <a href="http://demos.creative-tim.com/get-shit-done/index.html?ref=get-shit-done-bootstrap-wizard" class="made-with-mk">
			<div class="brand">GK</div>
			<div class="made-with">Made with <strong>GSDK</strong></div>
		</a> --}}

    <!--   Big container   -->
    <div>
      <div class="container" style="margin: 0px 0px 0px auto;">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
                <div class="card wizard-card" data-color="blue" id="wizardProfile" style="background-color: rgba(255, 255, 255, 0.8);">
                    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf
                    	<div class="wizard-header">
                        	<h3>
                                <b>National PESO Congress Registration</b><br>
                        	   <small>This information will let us know more about you.</small>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">Personal Information</a></li>
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
                                        <input name="first_name" type="text" id="first_name" class="form-control" placeholder="">

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
                                        <label for="designation"><b>Designation </b> <small>(required)</small></label>
                                        {{-- <input name="designation" id="designation" type="text" class="form-control" placeholder="" required> --}}
                                        <select name="designation" id="designation" class="form-control" required>
                                            <option value="" disabled selected>Select</option>
                                            <option value="PESO Manager">PESO Manager</option>
                                            <option value="PESO Staff">PESO Staff</option>
                                            <option value="DOLE Employee">DOLE Employee</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="province_lgu_jpo"><b>Province/LGU/JPO </b> <small>(required)</small></label>
                                        <input name="province_lgu_jpo" id="province_lgu_jpo" type="text" class="form-control" placeholder="" required>
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
                                          <label for="email-input"><b>Email <b style="color: red"><small>(required)</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="e.g. joey.cabelin.1@gmail.com" id="email-input" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="attached_file"><b>Upload any proof of payment. Only image formats are accepted.</b> <small>(required)</small></label>
                                        <input type="file"  id="attached_file "name="attached_file" class="form-control" required value="" accept="image/*">
                                      </div>
                                  </div>
                              </div>
                            </div>
                           
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                <button type="" id="verify-button" class='btn btn-finish btn-fill btn-primary btn-wd btn-sm' name='finish'>Submit</button>
                                <button type="submit" id="SubmitApplication" hidden></button>
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
    </div>

    <div class="footer">
        <div class="container">
             Crafted with <i class="fa fa-heart heart"></i> by <a href="">DOLE - RO8 | ICT Unit Team</a>.</a>
        </div>
    </div>

    @include('sweetalert::alert')
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</div>

</body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!--   Core JS Files   -->
	<script src="assets3/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets3/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets3/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
 
	<!--  Plugin for the Wizard -->
	<script src="assets3/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets3/js/jquery.validate.min.js"></script>

 
</html>
