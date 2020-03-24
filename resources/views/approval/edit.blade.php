@extends('layouts.mainlayouts')

@section('content')     
<div class="container">         
    <div class="row mx-auto mt-5">         
        <div class="col-md-10 mx-auto">             
            <div class="card shadow">                 
                <div class="card-header">                     
                    <div class="row align-items-center">                         
                        <div class="col">                             
                            <h3 class="mb-0">แก้ไขประโยคภาษาอีสาน</h3>                         
                        </div>                     
                    </div>                 
                </div>              
                <div class="card-body">
                    {!!Form::model($approvals, ['url' => route('approvals.update', $approvals->id),'method' => 'put']) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-label-group">
                                            <p>ประโยคภาษาอีสาน</p>
                                            <input name="sentence_new" value="{{$approvals->sentence_text}}" type="text" id="sentence_new" class="form-control" required="required" autofocus="autofocus">
                                            {{-- {{dd($approvals)}} --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-label-group">
                                            <p>ตัดประโยคภาษาอีสาน</p>
                                            <input name="segmented_new" value="{{$approvals->segmented_text}}" type="text" id="segmented_new" class="form-control" required="required" autofocus="autofocus">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('sentence_type_id', 'ประเภทประโยคภาษาอีสาน'); !!}
                                        {!! Form::select('sentence_type_id', $approvals_sen_type,null,
                                        ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                </div>
            </div>        
        </div>     
    </div> 
</div>
@endsection 
