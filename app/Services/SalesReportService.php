<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesReportService
{
    public function getSalesData(?string $startDate = null, ?string $endDate = null, int $perPage = 15)
    {
        return Sale::with('product')
            ->dateRange($startDate, $endDate)
            ->orderBy('sale_date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }
    public function calculateTotalSales(?string $startDate = null, ?string $endDate = null): float
    {
        return Sale::dateRange($startDate, $endDate)
            ->sum('total_price');
    }

    public function getStatistics(?string $startDate = null, ?string $endDate = null): array
    {
        $query = Sale::dateRange($startDate, $endDate);

        return [
            'total_sales' => $query->sum('total_price'),
            'total_transactions' => $query->count(),
            'total_items_sold' => $query->sum('quantity'),
            'average_transaction' => $query->avg('total_price') ?? 0,
        ];
    }

    public function getDailySalesTrend(?string $startDate = null, ?string $endDate = null): array
    {
        $start = $startDate ? Carbon::parse($startDate) : Carbon::now()->subDays(30);
        $end = $endDate ? Carbon::parse($endDate) : Carbon::now();

        $salesData = Sale::select(
                DB::raw('DATE(sale_date) as date'),
                DB::raw('SUM(total_price) as total'),
                DB::raw('COUNT(*) as count')
            )
            ->dateRange($start->format('Y-m-d'), $end->format('Y-m-d'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return [
            'labels' => $salesData->pluck('date')->map(function($date) {
                return Carbon::parse($date)->format('d M Y');
            })->toArray(),
            'data' => $salesData->pluck('total')->toArray(),
            'count' => $salesData->pluck('count')->toArray(),
        ];
    }

    public function getTopProducts(?string $startDate = null, ?string $endDate = null, int $limit = 5): array
    {
        return Sale::select(
                'product_id',
                DB::raw('SUM(quantity) as total_quantity'),
                DB::raw('SUM(total_price) as total_revenue')
            )
            ->with('product')
            ->dateRange($startDate, $endDate)
            ->groupBy('product_id')
            ->orderBy('total_revenue', 'desc')
            ->limit($limit)
            ->get()
            ->toArray();
    }

    public function getMonthlySales(?string $startDate = null, ?string $endDate = null): array
    {
        $salesData = Sale::select(
                DB::raw('DATE_FORMAT(sale_date, "%Y-%m") as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->dateRange($startDate, $endDate)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        return [
            'labels' => $salesData->pluck('month')->map(function($month) {
                return Carbon::parse($month . '-01')->format('M Y');
            })->toArray(),
            'data' => $salesData->pluck('total')->toArray(),
        ];
    }
}