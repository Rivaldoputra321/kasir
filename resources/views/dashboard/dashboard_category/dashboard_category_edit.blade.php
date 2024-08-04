@include('dashboard.head')
@extends('dashboard.body')
@section('main')
<a href="/dashboard_category" class="btn btn-outline-primary mb-3">
  <i class="bi bi-arrow-left"></i>
  Kembali
</a>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Form Edit Category</h5>
    <form action="/categories_edit/{{$category->slug}}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-12 mb-3 mt-4">
          <label for="category" class="form-label">Nama Category</label>
          <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') ?? $category->category }}" required @required(true)>
          @error('category')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
  </div>
</div>
@endsection
@include('dashboard.footer')