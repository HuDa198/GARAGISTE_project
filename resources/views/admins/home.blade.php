@extends('app')

@section('content')
    <div class="w-full flex justify-between">
        <div class="w-1/2 sm:w-4/5 m-auto text-center">
            @include('admins/charts/area_chart_invoice', ['id' => 1, 'type' => 'bar']);
            <h1>invoice chart par month</h1>
        </div>
        <div class="w-1/2 sm:w-4/5 m-auto text-center">
            @include('admins/charts/area_chart_repair', ['id' => 2, 'type' => 'pie']);
            <h1>Repairs chart par month</h1>
        </div>
    </div>
@endsection
