<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sentence;
use App\Document;
use App\Document_Type;
use App\Sentence_types;
use Auth;

class DocumentController extends Controller
{
    //
    public function index()
    {
        $document = Document::paginate(10);
        return view('document.index')->with('document',$document);
    }
    public function create()
    {
        $document = DocumentType::all()->pluck('name', 'id');
        return view('document.create')->with('documenttype',$documenttype);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
           
            
        ];
        $request->validate($rules);
        
        $document = new Document();
        $document->title = $request->title;
        $document->users_id = Auth::user()->id;
        $document->Document_Type_id = $request->Document_Type_id;
        $document->save(); //save เพื่อให้มีค่า id เพื่อนำไปตั้งเป็นชื่อไฟล์รูปภาพ
        
        return redirect()->route('insertdocument.index')->with('status', 'บันทึกข้อมูลสำเร็จ');


    }
    
    public function show($id){}

    public function edit($id)
    {
        $document = Document::find($id);
        $documenttype = DocumentType::all()->pluck('name', 'id');
        return view('document.edit')->with('document',$document)->with('documenttype',$documenttype);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            
            
        ];

        $request->validate($rules);

        $document = Document::find($id);
        $document->update($request->all());

        $document->save();
        return redirect()->route('document.index')->with('status', 'แก้ไขข้อมูลสำเร็จ');

    }

    public function destroy($id)
        {
            Document::destroy(@id);
            return back();
        }
}
