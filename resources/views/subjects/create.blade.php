<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    @extends('base')
    @section('content')
        
   

    <form action="/subjects" method="POST">
        @csrf

        <div>
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="{{old('name')}}"> 
        
        @error('name')
        <div class='text text-danger'>
            {{$message}}    
        </div>
        @enderror


        </div>
        
        
        <div>
            <label>Code</label>
            <input class="form-control" type="text" name="code" value="{{old('code')}}">  
            @error('code')
                <div class='text text-danger'>
                  {{$message}}    
             </div>
             @enderror
            </div>
        
            <div>
                <label>Department</label>
                <select name="department_id" class="form-select">
                    @foreach($departments as $department)
                        <option value="{{$department->id}}">
                            {{$department->name}}
                        </option>
                    @endforeach
                    
                </select>  
                </div>
        
                <button type="submit" class="btn btn-success">
                    Save
                </button>
        
        </form>

        @endsection
    
</body>
</html>    