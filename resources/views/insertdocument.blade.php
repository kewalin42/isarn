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
                            เอกสาร
                    </div>
                    <br>

                    <form action="{{ route('insertdocument.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            ชื่อเอกสาร
                            <input type="text" class="form-control" placeholder="Title" name="title" required>
                            {{-- <input type="hidden" class="form-control" placeholder="" name="๊Users_id" required>
                            <input type="hidden" class="form-control" placeholder="" name="Document_Type_id" required> --}}
                        </div>
                        <br>
                        {{-- ประเภทเอกสาร<br><br> --}}
                        <div class="row">
                          <div class="form-group">
                            {!! Form::label('Document_Type_id', 'ประเภทเอกสาร'); !!}
                            {!! Form::select('Document_Type_id', $Document_Type,null,
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
                        
                </div>
            </div>
        </div>
    </div>
</div>


@endsection