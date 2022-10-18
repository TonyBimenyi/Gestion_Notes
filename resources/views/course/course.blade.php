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
                <input type="search" placeholder="Rechercher...">
            </div>
        </div>

        <div class="table_list">
            <table>
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>NOM COUR</th>
                        <th>CREDIT</th>
                        <th>CLASSE</th>
                        <th>UNITE</th>
                        <th>ENSEIGNANT</th>
                        <th>SPECIALISATION</th>
                        <th colspan="2">OPTIONS</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course as $cours)   
                   
                    <tr>
                        <td>{{ $cours->code }}</td>
                        <td>{{ $cours->name }}</td>
                        <td>{{ $cours->semester }}</td>
                        <td>{{ $cours->class }}</td>
                        <td>{{ $cours->vh }}</td>
                        <td>{{ $cours->id_spec }}</td>
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