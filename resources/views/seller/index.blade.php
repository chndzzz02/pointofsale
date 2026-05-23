@extends('layouts.seller')
@section('title', 'Produk Saya')
@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">📦 Produk Saya</h3>
            <p class="text-muted mb-0">Kelola semua produk yang Anda jual</p>
        </div>
        <a href="{{ route('seller.products.create') }}" class="btn btn-success rounded-pill px-4">
            <i class="bi bi-plus-lg"></i> Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle bg-white rounded-4 overflow-hidden shadow-sm">
            <thead class="bg-light">
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$product->image) }}" width="60" height="60" class="rounded-3" style="object-fit: cover;">
                    </td>
                    <td class="fw-semibold">{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? '-' }}</td>
                    <td>Rp {{ number_format($product->price,0,',','.') }}</td>
                    <td>
                        <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }} rounded-pill">
                            {{ $product->stock > 0 ? $product->stock : 'Habis' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('seller.products.edit', $product) }}" class="btn btn-sm btn-warning rounded-pill px-3">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('seller.products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <i class="bi bi-box-seam fs-1 text-muted"></i>
                        <p class="mt-2">Belum ada produk. <a href="{{ route('seller.products.create') }}">Tambah sekarang</a></p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection