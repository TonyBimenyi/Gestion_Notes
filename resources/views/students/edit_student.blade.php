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
            <h3 style="margin:10px 35px;color:var(--primary)">Update Student</h3>
            <form action="{{ route('students.update',['id' => $student->id])}}" method="post">
                @csrf
                @method('PUT')
                
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
                                    <input name="matricule"  readonly="" value="{{$student->matricule}}" required type="text" placeholder="Nom...">
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
                                        <input name="fname" value="{{$student->fname}}" required type="text" placeholder="First Name...">
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
                                    <input name="lname" value="{{$student->lname}}" required type="text" placeholder="Last Name...">
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
                                    <select  name="sexe" required id="">
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
                                <input name="email" value="{{$student->email}}"  required type="email" placeholder="exemple@biu.bi">
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
                                        <select required  class="fac" name="faculte" id="faculty">
                                            <option value="" selected="true" disabled="true">--Selectionner la faculte---</option>
                                            @foreach ($faculties as $fac)
                                                <option value="{{ $fac->id }}">{{ $fac->name }}</option>
                                            @endforeach
                                         
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
                                        <select  name="spec" id="spec">
                                            <option value="" required disabled>{{$student->specialisation->name}}</option>

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
                                        <select  required name="class" id="">
                                            <option value="" selected="true" disabled>{{$student->class}}</option>
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
                            <button>Update</button>
                        </div>
                    </div>
                </div>
               
            </form>

        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('#faculty').change(function(){
            let fid=jQuery(this).val();
            // jQuery.ajax({
            //     url:'/getState',
            //     type:'post',
            //     data:'cid='+cid+'_token={{ csrf_token() }}',
            //     success:function(result){
            //         jQuery('#state').html(result)
            //     }
            // })
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });
        $.ajax({
            method:"POST",
            url:"/getSpec",
            data:{
            'fid':fid,
            "_token": "{{ csrf_token() }}",
            },
            success:function(result){
                    jQuery('#spec').html(result);
                }
        })
        })
    })
</script>
@endsection