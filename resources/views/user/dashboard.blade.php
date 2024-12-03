@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Visitors</h5>
                    <p class="card-text">1,294</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Subscribers</h5>
                    <p class="card-text">1,303</p>
                </div>
            </div>
        </div>
        <!-- Tambahkan card lainnya sesuai kebutuhan -->
    </div>
@endsection
