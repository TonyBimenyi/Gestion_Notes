@extends('layouts.navside')
@section('da')

<head>
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
</head>
<div class="container">
    @include('layouts.top_row.spec')
    <div class="table">
        <div class="table_content">
        <div class="search_row">
            <div class="sort">

            </div>
            <div class="search">
                {{-- <input type="search" placeholder="Rechercher..."> --}}
            </div>
        </div>

        <div class="table_list">
            <table>
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>SPECIALIZATION NAME</th>
                        <th>FACULTY</th>
                        <th colspan="2">OPTIONS</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($specialisation as $spec)   
                   
                    <tr>
                        <td>{{ $spec->id }}</td>
                        <td>{{ $spec->name }}</td>
                        <td>{{ $spec->faculty-> name }}</td>
                        <td id="btn"><a href="{{ url('edit_specialization/'.$spec->id) }}"> <button  class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a></td>
                        <td><a href="{{ url('delete_specialization/'.$spec->id) }}"> <button  id="delete"><i class="fa-solid fa-trash-can"></i> delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

@endsection