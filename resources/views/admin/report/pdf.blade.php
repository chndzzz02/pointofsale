<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi UMKM Tulungagung</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        @page{
            margin:18px;
        }

        body{
            font-family:'DejaVu Sans', sans-serif;
            background:#ffffff;
            color:#1e293b;
            font-size:9px;
            line-height:1.35;
        }

        /* =========================
            MAIN CONTAINER
        ========================= */

        .report-container{
            width:100%;
            border:1px solid #dbe3ee;
            border-radius:14px;
            overflow:hidden;
        }

        /* =========================
            HEADER
        ========================= */

        .header{
            padding:18px 22px;
            border-bottom:1px solid #e2e8f0;
            background:#ffffff;
        }

        .header-top{
            width:100%;
        }

        .brand-title{
            font-size:22px;
            font-weight:800;
            color:#0f172a;
            letter-spacing:.5px;
        }

        .brand-subtitle{
            margin-top:4px;
            color:#64748b;
            font-size:9px;
        }

        .report-meta{
            margin-top:14px;
            width:100%;
        }

        .meta-badge{
            display:inline-block;
            padding:5px 12px;
            border-radius:999px;
            background:#f1f5f9;
            border:1px solid #dbe3ee;
            font-size:8px;
            font-weight:700;
            color:#334155;
        }

        .report-heading{
            margin-top:14px;
        }

        .report-heading h2{
            font-size:16px;
            font-weight:800;
            color:#111827;
            margin-bottom:3px;
        }

        .report-heading p{
            color:#64748b;
            font-size:8.5px;
        }

        /* =========================
            INFO SECTION
        ========================= */

        .info-section{
            padding:14px 22px 0;
        }

        .info-box{
            width:100%;
            border:1px solid #e2e8f0;
            border-radius:10px;
            overflow:hidden;
        }

        .info-table{
            width:100%;
            border-collapse:collapse;
        }

        .info-table td{
            padding:10px 12px;
            border:1px solid #edf2f7;
            vertical-align:top;
        }

        .info-label{
            font-size:7px;
            text-transform:uppercase;
            letter-spacing:.6px;
            color:#94a3b8;
            margin-bottom:4px;
            font-weight:700;
        }

        .info-value{
            font-size:9px;
            color:#0f172a;
            font-weight:700;
        }

        /* =========================
            TABLE SECTION
        ========================= */

        .table-section{
            padding:14px 22px;
        }

        .table-title{
            font-size:13px;
            font-weight:800;
            color:#0f172a;
            margin-bottom:10px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            table-layout:fixed;
            border:1px solid #e2e8f0;
        }

        thead{
            background:#f8fafc;
        }

        thead th{
            padding:8px 4px;
            border-bottom:1px solid #e2e8f0;
            color:#475569;
            font-size:7px;
            text-transform:uppercase;
            letter-spacing:.4px;
            font-weight:800;
            text-align:center;
        }

        tbody td{
            padding:6px 4px;
            border-bottom:1px solid #f1f5f9;
            color:#334155;
            font-size:7px;
            text-align:center;
            word-wrap:break-word;
            overflow-wrap:break-word;
        }

        tbody tr:nth-child(even){
            background:#fcfcfd;
        }

        .customer-name{
            font-weight:600;
        }

        .price{
            font-weight:700;
            color:#0f172a;
        }

        /* =========================
            STATUS
        ========================= */

        .status{
            display:inline-block;
            padding:3px 7px;
            border-radius:999px;
            font-size:6px;
            font-weight:800;
        }

        .completed{
            background:#dcfce7;
            color:#15803d;
        }

        .processing{
            background:#dbeafe;
            color:#1d4ed8;
        }

        .pending{
            background:#fef3c7;
            color:#b45309;
        }

        .cancelled{
            background:#fee2e2;
            color:#b91c1c;
        }

        /* =========================
            SUMMARY
        ========================= */

        .summary-section{
            padding:0 22px 14px;
        }

        .summary-box{
            border:1px solid #e2e8f0;
            border-radius:12px;
            overflow:hidden;
        }

        .summary-header{
            padding:9px 12px;
            background:#f8fafc;
            border-bottom:1px solid #e2e8f0;
            font-size:9px;
            font-weight:800;
            color:#0f172a;
        }

        .summary-content{
            padding:12px;
        }

        .summary-row{
            margin-bottom:6px;
            font-size:8px;
            color:#334155;
        }

        .summary-row strong{
            color:#0f172a;
        }

        /* =========================
            SIGNATURE
        ========================= */

        .signature-section{
            padding:10px 22px 24px;
            text-align:right;
        }

        .signature-box{
            width:300px;
            display:inline-block;
            text-align:center;
        }

        .signature-date{
            font-size:8px;
            color:#64748b;
            margin-bottom:16px;
        }

        .signature-space{
            height:60px;
        }

        .signature-name{
            width:100%;
            border-top:1px solid #94a3b8;
            padding-top:8px;
            font-size:10px;
            font-weight:800;
            color:#0f172a;
        }

        .signature-role{
            margin-top:4px;
            font-size:7px;
            color:#64748b;
        }

        /* =========================
            FOOTER
        ========================= */

        .footer{
            padding:12px;
            border-top:1px solid #e2e8f0;
            text-align:center;
            background:#fafafa;
        }

        .footer p{
            color:#64748b;
            font-size:7px;
        }

        .footer-badge{
            margin-top:6px;
            display:inline-block;
            padding:4px 10px;
            border-radius:999px;
            border:1px solid #dbe3ee;
            background:#f1f5f9;
            color:#334155;
            font-size:6px;
            font-weight:800;
            letter-spacing:.5px;
        }

    </style>
</head>

<body>

<div class="report-container">

    {{-- HEADER --}}
    <div class="header">

        <div class="header-top">

            <div class="brand-title">
                UMKM TULUNGAGUNG
            </div>

            <div class="brand-subtitle">
                Sistem Manajemen Transaksi UMKM Digital
            </div>

        </div>

        <div class="report-meta">

            <span class="meta-badge">
                {{ strtoupper(now()->format('F Y')) }}
            </span>

        </div>

        <div class="report-heading">

            <h2>
                Laporan Transaksi
            </h2>

            <p>
                Ringkasan seluruh aktivitas transaksi pada sistem UMKM Tulungagung.
            </p>

        </div>

    </div>

    {{-- INFO --}}
    <div class="info-section">

        <div class="info-box">

            <table class="info-table">

                <tr>

                    <td width="25%">
                        <div class="info-label">Tanggal Cetak</div>
                        <div class="info-value">
                            {{ now()->format('d F Y H:i') }}
                        </div>
                    </td>

                    <td width="25%">
                        <div class="info-label">Dicetak Oleh</div>
                        <div class="info-value">
                            {{ Auth::user()->name ?? 'Administrator' }}
                        </div>
                    </td>

                    <td width="25%">
                        <div class="info-label">Total Pesanan</div>
                        <div class="info-value">
                            {{ $orders->count() }} Transaksi
                        </div>
                    </td>

                    <td width="25%">
                        <div class="info-label">Total Pendapatan</div>
                        <div class="info-value">
                            Rp {{ number_format($orders->sum('total_price'),0,',','.') }}
                        </div>
                    </td>

                </tr>

            </table>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="table-section">

        <div class="table-title">
            Data Transaksi
        </div>

        <table>

            <thead>

                <tr>
                    <th width="5%">No</th>
                    <th width="10%">Order</th>
                    <th width="24%">Customer</th>
                    <th width="16%">Total</th>
                    <th width="14%">Status</th>
                    <th width="12%">Metode</th>
                    <th width="19%">Tanggal</th>
                </tr>

            </thead>

            <tbody>

                @foreach($orders as $index => $order)

                @php

                    $statusClass = match($order->status){
                        'completed' => 'completed',
                        'processing' => 'processing',
                        'pending' => 'pending',
                        'cancelled' => 'cancelled',
                        default => 'pending'
                    };

                @endphp

                <tr>

                    <td>{{ $index + 1 }}</td>

                    <td>
                        <strong>#{{ $order->id }}</strong>
                    </td>

                    <td class="customer-name">
                        {{ $order->user->name ?? 'Guest' }}
                    </td>

                    <td class="price">
                        Rp {{ number_format($order->total_price,0,',','.') }}
                    </td>

                    <td>
                        <span class="status {{ $statusClass }}">
                            {{ strtoupper($order->status) }}
                        </span>
                    </td>

                    <td>
                        {{ strtoupper($order->payment_method) }}
                    </td>

                    <td>
                        {{ $order->created_at->format('d/m/Y H:i') }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- SUMMARY --}}
    <div class="summary-section">

        <div class="summary-box">

            <div class="summary-header">
                Ringkasan Laporan
            </div>

            <div class="summary-content">

                <div class="summary-row">
                    <strong>Total Transaksi:</strong>
                    {{ $orders->count() }} Pesanan
                </div>

                <div class="summary-row">
                    <strong>Total Pendapatan:</strong>
                    Rp {{ number_format($orders->sum('total_price'),0,',','.') }}
                </div>

                <div class="summary-row">
                    <strong>Status Dokumen:</strong>
                    Valid dan dibuat otomatis oleh sistem
                </div>

            </div>

        </div>

    </div>

    {{-- SIGNATURE --}}
    <div class="signature-section">

        <div class="signature-box">

            <div class="signature-date">
                Tulungagung, {{ now()->format('d F Y') }}
            </div>

            <div class="signature-space"></div>

            <div class="signature-name">
                {{ Auth::user()->name ?? 'Administrator' }}
            </div>

            <div class="signature-role">
                Admin UMKM Tulungagung
            </div>

        </div>

    </div>

    {{-- FOOTER --}}
    <div class="footer">

        <p>
            © {{ date('Y') }} UMKM Tulungagung • Dokumen dibuat otomatis oleh sistem.
        </p>

        <div class="footer-badge">
            VERIFIED DOCUMENT
        </div>

    </div>

</div>

</body>
</html>