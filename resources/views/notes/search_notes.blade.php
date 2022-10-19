@extends('layouts.navside')
@section('da')
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
</head>
<div class="container">
    @include('layouts.top_row.notes')
    <div class="table">
        <div class="table_content">
            <form action="{{route('notes.searchNoteMatricule')}}" method="get">     
                @csrf 
            <div class="search_row">
                
                <div class="sort">
                    
                    <div class="fac">
                        <select required class="fac" name="faculte" id="faculty">
                            <option value="" selected="true" disabled="true">--Selectionner la faculte---</option>
                            @foreach ($faculties as $fac)
                                <option value="{{ $fac->id }}">{{ $fac->name }}</option>
                            @endforeach
                         
                        </select>
                    </div>
                    <div class="spec">
                        <select name="spec" id="spec">
                            <option value="" required disabled>--La faculte d'abord---</option>

                        </select>
                    </div>
                    <div class="classe">
                        <select name="class" id="classe">
                            <option value="" disabled selected>--Select the Class--</option>
                            <option value="BAC I">BAC I</option>
                            <option value="BAC II">BAC II</option>
                            <option value="BAC III">BAC III</option>
                        </select>
                    </div>
                               
                    <div class="btn_search" >
                        <button>SEARCH</button>
                 

                    </div>
                </div>
                <div class="search">
                    {{-- <input type="search" placeholder="Rechercher..."> --}}
                </div>
            </form>
            </div>
            
        </div>
    </div>
    <div class="note_data" class="table">
        <div class="table_content">
        <div class="search_row">
            <div class="sort">

            </div>
            <div class="search">
                <input type="search" placeholder="Search...">
            </div>
        </div>
        @if($students->count()>0)
        <div class="table_list">
            <table>
                <thead>
                    <tr>
                        <th>MATRICULE</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>COURSE</th>
                        <th>NOTES /20</th>
                       
                      
                    
                    </tr>
                </thead>
    
                    @csrf
                @foreach($students as $stu)
                <tbody>
                    <form  action="{{route('notes.place')}}" method="get"> 
                    <td>{{$stu->matricule}}</td>
                    <td>{{$stu->fname}}</td>
                    <td>{{$stu->lname}}</td>
                    <td> <select required class="fac" name="course" id="faculty">
                        <option value="" selected="true" disabled="true">--Select Course---</option>
                        @foreach ($courses as $fac)
                            <option class="id_course" value="{{ $fac->id }}">{{ $fac->name }}</option>
                        @endforeach
                     
                    </select></td>
                    <td><input name="note" class="note"  type="number" placeholder="Enter Note..."></td>
                    <td><input name="id_student" class="id_student" type="hidden" value="{{$stu->id}}"></td>
                    <td><button class="save_btn">Save</button></td>
                    </form>
                </tbody>
                @endforeach
            </table>
        </div>
        @else

        <span><h1>No Record Found</h1></span>

        @endif
    </div>
    
    </div>
    <div class="table">
        <div class="table_content">
             
            <div class="search_row">
                
                <div class="sort">
                    
                    <div class="fac">
                        <select required class="fac" name="course" id="faculty">
                            <option value="" selected="true" disabled="true">--Select Course---</option>
                            @foreach ($courses as $fac)
                                <option class="id_course" value="{{ $fac->id }}">{{ $fac->name }}</option>
                            @endforeach
                         
                        </select>
                    </div>
                    
                               
                    <div class="btn_search" >
                        <button>ADD</button>
                 

                    </div>
                </div>
                <div class="search">
                    {{-- <input type="search" placeholder="Rechercher..."> --}}
                </div>

            </div>
            
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
<script>
    $('.save_btn').click(function (e){
        e.preventDefault();

        var id_student = $(this).closest('.note_data').find('.id_student').val();
        var id_course = $(this).closest('.note_data').find('.id_course').val();
        var note = $(this).closest('.note_data').find('.note').val();

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });
    
        $.ajax({
            method:"POST",
    url:"/addNote",
    data:{
      'id_student':id_student,
      'id_course':id_course,
      'note':note,
    },

    success:function(response){
      Swal.fire(response.status)
    }
        })
    }
</script>

@endsection