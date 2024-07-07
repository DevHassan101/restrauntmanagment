<?php

namespace App\Http\Controllers;

use App\Models\DineinOrder;
use Illuminate\Http\Request;
use App\Exports\SummaryExport;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.pages.reports');
    }

    public function summary()
    {
        return view('admin.pages.summaryreport');
    }
    public function getsummary(Request $request)
    {

        $startdate = $request->startdate;
        $enddate = $request->enddate;
        if ($enddate === null || $enddate == '') {
            $enddate = Carbon::now();
        }

        $summary = DB::table('dinein_orders')
            ->selectRaw('DATE(created_at) AS order_date, COUNT(*) AS total_orders, SUM(total) AS total_amount, SUM(CASE WHEN payment_type = "cash" THEN total ELSE 0 END) AS total_cash_amount, SUM(CASE WHEN payment_type = "card" THEN total ELSE 0 END) AS total_card_amount')
            ->whereBetween(DB::raw('DATE(created_at)'), [$startdate, $enddate])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();



        // $startdate = $request->startdate;
        // $enddate = $request->enddate;
        // if ($enddate === null || $enddate == '') {
        //     $totalorders = DineinOrder::where('created_at', '>', $startdate)->count();
        //     $totalamount = DineinOrder::where('created_at', '>', $startdate)->sum('total');
        //     $totalcashamount = DineinOrder::where('created_at', '>', $startdate)->where('payment_type', '=', 'cash')->sum('total');
        //     $totalcardamount = DineinOrder::where('created_at', '>', $startdate)->where('payment_type', '=', 'card')->sum('total');
        // } else {
        //     $totalorders = DineinOrder::where('created_at', '>', $startdate)->where('created_at', '<', $enddate)->count();
        //     $totalamount = DineinOrder::where('created_at', '>', $startdate)->where('created_at', '<', $enddate)->sum('total');
        //     $totalcashamount = DineinOrder::where('created_at', '>', $startdate)->where('created_at', '<', $enddate)->where('payment_type', '=', 'cash')->sum('total');
        //     $totalcardamount = DineinOrder::where('created_at', '>', $startdate)->where('created_at', '<', $enddate)->where('payment_type', '=', 'card')->sum('total');
        // }
        // $orders = DineinOrder::where('created_at', '>', $startdate)->get();

        // $summary = [
        //     'totalorders' => $totalorders,
        //     'totalamount' => $totalamount,
        //     'totalcashamount' => $totalcashamount,
        //     'totalcardamount' => $totalcardamount
        // ];

        return response()->json($summary);
    }

    public function PrintSummary(Request $request)
    {

        $totalorders = DineinOrder::count();
        $totalamount = DineinOrder::sum('total');
        $totalcashamount = DineinOrder::where('payment_type', '=', 'cash')->sum('total');
        $totalcardamount = DineinOrder::where('payment_type', '=', 'card')->sum('total');
        $date = $request->date;

        return view('admin.pages.printwork.summaryreport', compact('totalorders', 'totalamount', 'totalcashamount', 'totalcardamount', 'date'));
    }

    public function ExportSummary(Request $request)
    {
        $totalorders = DineinOrder::count();
        $totalamount = DineinOrder::sum('total');
        $totalcashamount = DineinOrder::where('payment_type', '=', 'cash')->sum('total');
        $totalcardamount = DineinOrder::where('payment_type', '=', 'card')->sum('total');

        return Excel::download(new SummaryExport($totalorders, $totalamount, $totalcashamount, $totalcardamount), 'summary.xlsx');
    }

    public function Detail()
    {
        return view('admin.pages.detailreport');
    }
    public function GetDetail(Request $request)
    {
        $orders = DineinOrder::join('tables', 'tables.id', '=', 'dinein_orders.table_id')->select('dinein_orders.*', 'tables.table')->get();
        return response()->json($orders);
    }

    public function PrintDetail(Request $request)
    {
        $date = $request->date;
        $orders = DineinOrder::join('tables', 'tables.id', '=', 'dinein_orders.table_id')->select('dinein_orders.*', 'tables.table')->get();
        return view('admin.pages.printwork.detailreport', compact('orders', 'date'));
    }
}
