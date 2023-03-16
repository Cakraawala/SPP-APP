@extends('layout.main')
@section('title')
<title>Dashboard | Edit SPP Tahun ajaran {{ $spp->tahun_ajaran }}</title>
@endsection
@section('content')
<div class="row">
<!-- Content Row -->
<div class="col-lg-12">
    <div class="container">
    <div class="card border-0 shadow-sm">
            <div class="card-header">
            <h4>Edit Data SPP ID #{{$spp->id}} Tahun ajaran {{ $spp->tahun_ajaran }}</h4>
            </div>
            <div class="card-body">
                <form action="/dashboard/data/spp/{{ $spp->id }}/update" method="POST"  enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tahun_ajaran" class="form-label">Tahun Ajaran <span style="font-style: italic;">(required)</span></label>
                            <input type="number" name="tahun_ajaran" @if ($spp->tahun_ajaran == null)
                                value="2023"
                                @else value="{{ $spp->tahun_ajaran }}"
                            @endif required id="tahun_ajaran" class="form-control" placeholder="2023">
                        </div>
                        <div class="col-md-4">
                            <label for="nominal" class="form-label">Nominal <span style="font-style: italic;">(required)</span></label>
                            <input type="number" name="nominal" id="nominal" class="form-control" value="{{ $spp->nominal }}"  required placeholder="ex 3.000.000">
                        </div>
                        <div class="col-md-4">
                            <label for="id" class="form-label">ID <span style="font-style: italic;"></span></label>
                            <input type="number" class="form-control" id="id" name="id" disabled value="{{ $spp->id }}">
                        </div>
                    </div>
                    <button class="btn btn-dark mt-4" type="submit"> SUBMIT </button>
                </form>
            </div>
        </div>
</div>
</div>
</div>
@endsection
