@extends('layouts.mainlayouts')
@include('sweetalert::alert')

@section('content')
<div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{route('documents.index')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
  
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                {{-- ประโยคที่อนุมัติ({{count($approvals)}} รายการ) --}}
              <div class="col text-right"></div> 
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ประโยคภาษาอีสาน</th>
                        <th scope="col">ประโยคภาษาอีสานที่ตัด</th>
                        <th scope="col">คนนำเข้า</th>
                        {{-- <th scope="col">ผู้อนุมัติ</th> --}}
                        <th scope="col">เครื่องมือ</th> 
                    </tr>
                  </thead>
                    @foreach($approvals as $approval)
                    <tbody>
                        <tr>
                            <td>{{$approval->id}}</td>
                            <td>{{$approval->sentence_text}}</td>
                            <td>{{$approval->segmented_text}}</td>
                            <td>{{$approval->user->name}}</td>
                            {{-- <td>{{$approver_name}}</td> --}}
        
                            <td>
                              <form method="POST" class="approval" action="{{route('approvals.approvalSentences',$approval->id)}}">
                              <a href="{{route('approvals.edit',$approval->id)}}" class="btn btn-sm btn-outline-success"> <i class="fa fa-edit"></i>แก้ไข</a>
                                @if($approval->is_approved == false)
                                    @csrf
                                      @method('put')
                                      <button type="submit" class="btn btn-primary waves-effect pull-right">
                                        <span>รออนุมัติ</span>
                                      </button>
                                @else
                                    <button type="submit" class="btn btn-success pull-right" disabled>
                                        <span>ได้รับการอนุมัติ</span>
                                    </button>
                                @endif
                             </form>
                          </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
              </div>
            </div>
        </div>
      </div>
</div>
@endsection

@section('script')
    <script>
        $(".approval").on("submit", function () {
            return confirm("คุณต้องการอนุมัติประโยคหรือไม่ ?");
        });
    </script>
@endsection
