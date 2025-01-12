<form action="{{ route('products.order', $product->id) }}" method="POST">
    @csrf
    <button type="submit">اطلب المنتج</button>
</form>
