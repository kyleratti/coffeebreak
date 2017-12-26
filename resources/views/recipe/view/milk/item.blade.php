<!---'name',
    'is_in_stock'
-->

<div class="card border-primary w-25">
    <div class="card-body">
        <h4 class="card-title">{{ $objMilk->name }}</h4>

        @if($objMilk->is_in_stock)
            <p class="card-text">Currently in stock!</p>
        @else
            <p class="card-text">Currently out of stock</p>
        @endif
    </div>

    <div class="card-footer">
        @if($objMilk->is_in_stock)
            <button class="btn btn-outline-danger">Out of stock</button>
        @else
            <button class="btn btn-success">In stock</button>
        @endif
    </div>
</div>
    