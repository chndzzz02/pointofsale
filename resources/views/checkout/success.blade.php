@extends('layouts.app')
@section('title', 'Pembayaran Sukses')
@section('content')
<div class="container text-center py-5">
    <i class="bi bi-check-circle-fill text-success fs-1"></i>
    <h3 class="mt-3">Pembayaran Berhasil!</h3>
    <p>Terima kasih telah berbelanja di UMKM Tulungagung.</p>
    <a href="{{ route('orders.index') }}" class="btn btn-primary-custom">Lihat Pesanan Saya</a>
</div>
@endsection