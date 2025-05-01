@extends('layouts.welcome')

@section('content')
<div class="relative bg-no-repeat bg-cover main">
    <div class="bg-no-repeat rounded-xl z-30 mx-auto">
      <x-navbar />
      <div class="container mx-auto py-10 mt-20">
        @if (!\Cart::getContent()->count())
            <div class="text-center">
                <img src="/assets/images/empty.png" alt="Empty Cart" class="mx-auto w-1/2 mb-6">
                <h2 class="text-xl font-semibold">{{ __('Your cart is empty! Add some items!') }}</h2>
                <a href="/" class="mt-4 inline-block px-6 py-3 bg-primary-500 text-white font-bold rounded">
                    ← {{ __('Back to products') }}
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Cart Items -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold mb-4">Cart</h2>
                    @foreach (\Cart::getContent() as $item)
                        <div class="flex justify-between items-center border-b py-4">
                            <div>
                                <h3 class="font-semibold">{{ $item->name }}</h3>
                                <p>{{ $item->quantity }} x {{ $item->price }} USD</p>
                            </div>
                            <div>
                                <img src="{{ asset('storage/' . $item->associatedModel->image) }}" class="w-20 h-20 object-cover rounded" alt="product">
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4 text-right font-bold">
                        Total: {{ \Cart::getTotal() }} USD
                    </div>
                </div>
    
                <!-- Square Payment Form -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-bold mb-4">Payment</h2>
                    <form id="payment-form">
                        @csrf
                        <label class="block mb-2 font-medium" for="shipping_address">Shipping Address:</label>
                        <input type="text" name="shipping_address" id="shipping_address" class="w-full border px-4 py-2 rounded mb-4" placeholder="Street, City, ZIP code..." required>
                        <div id="card-container" class="mb-4"></div>
                        <button type="submit" id="card-button" class="w-full bg-blue-900 text-white py-3 rounded font-semibold transition">
                            {{ __('Pay') }}
                        </button>
                        <div id="payment-status-container" class="text-red-500 mt-4"></div>
                    </form>
                </div>
            </div>
        @endif
    </div>
    

    <script src="https://web.squarecdn.com/v1/square.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", async function () {
        const statusContainer = document.getElementById("payment-status-container");

        if (!window.Square) {
            statusContainer.textContent = "❌ Failed to load Square.";
            return;
        }

        const payments = Square.payments("{{ env('SQUARE_APPLICATION_ID') }}", "{{ env('SQUARE_LOCATION_ID') }}");
        const card = await payments.card();
        await card.attach("#card-container");

        const form = document.getElementById("payment-form");
        form.addEventListener("submit", async function (event) {
            event.preventDefault();

            statusContainer.textContent = "⏳ Processing payment...";
            const address = document.getElementById("shipping_address").value.trim();

            if (!address) {
                statusContainer.textContent = "❌ Please enter your address.";
                return;
            }

            try {
                const result = await card.tokenize();
                if (result.status !== "OK") {
                    statusContainer.textContent = "❌ Card error: unable to generate token.";
                    return;
                }

                const token = result.token;
                const response = await fetch("{{ route('payment.charge') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        nonce: token,
                        shipping_address: address,
                        idempotency_key: crypto.randomUUID()
                    })
                });

                const json = await response.json();
                if (response.ok && json.success) {
                    statusContainer.classList.remove("text-red-500");
                    statusContainer.classList.add("text-green-600");
                    statusContainer.textContent = "✅ Payment successful 🎉 Redirecting...";
                    setTimeout(() => window.location.href = "/", 2000);
                } else {
                    statusContainer.textContent = "❌ Payment failed: " + (json.error || "Unknown error.");
                }
            } catch (error) {
                statusContainer.textContent = "❌ Network error: " + error.message;
                console.error(error);
            }
        });
    });
</script>




        <x-footer />
    </div>
</div>
@endsection
