@extends('dashboard')
@section('title', 'Tambah Produk')
@section('content-admin')
<div class="container mt-5">
    <h1 class=" mb-4">Form Product</h1>
    <form action="" method="POST">
      @csrf
      <!-- Nama Produk -->
      <div class="mb-3">
        <label for="namaProduk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="namaProduk" name="nameproduct" placeholder="Masukkan nama produk" required>
      </div>
      <!-- Harga -->
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga produk" required>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan harga produk" required>
      </div>
      <!-- Gambar -->
      <div class="mb-3">
        <label for="formFile" class="form-label"> Upload image</label>
        <input class="form-control" type="file" name="image" id="image">
        <small id="image_error" class="error text-danger"></small>
    </div>
      <!-- Deskripsi -->
      <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi produk"></textarea>
      </div>
      <!-- Tombol Submit -->
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
  </div>
@endsection