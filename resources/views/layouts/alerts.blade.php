<div class="alert alert-{{ Setting::get('accepting_orders', false) ? 'success' : 'danger' }}">
    <h4 class="alert-heading">{{ Setting::get('accepting_orders', false) ? 'Hurray!' : 'Sorry!' }}</h4>

    @if(Setting::get('accepting_orders', false))
        <p>Drink orders are currently being accepted!</p>
    @else
        <p>Ordering is currently unavailable</p>
    @endif
</div>
    