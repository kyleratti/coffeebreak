@if(Setting::get('accepting_orders', false))
    <span class="badge badge-success">Accepting new orders!</span>
    <a class="btn btn-danger btn-sm" role="button" href="{{ route('admin.settings.accepting_orders.toggle') }}">Prevent new orders</a>
@else
    <span class="badge badge-danger">Not accepting new orders</span>
    <a class="btn btn-success btn-sm" role="button" href="{{ route('admin.settings.accepting_orders.toggle') }}">Allow new orders</a>
@endif
