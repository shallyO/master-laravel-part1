@extends('layouts.app')

@section('content')

    <h1>Create a product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" required value="{{ old('title') }}">
        </div>
        <div class="form-row">
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" required value="{{ old('description') }}">
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input type="number" class="form-control" min="1.00" step="0.01" name="price" required value="{{ old('price') }}">
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input type="number" class="form-control" min="1.00" step="0.01" name="stock" required value="{{ old('stock') }}">
        </div>
        <div class="form-row">
            <label for="">Status</label>
            <select class="custom-select" name="status" required>
                <option value="">Select...</option>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}> Available</option>
                <option value="unavailable" {{ old('status') == 'available' ? ' ' : 'selected' }}> Unavailable</option>
            </select>
        </div>

        <div class="form-row">
            <button class="btn btn-primary btn-lg mt-3" type="submit"> Create Product</button>
        </div>
    </form>

@endsection
