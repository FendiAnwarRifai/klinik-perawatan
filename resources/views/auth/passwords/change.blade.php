@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card-header">Ubah Kata Sandi</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                     {{ csrf_field() }}
                     {{ method_field('put') }}

                     <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }} row">
                        <label for="current_password" class="col-md-4 col-form-label text-md-right">Sandi Lama</label>

                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control password" name="current_password" autofocus>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Sandi Baru</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control password" name="password">                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }} row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Konfirmasi Sandi Baru</label>

                        <div class="col-md-6">
                         <input id="password_confirmation" type="password" class="form-control password" name="password_confirmation">
                         <span><input type="checkbox" class="form-checkbox"> Lihat Kata Sandi</span>
                     </div>
                 </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                <a href="{{ url('/home') }}" class="btn btn-sm btn-success">Batal</a>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
