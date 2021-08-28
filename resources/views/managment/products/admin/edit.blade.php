@extends('managment.managment_master')

@section('managment_head')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="/AdminLTE3/plugins/summernote//summernote-bs4.min.css" rel="stylesheet">
<script src="/AdminLTE3/plugins/summernote/summernote-bs4.min.js"></script>
<!-- tags_input -->
<link rel="stylesheet" href="/tagsinput/bootstrap-tagsinput.css">
<script src="/tagsinput/bootstrap-tagsinput.min.js"></script>
<script>
    let option0 = false;
    let option1 = false;
    let option2 = false;
</script>
@stop

@section('managment_content')
<section class="content">
    <!-- Default box -->
    <form action="{{ route('admin.products.update')}}" method="post" enctype="multipart/form-data">
                @csrf
    <div class="card">
        <div class="px-3 py-2 d-flex border-bottom justify-content-between align-items-center">
            <h3 class="card-title">Edition d'un produit</h3>
            <div class="row">
                    <div class="px-2">
                        <label for=""> Statut :</label>
                    <select name="status" class="form-control " style="width: fit-content;padding-right: 25px;">
                            <option value="new" @if($product->status == "new") selected @endif >En attente</option>
                            <option value="published" @if($product->status == "published") selected @endif >publié</option>
                            <option value="unpublished" @if($product->status == "unpublished") selected @endif >non publié</option>
                            <option value="draft" @if($product->status == "draft") selected @endif >incomplet</option>
                            <option value="banned" @if($product->status == "banned") selected @endif >refusé</option>
                          </select>
                    </div>
                    <div class=" px-2">
                    <label for=""> Confirmation :</label>
                    <select name="confermed" class="form-control" style="width: fit-content;padding-right: 25px;">
                            <option value="1" @if($product->confermed == 1) selected @endif >confirmé</option>
                            <option value="0" @if($product->confermed == 0) selected @endif >non confirmé</option>
                          </select> 
                    </div>
                </div>
        </div>
        <div class="card-body">
           
                <input type="hidden" name="product_id" value="{{encrypt($product->id)}}">
               
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group ">
                            <label for="prodname">nom</label>
                            <input type="text" option2ired name="name" value="{{$product->name}}" class="form-control" id="prodname" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group ">
                            <label for="summernote">Decsription</label>
                            <textarea id="summernote" name="description"> {{ $product->description }} </textarea>
                        </div>
                    </div>

                    <div class=" col-md-4">
                        <div class="form-group ">
                            <label for="category">Categorie</label>
                            <select name="category" option2ired class="form-control" id="category">
                                <option>Choisir une catégorie</option>
                                @foreach($categreis as $category)
                                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif > {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="unite">Prix standard</label>
                            <input type="number" value="{{ $product->prix }}" class="form-control" name="standar_prix" id="standard_prix">
                        </div>
                        <div class="form-group ">
                            <label for="unite">Ancien prix</label>
                            <input type="number" value="{{ $product->old_price }}" class="form-control" name="old_price">
                        </div>
                        <div class="form-group ">
                            <label for="unite">unite</label>
                            <input type="text" value="{{ $product->unite }}" class="form-control" name="unite" id="unite">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group " id="div_main_image">

                            <div class=" position-relative form-group justify-content-center " style="text-align: center;display: grid;" id="main_image_preview_div">
                                <label>Image principal</label>
                                <div class="w-100 h-100 position-relative">
                                    <img style="margin:2px; padding:2px; border:1px #a4a4a4 solid; border-radius:5px" src="{{'/storage/'.$product->Images()->where('is_main',1)->first()->path}}" id="main_image_preview" width="100" alt="">
                                    <span onclick="Get_main_image()" class="badge badge-danger position-absolute top-2 right-2 cursor-pointer">
                                        <i class="fal fa-sync "></i>
                                    </span>
                                </div>
                            </div>

                            <input type="file" class="form-control d-none" id="main_image" name="main_image">
                        </div>
                        <div class="form-group ">
                            <div onclick="Get_details_images()" id="details_images_clicker" class="d-flex justify-content-center" style="background-color: #d6d6d6; height: 32px; border-radius: 5px; cursor: pointer">
                                <i class="fas fa-upload" style="align-self: center;color: #656586"></i>
                                <p style="font-weight: 700; align-self: center;color: #656586;padding-left: 5px;">mise à jour les image du produit <small>(800px*800px recommander)</small></p>
                            </div>
                            <div class=" position-relative my-3  form-group justify-content-center " style="text-align: center;display: grid;" id="main_image_preview_div">
                                <div id="details_images_previewer" class="d-flex">
                                    @foreach($product->Images()->where('is_main','0')->get() as $image)
                                    <div class="position-relative">
                                        <img style="margin:2px; padding:2px; border:1px #a4a4a4 solid; border-radius:5px" src="{{'/storage/' . $image->path}}" width="100px" height="100px" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <input type="file" class="form-control d-none" max="5" id="images" name="images[]" multiple>
                        </div>

                    </div>

                    <div class=" col-md-4">
                        <div class="form-group ">
                            <label>les mot cle du produit (max:5)</label>
                            <input type="text" name="keywords" class="form-control" value="{{$keywords}}" style="width: 100% !important;height:100% !important;" data-role="tagsinput">
                        </div>
                        <div class="form-group ">
                            <label>Quantité minimum</label>
                            <input type="number" value="{{$product->min_quantity}}" name="min_qty" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12" id="variants">
                        <div class="form-group ">
                            <button type="button" id="add_variant_to_this_product" onclick="Adding_variants_to_product()" class="btn btn-secondary btn-sm">Ajouter une variante a ce produit</button>
                        </div>
                        @foreach($options as $option)
                        @if($option != 'qty' && $option != 'prix' && $option != 'image')
                        <script>
                        {{'option'. $loop->index}} = true;
                        </script>
                        <div id="{{'option'.$loop->index}}" class="form-group mt-3 mb-3">
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <small class="small-hint">nom de la variant</small>
                                    <input type="text" name="options[]" value="{{$option}}" class="form-control" id="{{'option'.$loop->index.'inpute_name'}}">
                                </div>
                                <div class="{{'col-8 option' . $loop->index . 'inpute'}}">
                                    <small class="small-hint">les option doit être séparé par virgule ','</small>
                                    <input type="text" name="values[]" class="{{'form-control option'.$loop->index}}" value="{{$options_values[$loop->index]}}" style="width: 100% !important;height:100% !important;" data-role="tagsinput" id="{{'option'.$loop->index.'inpute'}}">
                                </div>
                                <div class="col-1" style="align-self: center;">
                                    <span onclick='removeOption("{{'option'.$loop->index.'inpute'}}")' class="btn btn-danger">X</span>
                                </div>
                            </div>
                        </div>
                        @else
                        <!-- this block shouls be in the Dom to add new variants -->
                        <div id="{{'option'.$loop->index}}" class=" d-none form-group mt-3 mb-3">
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <small class="small-hint">nom de la variant</small>
                                    <input type="text" name="options[]" class="form-control" id="{{'option'.$loop->index.'inpute_name'}}">
                                </div>
                                <div class="{{'col-8 option' . $loop->index . 'inpute'}}">
                                    <small class="small-hint">les option doit être séparé par virgule ','</small>
                                    <input type="text" name="values[]" class="{{'form-control option'.$loop->index}}" onchange="Click_btn_generate_prices()" style="width: 100% !important;height:100% !important;" data-role="tagsinput" id="{{'option'.$loop->index.'inpute'}}">
                                </div>
                                <div class="col-1" style="align-self: center;">
                                    <span onclick='removeOption("{{'option'.$loop->index.'inpute'}}")' class="btn btn-danger">X</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @if(count($options)==0)
                        <div id="option0" class=" d-none form-group mt-3 mb-3">
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <small class="small-hint">nom de la variant</small>
                                    <input type="text" name="options[]" class="form-control" id="option0inpute_name">
                                </div>
                                <div class="col-8 option0inpute">
                                    <small class="small-hint">les option doit être séparé par virgule ','</small>
                                    <input type="text" name="values[]" class="form-control option0" onchange="Click_btn_generate_prices()" style="width: 100% !important;height:100% !important;" data-role="tagsinput" id="option0inpute">
                                </div>
                                <div class="col-1" style="align-self: center;">
                                    <span onclick='removeOption("option0inpute")' class="btn btn-danger">X</span>
                                </div>
                            </div>
                        </div>
                        <div id="option1" class=" d-none form-group mt-3 mb-3">
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <small class="small-hint">nom de la variant</small>
                                    <input type="text" name="options[]" class="form-control" id="option1inpute_name">
                                </div>
                                <div class="col-8 option1inpute">
                                    <small class="small-hint">les option doit être séparé par virgule ','</small>
                                    <input type="text" name="values[]" class="form-control option1" onchange="Click_btn_generate_prices()" style="width: 100% !important;height:100% !important;" data-role="tagsinput" id="option1inpute">
                                </div>
                                <div class="col-1" style="align-self: center;">
                                    <span onclick='removeOption("option1inpute")' class="btn btn-danger">X</span>
                                </div>
                            </div>
                        </div>
                        <div id="option2" class=" d-none form-group mt-3 mb-3">
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <small class="small-hint">nom de la variant</small>
                                    <input type="text" name="options[]" class="form-control" id="option2inpute_name">
                                </div>
                                <div class="col-8 option2inpute">
                                    <small class="small-hint">les option doit être séparé par virgule ','</small>
                                    <input type="text" name="values[]" class="form-control option2" onchange="Click_btn_generate_prices()" style="width: 100% !important;height:100% !important;" data-role="tagsinput" id="option2inpute">
                                </div>
                                <div class="col-1" style="align-self: center;">
                                    <span onclick='removeOption("option2inpute")' class="btn btn-danger">X</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="d-flex">
                            @if(count($options)>0)
                            <div class="form-group ">
                                <button type="button" id="btn_generate_prices" onclick="genirate_prices()" class="btn btn-secondary btn-sm ">Mise a jour les varient</button>
                            </div>
                            @else
                            <div class="form-group ">
                                <button type="button" id="btn_generate_prices" onclick="genirate_prices()" class="btn btn-secondary btn-sm d-none">Ajouter le prix de chaque variant</button>
                            </div>
                            @endif
                            <p class="text-danger mx-2 my-1"> * Notez qu'en cliquant sur ce bouton, les quantités et les prix des variantes seront annulés.</p>
                        </div>

                    </div>


                </div>

                <div id="prices_table" class="card ">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>la variant</th>
                                    <th>Quntity</th>
                                    <th>Prix</th>
                                    <th>image</th>
                                </tr>
                            </thead>
                            <tbody id="variants_table">
                                @foreach($variants_as_array as $variant)
                                <tr>
                                    <td>
                                        @foreach($options as $option)
                                        @if($option != 'qty' && $option != 'prix' && $option != 'image')
                                        <span class="badge bg-info">{{$variant[$option]}}</span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td><input type="text" value="{{$variant['qty']}}" name="qtys[]" class="form-control"></td>
                                    <td><input type="text" value="{{$variant['prix']}}" name="allprices[]" class="form-control"></td>
                                    <td class="d-flex justify-content-center" ><img style="border-radius: 2px;" id="{{'old_variant_image_'.$loop->index}}"  @foreach($options as $option) @if( $option =='image' && $variant[$option] != null )  width="40" src="{{'/storage/'.$variant[$option]}}" /> @endif @endforeach
                                    </td>
                                    <td><input type="file" id="{{'File_variant_image_'.$loop->index}}"  name="{{'v_i_'.$loop->index}}" class="form-control"></td>
                                    @if($variant['image'] != null)
                                   <td> <input type="hidden" id="{{'old_variant_image'.$loop->index}}" name="{{'v_old_i_'.$loop->index}}" value="{{$variant[$option]}}" class="form-control"></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info">Enregistrer le produit</button>
                </div>
           
        </div>

        <script>
            $('#summernote').summernote({
                placeholder: 'Description de produit',
                tabsize: 2,
                height: 100
            });
        </script>
    </div>
    </form>
    <!-- /.card -->
</section>

<!-- modals for categories -->
@stop

@section('managment_script')
<script>
    function Adding_variants_to_product() {
        document.getElementById('btn_generate_prices').classList.remove('d-none')
        document.getElementById('btn_generate_prices').classList.add('d-flex')
        if (!option0) {
            document.getElementById('option0').classList.add('d-block')
            option0 = true;
        } else if (!option1) {
            document.getElementById('option1').classList.add('d-block')
            option1 = true;
        } else if (!option2) {
            document.getElementById('option2').classList.add('d-block')
            option2 = true;
        } else {
            alert('vous ne pouvez avoir que trois options par produit');
        }
        if (option0 || option1 || option2) {
            document.getElementById('add_variant_to_this_product').innerText = 'Ajouter une autre variant'
        } else {
            document.getElementById('add_variant_to_this_product').innerText = 'Ajouter une variante a ce produit'

        }
    }

    function removeOption(id) {
        document.getElementById(id).value = '';
        document.getElementById(id.concat('_name')).value = '';
        var tag = '.';
        var the_id = tag.concat(id);
        var spans = the_id.concat(' .bootstrap-tagsinput .tag')
        document.querySelectorAll(spans).forEach(element => element.remove());
        document.getElementById(id.substr(0, 7)).classList.remove('d-block')
        document.getElementById(id.substr(0, 7)).classList.add('d-none')
        if (id.substr(0, 7) == 'option0') {
            option0 = false
        } else if (id.substr(0, 7) == 'option1') {
            option1 = false
        } else if (id.substr(0, 7) == 'option2') {
            option2 = false
        }
        if (!option0 && !option1 && !option2) {
            document.getElementById('btn_generate_prices').classList.remove('d-flex')
            document.getElementById('btn_generate_prices').classList.add('d-none')
            document.getElementById('prices_table').classList.add('d-none')
            document.getElementById('add_variant_to_this_product').innerText = 'Ajouter une variante a ce produit'

        }
    }

    function genirate_prices() {
        document.getElementById('btn_generate_prices').innerText = 'Mise a jour les varient'
        document.getElementById('prices_table').classList.remove('d-none')

        let variant_rows = [];
        var option0_values = [];
        var option1_values = [];
        var option2_values = [];
        var option0_spans = document.querySelectorAll(' .option0inpute .bootstrap-tagsinput .tag')
        var option1_spans = document.querySelectorAll(' .option1inpute .bootstrap-tagsinput .tag')
        var option2_spans = document.querySelectorAll(' .option2inpute .bootstrap-tagsinput .tag')
        console.log('spans0 = ', option0_spans);
        console.log('spans1 = ', option1_spans);
        console.log('spans2 = ', option2_spans);
        if (option0_spans.length != 0) {
            option0_spans.forEach(element => {
                option0_values.push(element.textContent)
            })
            // console.log(option0_values)
        }
        if (option1_spans.length != 0) {
            option1_spans.forEach(element => {
                option1_values.push(element.textContent)
            })
            // console.log(option1_values)
        }
        if (option2_spans.length != 0) {
            option2_spans.forEach(element => {
                option2_values.push(element.textContent)
            })
            // console.log(option2_values)
        }
        console.log('variant_rows 1 = ', variant_rows)
        var position = 0;
        if (option0_values.length != 0) {
            option0_values.forEach((option0_value) => {
                if (option1_values.length != 0) {
                    option1_values.forEach((option1_value) => {
                        if (option2_values.length != 0) {
                            option2_values.forEach((option2_value) => {
                                let newRow = '<tr><td><span class="badge bg-info">' + option0_value + '</span>' + '<span class="badge bg-info">' + option1_value + '</span>' + '<span class="badge bg-info">' + option2_value + '</span>' + '</td><td><input type="text" name="qtys[]" value="100" class="form-control"></td><td><input type="text" name="allprices[]" value="120"  class="form-control"></td><td><input  type="file" name="v_i_' + position + '" class="form-control"></td></tr>';
                                variant_rows.push(newRow);
                                position++;
                            })
                        } else {
                            let newRow = '<tr><td><span class="badge bg-info">' + option0_value + '</span>' + '<span class="badge bg-info">' + option1_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_' + position + '"  class="form-control"></td></tr>';
                            variant_rows.push(newRow);
                            position++;
                        }
                    })
                } else if (option2_values.length != 0) {
                    option2_values.forEach((option2_value) => {
                        let newRow = '<tr><td><span class="badge bg-info">' + option0_value + '</span>' + '<span class="badge bg-info">' + option2_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_' + position + '" class="form-control"></td></tr>';
                        variant_rows.push(newRow);
                        position++;
                    })
                } else {
                    let newRow = '<tr><td><span class="badge bg-info">' + option0_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_' + position + '" class="form-control"></td></tr>';
                    variant_rows.push(newRow);
                    position++;
                }

            })

        } else if (option1_values.length != 0) {
            option1_values.forEach((option1_value) => {
                if (option2_values.length != 0) {
                    option2_values.forEach((option2_value) => {
                        let newRow = '<tr><td><span class="badge bg-info">' + option1_value + '</span>' + '<span class="badge bg-info">' + option2_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_' + position + '" class="form-control"></td></tr>';
                        variant_rows.push(newRow);
                        position++;
                    })
                } else {
                    let newRow = '<tr><td><span class="badge bg-info">' + option1_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_' + position + '" class="form-control"></td></tr>';
                    variant_rows.push(newRow);
                    position++;

                }
            })
        } else if (option2_values.length != 0) {
            option2_values.forEach((option2_value) => {
                let newRow = '<tr><td><span class="badge bg-info">' + option2_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_' + position + '"  class="form-control"></td></tr>';
                variant_rows.push(newRow);
                position++;
            })
        }

        document.getElementById('variants_table').innerHTML = variant_rows.join('');
    }
</script>
<script>
    function Get_main_image() {
        document.getElementById('main_image').click();
    }
    document.getElementById('main_image').addEventListener('change', () => {
        const [file] = main_image.files
        if (file) {
            document.getElementById('main_image_preview').src = URL.createObjectURL(file)
            document.getElementById('main_image_preview_div').classList.remove('d-none')
        }
    })

    function Get_details_images() {
        document.getElementById('images').click();
    }
    var number_images = 0;
    $(document).ready(function() {
        $('#images').change(function() {
            number_images = 0;
            document.getElementById('details_images_clicker').classList.add('d-none');
            $("#details_images_previewer").html('');
            for (var i = 0; i < $(this)[0].files.length; i++) {
                number_images++;
                $("#details_images_previewer").append('<div class="position-relative"><img style="margin:2px; padding:2px; border:1px #a4a4a4 solid; border-radius:5px" src="' + window.URL.createObjectURL(this.files[i]) + '" width="100px" height="100px"/> <span class="badge badge-danger position-absolute top-2 right-2">x</span></div>');
            }
            if (number_images > 5) {
                alert('Vous ne pouvez entrer que cinq (5) photos');
            }
        });
    });
</script>
<script type="text/javascript">
    window.addEventListener('keydown', function(e) {
        if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
            if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {
                e.preventDefault();
                return false;
            }
        }
    }, true);
</script>
@stop