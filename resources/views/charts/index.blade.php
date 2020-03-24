@extends('layouts.mainlayouts')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Charts In Laravel 5 Using Charts Package</div>
            <div class="panel-body">    
                <div class="row">
                    <div class="col-md-6"> 
                        {!! $chart->html() !!}
                    </div>
                    <br/><br/>
                    <div class="col-md-6"> 
                        {!! $pie_chart->html() !!}
                    </div>
                    <br/><br/>
                </div>
            </div>
    </div>
</div>
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    {!! $pie_chart->script() !!}
@endsection
