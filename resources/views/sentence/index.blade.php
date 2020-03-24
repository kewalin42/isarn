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
                  <li class="breadcrumb-item active">Sentence</li>
              </ol>

              <button type="button" class="btn">ดาวโหลดไฟล์ตามประเภทประโยค :</button>
              <a href="{{route('sentence.export_pdf')}}" class="btn btn btn-danger">
               <i class="fa fa-file-pdf"></i> ประโยคทั้งหมด</a> 
             <a href="{{route('sentence.export_pdf1')}}" class="btn btn-info">
               <i class="fa fa-file-pdf"></i> บอกเล่า</a>
             <a href="{{route('sentence.export_pdf2')}}" class="btn btn-secondary">
               <i class="fa fa-file-pdf"></i> คำถาม</a>
             <a href="{{route('sentence.export_pdf3')}}" class="btn btn-success">
               <i class="fa fa-file-pdf"></i> ปฏิเสธ</a>
             <a href="{{route('sentence.export_pdf4')}}" class="btn btn-info">
               <i class="fa fa-file-pdf"></i> ขอร้อง</a>
             <a href="{{route('sentence.export_pdf5')}}" class="btn btn-warning">
               <i class="fa fa-file-pdf"></i> คำสั่ง</a>
             <a href="{{route('sentence.export_pdf6')}}" class="btn btn-danger">
               <i class="fa fa-file-pdf"></i> ชักชวน</a>
             <a href="{{route('sentence.export_pdf7')}}" class="btn btn-dark">
               <i class="fa fa-file-pdf"></i> อุทาน</a><br><br>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
          ประโยคภาษาอีสาน ({{count($sentences)}} รายการ)
        <div class="col text-right">
          <a href="{{route('sentence.export_pdf')}}" class="btn btn-info">
            <i class="fa fa-file-pdf"></i>ส่งข้อมูลออก</a>             
          <a href="{{route('sentences.create')}}"class="btn btnsuccess btn btn-outline-primary">
            <i class="fa fa-plus"></i> เพิ่มประโยค</a>         
          </div> 
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="content table-responsive table-full-width">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="row">ลำดับ</th>
                        <th scope="col">หมวดหมู่</th>
                        <th scope="col">ประโยคภาษาอีสาน</th>
                        <th scope="col">ประโยคตัดคำภาษาอีสาน</th>
                         @auth <th scope="col">เครื่องมือ</th> @endauth 
                    </tr>
                </thead>
                <tbody>
                  @foreach($sentences as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->Sentence_Type->name}}</td>
                            <td>{{$item->sentence_text}}</td>
                            <td>{{$item->segmented_text}}</td>
                            
                            <td>
                              @auth
                              @if(Auth::user()->user_type != 0)
                                <form class="delete"  action="{{route('sentences.destroy',$item->id)}}" method="POST">                                      
                                    <input type="hidden" name="_method" value="DELETE">                                         
                                    {{ csrf_field() }}                                   
                                    <a href="{{route('sentences.edit',$item->id)}}" class="btn btn-sm btn-outline-success"> <i class="fa fa-edit"></i>แก้ไข</a>  
                                    @if(Auth::user()->user_type != 1)
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i>ลบ</button>                                     
                                    @endif
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
                        {{ $sentence->links()}}
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
    $('#dataTable').DataTable();
    } );
</script>

@section('script')
    <script>
      $(".delete").on("submit", function(){
        return confirm("คุณต้องการลบข้อมูลใช่หรือไม่ ?");
      });
    </script>
@endsection 