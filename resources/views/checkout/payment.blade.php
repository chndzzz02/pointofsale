@extends('layouts.app')
@section('title', 'Pembayaran')
@section('content')
<div class="container text-center py-5">
    <h4>Silakan selesaikan pembayaran</h4>
    <button id="pay-button" class="btn btn-primary-custom mt-3">Bayar Sekarang</button>
</div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    document.getElementById('pay-button').onclick = function() {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) { window.location.href = "{{ route('payment.success') }}"; },
            onPending: function(result) { alert('Menunggu pembayaran'); },
            onError: function(result) { alert('Pembayaran gagal'); }
        });
    };
</script>
@endsection