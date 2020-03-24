<?php

namespace App\Http\Controllers;
use App\Sentence;
use App\Document;
use App\Document_Type;
use App\Sentence_types;
use Auth;
use Illuminate\Http\Request;

class InsertDocumentController extends Controller
{
    public function index()
    {
        $Document_Type = Document_Type::all()->pluck('name', 'id');
        return view('insertdocument')->with('Document_Type',$Document_Type);
    }
    public function create(){}

        public function store(Request $request){
            $rules = [
                'title' => 'required',
               
            ];

            // dd($request);

            $document = new Document();
            $document->title = $request->title;
            $document->users_id = Auth::user()->id;
            $document->Document_Type_id = $request->Document_Type_id;

            $document->save();

           
            return redirect()->route('insertdocument.index')->with('status', 'บันทึกข้อมูลสำเร็จ');


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
