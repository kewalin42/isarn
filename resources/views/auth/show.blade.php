@extends('layouts.mainlayouts')

@section('content')

<div id="content-wrapper">
  <div class="container-fluid">
    <!-- DataTables Example -->
    <div class="card mb-3">
      {{-- <div class="card-header">
        <i class="fas fa-table"></i>
        ข้อความ({{count($user)}} รายการ)
        <div class="col text-right">  
        </div> 
      </div> --}}
    <div class="card-body">
        <div class="table-responsive">
          <div class="content table-responsive table-full-width">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="row">ลำดับ</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">อีเมล์</th>
                {{-- <th scope="col">เครื่องมือ</th> --}}
              </tr>
            </thead>
          <tbody>
            <tr>
              <td>{{Auth::user()->id}}</td>
              <td>{{Auth::user()->name}}</td>
              <td>{{Auth::user()->email}}</td>
              {{-- <td></td>       --}}
            </tr>
          
          </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
</div>
</div>
@endsection
<!--หน้าต่าง pop up ยืนยันก่อนลบ -->
@section('script')
    <script>
        $(".delete").on("submit", function () {
            return confirm("คุณต้องการลบข้อมูลใช่หรือไม่ ?");
        });
    </script>
@endsection
