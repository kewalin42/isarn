<?php

namespace App\Http\Controllers;
use App\DocumentType;
use App\Document;

use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    //
    // public function index()
    // {
        
    //     return view('document_type.index');
    // }
    public function create(){
        $documenttype = DocumentType::all();
        return view('documenttype.create')->with('documenttype',$documenttype);
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
            
        ];

        $request->validate($rules);

      
        $documenttype = new DocumentType();
        $documenttype->name = $request->name;
      
        $producttype->save(); 
        
        return redirect()->route('documenttype.index')->with('status', 'บันทึกข้อมูลสำเร็จ');

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
