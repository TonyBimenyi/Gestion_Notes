@extends('layouts.navside')
@section('da')
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
</head>
<div class="container">
    @include('layouts.top_row.tea')
    <div class="table">
        <div class="table_content">
        <div class="search_row">
            <div class="sort">

            </div>
            <div class="search">
                <input type="search" placeholder="Rechercher...">
            </div>
        </div>

        <div class="table_list">
            <table>
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>MATRICULE</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                        <th>SEX</th>
                        <th>EMAIL</th>
                        <th>COURSE</th>
                        <th colspan="2">OPTIONS</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teacher as $teach)   
                   
                    <tr>
                        <td>{{ $teach->id }}</td>
                        <td>{{ $teach->matricule }}</td>
                        <td>{{ $teach->fname }}</td>
                        <td>{{ $teach->lname }}</td>
                        <td>{{ $teach->sexe }}</td>
                        <td>{{ $teach->email}}</td>
                        <td>{{ $teach->courses->name }}</td>
                        <td id="btn"><a href="{{ url('edit_teacher/'.$teach->id) }}"> <button  class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a></td>
                        <td><a href="{{ url('delete_teacher/'.$teach->id) }}"> <button  id="delete"><i class="fa-solid fa-trash-can"></i> Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

@endsection