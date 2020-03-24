<?php

namespace App\Http\Controllers;
use App\Sentence;
use App\Sentence_types;
use Illuminate\Http\Request;

class SentenceTypeController extends Controller
{
    //
    // public function index()
    // {
        
    //     return view('sentence_type.index');
    // }
    public function create()
    {
        $sentence_types = Sentence_Type::all();
        return view('sentence_types.create')->with('sentence_types',$sentence_types);
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
            
        ];

        $request->validate($rules);

      
        $sentence_types = new Sentence_Type();
        $sentence_types->name = $request->name;
      
        $sentence_types->save(); 
        
        return redirect()->route('sentence.index')->with('status', 'บันทึกข้อมูลสำเร็จ');


    }
    
    public function show($id){}

    public function edit($id){}

    public function update(Request $request, $id){}

    public function destroy($id)
        {
            SentenceType::destroy(@id);
            return back();
        }
}
