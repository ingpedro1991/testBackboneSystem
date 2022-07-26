@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Zip Codes</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right mr-2" href="{{ route('zipCodes.import') }}"> Import data </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-2">
                @include('zip_codes.table')
            </div>

        </div>
    </div>

@endsection

