@extends('layouts.navside')
@section('da')
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
</head>
<div class="container">
    @include('layouts.top_row.students')
    <div class="table">
        <div class="table_content">
        <div class="search_row">
            <div class="sort">

            </div>
            <div class="search">
                {{-- <input type="search" placeholder="Search..."> --}}
            </div>
        </div>
        @if($students->count()>0)
        <div class="table_list">
            <table>
                <thead>
                    <tr>
                        <th>MATRICULE</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>SEXE</th>
                        <th>EMAIL</th>
                        <th>CLASS</th>
                        <th>SPECIALISATION</th>
                        <th>CREATED AT</th>
                        <th colspan="2">OPTIONS</th>
                    
                    </tr>
                </thead>
                @foreach($students as $stu)
                <tbody>
                    <td>{{$stu->matricule}}</td>
                    <td>{{$stu->fname}}</td>
                    <td>{{$stu->lname}}</td>
                    <td>{{$stu->sexe}}</td>
                    <td>{{$stu->email}}</td>
                    <td>{{$stu->class}}</td>
                    <td>{{$stu->specialisation->name}}</td>
                    <td>{{$stu->created_at}}</td>
                    <td id="btn"><a href="{{ route('students.edit',['id' => $stu->id])}}"> <button  class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a></td>
                    <td> <a href="{{ route('students.delete_student',['id' => $stu->id])}}">  <button id="delete"><i class="fa-solid fa-trash-can"></i> Delete</button></a></td>
                </tbody>
                @endforeach
            </table>
        </div>
        @else

        <span><h1>No Record Saved</h1></span>

        @endif
    </div>
    </div>
</div>

@endsection