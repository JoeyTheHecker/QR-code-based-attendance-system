@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    main {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #reader {
        width: 600px;
    }
    #result {
        text-align: center;
        font-size: 1.5rem;
    }
</style>
{{-- <div class="container-fluid">

   <h1>This is admin</h1>

</div> --}}
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Scan QRcode</h4>

                {{-- <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div> --}}

            </div>
        </div>
    </div>
    <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                {{-- <h4 class="card-title">Default Datatable</h4>
                                <p class="card-title-desc">DataTables has most features enabled by
                                    default, so all you need to do to use it with your own tables is to call
                                    the construction function: <code>$().DataTable();</code>.
                                </p> --}}


                                </div>

                                
                                
                                <main>
                                    <form action="{{ route('scan-qrcode') }}" method="POST">
                                        @csrf
                                        <div id="reader" style="margin: auto;"></div>
                                        <div name="result" id="result"></div>
                                        <button type="submit" id="my-button" hidden></button>
                                    </form>
                                </main>
                                <script>
                                    
                                    </script>
                                    
                                @include('sweetalert::alert')
                                
                                <script>
                                    const scanner = new Html5QrcodeScanner('reader', {
                                        // Scanner will be initialized in DOM inside element with id of 'reader'
                                        qrbox: {
                                            width: 250,
                                            height: 250,
                                        },  // Sets dimensions of scanning box (set relative to reader element width)
                                        fps: 20, // Frames per second to attempt a scan
                                    });
                                
                                
                                    scanner.render(success, error);
                                    // Starts scanner
                                
                                    function success(result) {
                                        document.getElementById('result').innerHTML = `
                                        <h2>Success!</h2>
                                        <input name="employee_code" type="text" value="${result}" hidden>
                                        `;
                                        // responsiveVoice.enableWindowClickHook();
                                        
                                        simulateClick();
                                        
                                
                                        // <p><p value="${result}">${result}</p></p>
                                       
                                        // Prints result as a link inside result element
                                        // alert('Sucess!');
                                        // function tempAlert(msg,duration)
                                        // {
                                        // var el = document.createElement("div");
                                        // el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:white;");
                                        // el.innerHTML = msg;
                                        // setTimeout(function(){
                                        // el.parentNode.removeChild(el);
                                        // },duration);
                                        // document.body.appendChild(el);
                                        // }
                                        // console.log('Success');
                                        // tempAlert("close",1000);
                                        
                                        
                                        scanner.clear();
                                        // Clears scanning instance
                                
                                         // Call the function to trigger the click event automatically
                                        
                                        document.getElementById('reader').remove();
                                        // Removes reader element from DOM since no longer needed
                                
                                    }
                                
                                    function error(err) {
                                        // console.error(err);
                                        // Prints any errors to the console
                                    }
                                
                                    // Get the element that you want to click
                                    const myElement = document.getElementById('my-button');
                                
                                    // Define a function to simulate a click event
                                    function simulateClick() {
                                    const event = new MouseEvent('click', {
                                        view: window,
                                        bubbles: true,
                                        cancelable: true
                                    });
                                    myElement.dispatchEvent(event);
                                    }
                                
                                    
                                
                                </script>
                                
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

</div>
@endsection
