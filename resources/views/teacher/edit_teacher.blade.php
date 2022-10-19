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
        @include('layouts.top_row.tea')
        <div class="form">
            <h3 style="margin:10px 35px;color:var(--primary)">Modify a Teacher</h3>
            <form action="{{ url('update_teacher/'.$teacher->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="row">
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Matricule: </label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-list-ol"></i>
                                </div>
                                <div class="input">
                                    <input type="text" name="matricule" value="{{ $teacher->matricule }}" placeholder="matricule..." required>
                                </div>
                            </div>
                        </div>
                        <div class="input_row">
                            <div class="labels">
                                <label for="">FirstName:</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="input">
                                    <input type="text" name="firstname" value="{{ $teacher->fname }}" placeholder="Firstname...">
                                </div>
                            </div>
                        </div>
                        <div class="input_row">
                            <div class="labels">
                                <label for="">LastName</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="input">
                                    <input type="text" name="lastname" value="{{ $teacher->lname }}" placeholder="Lastname...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Sex: </label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-mars-and-venus"></i>
                                </div>
                                <div class="select">
                                    <select name="sex" id="">
                                        <option value="{{ $teacher->sexe }}" disabled>--Sexe---</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Email</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="input">
                                    <input type="email" name="mail" value="{{ $teacher->email }}" placeholder="exemple@biu.bi">
                                </div>
                            </div>
                        </div>
                        <div class="input_row">
                            <div class="labels">
                                <label for="">Course</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <div class="select">
                                    <select name="course" id="state">
                                        <option value="" required >--Course---</option>
                                        @foreach ($course as $course)
                                            
                                        <option value="{{ $course->id }}" required >{{ $course->name }}</option>

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