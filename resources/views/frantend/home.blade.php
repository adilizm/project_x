@extends('frant_master')
<!-- Required Core Stylesheet -->
<link rel="stylesheet" href="/glide/css/glide.core.min.css">
<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="/glide/css/glide.theme.min.css">
<style>
    body {
        font-family: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif;
        font-size: 0.75rem;
    }

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


    .category_name:hover {
        font-weight: 700;
        color: #11bfda;
    }

    .embla {
        overflow: hidden;
    }

    .embla__container {
        display: flex;
    }

    .glide__arrow {
        position: absolute;
        display: block;
        top: 50%;
        z-index: 2;
        color: white;
        text-transform: uppercase;
        padding: 6px 8px;
        background-color: #212529;
        border: 2px solid rgb(33 37 41);
        border-radius: 46px;
        box-shadow: 0 0.25em 0.5em 0 rgb(0 0 0 / 10%);
        opacity: .6;
        cursor: pointer;
        transition: opacity 150ms ease, border 300ms ease-in-out;
        transform: translateY(-50%);
        line-height: 1;
    }

    .glide__arrow:hover {
        opacity: 1;
    }

    .categoreis_panel {
        height: 100%;
        width: 100%;
        box-shadow: 0 .2rem .55rem rgba(0, 0, 0, .2) !important;
        z-index: 10;
    }

    .product-card1:hover {
        transform: scale(1.029);
        box-shadow: 0 0.25em 0.5em 0 rgb(0 0 0 / 10%);

    }
</style>
@section('frant_head')

@stop
@section('frant_content')
<div class="row ">
    <!-- categoreis panel -->
    <aside class="d-none d-md-block col-md-3 col-lg-2">
        <nav class="card" style="box-shadow: 0rem 0.1rem .2rem rgb(0 0 0 / 20%) !important;">
            <ul class="menu-category" style="font-size: smaller;">
                <li><a href="#">Best clothes</a></li>
                <li><a href="#">Automobiles</a></li>
                <li><a href="#">Home interior</a></li>
                <li><a href="#">Home interior</a></li>
                <li><a href="#">Electronics</a></li>
                <li><a href="#">Electronics</a></li>
                <li><a href="#">Electronics</a></li>
                <li><a href="#">Technologies</a></li>
                <li><a href="#">Technologies</a></li>
                <li><a href="#">Digital goods</a></li>
                <li class="has-submenu"><a href="#">More items</a>
                    <ul class="submenu">
                        <li><a href="#">Submenu name</a></li>
                        <li><a href="#">Great submenu</a></li>
                        <li><a href="#">Another menu</a></li>
                        <li><a href="#">Some others</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- sliders panel -->
    <div class="col-md-9 col-lg-8 position-relative p-0 rounded  ">
        <!-- super marche categories -->
        <div class="categoreis_panel position-absolute top-0 row m-0 invisible bg-white rounded shadow-sm " id="super_marche_categories">
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
        <div class="categoreis_panel position-absolute top-0 row m-0 invisible bg-white rounded shadow-sm " id="Sport_et_loisire_categories">
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
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach($sliders as $slider)
                    <li class="glide__slide">
                        <a href="{{$slider->link}}" class="">
                            <img src="{{'/storage/'.$slider->laptop_path}}" style="width: 100%;height:100%;border-radius:5px" alt="">
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                        < </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
                </div>
                <div class="glide__bullets" data-glide-el="controls[nav]">
                    @foreach($sliders as $slider)
                    <button class="glide__bullet" data-glide-dir="={{$loop->index}}"></button>
                    @endforeach

                </div>

            </div>
        </div>
        <div class="bg-warning d-none d-lg-flex d-xl-none">
            p
        </div>
        <div class=" d-md-flex d-lg-none row m-0 justify-content-around  ">
            <div class="bg-danger card col-5 d-flex justify-content-center px-1" style="height: 124px;min-width: 48% !important;">
                <strong style="align-self: center;">Annonce 1</strong>
            </div>
            <div class="bg-success card col-5 d-flex justify-content-center px-1 " style="height: 124px;min-width: 48% !important;">
                <strong style="align-self: center;">Annonce 2</strong>
            </div>
        </div>
    </div>
    <div class="d-none d-lg-block col-0 col-lg-2">
        <div class="bg-danger d-flex justify-content-center alighn-items-center h-40 w-100" style="height: 45% ;margin:2.5%">
            <strong style="align-self: center;">Annonce 1</strong>
        </div>
        <div class="bg-success d-flex justify-content-center alighn-items-center h-40 w-100" style="height: 45% ;margin:2.5%">
            <strong style="align-self: center;">Annonce 2</strong>
        </div>
    </div>

    <!-- product card -->
    <div class=" product-card1 position-relative" style="max-width: 173px;overflow: hidden;padding-left: 2px;padding-right: 2px;">
        <div style="width: 100%;padding: 1px;">
            <img src="https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/70/594614/1.jpg?5694" alt="" style="width: 100%;">
        </div>
        <div>
            <div style="overflow: hidden; white-space: nowrap; font-size: .875rem; width: 173px; text-overflow: ellipsis; padding-left: 3px;">Mouse and keyboard only for gamers like me adil pls by this pack </div>
        </div>
        <div class="d-flex flex-column ">
            <span style="font-size: 1rem;font-weight: 600;">115.56 Dhs</span>
            <span style="font-size: .75rem;font-weight: 400;color:#75757a;text-decoration-line: line-through;">170 Dhs</span>
        </div>
        <span class="position-absoute top-0" style="
    position: absolute;    top: 10px;    right: 14px;    background-color: #11bfda;    border-radius: 5px;    color: white;    font-size: 0.8rem;    font-weight: 600;    padding-right: 4px;    padding-left: 4px;">-33%</span>
    </div>
    <div class=" product-card1 position-relative" style="max-width: 173px;overflow: hidden;padding-left: 2px;padding-right: 2px;">
        <div style="width: 100%;padding: 1px;">
            <img src="https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/75/140143/1.jpg?5765" alt="" style="width: 100%;">
        </div>
        <div>
            <div style="overflow: hidden; white-space: nowrap; font-size: .875rem; width: 173px; text-overflow: ellipsis; padding-left: 3px;">Taktouka ljabaliya dakchi dyal jbel</div>
        </div>
        <div class="d-flex flex-column ">
            <span style="font-size: 1rem;font-weight: 600;">60 Dhs</span>
            <!--             <span style="font-size: .75rem;font-weight: 400;color:#75757a;text-decoration-line: line-through;">560 Dhs</span>
 -->
        </div>
        <!--         <span class="position-absoute top-0" style="    position: absolute;    top: 10px;    right: 14px;    background-color: #11bfda;    border-radius: 5px;    color: white;    font-size: 0.8rem;    font-weight: 600;    padding-right: 4px;    padding-left: 4px;">-17%</span>
 -->
    </div>
    <div class=" product-card1 position-relative" style="max-width: 173px;overflow: hidden;padding-left: 2px;padding-right: 2px;">
        <div style="width: 100%;padding: 1px;">
            <img src="https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/64/233014/1.jpg?7766" alt="" style="width: 100%;">
        </div>
        <div>
            <div style="overflow: hidden; white-space: nowrap; font-size: .875rem; width: 173px; text-overflow: ellipsis; padding-left: 3px;">Lanchoun kayowsel derya finma bghiti</div>
        </div>
        <div class="d-flex flex-column ">
            <span style="font-size: 1rem;font-weight: 600;">115.56 Dhs</span>
            <span style="font-size: .75rem;font-weight: 400;color:#75757a;text-decoration-line: line-through;">700 Dhs</span>
        </div>
        <span class="position-absoute top-0" style="
    position: absolute;    top: 10px;    right: 14px;    background-color: #11bfda;    border-radius: 5px;    color: white;    font-size: 0.8rem;    font-weight: 600;    padding-right: 4px;    padding-left: 4px;">-33%</span>
    </div>
    <!-- end product card -->
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
<script src="/glide/glide.min.js"></script>

<script>
    new Glide('.glide', {
        type: 'carousel',
        gap: 0,
        autoplay: 4000,
        hoverpause: true,
    }).mount()
</script>


@stop