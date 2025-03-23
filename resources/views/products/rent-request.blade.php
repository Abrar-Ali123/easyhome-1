@extends('home')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">طلب استئجار {{ $product->category }}</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('rent.request.store', $product->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="start_date">تاريخ بداية الإيجار</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="rental_period">مدة الإيجار</label>
                                    <select class="form-control" id="rental_period" name="rental_period" required>
                                        @foreach($product::RENTAL_PERIODS as $period => $label)
                                            <option value="{{ $period }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="rental-summary bg-light p-3 rounded mb-4">
                            <h5 class="mb-3">ملخص الإيجار</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>القيمة الشهرية:</strong> {{ number_format($product->rent_price) }} ريال</p>
                                    <p><strong>مبلغ التأمين:</strong> {{ number_format($product->rent_deposit) }} ريال</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>إجمالي المدة:</strong> <span id="total_months">-</span></p>
                                    <p><strong>إجمالي القيمة:</strong> <span id="total_amount">-</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="notes">ملاحظات إضافية</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                أوافق على شروط وأحكام الإيجار
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">تقديم الطلب</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const rentalPeriodSelect = document.getElementById('rental_period');
    const totalMonthsSpan = document.getElementById('total_months');
    const totalAmountSpan = document.getElementById('total_amount');
    const rentPrice = {{ $product->rent_price }};
    const deposit = {{ $product->rent_deposit }};

    function updateTotals() {
        const months = parseInt(rentalPeriodSelect.value);
        const totalRent = (rentPrice * months) + deposit;
        
        totalMonthsSpan.textContent = months + ' شهر';
        totalAmountSpan.textContent = totalRent.toLocaleString() + ' ريال';
    }

    rentalPeriodSelect.addEventListener('change', updateTotals);
    updateTotals();
});
</script>
@endsection
