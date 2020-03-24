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
    <div id="layoutSidenav_content">
      <main>
          <div class="container-fluid">
              <h1 class="mt-4">ระบบคลังข้อความภาษาอีสาน</h1>
              <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active">Document</li>
              </ol>
               <button type="button" class="btn">ดาวโหลดไฟล์ตามประเภทเอกสาร :</button>
               <a href="{{route('document.export_pdf')}}" class="btn btn btn-danger">
                <i class="fa fa-file-pdf"></i> เอกสารทั้งหมด</a> 
              <a href="{{route('document.export_pdf1')}}" class="btn btn-info">
                <i class="fa fa-file-pdf"></i> ผญา</a>
              <a href="{{route('document.export_pdf2')}}" class="btn btn-secondary">
                <i class="fa fa-file-pdf"></i> กระทู้</a>
              <a href="{{route('document.export_pdf3')}}" class="btn btn-success">
                <i class="fa fa-file-pdf"></i> ข่าว</a>
              <a href="{{route('document.export_pdf4')}}" class="btn btn-info">
                <i class="fa fa-file-pdf"></i> บทสนทนา</a>
              <a href="{{route('document.export_pdf5')}}" class="btn btn-warning">
                <i class="fa fa-file-pdf"></i> นวนิยาย</a>
              <a href="{{route('document.export_pdf6')}}" class="btn btn-danger">
                <i class="fa fa-file-pdf"></i> บทความ</a>
              <a href="{{route('document.export_pdf7')}}" class="btn btn-dark">
                <i class="fa fa-file-pdf"></i> นิทาน</a><br><br>


            {{-- Chart --}}
              {{-- <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                        {!! $chart->html() !!}
                    </div>
                </div>
                 --}}
    

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        เอกสารภาษาอีสาน ({{count($document)}} รายการ)
        <div class="col text-right">
          <a href="{{route('document.export_pdf')}}" class="btn btn-info">
            <i class="fa fa-file-pdf"></i>PDF</a>   
          
          {{-- <a href="{{route('users.index')}}" class="btn btn-info">
            <i class="fa fa-user">User</a>    --}}

          <a href="{{route('documents.create')}}"class="btn btnsuccess btn btn-outline-primary">
            <i class="fa fa-plus"></i> เพิ่มประเภทเอกสาร</a>         
        </div> 
      </div>
    
      <div class="card-body">
        <div class="table-responsive">
          <div class="content table-responsive table-full-width">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="row">ลำดับ</th>
                <th scope="col">ชื่อเอกสารภาษาอีสาน</th>
                <th scope="col">ประเภทเอกสารภาษาอีสาน</th>
            @auth  <th scope="col">เครื่องมือ</th> @endauth 
              </tr>
            </thead>
          <tbody>
        {{-- {{-- @foreach($documents->reverse() as $item) ถ้าเริ่ม1ไม่มี reverse --}}
          @foreach($document as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td><a href="{{route('details.show',$item->id)}}">{{$item->title,$item->sentence_text,$item->segmented_text}}</a></td>
              <td>{{$item->Document_Type->name}}</td>
              <td> 
                @auth  
                 @if(Auth::user()->user_type != 0)
                  <form class="delete"  action="{{route('documents.destroy',$item->id)}}" method="POST">                                      
                  <input type="hidden" name="_method" value="DELETE">                                         
                  {{ csrf_field() }}                                   
                  <a href="{{route('documents.edit',$item->id)}}" class="btn btn-sm btn-outline-success"> <i class="fa fa-edit"></i>แก้ไข</a>  
                  @if(Auth::user()->user_type != 1)
                  <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i>ลบ</button>  
                  @endif
                  @endif
                  @if(Auth::user()->user_type == 3)
                    <a href="{{route('documents.show',$item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i>อนุมัติ</button> 
                  @endif                                    
                  </form>
                @endauth 
              </td>   
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
