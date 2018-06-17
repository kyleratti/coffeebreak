<a href="{{ route('admin.settings.availability.milk.toggle', $objMilk->id) }}" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-{{ $objMilk->is_in_stock ? 'success' : 'danger'}}">
    <div class="d-flex w-25 justify-content-between">
        <p class="mb-1">{{ $objMilk->name }}</p>
    </div>
</a>
