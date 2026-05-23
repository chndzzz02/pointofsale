@extends('layouts.admin')
@section('title', 'Edit Produk')
@section('content')
<div class="container-fluid px-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 pt-4 pb-0">
            <h4 class="fw-bold">Edit Produk</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kategori</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Harga (Rp)</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Stok</label>
                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Pilih Seller</label>
                        <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Seller --</option>
                            @foreach($sellers as $seller)
                                <option value="{{ $seller->id }}" {{ old('user_id', $product->user_id) == $seller->id ? 'selected' : '' }}>
                                    {{ $seller->name }} ({{ $seller->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Gambar Saat Ini</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$product->image) }}" width="150" class="rounded-3 border">
                        </div>
                        <label class="form-label fw-semibold">Ganti Gambar (opsional)</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Perubahan</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary rounded-pill px-4 ms-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection