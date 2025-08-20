@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mahsulot ma’lumoti</h1>

        <div class="card" style="width: 22rem;">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            @else
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Rasm mavjud emas">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text"><strong>Narxi:</strong> {{ number_format($product->price, 0, '.', ' ') }} so‘m</p>
                <p class="card-text"><strong>Kategoriya:</strong> {{ $product->category->name ?? 'Kategoriya yo‘q' }}</p>
                <p class="card-text"><strong>Izoh:</strong> {{ $product->description ?? 'Izoh berilmagan' }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Orqaga</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Tahrirlash</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">O‘chirish</button>
            </form>
        </div>
    </div>
@endsection
