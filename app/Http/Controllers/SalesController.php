<?php

namespace App\Http\Controllers;

use App\Services\SalesReportService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalesController extends Controller
{
    public function __construct(
        protected SalesReportService $salesReportService
    ) {}

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $startDate = $validated['start_date'] ?? null;
        $endDate = $validated['end_date'] ?? null;

        $sales = $this->salesReportService->getSalesData($startDate, $endDate);
        
        $statistics = $this->salesReportService->getStatistics($startDate, $endDate);
        
        $dailyTrend = $this->salesReportService->getDailySalesTrend($startDate, $endDate);
        $monthlySales = $this->salesReportService->getMonthlySales($startDate, $endDate);
        $topProducts = $this->salesReportService->getTopProducts($startDate, $endDate);

        return view('sales.dashboard', compact(
            'sales',
            'statistics',
            'dailyTrend',
            'monthlySales',
            'topProducts',
            'startDate',
            'endDate'
        ));
    }
}