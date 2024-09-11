<form action="{{ route('orders.store', ['product' => $product->id]) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">طلب المنتج</button>
</form>
