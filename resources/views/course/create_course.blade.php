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
        @include('layouts.top_row.cour')
        <div class="form">
            <h3 style="margin:10px 35px;color:var(--primary)">Add a Course</h3>
            <form action="{{ route('addcourse') }}" method="post">
                @csrf
                {{-- @method('PUT')  --}}
                <div class="col">
                    <div class="row">
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Code: </label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-list-ol"></i>
                                </div>
                                <div class="input">
                                    <input type="text" name="code" placeholder="Code..." required>
                                </div>
                            </div>
                        </div>
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Name of Course:  </label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-file-signature"></i>
                                </div>
                                <div class="input">
                                    <input type="text" name="namecourse" placeholder="Name Course..." required>
                                </div>
                            </div>
                        </div>
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Semester</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-server"></i>
                                </div>
                                <div class="select">
                                    <select name="semester" id="">
                                        <option value="" >--Selected Semester---</option>
                                        <option value="semester1">1st Semestrer</option>
                                        <option value="semester2">2nd Semester</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Class:</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-school"></i>
                                </div>
                                <div class="select">
                                    <select name="class" id="">
                                        <option value="" disabled>--Select Class---</option>
                                        <option value="BacI">BAC I</option>
                                        <option value="BacII">BAC II</option>
                                        <option value="BacIII">BAC III</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Hourly Volume:</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-credit-card"></i>
                                </div>
                                <div class="input">
                                    <input type="number" name="volume" placeholder="Hourly Volume..." required>
                                </div>
                            </div>
                        </div>
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Specialisation</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <div class="select">
                                    <select name="specialisation" id="state">
                                        <option value="" required >--Specialisation---</option>
                                        @foreach ($create_course as $spec)
                                            
                                        <option value="{{ $spec->id }}" required >{{ $spec->name }}</option>

                                        @endforeach
                                        
                                        
                                    </select>
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