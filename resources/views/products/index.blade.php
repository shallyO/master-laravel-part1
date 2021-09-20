    @extends('layouts.master')

    @section('content')

    <h1>List of Products</h1>
    @if (empty($products))
        <div class="alert alert-warning">
            The list of products is empty
        </div>
    @else

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thread-light">
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->status }}</td>
                </tr>
            @endforeach
                <tr>
                    <td>2</td>
                    <td>Shampoo</td>
                    <td>Best Shampoo Ever</td>
                </tr>
            </tbody>
        </table>


    </div>
        @endif

    @endsection
