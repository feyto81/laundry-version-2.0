<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Request;
use PDF;
use DB;
use App;

class ReportController extends Controller
{
    public function day()
    {
        $data = DB::table('transaction')
            ->get();
        return view('admin.report.day.index', compact('data'));
    }

    public function day_search()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $query = DB::table('transaction')->whereBetween('date', [$date1, $date2])
            ->orderBy('invoice_code', 'desc')
            ->get();

        $data['data']   =   $query;

        return view('admin.report.day.index', $data);
    }

    public function day_pdf()
    {
        $date1 = Request::get('date1');
        $date2 = Request::get('date2');
        $query = DB::table('transaction')
            ->join('member', 'transaction.member_id', '=', 'member.id')
            ->whereBetween('date', [$date1, $date2])
            ->select('transaction.*', 'member.name as member_name')
            ->orderBy('invoice_code', 'asc')
            ->get();

        $data['data']   =   $query;
        $view = view('admin.report.day.print_data', $data)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Report Day Sale.pdf');
    }

    public function month()
    {
        $data = DB::table('transaction')
            ->get();
        return view('admin.report.month.index', compact('data'));
    }

    public function month_search()
    {

        $query = DB::table('transaction')->whereMonth('date', Request::get('bulan'))
            ->orderBy('invoice_code', 'desc')
            ->get();

        $data['data']   =   $query;
        return view('admin.report.month.index', $data);
    }
}
