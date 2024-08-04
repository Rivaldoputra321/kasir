@include('head')
@extends('dashboard.body')
@section('main')
<a href="categories" class="btn btn-outline-primary mb-3">
  <i class="bi bi-arrow-left"></i>
  Kembali
</a>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Form Tambah Staff</h5>
    <form action="categories_add" method="POST">
      @csrf
      <div class="row">
        <div class="col-12 mb-3 mt-4">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="" required @required(true)>
          <label for="name" class="form-label">Email</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="" required @required(true)>
          <label for="name" class="form-label">Password</label>
          <input type="text" class="form-control @error('password') is-invalid @enderror" id="name" name="name" value="" required @required(true)>
          @error('category')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
  </div>
</div>
@endsection
@include('footer')