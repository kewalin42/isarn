@extends('layouts.mainlayouts')
@section('content')
<div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
              
            </div>
          @endif    
         <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              ข้อความ({{count($detail)}} รายการ) 
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="row">ลำดับ</th>
                      <th scope="col">ชื่อเอกสารภาษาอีสาน</th>
                      <th scope="col">ประเภทเอกสารภาษาอีสาน</th>
                      <th scope="col" style="width: 10%"></th>
                    </tr>
                  </thead>
                  <tbody>
                      {{-- {{-- @foreach($documents->reverse() as $item) ถ้าเริ่ม1ไม่มี reverse --}}
                    @foreach($detail as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><a href="{{route('documents.show',$item->title)}}">{{$item->title}}</a></td>
                            <td>{{$item->Document_Type->name}}</td>
                            <td>
                                <a href="{{route('details.show',$item->id)}}"class="btn btn-sm btn-outline-success"> 
                                    <i class="fa fa-edit"></i>รายละเอียด</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- การแบ่งหน้าสำหรับแต่งละหน้า -->
              {{-- <div class="card-footer py-3">
                <div class="row">
                  <div class="col"></div>
                    <div class="col-auto">
                        {{ $document->links()}}
                    </div>
                  </div>
                </div> --}}
              </div>
        </div>
      </div>
  </div>
</div>
@endsection


