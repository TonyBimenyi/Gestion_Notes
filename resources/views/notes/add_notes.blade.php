@extends('layouts.navside')
@section('da')
<head>
    <link rel="stylesheet" href="{{asset('frontend/css/top.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/modal.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/form.css')}}">
</head>
<div class="container">
    @include('layouts.top_row.notes')
    <div class="table">
        <div class="table_content">
            <form action="{{route('notes.search')}}" method="get">     
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