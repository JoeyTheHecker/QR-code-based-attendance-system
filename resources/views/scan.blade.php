<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
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

</body>
</html>
