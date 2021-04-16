@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

<style type="text/css">
  div.stars {
  width: 100%;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
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
                        <div class="stars form-group row">   
                        <div class="text-center">                           
                                        <input class="star star-5" id="star-5" type="radio" name="rating" value="5" />
                                        <label class="star star-5" for="star-5"></label>
                                        <input class="star star-4" id="star-4" type="radio" name="rating" value="4" />
                                        <label class="star star-4" for="star-4"></label>
                                        <input class="star star-3" id="star-3" type="radio" name="rating" value="3" />
                                        <label class="star star-3" for="star-3"></label>
                                        <input class="star star-2" id="star-2" type="radio" name="rating" value="2" />
                                        <label class="star star-2" for="star-2"></label>
                                        <input class="star star-1" id="star-1" type="radio" name="rating" value="1" />
                                        <label class="star star-1" for="star-1"></label>
                        </div>
                        </div>
 
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