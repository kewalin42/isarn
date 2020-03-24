@extends('layouts.mainlayouts')

@section('content')     
<div id="content-wrapper">
    <div class="card mb-3">
        <div class="card-header">
            <div class="container-fluid">
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
                                    {{-- <form class="delete"  action="{{route('user.destroy',$data->id)}}" method="POST">                                      
                                        <input type="hidden" name="_method" value="DELETE">                                         
                                        {{ csrf_field() }}                                   
                                        <a href="{{route('documents.edit',$data->id)}}" class="btn btn-sm btn-outline-success"> <i class="fa fa-edit"></i>แก้ไข</a>  
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i>ลบ</button>  
                                    </form> --}}
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
{{-- @section('script')
    <script>
        $(".delete").on("submit", function () {
            return confirm("คุณต้องการลบข้อมูลใช่หรือไม่ ?");
        });
    </script>
@endsection --}}

