@extends('layouts.admin')
@section('title', 'Semua Produk')
@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Semua Produk</h3>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle bg-white rounded-4 overflow-hidden shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>ID</th><th>Gambar</th><th>Nama Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th>
                    <th>Seller</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset('storage/'.$product->image) }}" width="60" class="rounded-3"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? '-' }}</td>
                    <td>Rp {{ number_format($product->price,0,',','.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->user->name ?? 'Tidak diketahui' }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning rounded-pill">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center">Belum ada produk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $products->links() }}
</div>
@endsection