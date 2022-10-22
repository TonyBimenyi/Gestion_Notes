@extends('layouts.navside')
@section('da')
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
</head>
<div class="container">
    @include('layouts.top_row.cour')
    <div class="table">
        <div class="table_content">
        <div class="search_row">
            <div class="sort">

            </div>
            <div class="search">
                {{-- <input type="search" placeholder="Rechercher..."> --}}
            </div>
        </div>
        @if ($course->count()>0)
            
        <div class="table_list">
            <table>
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>NAME COURSE</th>
                        <th>CREDIT</th>
                        <th>CLASS</th>
                        <th>UNIT</th>
                        <th>HOURLY VOLUME</th>
                        <th>SPECIALISATION</th>
                        <th colspan="2">OPTIONS</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course as $cours)   
                   
                    <tr>
                        <td>{{ $cours->id }}</td>
                        <td>{{ $cours->code }}</td>
                        <td>{{ $cours->name }}</td>
                        <td>{{ $cours->semester }}</td>
                        <td>{{ $cours->class }}</td>
                        <td>{{ $cours->vh }}</td>
                        <td>{{ $cours->specialisation->name }}</td>
                        <td id="btn"><a href="{{ url('edit_course/'.$cours->id) }}"> <button  class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a></td>
                        <td><a href="{{ url('delete_course/'.$cours->id) }}"> <button  id="delete"><i class="fa-solid fa-trash-can"></i> Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else

        <span><h1>No Record Saved</h1></span>
        @endif
    </div>
    </div>
</div>

@endsection