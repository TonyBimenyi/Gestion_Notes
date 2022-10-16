@extends('layouts.navside')
@section('da')
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/form.css')}}">
</head>
<div class="container">
    @include('layouts.top_row.students')
    <div class="form">
            <h3 style="margin:10px 35px;color:var(--primary)">Add New Student</h3>
            <form action="" method="POST">
                @csrf
                
                <div class="col">
                    <div class="row">
                        <div class="input_row">
                            <div class="labels">
                    
                                <label for="">Matricule</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="input">
                                    <input name="text" readonly="" value="STU-{{$date}}/0{{$count}}" required type="text" placeholder="Nom...">
                                </div>
                            </div>
                        </div>

                        <div class="input_row">
                                <div class="labels">
                                    <label for="">First Name</label>
                                </div>
                                <div class="input_group">
                                    <div class="icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="input">
                                        <input name="nom" required type="text" placeholder="First Name...">
                                    </div>
                                </div>
                         </div>

                         <div class="input_row">
                            <div class="labels">
                                <label for="">Last Name</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="input">
                                    <input name="nom" required type="text" placeholder="Last Name...">
                                </div>
                            </div>
                        </div>

                        <div class="input_row">
                            <div class="labels">
                                <label for="">Sexe</label>
                            </div>
                            <div class="input_group">
                                <div class="icon">
                                    <i class="fa-solid fa-mars-and-venus"></i>
                                </div>
                                <div class="select">
                                    <select name="sexe" required id="">
                                        <option value="" disabled>--Selection le sexe---</option>
                                        <option value="Man">Man</option>
                                        <option value="Woman">Woman</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        
                      

                        </div>

                        <div class="row">

                        <div class="input_row">
                        <div class="labels">
                            <label for="">Email</label>
                        </div>
                        <div class="input_group">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="input">
                                <input name="email" required type="email" placeholder="exemple@biu.bi">
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
                                        <select required class="fac" name="faculte" id="country">
                                            <option value="" selected="true" disabled="true">--Selectionner la faculte---</option>
                                         
                                        </select>

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
                                            <option value="" required disabled>--La faculte d'abord---</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input_row">
                                <div class="labels">
                                    <label for="">Class</label>
                                </div>

                            </div>
                            <div class="input_row">
                                <div class="input_group">
                                    <div class="icon">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="select">
                                        <select required name="classe" id="">
                                            <option value="" selected="true" disabled>--Select Class---</option>
                                            <option value="BAC I">BAC I</option>
                                            <option value="BAC II">BAC II</option>
                                            <option value="BAC III">BAC III</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                        <div class="button">
                            <button>Ajouter</button>
                        </div>
                    </div>
                </div>
               
            </form>

        </div>

    </div>
</div>
@endsection