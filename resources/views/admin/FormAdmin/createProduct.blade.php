@extends('Admin.dashboard')
@section('title', 'Tambah Produk')
@section('content-admin')
<div class="container mt-5">
  <h1 class="mb-4">Create Product</h1>
  <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Nama Produk -->
    <div class="mb-3">
      <label for="nameproduct" class="form-label">Nama Produk</label>
      <input type="text" class="form-control" id="nameproduct" name="nameproduct" 
             placeholder="Masukkan nama produk" value="{{ old('nameproduct') }}" required>
      @error('nameproduct')
          <div class="text-danger">{{ $message }}</div>
      @enderror 
    </div>
    <!-- Harga -->
    <div class="mb-3">
      <label for="price" class="form-label">Harga</label>
      <input type="number" class="form-control" id="price" name="price" 
             placeholder="Masukkan harga produk" value="{{ old('price') }}" required>
      @error('price')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Stock -->
    <div class="mb-3">
      <label for="stock" class="form-label">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock" 
             placeholder="Masukkan stok produk" value="{{ old('stock') }}" required>
      @error('stock')
          <div class="text-danger">{{ $message }}</div>
      @enderror 
    </div>
    <!-- Gambar -->
    <div class="mb-3">
      <label for="image" class="form-label">Upload Gambar</label>
      <input class="form-control" type="file" name="image" id="image" required>
      @error('image')
          <div class="text-danger">{{ $message }}</div> 
      @enderror
    </div>
    <!-- Deskripsi -->
    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi</label>
      <textarea class="form-control" id="description" name="description" rows="3" 
                placeholder="Masukkan deskripsi produk" required>{{ old('description') }}</textarea>
      @error('description')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- Tombol Submit -->
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>

@endsection