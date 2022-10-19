@extends('layouts.navside')
@section('da')
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/form.css')}}">
</head>
<div class="container">
    @include('layouts.top_row.students')
    <div class="form">
        <h3 style="margin:10px 35px;color:var(--primary)">Do you want delete {{$student->fname}} {{$student->lname}}?</h3>
        <form action="{{ route('students.remove',['id' => $student->id])}}" method="post">
            @csrf
                    <div class="button" >
                        <button style="padding:15px 140px 15px 100px;background-color:red;"> Delete</button>
                    </div>
                    
             
           
        </form>
        <div class="button">
            <a href="{{ route('students')}}">  <button style="padding:15px 150px 15px 100px">Cancel</button></a>
        </div>

    </div>
</div>
@endsection