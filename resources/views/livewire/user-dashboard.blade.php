<div>
    <h1 class="text-center mt-5">Welcome to Maranatha Store!</h1>

    <div class="row mt-4">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset($product->file_photo) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Price: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="card-text">Category: {{ $product->kategori }}</p>
                    <button class="btn btn-primary" wire:click="addToCart({{ $product->id }})">Add to Cart</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
