@extends('layouts.mainlayouts')

@section('content')
<div id="content-wrapper">

        <div class="container-fluid">
  
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
  
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              ข้อความ({{count($document)}} รายการ)
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ลำดับประโยค</th>
                      <th>ข้อความภาษาอีสาน</th>
                      <th>หมวดหมู่</th>
                      <th>เครื่องมือ</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($document as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->documentType->name}}</td>
                            <td><a href="{{route('document.edit',$item->id)}}"class="btn btn-sm btn-outline-gray"> 
                                <i class="fa fa-edit"></i> แก้ไข</a>
                              </td>
                            </td>
                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer py-3">
                <div class="row">
                  <div class="col"></div>
                  <div class="col-auto">
                    {{ $document->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
@endsection