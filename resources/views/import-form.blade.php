<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import</title>
</head>
<body>
    <form action="{{ route('import-form') }}" method="" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="submit" value="Upload" name="submit">
    </form>
</body>
</html>