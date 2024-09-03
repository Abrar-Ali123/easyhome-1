{{-- resources/views/parts/order_form.blade.php --}}
<form id="order-form" action="{{ route('orders.store', $product->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">طلب المنتج</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#order-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: $(this).attr('action'), // Get the form action URL
                method: 'POST',
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    // Handle the response here (e.g., display a success message)
                    alert('تم طلب المنتج بنجاح!');
                },
                error: function(xhr, status, error) {
                    // Handle errors here (e.g., display an error message)
                    alert('حدث خطأ أثناء طلب المنتج.');
                }
            });
        });
    });
</script>
