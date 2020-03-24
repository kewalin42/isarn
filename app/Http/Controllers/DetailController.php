<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Document_Type;
use App\Sentence;
use App\Sentence_Type;
use DB;
use PDF;
use Auth;
use App\User;

class DetailController extends Controller
{
    
    public function export_pdf(){
        $detail = Document::orderBy('id')->get();
        $sentence = Sentence::orderBy('sentence_text')->get();
        $segment = Sentence::orderBy('segmented_text')->get();
        $data = [
            'detail' => $detail,
            'sentence' => $sentence,
            'segment' => $segment,
        ];
         $pdf = PDF::loadView('detail.pdf_layout', $data);
         return $pdf->stream('example.pdf')->with('detail',$detail)->with('sentence',$sentence)->with('segment',$segment);
     }
     
    public function index(){   
        $detail = Document::all();
    
        return view('detail.index')->with('detail',$detail);
    } 

    public function show($id)
    {
        
        $detail = Document::where('id', $id)->get();
        $sentence = Sentence::where('id',$id)->get();
        $user = User::where('id',$id)->get();
        return view('detail.detail', compact('detail','sentence','user'));   
    }

    public function store(Request $request)
    {
        $detail = Document::where('document_id', $request->document_id)->get();
        $title = Document::where('id',$request->document_id)->first();
        $sentence_text = Sentence::where('sentence_text',$request->sentence_text);
        $segmented_text = Sentence::where('segmented_text',$request->segmented_text);
    
      
        return view('detail.store', compact('detail','title','sentence_text','segmented_text'));
    }
}
