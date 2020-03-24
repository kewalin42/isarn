<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Document;
use App\Sentence;
use App\DocumentType;
use App\SentenceType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ApprovalController extends Controller
{
    public function index()
    {
        
        $approvals = Sentence::all();
        // dd($approvals);
        return view('approval.index')->with('approvals', $approvals);
        // with('approval_sen'= ตัวแปรที่ประกาศใน index, $approvals = ค่าที่รับมาจากโมเดล );
    }

    public function store(Request $request)
    {
        //
        // ทำการบันทึกลงไปในดาต้าเบส
        $rules = [     
            'sentence_text' => 'required',
            'segmented_text' => 'required',
        ]; 

        $request->validate($rules);

        $approvals = new Sentence();
        $approvals->sentence_new = null;
        $approvals->segmented_new = null;
        $approvals->is_approved = 0;
        $approvals->approved_at = null;
        $approvals->user_id = Auth::user()->id;     
        $approvals->approver_id = Auth::user()->id; 
        $approvals->sentence_type_id = $request->sentence_type_id;
        $approvals->document_id = $request->docuemnt_id;
        $approvals->save(); //save 

        //redirect กลับไปยังหน้า index และส่งข้อมูลไป (ส่งข้อความผ่าน seesion โดยชื่อ status)
        return redirect()->route('approvals.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }
    
    public function show($id)
    {
        $approvals = Sentence::all();
        return view('approval.show')->with('approvals',$approvals);
    }

    public function edit($id)
    {
        //
        $approvals = Sentence::find($id);
        $approvals_sen_type = SentenceType::all()->pluck('name' , 'id');
        return view('approval.edit')->with('approvals',$approvals)->with('approvals_sen_type',$approvals_sen_type);
    }

    public function update(Request $request, $id)
    {
        //
        // แก้ไขข้อมูลด้วยกันอัพเดทข้อมูล
        $rules = [
            'sentence_text' => 'required|min:3',
            'segmented_text' => 'required|min:3',
        ];
        // เป็นการฟิกค่าไม่ให้ทำการแก่ไข
        // $request->validate($rules);

        $approvals = Sentence::find($id);
        // dd($approvals);
        $approvals->sentence_new = $request->sentence_new;
        $approvals->segmented_new = $request->segmented_new;
        $approvals->sentence_type_id = $request->sentence_type_id;
        $approvals->update($request->all());
        
        $approvals->save();

        return redirect()->route('approvals.index')->with('status', 'บันทึกข้อมูลสำเร็จ');
    }

    public function destroy($id)
    {
        //
        Sentence::destroy($id);
        return back();
    }

    public function approvalSentences($id) 
    {
        // dd(Auth::user()->id);
        $approvals = Sentence::find($id);

        if($approvals->is_approved == false)
        {
            $approvals->is_approved = true;
            $approvals->approver_id = Auth::user()->id;
            // $approvals->approver_id = Auth::user()->name;
            $approvals->save();
        }
        return view('approval.index')->with('approvals',$approvals);
    }
}
