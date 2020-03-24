@extends('layouts.mainlayouts')
@section('content')

<div id="content-wrapper">
  <div class="container-fluid">
    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        ข้อความ({{count($document)}} รายการ)
        <div class="col text-right">  
          {{-- <a href="{{route('document.export_pdf')}}" class="btn btn-info">
            <i class="fa fa-file-pdf"></i>ส่งข้อมูลออก</a>         --}}
        </div> 
      </div>
    <div class="card-body">
        <div class="table-responsive">
          <div class="content table-responsive table-full-width">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="row">ลำดับ</th>
                <th scope="col">ประเภทเอกสารภาษาอีสาน</th>
                <th scope="col">ชื่อเอกสารภาษาอีสาน</th>
                <th scope="col">ประโยคภาษาอีสาน</th>
                <th scope="col">ประโยคตัดคำภาษาอีสาน</th>
                <th scope="col">เครื่องมือ</th>
              </tr>
            </thead>
          <tbody>
          @foreach($document as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->Document_Type->name}}</td>
              <td>{{$item->title}}</td>
              {{-- {{ route('documents.show_detail',$item->id) }} --}}
              <td>
                @if($sentence == $item->id)
                @foreach($sentence  as $sentences)
              
                 {{$sentences->sentence_text}}
                 
                @endforeach
                @endif
              </td>
              <td>
                @if($sentence == $item->id)
                @foreach($sentence  as $sentences)
               
               {{$sentences->segmented_text}}
               
                @endforeach
                @endif
              </td>
              <td>
                <form>
                  {{-- <form class="delete"  action="{{route('sentences.destroy',$item->id)}}" method="POST">                                      
                    <input type="hidden" name="_method" value="DELETE">                                         
                    {{ csrf_field() }}                                   
                    <a href="{{route('sentences.edit',$item->id)}}" class="btn btn-sm btn-outline-success"> <i class="fa fa-edit"></i>แก้ไข</a>  
                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i>ลบ</button>                                     
                </form> --}}
                <a href="{{route('sentence.export_pdf')}}" class="btn btn-info">
                  <i class="fa fa-file-pdf"></i>ส่งข้อมูลออก</a>  
                </form>
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
