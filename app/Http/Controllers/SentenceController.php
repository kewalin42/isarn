<?php

namespace App\Http\Controllers;
use App\Sentence;
use App\Document;
use App\Document_Type;
use App\Sentence_types;
use Auth;
use Illuminate\Http\Request;

class SentenceController extends Controller
{
    //
    public function index()
    {
        $sentence = Sentence::paginate(10);
        return view('sentence.index')->with('sentence',$sentence);
    }
    public function create()
    {
        $sentence = Sentence::all()->pluck('name', 'id');
        return view('sentence.create')->with('sentence',$sentence);
    }

    public function store(Request $request){
        $rules = [
            'sentence_text' => 'required',
            'segmented_text' => 'required',
            'is_approved' => 'required',
            'approved_at'=> 'required',

        ];
        $request->validate($rules);

        $sentence = new Sentence();
        $sentence->sentence_text = $request->sentence_text;
        $sentence->segmented_text = $request->segmented_text;
        $sentence->is_approved = $is_approved;
        $sentence->approved_at = $request->approved_at;
        $sentence->users_id = Auth::user()->id;       
        $sentence->sentence_types_id = $request->sentence_types_id;
        $sentence->save(); //save เพื่อให้มีค่า id เพื่อนำไปตั้งเป็นชื่อไฟล์รูปภาพ
        
        return redirect()->route('sentence.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }
    
    public function show($id){}

    public function edit($id){
        $sentence = Sentence::find($id);
        $sentence_types = Sentence_Type::all()->pluck('name', 'id');
        return view('sentence.edit')->with('sentence',$sentence)->with('sentence_types',$sentence_types);
    }

    public function update(Request $request, $id){
        $rules = [
            'senence_text' => 'required',
            'is_approved' => 'required',
            'approved_at'=> 'required',

        ];

        $request->validate($rules);

        $sentence = Sentence::find($id);
        $sentence->update($request->all());

        $sentence->save();
        return redirect()->route('sentence.index')->with('status', 'แก้ไขข้อมูลสำเร็จ');

    }

    public function destroy($id)
        {
            Sentence::destroy(@id);
            return back();
        }
}
