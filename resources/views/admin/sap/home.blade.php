@extends('layouts.app')

@section('content')
<div class="container-fluid py-1">
    <h1 class="h3 mb-4">Registros SAP</h1>

    <div class="card">
        <div class="card-body datatable-responsive">
            @livewire('sap-records-table')
        </div>
    </div>
</div>
@endsection