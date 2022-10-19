@extends('layouts.navside')
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/dashboard.css')}}">

</head>
@section('da')
<div class="dash_container">
    <!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Admin Dashboard Panel</title>-->
</head>
<body>
    <section class="dashboard">


        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box3">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span class="text">Total of Student</span>
                        <span class="number">{{ $count_student }}</span>
                    </div>
                    <div class="box box1">

                        <i class="fa-solid fa-chalkboard-user"></i>
                        <span class="text">Total of Teacher</span>
                        <span class="number">{{ $count_teacher }}</span>
                    </div>
                    <div class="box box2">
                        <i class="fa-solid fa-person-chalkboard"></i>
                        <span class="text">Total of Course</span>
                        <span class="number">{{ $count_course }}</span>
                    </div>

                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">List Of Faculty</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                            <span class="data-title">#ID</span>
                            @foreach ($faculty as $fac )
                            <h3>{{ $fac->id }}</h3> 
                            @endforeach
                        
                    </div>
                    <div class="data email">
                        <span class="data-title">NAME FACULTY</span>
                        @foreach ($faculty as $fac )
                        <h3>{{ $fac->name }}</h3> 
                        @endforeach
                    </div>
                   

                </div>
            </div>
        </div>
    </section>
</body>
@endsection