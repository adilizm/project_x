@extends('frant_master')
<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
<style>
    .menu_categories_big_category {
        color: black;
        font-size: revert;
        border-bottom: 1px rgba(0, 0, 0, .2) solid;
        display: block;
    }

    .menu_categories_big_category:hover {
        color: #11bfda;
        font-weight: 700;
    }

    .menu_categories_child_category {
        color: black;
        font-size: small;
        font-weight: 300;
        font-size: small;
        display: block;
    }

    .menu_categories_child_category:hover {
        color: #11bfda;
        font-weight: 700;
        font-size: small;
    }

    #super_marche_categories {
        width: 100%;
        box-shadow: 0 .2rem .55rem rgba(0, 0, 0, .2) !important;
    }

    .super_marche:hover {
        font-weight: 700;
        color: #11bfda;
    }

    #Sport_et_loisire_categories {
        width: 100%;
        box-shadow: 0 .2rem .55rem rgba(0, 0, 0, .2) !important;
    }

    .embla {
        overflow: hidden;
    }

    .embla__container {
        display: flex;
    }

    .embla__slide {
        position: relative;
        flex: 0 0 100%;
    }
</style>
@section('frant_head')

@stop
@section('frant_content')
<div class="row ">
    <!-- categoreis panel -->
    <div class=" d-none d-md-block col-md-3 pr-0 col-lg-2 pt-1">

        <div id="super_marche" class="super_marche d-flex justify-content-center align-items-center py-1 pr-2 position-relative">
            <a href="#" class="text-dark">
                <i class="fas fa-home me-3 mx-1" style="width: 20px; height: 20px; text-align: center; align-self: center;padding-top: 2px;"></i>
                <span>Super marche</span>
            </a>
        </div>

        <div id="Sport_et_loisire" class="d-flex justify-content-center align-items-center py-1 pr-2 position-relative">
            <a href="#" class="text-dark">
                <i class="fas fa-home me-3 mx-1" style="width: 20px; height: 20px; text-align: center; align-self: center;padding-top: 2px;"></i>
                <span>Sport et loisire</span>
            </a>
        </div>

        <div class="super_marche d-flex justify-content-center align-items-center py-1 pr-2 position-relative">
            <a href="#" class="text-dark">
                <i class="fas fa-home me-3 mx-1" style="width: 20px; height: 20px; text-align: center; align-self: center;padding-top: 2px;"></i>
                <span>Beauté & Santé</span>
            </a>
        </div>

        <div class="super_marche d-flex justify-content-center align-items-center py-1 pr-2 position-relative">
            <a href="#" class="text-dark">
                <i class="fas fa-home me-3 mx-1" style="width: 20px; height: 20px; text-align: center; align-self: center;padding-top: 2px;"></i>
                <span>Super marche</span>
            </a>
        </div>

    </div>

    <!-- sliders panel -->
    <div class="col-md-9 col-lg-8 bg-warning position-relative p-0 rounded embla ">
        <!-- super marche categories -->
        <div class=" position-absolute  top-0 row m-0 invisible bg-white rounded shadow-sm " id="super_marche_categories">
            <div class="col-md-4 " style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                <a href="#" class=" menu_categories_big_category"> Eaux, boissons</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
            </div>
            <div class="col-md-4 ">
                <a href="#" class=" menu_categories_big_category"> Eaux, boissons</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_big_category"> Eaux, boissons</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
            </div>
            <div class="col-md-4 " style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                <a href="#" class=" menu_categories_big_category"> Eaux</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
            </div>
        </div>
        <div class=" position-absolute  top-0 row m-0 invisible bg-white rounded shadow-sm " id="Sport_et_loisire_categories">
            <div class="col-md-4 " style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;">
                <a href="#" class=" menu_categories_big_category"> FootBall</a>
                <a href="#" class="menu_categories_child_category">sport shoe</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
            </div>
            <div class="col-md-4 ">
                <a href="#" class=" menu_categories_big_category"> Tennis</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>

            </div>
            <div class="col-md-4 " style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                <a href="#" class=" menu_categories_big_category"> Eaux</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
                <a href="#" class="menu_categories_child_category">Cafe et cacao</a>
            </div>
        </div>
        <div class="embla__container">
        @foreach($sliders as $slider)
        <a href="https://www.facebook.com" class="embla__slide">
            <img src="{{'/storage/'.$slider->laptop_path}}" style="width: 100%;" alt="">
        </a>
        <a href="{{$slider->link}}" class="embla__slide">
            <img src="{{'/storage/'.$slider->laptop_path}}" style="width: 100%;" alt="">
        </a>
        <a href="https://www.google.com" class="embla__slide">
            <img src="{{'/storage/'.$slider->laptop_path}}" style="width: 100%;" alt="">
        </a>
        @endforeach
        </div>
    </div>
</div>

@stop
@section('frant_script')

<script>
    document.getElementById('super_marche').addEventListener('mouseover', function() {
        document.getElementById('super_marche_categories').classList.remove('invisible')
        document.getElementById('super_marche_categories').classList.add('visible')
    })
    document.getElementById('super_marche_categories').addEventListener('mouseover', function() {
        document.getElementById('super_marche_categories').classList.remove('invisible')
        document.getElementById('super_marche_categories').classList.add('visible')
    })
    document.getElementById('super_marche').addEventListener('mouseleave', function() {
        document.getElementById('super_marche_categories').classList.remove('visible')
        document.getElementById('super_marche_categories').classList.add('invisible')
    })
    document.getElementById('super_marche_categories').addEventListener('mouseleave', function() {
        document.getElementById('super_marche_categories').classList.remove('visible')
        document.getElementById('super_marche_categories').classList.add('invisible')
    })

    /* ---------------------- sport et loisire  */
    document.getElementById('Sport_et_loisire').addEventListener('mouseover', function() {
        document.getElementById('Sport_et_loisire_categories').classList.remove('invisible')
        document.getElementById('Sport_et_loisire_categories').classList.add('visible')
    })
    document.getElementById('Sport_et_loisire_categories').addEventListener('mouseover', function() {
        document.getElementById('Sport_et_loisire_categories').classList.remove('invisible')
        document.getElementById('Sport_et_loisire_categories').classList.add('visible')
    })
    document.getElementById('Sport_et_loisire').addEventListener('mouseleave', function() {
        document.getElementById('Sport_et_loisire_categories').classList.remove('visible')
        document.getElementById('Sport_et_loisire_categories').classList.add('invisible')
    })
    document.getElementById('Sport_et_loisire_categories').addEventListener('mouseleave', function() {
        document.getElementById('Sport_et_loisire_categories').classList.remove('visible')
        document.getElementById('Sport_et_loisire_categories').classList.add('invisible')
    })
    
</script>
<script type="text/javascript">
  var emblaNode = document.querySelector('.embla')
  var options = { loop: true }

  var embla = EmblaCarousel(emblaNode, options)
</script>

@stop