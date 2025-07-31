@extends('layouts.app')

@section('content')
    <h1>Laravel LIKE Search - Oddiy Misollar</h1>

    <!-- 1- -->
    <div class="search-box task1">
        <h3>1-vazifa: Description bo'yicha qidiruv</h3>
        <p><strong>Qoida:</strong> "phone" yozsangiz smartphone va headphone ham chiqadi</p>
        <form action="{{ route('search.task1') }}" method="GET">
            <input type="text" name="search" placeholder="Description dan qidiring (phone, laptop...)" required>
            <button type="submit">Qidiruv 1</button>
        </form>
    </div>

    <!-- 2- -->
    <div class="search-box task2">
        <h3>2-vazifa: Name + Description qidiruv</h3>
        <p><strong>Qoida:</strong> Name va Description ikkalasidan ham qidiradi</p>
        <form action="{{ route('search.task2') }}" method="GET">
            <input type="text" name="search" placeholder="Name yoki Description dan qidiring" required>
            <button type="submit">Qidiruv 2</button>
        </form>
    </div>

    <hr>

    <h3>Barcha mahsulotlar:</h3>
    @foreach($products as $product)
        <div class="product">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->description }}</p>
            <strong>${{ $product->price }}</strong>
        </div>
    @endforeach
@endsection
