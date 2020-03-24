<?php

namespace App\Http\Controllers;

use App\Sentence;
use App\Document;
use App\Document_Type;
use App\Sentence_Type;
use Auth;
// use App\Word;
use Illuminate\Http\Request;

class InsertController extends Controller
{
    public function index()
    {
        $Sentence_Types = Sentence_Type::all()->pluck('name','id');
        return view('insert')->with('Sentence_Types ',$Sentence_Types);
        
    }
    public function create(){}

        public function store(Request $request){
            $rules = [
                'sentence_text' => 'required',
               
            ];

            // dd($request);
            $sentence = new Sentence();
            $sentence->sentence_text = $request->sentence_text;
            $sentence->segmented_text = $request->segmented_text;  
            $sentence->is_approved = $request->is_approved;
            $sentence->approved_at = $request->approved_at;
            $sentence->users_id = Auth::user()->id;
            $sentence->Sentence_Types_id = $request->Sentence_Types_id;
            $sentence->Document_id = $request->Document_id;

            $sentence->save();

            return redirect()->route('insert.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
           


        }
        
        public function show($id){}
    
        public function edit($id){}
    
        public function update(Request $request, $id){}
    
        public function destroy($id)
            {
                DocumentType::destroy(@id);
                return back();
            }
}
