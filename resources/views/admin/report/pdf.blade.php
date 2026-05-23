<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi UMKM Tulungagung</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff;
            padding: 30px 20px;
            font-size: 12px;
            line-height: 1.4;
            color: #2c3e50;
        }
        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #E63946;
            padding-bottom: 15px;
        }
        .header h1 {
            font-size: 26px;
            color: #1a1a2e;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }
        .header p {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
        .subtitle {
            font-size: 14px;
            font-weight: bold;
            color: #E63946;
            margin-bottom: 5px;
        }
        /* Info perusahaan */
        .company-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            background: #f8f9fc;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 11px;
        }
        .company-info .left, .company-info .right {
            line-height: 1.6;
        }
        /* Tabel */
        .table-container {
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }
        th {
            background: #E63946;
            color: white;
            padding: 10px 8px;
            font-weight: 600;
            text-align: center;
            border: 1px solid #c1121f;
        }
        td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            color: white;
        }
        .status-completed { background-color: #28a745; }
        .status-pending { background-color: #ffc107; color: #212529; }
        .status-processing { background-color: #17a2b8; }
        .status-cancelled { background-color: #dc3545; }
        .status-paid { background-color: #6f42c1; }
        /* Footer */
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #dee2e6;
            padding-top: 15px;
            color: #6c757d;
        }
        .signature {
            margin-top: 20px;
            text-align: right;
            font-size: 11px;
        }
        .total-row {
            background-color: #f1f3f5;
            font-weight: bold;
        }
        .badge {
            background: #E63946;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 9px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>UMKM TULUNGAGUNG</h1>
    <div class="subtitle">Laporan Transaksi Periode {{ now()->format('F Y') }}</div>
    <p>Tulungagung, Jawa Timur | Telp. (085) 8********ti | Email: info@umkm-tulungagung.com</p>
</div>

<div class="company-info">
    <div class="left">
        <strong>Tanggal Cetak:</strong> {{ now()->format('d/m/Y H:i') }}<br>
        <strong>Total Transaksi:</strong> {{ $orders->count() }} pesanan<br>
        <strong>Total Pendapatan:</strong> Rp {{ number_format($orders->sum('total_price'), 0, ',', '.') }}
    </div>
    <div class="right">
        <strong>Dicetak oleh:</strong> {{ Auth::user()->name ?? 'Admin' }}<br>
        <strong>Status:</strong> Semua status
    </div>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total (Rp)</th>
                <th>Status</th>
                <th>Metode</th>
                <th>Tanggal Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'Guest' }}</td>
                <td style="text-align: right;">{{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td>
                    @php
                        $statusClass = match($order->status) {
                            'completed' => 'status-completed',
                            'pending' => 'status-pending',
                            'processing' => 'status-processing',
                            'cancelled' => 'status-cancelled',
                            default => 'status-pending'
                        };
                    @endphp
                    <span class="status-badge {{ $statusClass }}">{{ ucfirst($order->status) }}</span>
                </td>
                <td>
                    @if($order->payment_method == 'cod')
                        COD
                    @elseif($order->payment_method == 'transfer')
                        Transfer
                    @else
                        {{ $order->payment_method }}
                    @endif
                </td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="signature">
    <p>Tulungagung, {{ now()->format('d F Y') }}</p>
    <p style="margin-top: 30px;">Mengetahui,<br><br><br><strong>Admin UMKM Tulungagung</strong></p>
</div>













<div class="footer">
    <p>© {{ date('Y') }} UMKM Tulungagung - Laporan ini dibuat secara otomatis oleh sistem. Tidak memerlukan tanda tangan basah.</p>
    <p><span class="badge">Valid</span> Dokumen resmi</p>
</div>

</body>
</html>