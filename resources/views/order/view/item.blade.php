<!---'shots',
'milk',
'finished_at',
'drink'
'user'
-->

<div class="card border-primary w-25">
    <div class="card-body">
        <h4 class="card-title">{{ $objOrder->drink->name }}</h4>

        @if($objOrder->iced)
            <p class="card-text iced">Iced</p>
        @endif
        <p class="card-text">{{ $objOrder->shots }} espresso shot{{ $objOrder->shots != 1 ? 's' : '' }}</p>
        <p class="card-text">{{ $objOrder->milk->name }}</p>
    </div>

    <div class="card-footer small">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    {{ $objOrder->user->display_name }}
                </div>

                <div class="col">
                    {{ $objOrder->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('admin.drink.completed') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{ $objOrder->id }}"/>

                    <button type="submit" class="btn btn-success w-100">Ready!</button>
                </form>
            </div>

            <div class="col">
                    <form method="POST" action="{{ route('admin.drink.abandon') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="order_id" value="{{ $objOrder->id }}"/>
    
                        <button type="submit" class="btn btn-outline-danger w-100">Cancel</button>
                    </form>
            </div>
        </div>
    </div>
</div>
