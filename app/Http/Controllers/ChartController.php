<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\User;
use DB;
use App\Document;
use App\Document_Type;
use App\Sentence;
use App\Sentence_Type;


class ChartController extends Controller
{
    public function index()
    {
        $document = Document::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
                $chart = Charts::database($document, 'bar', 'highcharts')
                          ->title("Document Details")
                          ->elementLabel("Total Document")
                          ->dimensions(1000, 500)
                          ->responsive(true)
                          ->groupByMonth(date('Y'), true);
         
         
                $pie_chart = Charts::create('pie', 'highcharts')
                        ->title('Pie Chart Demo')
                        ->labels(['document 1', 'document 2', 'document 3'])
                        ->values([15,25,50])
                        ->dimensions(1000,500)
                        ->responsive(true);
        return view('charts',compact('chart' , 'pie_chart'));
		
    }
}
