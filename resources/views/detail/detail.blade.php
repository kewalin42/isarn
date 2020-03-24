@extends('layouts.mainlayouts')
@section('content')
<div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                   
                </div>
            @endif   
          <!-- DataTables Example -->
          @auth
          <div class="card mb-3">
            <div class="card-header">
              <div class="col text-right">
                {{-- <a href="{{route('detail.export_pdf')}}" class="btn btn-info">
                  <i class="fa fa-file-pdf"></i>ส่งข้อมูลออก</a>      --}}
                  {{-- @if (session('sentence_text'))
                  <div class="alert alert-success">
                    {{ session('sentence_text') }} --}}
                   
                {{-- @if(!empty($sentences->sentence_text))
               
                @endif --}}
                
                @forelse($sentence as $sentences)
                {{-- {{$sentences->sentence_text}} --}}
                @empty
                <a href="{{route('sentences.create')}}"class="btn btnsuccess btn btn-outline-primary">
                  <i class="fa fa-plus"></i> เพิ่มประโยคภาษาอีสาน</a>  
                @endforelse
              </div>
            </div>
          </div>
          @endauth
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <tbody>
                      {{-- {{-- @foreach($documents->reverse() as $item) ถ้าเริ่ม1ไม่มี reverse --}}
                    @foreach($detail as $item)
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <td>{{$item->id}}</td>
                        </tr>
                        <tr>
                            <th scope="col">ชื่อเอกสารภาษาอีสาน</th>
                            <td>{{$item->title}}</td>
                        </tr>
                        <tr>
                            <th scope="col">ประเภทเอกสารภาษาอีสาน</th>
                            <td>{{$item->Document_Type->name}}</td>
                        </tr>
                        <tr>
                          @auth
                            <th scope="col">ประโยคภาษาอีสาน</th>
                            <td>
                              @foreach($sentence as $sentences)
                              {{$sentences->sentence_text}}
                              @endforeach
                            </td>
                            @endauth
                        </tr>
                          <tr>
                            @auth
                                <th scope="col">ประโยคตัดคำภาษาอีสาน</th>
                                  <td>
                                    @foreach($sentence as $sentences)
                                  {{$sentences->segmented_text}}
                                  @endforeach
                                  </td>
                            @endauth
                            </tr>
                           @auth
                            <tr>
                                <th scope="col">คนแก้ไขล่าสุด</th>
                               {{-- @if($item->Users_id) --}}
                                <td>{{$item->Users_id}}</td>
                               {{-- @endif --}}
                                {{-- <td>{{Document::Users_id()->name}}</td> --}}
                            </tr>
                            @endauth  
                          
                    @endforeach
                  </tbody>
                </table>
              </div>
              </div>
        </div>
      </div>
  </div>
</div>
@endsection

