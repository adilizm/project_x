@extends('managment.managment_master')
@section('managment_head')
<!-- Select2 -->
<link rel="stylesheet" src="/AdminLTE3/plugins/select2/css/select2.min.css">
<script src="/AdminLTE3/plugins/select2/js/select2.full.min.js"></script>

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
                    <input class="form-check-input" type="radio" name="is_active" id="oui" value="1">
                    <label class="form-check-label" for="exampleRadios11">
                        oui
                    </label>
                </div>
                <div class=" col-6 form-check ">
                    <input class="form-check-input" type="radio" name="is_active" id="non" value="0">
                    <label class="form-check-label" for="exampleRadios22">
                        non
                    </label>
                </div>
            </div>
            <div class="row mx-5 borders p-3 my-2 d-none" id="generateType" >
                <h4 class="col-12">Générer des produits</h4>
                <div class=" col-6 form-check ">
                    <input class="form-check-input" type="radio" name="most_requested_products_genirate" id="manual" value="manualy" >
                    <label class="form-check-label" for="exampleRadios1">
                        manuellement
                    </label>
                </div>
                <div class=" col-6 form-check ">
                    <input class="form-check-input" type="radio" name="most_requested_products_genirate" id="auto" value="auto" checked>
                    <label class="form-check-label" for="exampleRadios2">
                        automatiquement
                    </label>
                </div>
            </div>




            <div class="row justify-content-center d-none" id="productszone">
                <div class="form-group col-8">
                    <label>Disabled Result</label>
                    <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option disabled="disabled">California (disabled)</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
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
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

    })
    document.getElementById('manual').addEventListener('change',function(){
        if( document.getElementById('manual').checked){
            document.getElementById('productszone').classList.remove('d-none')
            
        }
    })
    document.getElementById('auto').addEventListener('change',function(){
        if( document.getElementById('auto').checked){
            document.getElementById('productszone').classList.add('d-none')

        }
    })
    document.getElementById('oui').addEventListener('change',function(){
        if( document.getElementById('oui').checked){
            document.getElementById('generateType').classList.remove('d-none')
            
        }
    })
    document.getElementById('non').addEventListener('change',function(){
        if( document.getElementById('non').checked){
            document.getElementById('generateType').classList.add('d-none')
            document.getElementById('productszone').classList.add('d-none')
            document.getElementById('manual').checked=false
        }
    })
</script>
@stop