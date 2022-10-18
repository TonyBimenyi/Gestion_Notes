@extends('layouts.navside')
@section('da')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/etudiant.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/form.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
</head>
<body>
    <div class="container">
        @include('layouts.top_row.fac')
        <div class="form">
            <h3 style="margin:10px 35px;color:var(--primary)">Add a Faculty</h3>
            <form action="{{ url('add_faculty') }}" method="post">
                @csrf
                {{-- @method('PUT')  --}}
                <div class="col">
                    <div class="row">
                        
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Name of Faculty:  </label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-file-signature"></i>
                                </div>
                                <div class="input">
                                    <input type="text" name="namefaculty" placeholder="Name Faculty..." required>
                                </div>
                               </div>
                            
                        
                         </div>
                    
                    </div>
                </div>
                <div class="button">
                    <button type="submit">ADD</button>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection