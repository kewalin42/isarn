@extends('layouts.mainlayouts')

@section('content')     
<div id="content-wrapper">
   
            <div class="container-fluid">
                @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                  
                </div>
              @endif 
              <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">ระบบคลังข้อความภาษาอีสาน</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                ผู้ใช้ ({{count($user)}} รายการ)
                            </div>
                        </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th scope="row">ลำดับ</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">อีเมล</th>
                                <th scope="col">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $key => $data)
                                <tr>
                                 <td>{{$data->id}}</td>
                                 <td>{{$data->name}}</td>
                                 <td>{{$data->email}}</td>
                                 <td>
                                    <form class="btn btn-primary"  action="{{route('users.index')}}" method="POST">                                      
                                        {{-- <input type="hidden" name="_method" value="DELETE">                                          --}}
                                        {{ csrf_field() }}                                   
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> รออนุมัติบัญชีผู้ใช้งาน</button>  
                                    </form>
                                    {!! Form::model($user, ['url' => route('users.update',$data->id),'method' => 'put']) !!}
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> อนุมัติบัญชีผู้ใช้งาน</button>
                                    
                                 </td>   
                                 </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


@endsection
<!--หน้าต่าง pop up ยืนยันก่อนลบ -->
@section('script')
    <script>
        $(".delete").on("submit", function () {
            return confirm("คุณต้องการลบข้อมูลใช่หรือไม่ ?");
        });
    </script>
@endsection

