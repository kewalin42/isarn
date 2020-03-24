@extends('layouts.mainlayouts')
 @section('content')   
<div class="container">  
    <div class="row mx-auto mt-5">         
		<div class="col-md-10 mx-auto">             
			<div class="card shadow">                 
				<div class="card-header mb-3">
                    <div class="panel-body">
                        @if (session('status'))
                             <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                         @endif                        
                        <div class="row align-items-center">                         
                            <div class="col md-3">                             
                            <h3 class="mb-4">แก้ไขประโยคภาษาอีสาน</h3>                         
                            </div>                     
                        </div>
                    </div>
                    {!!Form::model($sentence, ['url' => route('sentences.update',$sentence->id),'method' => 'put']) !!}
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            {{-- {!! Form::label('sentence_text', 'ประโยคภาษาอีสาน'); !!} --}}
                                            {!! Form::textarea('sentence_text', null,['class' => 'form-control '.($errors->has('sentence_text') ? 'is-invalid' : ''), ]); !!}
                                            {!! $errors->first('sentence_text', '<p class="text-red text-sm p-1">:message</p>') !!}
                                            {{-- {!! Form::textarea('sentence_text', null, ['class' => 'formcontrol']); !!} --}}
                                            {{-- <p>ประโยคภาษาอีสาน</p>
											<input type="sentence_text" class="form-control" placeholder="sentence_text" name="SentenceText" required> --}}
                                            {!! Form::textarea('segmented_text', null,['class' => 'form-control '.($errors->has('segmented_text') ? 'is-invalid' : ''), ]); !!}
                                            {!! $errors->first('segmented_text', '<p class="text-red text-sm p-1">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">                
                                <div class="form-label-group">
                                    <div class="form-group">
                                    {!! Form::label('Sentence_Types_id', 'ประเภทประโยค'); !!}
                                    {!! Form::select('Sentence_Types_id',$Sentence_Type,null,
                                    ['class' => 'form-control']); !!}
                                    </div>
                                </div>
                            </div> --}}
                        
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