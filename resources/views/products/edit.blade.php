@extends('layouts.app')

@section('content')

    <h1>Edit a product</h1>
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" value=" {{ old('title') ?? $product->title }}" required>
        </div>
        <div class="form-row">
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" value=" {{ old('description') ??  $product->description  }}" required>
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input type="number" class="form-control" min="1.00" step="0.01" name="price" value="{{  old('price') ?? $product->price }}" required>
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input type="number" class="form-control" min="1.00" step="0.01" name="stock" value="{{  old('stock') ?? $product->stock }}" required>
        </div>
        <div class="form-row">
            <label for="">Status</label>
            <select class="custom-select" name="status" required>

                <option value="available" {{ old('status') == 'avalable' ? 'selected' : ($product->status == 'available' ? 'selected': '' )}}> Available</option>



                <option value="unavailable" {{ old('status') == 'avalable' ? 'selected' : ( $product->status == 'unavailable' ? 'selected': '')}}> Unavailable</option>
            </select>
        </div>

        <div class="form-row">
            <button class="btn btn-primary btn-lg mt-3" type="submit"> Create Product</button>
        </div>
    </form>

@endsection
