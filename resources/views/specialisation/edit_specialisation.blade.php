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
        @include('layouts.top_row.spec')
        <div class="form">
            <h3 style="margin:10px 35px;color:var(--primary)">Modify a Specialization</h3>
            <form action="{{ url('update_specialization/'.$specialisation->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="row">
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Name of Specialization:  </label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-file-signature"></i>
                                </div>
                                <div class="input">
                                    <input type="text" name="namespec" value="{{ $specialisation->name }}" placeholder="Specialization Name..." required>
                                </div>
                            </div>
                        </div>
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Faculty</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <div class="select">
                                    <select name="facSpec" id="state">
                                        <option value="" required >--Faculty---</option>
                                        @foreach ($facs as $fac)
                                            
                                        <option value="{{ $fac->id }}" required >{{ $fac->name }}</option>

                                        @endforeach
                                        
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button">
                    <button type="submit">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection