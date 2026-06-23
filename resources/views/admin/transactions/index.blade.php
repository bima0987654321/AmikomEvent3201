@extends('layouts.admin')

@section('title', 'Laporan Transaksi - Admin')
@section('page_title', 'Laporan Transaksi')
@section('page_subtitle', 'Pantau arus kas dan penjualan tiket Anda.')

@section('content')

<div class="bg-white rounded-[2rem] border border-slate-200/80 shadow-sm overflow-hidden backdrop-blur-sm">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse whitespace-nowrap">
            <thead class="bg-slate-50/70 border-b border-slate-100 text-slate-500 uppercase text-[11px] font-bold tracking-wider">
                <tr>
                    <th class="px-8 py-5 font-semibold">Order ID</th>
                    <th class="px-8 py-5 font-semibold">Detail Pembeli</th>
                    <th class="px-8 py-5 font-semibold">Event</th>
                    <th class="px-8 py-5 font-semibold">Tgl Transaksi</th>
                    <th class="px-8 py-5 font-semibold">Status</th>
                    <th class="px-8 py-5 text-right font-semibold">Total Tagihan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($transactions as $trx)
                <tr class="hover:bg-indigo-50/30 transition-all duration-200 group {{ strtolower($trx->status) == 'pending' ? 'bg-slate-50/40 text-slate-400' : 'text-slate-700' }}">
                    <td class="px-8 py-5.5">
                        <span class="font-mono font-bold px-3 py-1.5 rounded-xl text-xs tracking-tight border shadow-2xs transition-colors group-hover:border-indigo-200 {{ strtolower($trx->status) == 'pending' ? 'bg-slate-100/80 border-slate-200 text-slate-500' : 'text-indigo-600 bg-indigo-50/50 border-indigo-100' }}">
                            {{ $trx->order_id }}
                        </span>
                    </td>
                    <td class="px-8 py-5.5">
                        <p class="font-semibold text-slate-800 group-hover:text-indigo-950 transition-colors">{{ $trx->customer_name }}</p>
                        <div class="text-xs text-slate-400/90 mt-1 space-y-0.5">
                            <p class="flex items-center gap-1">{{ $trx->customer_email }}</p>
                            <p class="font-mono text-[11px]">{{ $trx->customer_phone }}</p>
                        </div>
                    </td>
                    <td class="px-8 py-5.5">
                        <p class="font-medium text-slate-700 max-w-[240px] truncate" title="{{ $trx->event->title ?? '-' }}">
                            {{ $trx->event->title ?? '-' }}
                        </p>
                    </td>
                    <td class="px-8 py-5.5 text-sm text-slate-500">
                        <span class="block font-medium text-slate-600">{{ $trx->created_at->format('d M Y') }}</span>
                        <span class="text-xs text-slate-400 font-mono">{{ $trx->created_at->format('H:i') }} WIB</span>
                    </td>
                    <td class="px-8 py-5.5">
                        @if(strtolower($trx->status) === 'settlement' || strtolower($trx->status) === 'success')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold ring-1 ring-emerald-600/10">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                Success
                            </span>
                        @elseif(strtolower($trx->status) === 'pending')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-700 rounded-full text-xs font-semibold ring-1 ring-amber-600/10">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                Pending
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-rose-50 text-rose-700 rounded-full text-xs font-semibold ring-1 ring-rose-600/10">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                {{ ucfirst($trx->status) }}
                            </span>
                        @endif
                    </td>
                    <td class="px-8 py-5.5 text-right font-bold tabular-nums {{ strtolower($trx->status) == 'pending' ? 'text-slate-400' : 'text-slate-900' }}">
                        Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-8 py-16 text-center">
                        <div class="flex flex-col items-center justify-center max-w-xs mx-auto">
                            <p class="mt-2 text-sm font-semibold text-slate-700">Belum ada transaksi</p>
                            <p class="text-xs text-slate-400 mt-1">Data penjualan tiket Anda akan otomatis muncul di sini setelah pembeli melakukan checkout.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($transactions->hasPages())
    <div class="px-8 py-5 bg-slate-50/50 border-t border-slate-100">
        {{ $transactions->links() }}
    </div>
    @endif
</div>

@endsection