@extends('layouts.mainlayouts')
@section('content')
<div class="title m-b-md">
        INSERT TEXT
</div>
<br>

<form action="" enctype="multipart/form-data" method="POST">
    <!--@csrf-->
    <div class="row">
        ชื่อเรื่อง
        <input type="text" class="form-control" placeholder="" name="title" required>
            <div class="row">
            <div class="col">
                    <button type="submit" class="btn btn-primary">
                            submit
                    </button>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        ประเภทข้อความ
            <input type="text" class="form-control" placeholder="" name="name" required>
            <div class="row">
                    <div class="col-1">
                            <button type="submit" class="btn btn-primary">
                                    submit
                            </button>
                    </div>
                </div>
        </div>
    <br>
    <div class="row">
        ประโยคข้อความ
    </div>
    <div class="row">
        <div class="col-11">
            <textarea class="form-control" ></textarea>
        </div>
        <div class="col-1">
            <button type="submit" class="btn btn-primary">
                submit
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        ข้อความที่ตัด
    </div>
    <div class="row">
            <div class="col-11">
                <textarea class="form-control" ></textarea>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary">
                    submit
                </button>
            </div>
        </div>
    <br>
</form>
@endsection