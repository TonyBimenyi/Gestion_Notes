<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Specialisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecialisationController extends Controller
{
    public function index()
    {
        $specialisation = Specialisation::get();
        $facs = Faculty::get();

        return view('specialisation.specialisation',['specialisation'=>$specialisation]);
    }

    public function list_specs()
    {
        $facs = Faculty::get();

        return view('specialisation.create_specialisation',['create_specialisation'=>$facs]);
    }

    public function add_specialization(Request $request)
    {
        $spec = new Specialisation();
        $spec->name=$request->input('namespec');
        $spec->id_fac=$request->input('facSpec');
        $spec->save();

        return redirect('specialization')->with('alert', 'Specialization added successfully!');
    }

    public function edit_Specialization($id)
    {
        //$courses=Course::findOrFail($id);
         $spec=Specialisation::where('id',$id)->first();
         $facs = Faculty::get();


        return view('specialisation.edit_specialisation',['specialisation'=>$spec],['facs'=>$facs]);
       // return view('specialisation.specialisation',compact('spec','facs'));
    }

    public function update_specialization(Request $request,$id)
    {
        $spec=DB::table('specialisations')
        ->where('id',$id)
        ->update([
                    'name'=>$request->input('namespec'),
                    'id_fac'=>$request->input('facSpec')
                    ]
        );
    return redirect('specialization')->with('alert',"Specialization has been Updated!");
    }

    public function delete_specialization($id)
    {
        $spec=Specialisation::where('id',$id)->delete();

        return redirect('specialization')->with('alert',"Specialization has been deleted!");
    }

}
