@extends('managment.managment_master')
@section('managment_head')

@stop

@section('managment_content')
<div class=" mx-2 ">
    <div class=" card">
        <div class="card-header">
            modifier les éléments de la page d'accueil
        </div>
        <form action="{{ route('website.management.update_10_top_requested_products',app()->getLocale()) }}" method="post" class="mx-3 my-2 py-2 px-3 card">
            @csrf
            <strong> Top 10 les plus demandés</strong>
            <div class="row mx-5 borders p-3 my-2">
                <h4 class="d-block">afficher les 10 produits les plus demandés sur la page d'accueil</h4>
                <div class=" col-6 form-check ">
                    <input class="form-check-input" type="radio" name="is_active" id="exampleRadios11" value="1">
                    <label class="form-check-label" for="exampleRadios11">
                        oui
                    </label>
                </div>
                <div class=" col-6 form-check ">
                    <input class="form-check-input" type="radio" name="is_active" id="exampleRadios22" value="0">
                    <label class="form-check-label" for="exampleRadios22">
                        non
                    </label>
                </div>
            </div>
            <div class="row mx-5 borders p-3 my-2">
                <h4 class="col-12">Générer des produits</h4>
                <div class=" col-6 form-check ">
                    <input class="form-check-input" type="radio" name="most_requested_products_genirate" id="exampleRadios1" value="manualy" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        manuellement
                    </label>
                </div>
                <div class=" col-6 form-check ">
                    <input class="form-check-input" type="radio" name="most_requested_products_genirate" id="exampleRadios2" value="auto" checked>
                    <label class="form-check-label" for="exampleRadios2">
                        automatiquement
                    </label>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8 form-group  d-flex-justify-content-center">
                    <label for="inputState">Produit position 1</label>
                    <select id="inputState" name="product_1" data-live-search="true" class="selectpicker form-control">
                        <option>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-8 form-group  d-flex-justify-content-center">
                    <label for="inputState2">Produit position 2</label>
                    <select id="inputState2" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-8 form-group  d-flex-justify-content-center">
                    <label for="inputState3">Produit position 3</label>
                    <select id="inputState3" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">mise a jour</button>
            </div>
    </div>
    </form>

</div>
</div>
@stop

@section('managment_script')

@stop