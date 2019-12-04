<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    public function index()
    {
        $order_details = $this->get_order_data();
        return view('Frontend.dynamic_pdf')
            ->with('order_details', $order_details);
    }

    private function get_order_data()
    {
        $order_details = DB::table('orders')
            ->limit(10)->get();

        return $order_details;
    }

    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_order_to_html());
        return $pdf->stream();
    }
    private function convert_order_to_html()
    {
        $order_details = $this->get_order_data();

        foreach ($order_details as $order_detail) {
            $output = '
          <div>
            <p>' . $order_detail->name . '</p>
            <p>' . $order_detail->phone . '</p>
            <p>' . $order_detail->shipping_address . '</p>
          </div>
          ';
        }

        return $output;
    }
}