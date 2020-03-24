<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentencewordController extends Controller
{
    //
    public function index()
    {
        $sentence_word = Sentence_word::paginate(10);
        return view('sentence_word.index')->with('sentence_word',$sentence_word);
    }
    public function create(){}

    public function store(Request $request){}
    
    public function show($id){}

    public function edit($id){}

    public function update(Request $request, $id){}

    public function destroy($id)
        {
            DocumentType::destroy(@id);
            return back();
        }
}
