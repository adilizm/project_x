@extends('frant_master')

@section('frant_head')

<style>
    .breadcrumb {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding: .75rem 1rem;
        margin-bottom: 1rem;
        list-style: none;
        background-color: #e9ecef;
        border-radius: .25rem;
    }

    .my_card {
        box-shadow: rgb(149 157 133 / 20%) 0px 0px 11px;
        border-radius: 5px;
    }
    .card{
        background-color: white;
        border-radius: 8px;
        padding-top: 11px;
    }
    #wrap{
        background-color: #e9ecef;
    }
</style>
@stop
@section('frant_content')
<nav>
    <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="/">{{ translate('Home')}}</a></li>
        @foreach($subcategoreis as $subcategory)
        <li class="breadcrumb-item"><a href="{{ route('category.page',['language'=>app()->getLocale(),'slug'=>$subcategory->slug]) }}">{{ $subcategory->name}}</a></li>
        @endforeach
        <li class="breadcrumb-item active" aria-current="page">{{ $category->name}}</li>
    </ol>
</nav>
@if(count($category->Child_categoreis) > 0 )
<div class="glide card container my_card my-1 ">
    <div class="glide__track " data-glide-el="track">
        <ul class="glide__slides ">
            @foreach($category->Child_categoreis as $child_category)
            <li class="glide__slide   product-card1 position-relative p-1 m-1" style="overflow: hidden;padding-left: 2px;padding-right: 2px;">
                <a href="{{ route('category.page',['language'=>app()->getLocale(),'slug'=>$child_category->slug]) }}">
                    <div style="width: 100%;padding: 1px;">
                        <img src="{{'/storage/'.$child_category->picture}}" alt="" style="width: 100%;">
                    </div>
                    <div>
                        <div style="overflow: hidden; white-space: nowrap; font-size: .875rem; width: 170px; text-overflow: ellipsis; padding-left: 3px;font-weight: 700;text-align: center;">{{ $child_category->name }}</div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                < </button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
        </div>
    </div>
</div>
@endif
@foreach($category->Child_categoreis as $child_categorie )
@if( count($child_categorie->Products()->where('confermed','1')->where('status','published')->get()) > 1 )

<div class="glide container my_card my-1 ">
    <div class="glide__track " data-glide-el="track">
        <ul class="glide__slides ">
            @foreach($child_categorie->Products()->where('confermed','1')->where('status','published')->get() as $child_category_product)
            <li class="glide__slide   product-card1 position-relative p-1 m-1" style="overflow: hidden;padding-left: 2px;padding-right: 2px;">
                <a href="#">
                    <div style="width: 100%;padding: 1px;">
                        <img src="{{'/storage/'.$child_category_product->Images()->where('is_main','1')->first()}}" alt="" style="width: 100%;">
                    </div>
                    <div>
                        <div style="overflow: hidden; white-space: nowrap; font-size: .875rem; width: 170px; text-overflow: ellipsis; padding-left: 3px;">{{ $child_category_product->name }}</div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                < </button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
        </div>
    </div>
</div>
@endif
@endforeach

<div class="row my-4">
    <aside class="col-md-3">

        <div class="card">
            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="collapsed">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Product type</h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_1" style="">
                    <div class="card-body">
                        <form class="pb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <ul class="list-menu">
                            <li><a href="#">People </a></li>
                            <li><a href="#">Watches </a></li>
                            <li><a href="#">Cinema </a></li>
                            <li><a href="#">Clothes </a></li>
                            <li><a href="#">Home items </a></li>
                            <li><a href="#">Animals</a></li>
                            <li><a href="#">People </a></li>
                        </ul>

                    </div> <!-- card-body.// -->
                </div>
            </article> <!-- filter-group  .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="false" class="collapsed">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Brands </h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_2" style="">
                    <div class="card-body">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">Mercedes
                                <b class="badge badge-pill badge-light float-right">120</b>
                            </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">Toyota
                                <b class="badge badge-pill badge-light float-right">15</b>
                            </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">Mitsubishi
                                <b class="badge badge-pill badge-light float-right">35</b>
                            </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">Nissan
                                <b class="badge badge-pill badge-light float-right">89</b>
                            </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <div class="custom-control-label">Honda
                                <b class="badge badge-pill badge-light float-right">30</b>
                            </div>
                        </label>
                    </div> <!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="false" class="collapsed">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Price range </h6>
                    </a>
                </header>
                <div class="filter-content collapse" id="collapse_3" style="">
                    <div class="card-body">
                        <input type="range" class="custom-range" min="0" max="100" name="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Min</label>
                                <input class="form-control" placeholder="$0" type="number">
                            </div>
                            <div class="form-group text-right col-md-6">
                                <label>Max</label>
                                <input class="form-control" placeholder="$1,0000" type="number">
                            </div>
                        </div> <!-- form-row.// -->
                        <button class="btn btn-block btn-primary">Apply</button>
                    </div><!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="false" class="collapsed">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Sizes </h6>
                    </a>
                </header>
                <div class="filter-content collapse" id="collapse_4" style="">
                    <div class="card-body">
                        <label class="checkbox-btn">
                            <input type="checkbox">
                            <span class="btn btn-light"> XS </span>
                        </label>

                        <label class="checkbox-btn">
                            <input type="checkbox">
                            <span class="btn btn-light"> SM </span>
                        </label>

                        <label class="checkbox-btn">
                            <input type="checkbox">
                            <span class="btn btn-light"> LG </span>
                        </label>

                        <label class="checkbox-btn">
                            <input type="checkbox">
                            <span class="btn btn-light"> XXL </span>
                        </label>
                    </div><!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" class="collapsed">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">More filter </h6>
                    </a>
                </header>
                <div class="filter-content in collapse" id="collapse_5" style="">
                    <div class="card-body">
                        <label class="custom-control custom-radio">
                            <input type="radio" name="myfilter_radio" checked="" class="custom-control-input">
                            <div class="custom-control-label">Any condition</div>
                        </label>

                        <label class="custom-control custom-radio">
                            <input type="radio" name="myfilter_radio" class="custom-control-input">
                            <div class="custom-control-label">Brand new </div>
                        </label>

                        <label class="custom-control custom-radio">
                            <input type="radio" name="myfilter_radio" class="custom-control-input">
                            <div class="custom-control-label">Used items</div>
                        </label>

                        <label class="custom-control custom-radio">
                            <input type="radio" name="myfilter_radio" class="custom-control-input">
                            <div class="custom-control-label">Very old</div>
                        </label>
                    </div><!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
        </div> <!-- card.// -->

    </aside> <!-- col.// -->
    <main class="card col-md-9">

        <header class="border-bottom mb-4 pb-3">
            <div class="form-inline">
                <span class="mr-md-auto">{{count($products)}} {{translate('Items found')}} </span>
                <select class="mr-2 form-control">
                    <option> {{translate('Latest items')}} </option>
                    <option> {{translate('Trending')}} </option>
                    <option> {{translate('Most Popular')}} </option>
                    <option> {{translate('Cheapest')}} </option>
                </select>
                <div class="btn-group align-items-center">
                    <form class="m-0" action="{{ route('category.page',['language'=>app()->getLocale(),'slug'=>$category->slug]) }}" method="get">
                        @csrf
                        <input type="hidden" name="view_type" value="list_view">
                        <button type="submit" style="border-radius: 10px;" class="btn mx-1 btn-outline-primary @if($view_grid != 1) active @endif">
                            <i class="fa fa-bars"></i></button>
                    </form>
                    <a href="{{ route('category.page',['language'=>app()->getLocale(),'slug'=>$category->slug])  }}" style="height: fit-content;border-radius: 10px;" class="btn btn-outline-primary mx-1  @if($view_grid == 1) active @endif" data-toggle="tooltip" title="" data-original-title="Grid view">
                        <i class="fa fa-th"></i></a>
                </div>
            </div>
        </header><!-- sect-heading -->
        <div class="container">
        <div class="row">
            @if($view_grid == 1)
            @foreach($products as $product)
            <div class=" col-6 col-md-4 col-lg-2 product-card1 position-relative px-1 my-1" style="overflow: hidden;padding-left: 2px;padding-right: 2px;">
                <div style="padding: 1px;">
                    <img src="{{'/storage/'.$product->Images()->where('is_main','1')->first()->path}}" alt="" style="width: 100%;">
                </div>
                <div>
                    <div style="overflow: hidden; white-space: nowrap; font-size: .875rem; width: 170px; text-overflow: ellipsis; padding-left: 3px;">{{ $product->name }}</div>
                </div>
                <div class="d-flex flex-column ">
                    <span style="font-size: 1rem;font-weight: 600;">{{ $product->prix}}</span>
                    @if($product->old_price != null)
                    <span style="font-size: .75rem;font-weight: 400;color:#75757a;text-decoration-line: line-through;">{{$product->old_price}}</span>
                    @endif
                </div>
                <span class="position-absoute top-0" style=" position: absolute;    top: 10px;    right: 14px;    background-color: #da8611;    border-radius: 5px;    color: white;    font-size: 0.8rem;    font-weight: 600;    padding-right: 4px;    padding-left: 4px;">-33%</span>
            </div>
            @endforeach
            @else
            @foreach($products as $product)
            <div class=" col-12 product-card1 position-relative px-1 my-1" style="overflow: hidden;padding-left: 2px;padding-right: 2px;">
                <div class="row">    
                <div class="col-4  position-relative d-flex justify-content-center align-items-center" style="padding: 1px;">
                    <img src="{{'/storage/'.$product->Images()->where('is_main','1')->first()->path}}" alt="" style="width: 100%;max-width: 200px;">
                    <span class="position-absoute top-0" style=" position: absolute;    top: 10px;    right: 14px;    background-color: #da8611;    border-radius: 5px;    color: white;    font-size: 0.8rem;    font-weight: 600;    padding-right: 4px;    padding-left: 4px;">-33%</span>

                </div>
                <div class="col-8">
                    <div>
                        <div style="font-size: 1.2rem; padding-left: 3px;">{{ $product->name }}</div>
                    </div>
                    <div class="d-flex flex-column ">
                        <span style="font-size: 1rem;font-weight: 600;">{{ $product->prix}}</span>
                        @if($product->old_price != null)
                        <span style="font-size: .75rem;font-weight: 400;color:#75757a;text-decoration-line: line-through;">{{$product->old_price}}</span>
                        @endif
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <nav class="mt-4" aria-label="Page navigation sample">
            {{$products->links()}}
        </nav>
        </div>

    </main> <!-- col.// -->

</div>





@stop
@section('frant_script')
<script src="/glide/glide.min.js"></script>
@php
$language = \App\Models\Language::where('key',app()->getLocale())->first();
@endphp
<script>
    new Glide('.glide', {
        type: 'carousel',
        gap: 0,
        perView: 7.5,
        @if($language->rtl == 1)
        direction: 'rtl',
        @endif
        autoplay: 6500,
        hoverpause: true,
        breakpoints: {
            800: {
                perView: 3.5
            },
            410: {
                perView: 2.5

            },
            200: {
                perView: 1.5
            },
        }
    }).mount()
</script>

@stop