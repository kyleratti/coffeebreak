<div class="card border-secondary w-25">
    <div class="card-body">
        <h4 class="card-title">{{ $objDrink->name }}</h4>
        
        <p class="card-text">
            {{ $objDrink->description }}
        </p>
    </div>

    @if(Setting::get('accepting_orders', false))
        <div class="card-footer">
            <form method="POST" action="{{ route('order.place') }}">
                {{ csrf_field() }}
                <input type="hidden" name="drink" value="{{ $objDrink->id }}"/>

                <div class="form-group row">
                    <label for="shots" class="col-sm-6 col-form-label">Espresso Shots</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="shots" value="{{ $objDrink->shots }}" max="4" min="0" placeholder="{{ $objDrink->shots }}" />
                    </div>
                </div>

                <div class="form-group row">    
                    <div class="col-sm-12">
                        <select class="custom-select form-control" name="iced">
                            <option value="iced">Cold as ice</option>
                            <option value="hot">Steaming hot</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="milk" class="col-sm-4 col-form-label">Milk Type</label>
                    <div class="col-sm-8">
                        <select class="custom-select form-control" name="milk">
                            @each('menu.milk.item', App\Drink\Milk::allInStock(), 'objMilk', 'menu.milk.empty')
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline btn-primary w-100">Place Order</button>
            </form>
        </div>
    @endif
</div>
