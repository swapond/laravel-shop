@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Your Cart</h2>

        @if(session('cart') && count(session('cart')))
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td><img src="{{ asset('storage/' . $item['image']) }}" width="50"></td>
                        <td>${{ $item['price'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control w-50 d-inline">
                                <button class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>${{ $item['price'] * $item['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                    <td><strong>${{ $total }}</strong></td>
                    <td></td>
                </tr>
                </tbody>
            </table>

            <a href="#" class="btn btn-success">Proceed to Checkout</a>

        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
