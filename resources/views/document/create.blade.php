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
						<div class="col">                             
						    <h3 class="mb-4">เพิ่มชื่อเอกสาร</h3>                         
						</div>                     
					</div>                 
                </div> 
                @if($errors->any())
                    <div clss="alert alert-danger m-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['url' => route('documents.store'),'file'=>true]) !!}  
                <div class="form-group">                
                    <div class="form-label-group">
                        <div class="form-group">
                            {!! Form::label('Document_Type_id', 'ประเภทเอกสาร'); !!}
                            {!! Form::select('Document_Type_id', $Document_Type,null,['class' => 'form-control']); !!}
                        </div>
                    </div>
                </div>        
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								<div class="form-label-group ">
                                    {{-- {!! Form::label('title', 'ชื่อเอกสาร'); !!} --}}
                                    {{-- {!! Form::textarea('title', null, ['class' => 'formcontrol']); !!} --}}
                                    {!! Form::textarea('title', null,['class' => 'form-control '.($errors->has('title') ? 'is-invalid' : ''), ]); !!}
                                    {!! $errors->first('title', '<p class="text-red text-sm p-1">:message</p>') !!}
											{{-- <p>ประโยคภาษาอีสาน</p>
											<input type="text" class="form-control" placeholder="Title" name="title" required> --}}
								</div>
							</div>
						</div>
                    </div>
                    {{-- <div class="form-group">                
                        <div class="form-label-group">
                            <div class="form-group">
                                {!! Form::label('Document_Type_id', 'ประเภทเอกสาร'); !!}
                                {!! Form::select('Document_Type_id', $Document_Type,null,['class' => 'form-control']); !!}
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-2"> --}}
                         {{-- <a class="btn btn-link" href="{{ route('sentences.create') }}">
                            บันทึก
                        </a>  --}}
                        {{-- <a href="{{route('sentences.create')}}"></a> --}}
                        {{-- <a href="{{route('sentences.create')}}" button type="submit" class="btn btn-primary">บันทึก</button></a> --}}
                            
                    {{-- </div>  --}}
                    {{-- <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>  --}}
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div> 
                    </div>
					</div>
				</div>    
			</div>         
		</div>    
	</div> 
</div> 	
@endsection 