<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>     
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>     
        <style type="text/css">         
        @page {             
                header: page-header; 
                footer: page-footer;         
        }
        /* @font-face {
            font-family: 'Garuda'; 
            src: url({{ storage_path('fonts/Garuda.ttf') }}) format('truetype');
            font-weight: 400; /
            font-style: normal; 
         }             */
        body{             
            font-family: Garuda;         
        }          
        table, td, th {             
            border: 1px solid #ddd;              
            text-align: left;          
        } 
        table {             
            border-collapse: collapse;             
            width: 100%;         
        } 
        th, td {             
            padding: 6px;         
            }   
        /* @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }   */
        </style> 
    </head> 
    <body> 
        <h2 style="text-align: center">เอกสารทั้งหมด</h2> 
        <div id="app">     
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">         
                <thead>         
                    <tr>             
                        <th scope="row" >ลำดับ</th>
                        <th scope="col">ประเภทเอกสารภาษาอีสาน</th>             
                        <th scope="col">ชื่อเอกสารภาษาอีสาน</th>             
                        {{-- <th scope="col">ประโยคภาษาอีสาน</th>
                        <th scope="col">ประโยคตัดคำภาษาอีสาน</th> --}}
                    </tr>         
                </thead>         
            <tbody>                 
                    @foreach($document  as $documents)                 
                        <tr> 
                            @if($documents->Document_Type_id === 2)                    
                            <td>{{$documents->id}}</td>
                            {{-- @if($documents->Document_Type_id === 2) --}}
                            <td>{{$documents->Document_Type->name}}</td> 
                                                    
                            <td>{{$documents->title}}</td>
                            @endif
                            {{-- <td>{{$documents->sentence}}</td>
                            <td>{{$documents->segment}}</td> --}}
                            {{-- <td>  
                                @foreach($sentence as $sentenced)
                                {{$sentenced}}
                              @endforeach
                            </td>
                            <td>
                                @foreach ($segment as $segmented)
                                {{$segmented}} 
                                @endforeach
                            </td>                      --}}
                                                             
                        </tr>                 
                    @endforeach 
            </tbody>     
            </table> 
        </div> 

        <html pageheader name="page-header">     
            <div>สรปุรายการเอกสารภาษาอีสานทั้งหมด ({{date('d/m/Y H:i:s')}})</div> 
        </html pageheader> 
        <html pagefooter name="page-footer">     
            <div style="text-align: right"> หน้า {PAGENO}</div> 
        </html pagefooter> 
    </body> 
</html>