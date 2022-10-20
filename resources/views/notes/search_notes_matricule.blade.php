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
                    
                    
                   
                    <div class="search">
                        <input type="text" placeholder="Matricule...">
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
                {{-- <input type="search" placeholder="Search..."> --}}
            </div>
        </div>
        @if($notes->count()>0)
        <div class="table_list">
            <table>
                <thead>
                    <tr>
                        <th>MATRICULE</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>COURSE</th>
                        <th>NOTE /20</th>
                      
                    
                    </tr>
                </thead>
    
                    @csrf
                @foreach($notes as $stu)
                <tbody>
                   
                    <td>{{$stu->student->matricule}}</td>
                    <td>{{$stu->student->fname}}</td>
                    <td>{{$stu->student->lname}}</td>
                    <td>{{$stu->course->name}}</td>
                    <td>{{$stu->notes}}</td>
                    
                    
                </tbody>
                @endforeach
            </table>
        </div>
        @else

        <span><h1>No Record Found</h1></span>

        @endif
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