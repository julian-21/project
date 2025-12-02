@extends('layouts.app')

@section('title', 'Dashboard Penjualan')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-white flex items-center gap-3 drop-shadow-lg">
        <i class="bi bi-speedometer2 text-4xl"></i>
        <span>Dashboard Penjualan</span>
    </h1>
</div>

<div class="bg-white rounded-2xl shadow-xl mb-6 overflow-hidden opacity-0 animate-fade-in-up">
    <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-6 py-4 border-b-2 border-slate-200">
        <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
            <i class="bi bi-funnel text-primary text-xl"></i>
            <span>Filter Data</span>
        </h2>
    </div>
    <div class="p-6">
        <form method="GET" action="{{ route('sales.dashboard') }}" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
            <div class="md:col-span-4">
                <label for="start_date" class="block text-sm font-semibold text-slate-700 mb-2">
                    Tanggal Mulai
                </label>
                <input type="date" 
                       id="start_date" 
                       name="start_date" 
                       value="{{ $startDate }}"
                       class="w-full px-4 py-2.5 border-2 border-slate-200 rounded-lg focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-sm">
            </div>
            <div class="md:col-span-4">
                <label for="end_date" class="block text-sm font-semibold text-slate-700 mb-2">
                    Tanggal Akhir
                </label>
                <input type="date" 
                       id="end_date" 
                       name="end_date" 
                       value="{{ $endDate }}"
                       class="w-full px-4 py-2.5 border-2 border-slate-200 rounded-lg focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-sm">
            </div>
            <div class="md:col-span-4 flex gap-2">
                <button type="submit" 
                        class="flex-1 flex items-center justify-center gap-2 px-5 py-2.5 bg-gradient-to-r from-primary to-primary-dark text-white font-semibold rounded-lg shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 hover:-translate-y-0.5 transition-all duration-300">
                    <i class="bi bi-search"></i>
                    <span>Filter</span>
                </button>
                <a href="{{ route('sales.dashboard') }}" 
                   class="flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-200 text-slate-700 font-semibold rounded-lg hover:bg-slate-300 hover:-translate-y-0.5 transition-all duration-300">
                    <i class="bi bi-arrow-clockwise"></i>
                    <span>Reset</span>
                </a>
            </div>
        </form>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">
    <div class="bg-gradient-to-br from-white to-purple-50 rounded-2xl shadow-xl border-l-4 border-primary overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 opacity-0 animate-fade-in-up animation-delay-100">
        <div class="p-6 relative">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-xs font-bold text-primary uppercase tracking-wider mb-2">
                        Total Penjualan
                    </p>
                    <h3 class="text-2xl font-bold text-slate-800">
                        Rp {{ number_format($statistics['total_sales'], 0, ',', '.') }}
                    </h3>
                </div>
                <div class="ml-4">
                    <i class="bi bi-currency-dollar text-6xl text-primary opacity-15 hover:opacity-25 hover:scale-110 hover:rotate-6 transition-all duration-300"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-xl border-l-4 border-emerald-500 overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 opacity-0 animate-fade-in-up animation-delay-200">
        <div class="p-6 relative">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-xs font-bold text-emerald-500 uppercase tracking-wider mb-2">
                        Total Transaksi
                    </p>
                    <h3 class="text-2xl font-bold text-slate-800">
                        {{ number_format($statistics['total_transactions'], 0, ',', '.') }}
                    </h3>
                </div>
                <div class="ml-4">
                    <i class="bi bi-cart-check text-6xl text-emerald-500 opacity-15 hover:opacity-25 hover:scale-110 hover:rotate-6 transition-all duration-300"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-white to-cyan-50 rounded-2xl shadow-xl border-l-4 border-cyan-500 overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 opacity-0 animate-fade-in-up animation-delay-300">
        <div class="p-6 relative">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-xs font-bold text-cyan-500 uppercase tracking-wider mb-2">
                        Total Item Terjual
                    </p>
                    <h3 class="text-2xl font-bold text-slate-800">
                        {{ number_format($statistics['total_items_sold'], 0, ',', '.') }}
                    </h3>
                </div>
                <div class="ml-4">
                    <i class="bi bi-box-seam text-6xl text-cyan-500 opacity-15 hover:opacity-25 hover:scale-110 hover:rotate-6 transition-all duration-300"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-white to-amber-50 rounded-2xl shadow-xl border-l-4 border-amber-500 overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 opacity-0 animate-fade-in-up animation-delay-400">
        <div class="p-6 relative">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-xs font-bold text-amber-500 uppercase tracking-wider mb-2">
                        Rata-rata Transaksi
                    </p>
                    <h3 class="text-2xl font-bold text-slate-800">
                        Rp {{ number_format($statistics['average_transaction'], 0, ',', '.') }}
                    </h3>
                </div>
                <div class="ml-4">
                    <i class="bi bi-calculator text-6xl text-amber-500 opacity-15 hover:opacity-25 hover:scale-110 hover:rotate-6 transition-all duration-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">
    <div class="lg:col-span-8 bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300">
        <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-6 py-4 border-b-2 border-slate-200">
            <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                <i class="bi bi-graph-up text-primary text-xl"></i>
                <span>Tren Penjualan Harian</span>
            </h2>
        </div>
        <div class="p-6">
            <div class="relative h-80">
                <canvas id="dailySalesChart" 
                        data-labels='@json($dailyTrend["labels"])'
                        data-data='@json($dailyTrend["data"])'></canvas>
            </div>
        </div>
    </div>

    <div class="lg:col-span-4 bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300">
        <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-6 py-4 border-b-2 border-slate-200">
            <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                <i class="bi bi-trophy text-primary text-xl"></i>
                <span>Top 5 Produk Terlaris</span>
            </h2>
        </div>
        <div class="p-6">
            <div class="relative h-80">
                <canvas id="topProductsChart"
                        data-products='@json($topProducts)'></canvas>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 mb-6">
    <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-6 py-4 border-b-2 border-slate-200">
        <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
            <i class="bi bi-calendar3 text-primary text-xl"></i>
            <span>Penjualan Bulanan</span>
        </h2>
    </div>
    <div class="p-6">
        <div class="relative h-80">
            <canvas id="monthlySalesChart"
                    data-labels='@json($monthlySales["labels"])'
                    data-data='@json($monthlySales["data"])'></canvas>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300">
    <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-6 py-4 border-b-2 border-slate-200">
        <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
            <i class="bi bi-table text-primary text-xl"></i>
            <span>Data Penjualan Detail</span>
        </h2>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-slate-200 bg-slate-50">
                        <th class="px-4 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">No Invoice</th>
                        <th class="px-4 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Produk</th>
                        <th class="px-4 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-4 py-4 text-right text-xs font-bold text-slate-700 uppercase tracking-wider">Jumlah</th>
                        <th class="px-4 py-4 text-right text-xs font-bold text-slate-700 uppercase tracking-wider">Harga Satuan</th>
                        <th class="px-4 py-4 text-right text-xs font-bold text-slate-700 uppercase tracking-wider">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($sales as $sale)
                    <tr class="hover:bg-slate-50 transition-all duration-200 hover:scale-[1.01]">
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold bg-gradient-to-r from-primary to-primary-dark text-white shadow-sm">
                                {{ $sale->invoice_number }}
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-600">
                            {{ $sale->sale_date->format('d M Y') }}
                        </td>
                        <td class="px-4 py-4">
                            <div class="text-sm font-semibold text-slate-800">{{ $sale->product->name }}</div>
                            <div class="text-xs text-slate-500">{{ $sale->product->sku }}</div>
                        </td>
                        <td class="px-4 py-4 text-sm text-slate-600">
                            {{ $sale->customer_name ?? '-' }}
                        </td>
                        <td class="px-4 py-4 text-right text-sm text-slate-600">
                            {{ $sale->quantity }}
                        </td>
                        <td class="px-4 py-4 text-right text-sm text-slate-600">
                            Rp {{ number_format($sale->unit_price, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-4 text-right">
                            <span class="text-sm font-bold text-slate-800">
                                {{ $sale->formatted_total }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i class="bi bi-inbox text-7xl text-slate-300 mb-4"></i>
                                <p class="text-slate-500 font-medium text-lg">Tidak ada data penjualan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            <div class="pagination-wrapper">
                {{ $sales->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .pagination-wrapper nav {
        @apply flex items-center gap-1;
    }
    
    .pagination-wrapper .flex {
        @apply gap-1;
    }
    
    .pagination-wrapper a,
    .pagination-wrapper span {
        @apply inline-flex items-center justify-center min-w-[40px] h-10 px-4 text-sm font-semibold rounded-lg border-2 transition-all duration-200;
    }
    
    .pagination-wrapper a {
        @apply border-slate-200 text-primary hover:bg-primary hover:text-white hover:border-primary hover:-translate-y-0.5 hover:shadow-lg;
    }
    
    .pagination-wrapper span[aria-current="page"] {
        @apply bg-primary border-primary text-white shadow-lg;
    }
    
    .pagination-wrapper span[aria-disabled="true"] {
        @apply opacity-50 cursor-not-allowed bg-slate-100 border-slate-200 text-slate-400;
    }
    
    .pagination-wrapper .hidden {
        @apply md:inline-flex;
    }
</style>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush