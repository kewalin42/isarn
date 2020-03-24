@extends('layouts.mainlayouts')
@section('content')   
<div class="container"> 
@if(session('status'))
    <div class="row">
        <div class="col">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"></span>
            <span class="alert-inner--text"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
    </div>
 @endif 
<div class="row mx-auto mt-5">         
		<div class="col-md-10 mx-auto">             
			<div class="card shadow">                 
				<div class="card-header">                     
					<div class="row align-items-center">                         
						<div class="col">                             
						    <h3 class="mb-2">เพิ่มประโยคภาษาอีสาน</h3>                         
						</div>                     
					</div>                 
                </div> 
                
                 <div class="card-body">
                    <form action="{{route('sentences.store')}}" method="POST">
                       {{ csrf_field() }} 
                       <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('Sentence_Types_id', 'ประเภทประโยค'); !!}
                                {!! Form::select('Sentence_Types_id', $Sentence_Types,null,
                                ['class' => 'form-control']); !!}
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                        <h5>ประโยคภาษาอีสาน</h5>
                                        <textarea name="sentence_text" type="text" id="sentence_text" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-block" id="btn-segment" >ตัดคำ</button>
                                    <span id="result"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                     <div class="form-label-group">
                                        <h5>ประโยคตัดคำภาษาอีสาน</h5>
                                        <textarea  name="segmented_text" type="text" id="segmented_text" class="form-control"></textarea>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row"> 
                            <div class="col-md-4">
                                <button type="input" class="btn btn-primary btn-block" >บันทึก</button>
                                
                            </div>
                        </div> 
                        </div>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>      
</div>    
@endsection 

@section('script')
    <script type="text/javascript" src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
   <script>
   //    function test(text){
        $(document).ready(function() { 
            $("#btn-segment").click(function(event) { 
                // ประกาศค่า sentence_text แล้วทำการประกาศ alert
                var sentence_text = $('#sentence_text').val();
               // alert(sentence_text);

                $.get( 
                "http://202.28.94.90/nlsp_tool/wordseg_tool/segment.php", { 
                    // หาวิธีเอาตัวแปรมาใส่
                    input: sentence_text 
                }, 
                function(data) {
                    console.log(data);
                    //$('#result').html(data.output);
                   $('#segmented_text').val(data.output);
                   
                },"json"); 
            }); 
        });     
   //}
    </script>
@endsection

