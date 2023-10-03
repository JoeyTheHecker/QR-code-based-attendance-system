<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\QRcodemail;
use App\Mail\OrderShipped;
use App\Mail\Qrcode;
use App\Models\Attended;
use App\Models\AttendedTwo;
use App\Models\AttendedThree;

class EmployeeController extends Controller
{


    public function importForm(){
        return view('import-form');
    }

    // public function saveImportFormFile(){
    //     Excel::import(new );
    // }

    public function pending(){
        $pending_employees = Status::where('status','pending')->with('employee')->get();
        return view('admin.pending',compact('pending_employees'));
    }

    public function approved(){
        $approved_employees = Status::where('status','approved')->with('employee')->get();
        return view('admin.approved',compact('approved_employees'));
    }

    public function directory(){
        $approved_employees = Status::where('status','approved')->with('employee')->get();
        return view('directory',compact('approved_employees'));
    }

    public function attended(){
        $attended_employees = Attended::with('employee')->get();
        return view('admin.attended',compact('attended_employees'));
    }
    public function attendedTwo(){
        $attended_employees = AttendedTwo::with('employee')->get();
        return view('admin.attended',compact('attended_employees'));
    }
    public function attendedThree(){
        $attended_employees = AttendedThree::with('employee')->get();
        return view('admin.attended',compact('attended_employees'));
    }

    public function scan(){
            return view('admin.scan');
    }

    public function scanQrcode(Request $request){

            
            $employee = Employee::where('employee_code',$request->employee_code)->first();
            
            if($employee){
                $current_date = date('Y-m-d');
                if($current_date == '2023-09-21'){
                   try{
                    Attended::updateOrCreate(
                        ['employee_id' => $employee->id],
                        ['attended_date' => now()]
                    );
                   } catch(\Exception $e){
                    Alert::error('Something went wrong', 'Please try again...')->persistent(true,false);
                    return redirect()->back();
                   }
                }elseif($current_date == '2023-09-20'){
                    try{
                    AttendedTwo::updateOrCreate(
                         ['employee_id' => $employee->id],
                         ['attended_date' => now()]
                     );
                    } catch(\Exception $e){
                     Alert::error('Something went wrong', 'Please try again...')->persistent(true,false);
                     return redirect()->back();
                    }
                 }elseif($current_date == '2023-09-22'){
                    try{
                    AttendedThree::updateOrCreate(
                         ['employee_id' => $employee->id],
                         ['attended_date' => now()]
                     );
                    } catch(\Exception $e){
                     Alert::error('Something went wrong', 'Please try again...')->persistent(true,false);
                     return redirect()->back();
                    }
                 }
            }else {
                Alert::error('No record found', 'You are not yet regisreted...')->persistent(true,false);
                return redirect()->back();
            }

            $suffix = '';
            if($employee->suffix != 'N/A'){ 
                $suffix = $employee->suffix;
            }

            $first_name = ucfirst(strtolower($employee->first_name));
            $middle_name = ucfirst(strtolower(substr($employee->middle_name, 0, 1)));
            $last_name = ucfirst(strtolower($employee->last_name));
            $designation = strtoupper($employee->designation);
            $fullname = $first_name.' '.$middle_name.'. '.$last_name.' '.$suffix;
            Alert::info($fullname, '')
            ->html("<div style='position: relative; margin-bottom: 130px;'> <img src='logo-popup.png' alt='National PESO Congress' style='position: relative; width: 100%; height: 200px; z-index: 1;'> <img src='profile_pictures/$employee->profile_picture' alt='My Image' style='position: absolute; top: 110%; left: 50%;transform: translate(-50%, -50%); width: 200px; /* Adjust the size as needed */ height: 200px; /* Adjust the size as needed */ border-radius: 50%; border: 5px solid #fff; box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); z-index: 2;'>
             </div><h3 style='font-family: monospace; margin: 0'>$fullname</h3> <span style='font-family: monospace;'>$designation</span>")->showConfirmButton('Check In!', '#3085d6')->autoClose(4000);

            return redirect()->back();
    }

    // public function getSuffix($suffix){
    //     return $suffix;
    // }

    public function employeeCodeExists($number){
        return Employee::where('employee_code',$number)->exists();
    }
   
    public function successUpload($bool){
        $val = $bool;
        return $val;
    }


     /**
     * Generate code
     */
    function generateNumber(){
        $number = mt_rand(100000, 999999); // better than rand()
        
        // call the same function if the barcode exists already
        if ($this->employeeCodeExists($number)) {
            return $this->generateNumber();
        } 

        // otherwise, it's valid and can be used
        return $number;
    }

    public function store(Request $request){

        $validated = $request->validate([
            'first_name' => 'required|alpha:ascii|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|alpha:ascii|max:255',
        ]);

        $number = $this->generateNumber();


        $request['employee_code'] = $number;
        $profile_picture = $request['employee_code'].'.'.$request->profile_picture->getClientOriginalExtension();
        $attached_file = $request['employee_code'].'.'.$request->attached_file->getClientOriginalExtension();


        try {
            DB::transaction(function () use ($request,$profile_picture,$attached_file) {

                $employee = Employee::create([
                    'employee_code'=> $request['employee_code'],
                    'first_name' => $request['first_name'],
                    'middle_name' => $request['middle_name'],
                    'last_name' => $request['last_name'],
                    'suffix' => $request['suffix'],
                    'gender' => $request['gender'],
                    'designation' => $request['designation'],
                    'province_lgu_jpo' => $request['province_lgu_jpo'],
                    'delegation' => $request['delegation'],
                    'email' => $request['email'],
                    'contact_number' => $request['contact_number'],
                    'profile_picture' => $profile_picture,
                    'bank_name' => $request['bank_name'],
                    'attached_file' => $attached_file,
                    'dt_deposit_transfer' => $request['dt_deposit_transfer'],
                    'amount' => $request['amount'],
                ]);

                Status::create([
                    'employee_id' =>  $employee->id,
                ]);

                $request->profile_picture->move('profile_pictures',$profile_picture);
                if($request->attached_file->move('attached_files',$attached_file)){
                }else {
                    $file_path = public_path('profile_pictures/'. $profile_picture);
                    unlink($file_path);
                }

                });
        } catch (\Exception $e){
            Alert::error('Something went wrong', "Please try again...")->persistent(true,false);
            return redirect()->back();
        }

        Alert::success('Registered Successfully','Wait for the approval from admin to recieve QRCODE through your gmail')->persistent(true,false);
        return redirect()->back();
    }

    

    public function update($id){
        
       DB::transaction(function () use ($id){
            $status = Status::where('employee_id',$id)->with('employee')->first();
            $email = $status->employee->email;
            $employee_code = $status->employee->employee_code;
            $status->update(['status' => 'approved']);
        
                $url = 'http://12.0.0.105/employee/'.$employee_code;

                $data = [
                        'from' => 'joey.cabelin.1@gmail.com',
                        'subject' => 'Approved: National PESO Congress Registration',
                        'url' => $url
                ];

            try {
                Mail::to($email)->send(new Qrcode($data,$status));
            } catch(\Exception $e){
                Status::where('employee_id',$id)->update(['status' => 'pending']);
                Alert::error('Oops...','Something went wrong...');
                return redirect()->back();
            }
       });



        Alert::success('Updated Successfully','The employee has been successfully approved');
        return redirect()->back();
    }

    public function show($employee_code)
    {
        $employee = Employee::where('employee_code',$employee_code)->first();
        return view('show',compact('employee'));
    }

}
