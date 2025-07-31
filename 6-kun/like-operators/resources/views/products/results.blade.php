@extends('layouts.app')

@section('content')
    <h2>{{ $task }}</h2>
    <p><strong>Qidiruv:</strong> "{{ $search }}"</p>
    <p><strong>Topildi:</strong> {{ count($products) }} ta natija</p>

    <a href="{{ route('home') }}" style="text-decoration: none;">
        <button>⬅ Orqaga qaytish</button>
    </a>

    <hr>

    @if(count($products) > 0)
        @foreach($products as $product)
            <div class="product">
                <h4>{{ $product->name }}</h4>
                <p>{{ $product->description }}</p>
                <strong>${{ $product->price }}</strong>
            </div>
        @endforeach
    @else
        <p style="color: red;">Hech narsa topilmadi!</p>
    @endif

@endsection
