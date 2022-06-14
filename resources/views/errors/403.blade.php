@extends('layouts.dashboard')

@section('content')
    <div class="page-header align-items-start min-vh-100">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-12 m-auto text-center">
                    <h1 class="display-1 text-bolder text-dark">403</h1>
                    <h2 class="text-dark">Access Forbidden</h2>
                    <p class="lead text-dark">please contact administrator to get an access.</p>
                    <button wire:click='logout' type="button" class="btn btn-outline-dark mt-4">Logout</button>
                </div>
            </div>
        </div>
    </div>
@endsection
