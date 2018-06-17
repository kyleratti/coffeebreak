<a href="{{ route('admin.settings.availability.flavor.toggle', $objFlavor->id) }}" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-{{ $objFlavor->is_in_stock ? 'success' : 'danger'}}">
    <div class="d-flex w-25 justify-content-between">
        <p class="mb-1">{{ $objFlavor->name }}</p>
    </div>
</a>
    