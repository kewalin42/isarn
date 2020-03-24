@extends('layouts.mainlayouts')

@section('content')   
<div class="container">         
        <div class="row mx-auto mt-5">         
            <div class="col-md-10 mx-auto">             
                <div class="card shadow">                 
                    <div class="card-header"> 
                            <div class="panel-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif                           
                        <div class="row align-items-center">                         
                            <div class="col">                             
                                <h3 class="mb-0">แก้ไขชื่อเอกสารภาษาอีสาน</h3>                         
                            </div>                     
                        </div>                              
                        {!! Form::model($document, ['url' => route('documents.update',$document->id),'method' => 'put']) !!}
                            <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                        {{-- <div class="form-group"> --}}
                                            {{-- {!! Form::label('title', 'ชื่อเอกสาร'); !!} --}}
                                            {!! Form::textarea('title', null,['class' => 'form-control '.($errors->has('title') ? 'is-invalid' : ''), ]); !!}
                                            {!! $errors->first('title', '<p class="text-red text-sm p-1">:message</p>') !!}
                                        {{-- </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">   
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('Document_Type_id', 'ประเภทเอกสาร'); !!}
                                            {!! Form::select('Document_Type_id', $Document_Type,null,
                                            ['class' => 'form-control']); !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>     
@endsection 