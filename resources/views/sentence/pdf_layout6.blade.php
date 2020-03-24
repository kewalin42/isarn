<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>     
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>     
        <style type="text/css">         
        @page {             
                header: page-header; 
                footer: page-footer;         
        }
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
        </style> 
    </head> 
    <body> 
        <h2 style="text-align: center">ประโยคภาษาอีสานทั้งหมด</h2> 
        <div id="app">     
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">         
                <thead>         
                    <tr>             
                        <th scope="row" >ลำดับ</th>
                        <th scope="col">หมวดหมู่</th>                        
                        <th scope="col">ประโยคภาษาอีสาน</th>
                        <th scope="col">ประโยคตัดคำภาษาอีสาน</th>
                    </tr>         
                </thead>         
            <tbody>                 
                    @foreach($sentence as $sentences)                 
                        <tr>  
                            @if($sentences->Sentence_Types_id === 6)                   
                            <td>{{$sentences->id}}</td>
                            <td>{{$sentences->Sentence_Type->name}}</td>
                            <td>{{$sentences->sentence_text}}</td>
                            <td>{{$sentences->segmented_text}}</td>
                            @endif                               
                        </tr>                 
                    @endforeach 
            </tbody>     
            </table> 
        </div> 

        <html pageheader name="page-header">     
            <div>สรปุรายการประโยคภาษาอีสานทั้งหมด ({{date('d/m/Y H:i:s')}})</div> 
        </html pageheader> 
        <html pagefooter name="page-footer">     
            <div style="text-align: right"> หน้า {PAGENO}</div> 
        </html pagefooter> 
    </body> 
</html>