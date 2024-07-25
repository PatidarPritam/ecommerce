@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="container mt-4">
        <!-- Product Display -->
        <div class="row" id="product-list">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <!-- <a href="{{ url('/view/' . $product->id) }}">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
            </a> -->
            <a href="{{ route('views', ['id' => $product->id]) }}">
      <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
       </a>
                            <p class="card-text">${{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
