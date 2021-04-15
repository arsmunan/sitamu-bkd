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
                    <div class="col-md-12 text-center">
                        <h4><span class="badge badge-info">TERIMA KASIH SUDAH BERKUNJUNG <i class="far fa-smile-wink"></i></span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection