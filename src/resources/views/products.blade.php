@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Products</h1>
        @livewire('product-form')
    </div>
@endsection
