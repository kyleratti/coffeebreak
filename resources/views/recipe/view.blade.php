@extends('layouts.master')

@section('title', 'Recipes and Ingredients')

@section('content')
    <div class="container ingredients">
        <div class="row">
            <div class="col-3">
                <div class="card-deck">
                    @each('recipe.view.milk.item', $objIngredients['objMilks'], 'objMilk', 'recipe.view.milk.empty')
                </div>
            </div>

            <div class="col-9">
                <div class="card-deck">
                    @each('recipe.view.flavor.item', $objIngredients['objFlavors'], 'objFlavor', 'recipe.view.flavor.empty')
                </div>
            </div>
        </div>
    </div>
    TODO: show milk
    TODO: show flavors

    TODO: show drinks
@endsection
