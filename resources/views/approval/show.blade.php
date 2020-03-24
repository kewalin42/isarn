@extends('layouts.mainlayouts')

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
                ประโยคที่ได้รับการอนุมัติ ({{count($approvals)}} รายการ)
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
                    </tr>
                  </thead>
                    @foreach($approvals as $approval)
                    <tbody>
                        <tr>
                            <td>{{$approval->id}}</td>
                            <td>{{$approval->sentence_new}}</td>
                            <td>{{$approval->segmented_new}}</td>
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

