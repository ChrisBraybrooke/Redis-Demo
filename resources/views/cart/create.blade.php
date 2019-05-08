@extends('layout')

@section('body')
  <div class="container pt-5">
    <h1>Cart</h1>
  
    <div class="row">
      <div class="col-md-8">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" class="font-weight-bold">Product</th>
              <th scope="col" class="font-weight-bold">Quantity</th>
              <th scope="col" class="font-weight-bold">Price</th>
              <th scope="col" class="font-weight-bold">Total</th>
              <th scope="col" class="font-weight-bold"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($cartItems as $cartItem)
              @php($cartItem = json_decode($cartItem))
              <tr>
                <td>{{ $cartItem->name }}</td>
                <td>{{ $cartItem->qty }}</td>
                <td>£{{ number_format($cartItem->unit_price/100) }}</td>
                <td>£{{ number_format(($cartItem->unit_price * $cartItem->qty)/100) }}</td>
                <td>
                  <form method="POST" action="{{ route('cart.destroy') }}">
                    @csrf
                    <input type="hidden" name="item" value='@json($cartItem)'>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="col-md-4">
        <form method="POST" action="{{ route('cart.store') }}">
          @csrf
          <button type="submit" class="btn btn-primary d-block w-100">Add To Cart!</button>
        </form>
      </div>
    </div>
  </div>
@endsection