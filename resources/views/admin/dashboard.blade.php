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
                    <span class="text">Tableau de Bord</span>
                </div>

                <div class="boxes">
                    <div class="box box3">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span class="text">Total des etudiants</span>
                        <span class="number">54</span>
                    </div>
                    <div class="box box1">

                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="text">Depenses</span>
                        <span class="number">1111111 Fbu</span>
                    </div>
                    <div class="box box2">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span class="text">Revenus</span>
                        <span class="number">1222 Fbu</span>
                    </div>

                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Dernieres paiements des minervals</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                            <span class="data-title">Nom et Prenom</span>
                        
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        
                    </div>
                    <div class="data joined">
                        <span class="data-title">Date</span>
                       
                    </div>
                    <div class="data type">
                        <span class="data-title">Tranche</span>
                        
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>
@endsection