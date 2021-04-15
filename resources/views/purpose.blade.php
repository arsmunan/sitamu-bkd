@extends('layouts.app')

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
                <p>Helo,&nbsp;<kbd>{{$data->nama}}</kbd>&nbsp; isi tujuan anda!</p>
                    <form method="POST" action="{{ route('add-purpose') }}">
                        @csrf
                        <input id="guest_id" type="hidden" name="guest_id" value="{{$data->id}}">
                        <div class="form-group row">
                            <label for="bidang" class="col-md-4 col-form-label text-md-right">{{ __('Bidang') }}</label>

                            <div class="col-md-6">
                                <select class="form-control formselect required" id="field_id" name="field_id">
                                    <option value="0" disabled selected>Pilih
                                        Bidang</option>
                                    @foreach($fields as $field)
                                    <option value="{{ $field->id }}">
                                        {{ ucfirst($field->nama) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_pelayanan" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Layanan') }}</label>
                            <div class="col-md-6">
                                <select class="form-control formselect required" id="service_id" name="service_id">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tujuan" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>
                            <div class="col-md-6">
                                <textarea id="tujuan" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" value="{{ old('tujuan') }}" required autocomplete="tujuan"></textarea>

                                @error('tujuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Antrian') }}
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
@section('js')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $(document).ready(function() {
        $('#field_id').on('change', function() {
            let id = $(this).val();
            $('#service_id').empty();
            $('#service_id').append(`<option value="0" disabled selected>Proses..</option>`);
            $.ajax({
                type: 'GET',
                url: 'purposesub/' + id,
                success: function(response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    $('#service_id').empty();
                    $('#service_id').append(`<option value="0" disabled selected>Pilih Jenis Layanan*</option>`);
                    response.forEach(element => {
                        $('#service_id').append(`<option value="${element['id']}">${element['jenis_layanan']}</option>`);
                    });
                }
            });
        });
    });
</script>
@endsection