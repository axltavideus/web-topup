@extends('layouts.admin')

@section('title', 'Tambah Banner')

@section('content')
    <h1>Tambah Banner</h1>
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="image">Pilih Gambar</label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection