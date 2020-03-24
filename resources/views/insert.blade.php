@extends('layouts.mainlayouts')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="title m-b-md">
                            ข้อความ
                    </div>
                    <br>

                    <form action="{{ route('insert.store') }}" method="POST">
                        {{ csrf_field() }}
                    
                        <div class="row">
                        ประโยคข้อความ
                        </div>
                        <div class="row">
                            <div class="col-11">
                                {{-- <input type="hidden" class="form-control" placeholder="" name="๊id" required> --}}
                                <textarea class="form-control" name="sentence_text" ></textarea>
                            </div>
                        </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                  {!! Form::label('Sentence_Types_id', 'ประเภทประโยค'); !!}
                                  {!! Form::select('Sentence_Types_id',$Sentence_Types,null,
                                  ['class' => 'form-control']); !!}
                                </div>
                            </div>
                       
                        <br>
                        <div class="row">
                            <div class="col-1">
                                <button type="submit" class="btn btn-primary">
                                    submit
                                </button>
                            </div>
                        </div>
                        <br>
                    </form> 
                    {{-- <form action="{{ route('insert.store') }}" method="POST">
                        <br>
                        <div class="row">
                            ข้อความที่ตัด
                        </div>
                        <div class="row">
                                <div class="col-11">
                                    <textarea class="form-control" ></textarea>
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                </div>
                            </div>
                    </form>
                    <form action="{{ route('insert.store') }}" method="POST">
                        <br>
                        <div class="row">
                            ข้อความที่แก้ไข
                        </div>
                        <div class="row">
                            <div class="col-11">
                                <textarea class="form-control" ></textarea>
                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                        <br>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection