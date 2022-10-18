@extends('layouts.navside')
@section('da')
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
</head>
<div class="container">
    @include('layouts.top_row.fac')
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
                        <th>Name Faculty</th>
                        <th colspan="2">OPTIONS</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faculty as $Faculty)   
                   
                    <tr>
                        <td>{{ $Faculty->id }}</td>
                        <td>{{ $Faculty->name }}</td>
                        
                        <td id="btn"> <button  class="edit"><i class="fa-solid fa-pen-to-square"></i> Modifier</button></td>
                        <td> <button  id="delete"><i class="fa-solid fa-trash-can"></i> Supprimer</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

@endsection