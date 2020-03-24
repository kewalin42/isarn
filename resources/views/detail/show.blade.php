@extends('layouts.mainlayouts')

@section('content')
<div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
          ข้อความ({{count($user)}} รายการ)
      </div>
      
<div id="content-wrapper">
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
          @foreach($detail as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td><{{ Auth::user()->name}}</td>
              <td>{{ Auth::user()->email}}</td>
              <td></td>   
            </tr>
          @endforeach
          </tbody>
          </table>
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
</div>
</div>
</div>



@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>




<!--หน้าต่าง pop up ยืนยันก่อนลบ -->
@section('script')
    <script>
        $(".delete").on("submit", function () {
            return confirm("คุณต้องการลบข้อมูลใช่หรือไม่ ?");
        });
    </script>
@endsection

