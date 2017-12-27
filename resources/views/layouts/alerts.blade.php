<div class="alert alert-{{ Setting::get('accepting_orders', false) ? 'success' : 'danger' }}">
    <h4 class="alert-heading">{{ Setting::get('accepting_orders', false) ? 'Order now!' : 'Come back later' }}</h4>

    @if(Setting::get('accepting_orders', false))
        <p>Drink orders are now being accepted - order now before it closes!</p>
    @else
        <p>No drink orders are currently being accepted</p>
    @endif
</div>
    