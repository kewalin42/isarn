@extends('layouts.mainlayouts')

@section('content')   
<div class="container">         
        <div class="row mx-auto mt-5">         
            <div class="col-md-10 mx-auto">             
                <div class="card shadow">                 
                    <div class="card-header"> 
                            <div class="panel-body">
                                                             
                                                     
                        {!! Form::model($user, ['url' => route('users.update',$user->id),'method' => 'put']) !!}
                            <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                       
                                            {!! Form::text('status', null,['class' => 'form-control '.($errors->has('status') ? 'is-invalid' : ''), ]); !!}
                                            {!! $errors->first('status', '<p class="text-red text-sm p-1">:message</p>') !!}
                                       
                                            </div>
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