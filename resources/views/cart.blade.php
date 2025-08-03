@extends('shop')

@section('content')
<style>
    body {
        background: url('https://images.unsplash.com/photo-1611605698335-dce00f65b8d2?auto=format&fit=crop&w=1600&q=80') no-repeat center center fixed;
        background-size: cover;
    }
    .cart-container {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(8px);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
    }
    .table thead {
        background-color: #2c3e50;
        color: #ffffff;
    }
    .btn-outline-danger:hover {
        background-color: #e74c3c;
        color: #fff;
    }
    .empty-cart {
        color: #fff;
        background: rgba(0,0,0,0.4);
        border-radius: 20px;
        padding: 40px;
    }
</style>

<div class="container py-5">
    @php $total = 0 @endphp

    @if(session('cart') && count(session('cart')) > 0)
    <div class="cart-container">
        <h2 class="mb-4 text-center fw-bold text-dark">🛒 Your Shopping Cart</h2>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart') as $id => $details)
                        @php $subtotal = $details['price']; $total += $subtotal; @endphp
                        <tr rowId="{{ $id }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $details['image'] }}" class="img-thumbnail me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div>
                                        <h6 class="fw-bold mb-1">{{ $details['name'] }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="fw-medium">₹ {{ number_format($details['price'], 2) }}</td>
                            <td class="fw-medium">₹ {{ number_format($subtotal, 2) }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-danger delete-product" title="Remove item">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold bg-light">
                        <td colspan="2" class="text-end">Grand Total:</td>
                        <td>₹ {{ number_format($total, 2) }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark">
                <i class="fa fa-angle-left me-1"></i> Continue Shopping
            </a>
            <button class="btn btn-success px-4">
                <i class="fa fa-check me-1"></i> Checkout
            </button>
        </div>
    </div>

    @else
    <div class="text-center empty-cart mt-5">
        <h2 class="fw-bold">Your cart is empty 🛍️</h2>
        <p class="lead">Start shopping and fill it with great stuff!</p>
        <a href="{{ url('/dashboard') }}" class="btn btn-light mt-3">
            <i class="fa fa-shopping-cart me-1"></i> Go to Shop
        </a>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(".delete-product").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                url: '{{ route('delete.cart.product') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.closest("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection
