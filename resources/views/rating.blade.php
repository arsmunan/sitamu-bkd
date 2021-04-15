@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p>{{ __('Selamat Datang di SITAMU-BKD') }}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Santun, Melayani, Akuntabel, Responsif & Transparan
                        </figcaption>
                    </figure>
                </div>
                <div class="card-body">
                    @if (session('pesan'))
                    <div class="alert alert-success">
                        {{ session('pesan') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('add-rating') }}">
                        @csrf
                        <input id="id" type="hidden" name="id" value="{{$data->id}}">
                        <div class="col-md-12 text-center">
                        <h4><span class="badge badge-info">HARAP ISI SETELAH KONSULTASI <i class="far fa-smile-wink"></i></span></h4>
                        </div>
                        <div class="form-group row">
                            <label for="kritik_saran" class="col-md-4 col-form-label text-md-right">{{ __('Kritik / Saran') }}</label>
                            <div class="col-md-6">
                                <textarea id="kritik_saran" class="form-control @error('kritik_saran') is-invalid @enderror" name="kritik_saran" value="{{ old('kritik_saran') }}" required autocomplete="kritik_saran"></textarea>
                                @error('kritik_saran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kritik_saran" class="col-md-4 col-form-label text-md-right">{{ __('Kritik / Saran') }}</label>
                            <div class="col-md-6">
                                <textarea id="kritik_saran" class="form-control @error('kritik_saran') is-invalid @enderror" name="kritik_saran" value="{{ old('kritik_saran') }}" required autocomplete="kritik_saran"></textarea>
                                @error('kritik_saran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <p>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection