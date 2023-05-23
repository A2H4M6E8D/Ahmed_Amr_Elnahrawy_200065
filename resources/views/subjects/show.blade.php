<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('base')
    @section('content')
        
   
    <h1>
       SubjectName : {{$subject->name}}
    </h1>

<br>

    <h2>
   Code : {{$subject->code}}
    </h2>
<br>
    <h2>
        {{$subject->department->name}}
    </h2>

    @endsection
</body>
</html>