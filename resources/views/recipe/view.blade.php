@extends('layouts.master')

@section('title', 'Recipes and Ingredients')

@section('content')
    <div class="description">
        <p>The available drink list will automatically generate based on the availability of the milk and flavors below.</p>

        <p>Green = in stock, red = not in stock. Tap to toggle.</p>
    </div>

    <div class="ingredients">
        <div class="row">
            <div class="col flavors">
                <h2>Flavors</h2>

                <div class="flavor-list">
                    @each('recipe.view.flavor.item', $objIngredients['objFlavors'], 'objFlavor', 'recipe.view.flavor.empty')
                </div>
            </div>

            <div class="col milks">
                <h2>Milks</h2>

                <div class="milk-list">
                    @each('recipe.view.milk.item', $objIngredients['objMilks'], 'objMilk', 'recipe.view.milk.empty')
                </div>
            </div>
        </div>
    </div>
@endsection
