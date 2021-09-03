@extends('managment.managment_master')

@section('managment_head')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<!-- tags_input -->
<link rel="stylesheet" href="/tagsinput/bootstrap-tagsinput.css">
<script src="/tagsinput/bootstrap-tagsinput.min.js"></script>
@stop

@section('managment_content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header d-flex">
            <h3 class="card-title">Creation d'un produit</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('vondeur.products.store,app()->getLocale()')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group ">
                            <label for="prodname">nom</label>
                            <input type="text" required name="name" class="form-control" id="prodname" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group ">
                            <label for="summernote">Decsription</label>
                            <textarea id="summernote" name="description"></textarea>
                        </div>
                    </div>

                    <div class=" col-md-4">
                        <div class="form-group ">
                            <label for="category">Categorie</label>
                            <select name="category" required class="form-control" id="category">
                                @foreach($categreis as $category)
                                <option value="{{$category->id}}"> {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="unite">Prix standard</label>
                            <input type="number" required class="form-control" name="standar_prix" id="unite">
                        </div>
                        <div class="form-group ">
                            <label for="unite">Ancien prix</label>
                            <input type="number" class="form-control" name="old_price">
                        </div>
                        <div class="form-group ">
                            <label for="unite">unite</label>
                            <input type="text" class="form-control" name="unite" id="unite">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="save_as_draft" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">enregistrer comme brouillon</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group ">
                            <div onclick="Get_main_image()" id="main_image_clicker" class="d-flex justify-content-center" style="background-color: #d6d6d6; height: 32px; border-radius: 5px; cursor: pointer">
                                <i class="fas fa-upload" style="align-self: center;color: #656586"></i>
                                <p style="font-weight: 700; align-self: center;color: #656586;padding-left: 5px;">image principale <small>(800px*800px)</small></p>
                            </div>
                            <div class=" position-relative form-group justify-content-center d-none" style="text-align: center;display: grid;" id="main_image_preview_div">
                                <label>Image principal</label>
                                <div class="w-100 h-100 position-relative">
                                    <img style="margin:2px; padding:2px; border:1px #a4a4a4 solid; border-radius:5px" src="https://uploads.ifdesign.de/award_img_337/oex_large/282278_01_nokia_800_frontback_sand.jpg" id="main_image_preview" width="100" alt="">
                                    <span onclick="Get_main_image()" class="badge badge-danger position-absolute top-2 right-2 cursor-pointer">
                                        <i class="fas fa-sync "></i>
                                    </span>
                                </div>
                            </div>
                            <input type="file" required class="form-control d-none" id="main_image" name="main_image">
                        </div>
                        <div class="form-group ">
                            <div onclick="Get_details_images()" id="details_images_clicker" class="d-flex justify-content-center" style="background-color: #d6d6d6; height: 32px; border-radius: 5px; cursor: pointer">
                                <i class="fas fa-upload" style="align-self: center;color: #656586"></i>
                                <p style="font-weight: 700; align-self: center;color: #656586;padding-left: 5px;">les images de produits <small>(800px*800px)</small></p>
                            </div>
                            <div class=" position-relative  form-group justify-content-center " style="text-align: center;display: grid;" id="main_image_preview_div">
                                <label>images de produits</label>
                                <div id="details_images_previewer" class="d-flex"></div>
                            </div>
                            <input type="file" class="form-control d-none" max="5" id="images" name="images[]" multiple>
                        </div>

                    </div>

                    <div class=" col-md-4">
                    <div class="form-group ">
                            <label >les mot cle du produit (max:5)</label>
                            <input type="text" name="keywords" class="form-control" value="t-shirt" style="width: 100% !important;height:100% !important;" data-role="tagsinput" >
                        </div>
                        <div class="form-group ">
                            <label >Quantité minimum</label>
                            <input type="number" value="1" name="min_qty" class="form-control"  >
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12" id="variants">
                        <div class="form-group ">
                            <button type="button" id="add_variant_to_this_product" onclick="Adding_variants_to_product()" class="btn btn-secondary btn-sm">Ajouter une variante a ce produit</button>
                        </div>

                        <div id="option1" class="form-group  d-none mt-3 mb-3">
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <small class="small-hint">nom de la variant</small>
                                    <input type="text" name="options[]" class="form-control"  id="option1inpute_name">
                                </div>
                                <div class="col-8 option1inpute">
                                    <small class="small-hint">les option doit être séparé par virgule ','</small>
                                    <input type="text" name="values[]" class="form-control option1" value="" style="width: 100% !important;height:100% !important;" data-role="tagsinput" id="option1inpute">
                                </div>
                                <div class="col-1" style="align-self: center;">
                                    <span onclick='removeOption("option1inpute")' class="btn btn-danger">X</span>
                                </div>
                            </div>
                        </div>
                        <div id="option2" class="form-group  d-none mt-3 mb-3">
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <small class="small-hint">nom de la variant</small>
                                    <input type="text" name="options[]" class="form-control" id="option2inpute_name">
                                </div>
                                <div class="col-8 option2inpute">
                                    <small class="small-hint">les option doit être séparé par virgule ','</small>
                                    <input type="text" name="values[]" class="form-control option2" value="" style="width: 100% !important;height:unset" data-role="tagsinput" id="option2inpute">
                                </div>
                                <div class="col-1" style="align-self: center;">
                                    <span onclick='removeOption("option2inpute")' class="btn btn-danger">X</span>
                                </div>
                            </div>
                        </div>
                        <div id="option3" class="form-group  d-none mt-3 mb-3" style="padding-bottom: 20px;">
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <small class="small-hint">nom de la variant</small>
                                    <input type="text" name="options[]" class="form-control" id="option3inpute_name">
                                </div>
                                <div class="col-8 option3inpute">
                                    <small class="small-hint">les option doit être séparé par virgule ','</small>
                                    <input type="text" name="values[]" class="form-control option3" value="" style="width: 100% !important;height:100% !important;" data-role="tagsinput" id="option3inpute">
                                </div>
                                <div class="col-1" style="align-self: center;">
                                    <span onclick='removeOption("option3inpute")' class="btn btn-danger">X</span>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="form-group ">
                            <button type="button" id="btn_generate_prices" onclick="genirate_prices()" class="btn btn-secondary btn-sm d-none">Ajouter le prix de chaque variant</button>
                        </div>
                    </div>


                </div>

                <div id="prices_table" class="card d-none">
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

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info">Enregistrer le produit</button>
                </div>
            </form>
        </div>

        <script>
            $('#summernote').summernote({
                placeholder: 'Description de produit',
                tabsize: 2,
                height: 100
            });
        </script>
    </div>
    <!-- /.card -->
</section>

<!-- modals for categories -->
@stop

@section('managment_script')
<script>
    let option1 = false;
    let option2 = false;
    let option3 = false;
    function Click_btn_generate_prices(){
        document.getElementById('btn_generate_prices').click();
    }
    function Adding_variants_to_product() {
        document.getElementById('btn_generate_prices').classList.remove('d-none')
        document.getElementById('btn_generate_prices').classList.add('d-flex')
        if (!option1) {
            document.getElementById('option1').classList.add('d-block')
            option1 = true;
        } else if (!option2) {
            document.getElementById('option2').classList.add('d-block')
            option2 = true;
        } else if (!option3) {
            document.getElementById('option3').classList.add('d-block')
            option3 = true;
        } else {
            alert('vous ne pouvez avoir que trois options par produit');
        }
        if (option1 || option2 || option3) {
            document.getElementById('add_variant_to_this_product').innerText = 'Ajouter une autre variant'
        }else{
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
        if (id.substr(0, 7) == 'option1') {
            option1 = false
        } else if (id.substr(0, 7) == 'option2') {
            option2 = false
        } else if (id.substr(0, 7) == 'option3') {
            option3 = false
        }
        if (!option1 && !option2 && !option3) {
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
        var option1_values = [];
        var option2_values = [];
        var option3_values = [];
        var option1_spans = document.querySelectorAll(' .option1inpute .bootstrap-tagsinput .tag')
        var option2_spans = document.querySelectorAll(' .option2inpute .bootstrap-tagsinput .tag')
        var option3_spans = document.querySelectorAll(' .option3inpute .bootstrap-tagsinput .tag')
        if (option1_spans.length != 0) {
            option1_spans.forEach(element => {
                option1_values.push(element.textContent)
            })
            console.log(option1_values)
        }
        if (option2_spans.length != 0) {
            option2_spans.forEach(element => {
                option2_values.push(element.textContent)
            })
            console.log(option2_values)
        }
        if (option3_spans.length != 0) {
            option3_spans.forEach(element => {
                option3_values.push(element.textContent)
            })
            console.log(option3_values)
        }
        console.log('variant_rows 1 = ', variant_rows)
        var position=0;
        if (option1_values.length != 0) {
            option1_values.forEach((option1_value) => {
                if (option2_values.length != 0) {
                    option2_values.forEach((option2_value) => {
                        if (option3_values.length != 0) {
                            option3_values.forEach((option3_value) => {
                                let newRow = '<tr><td><span class="badge bg-info">' + option1_value + '</span>' + '<span class="badge bg-info">' + option2_value + '</span>' + '<span class="badge bg-info">' + option3_value + '</span>' + '</td><td><input type="text" name="qtys[]" value="100" class="form-control"></td><td><input type="text" name="allprices[]" value="120"  class="form-control"></td><td><input  type="file" name="v_i_'+position+'" class="form-control"></td></tr>';
                                variant_rows.push(newRow);
                                position++;
                            })
                        } else {
                            let newRow = '<tr><td><span class="badge bg-info">' + option1_value + '</span>' + '<span class="badge bg-info">' + option2_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_'+position+'"  class="form-control"></td></tr>';
                            variant_rows.push(newRow);
                            position++;
                        }
                    })
                } else if (option3_values.length != 0) {
                    option3_values.forEach((option3_value) => {
                        let newRow = '<tr><td><span class="badge bg-info">' + option1_value + '</span>' + '<span class="badge bg-info">' + option3_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_'+position+'" class="form-control"></td></tr>';
                        variant_rows.push(newRow);
                        position++;
                    })
                } else {
                    let newRow = '<tr><td><span class="badge bg-info">' + option1_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_'+position+'" class="form-control"></td></tr>';
                    variant_rows.push(newRow);
                    position++;
                }

            })

        } else if (option2_values.length != 0) {
            option2_values.forEach((option2_value) => {
                if (option3_values.length != 0) {
                    option3_values.forEach((option3_value) => {
                        let newRow = '<tr><td><span class="badge bg-info">' + option2_value + '</span>' + '<span class="badge bg-info">' + option3_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_'+position+'" class="form-control"></td></tr>';
                        variant_rows.push(newRow);
                        position++;
                    })
                } else {
                    let newRow = '<tr><td><span class="badge bg-info">' + option2_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_'+position+'" class="form-control"></td></tr>';
                    variant_rows.push(newRow);
                    position++;

                }
            })
        } else if (option3_values.length != 0) {
            option3_values.forEach((option3_value) => {
                let newRow = '<tr><td><span class="badge bg-info">' + option3_value + '</span>' + '</td><td><input type="text" name="qtys[]" class="form-control"></td><td><input type="text" name="allprices[]" class="form-control"></td><td><input type="file" name="v_i_'+position+'"  class="form-control"></td></tr>';
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
        document.getElementById('main_image_clicker').classList.remove('d-flex')
        document.getElementById('main_image_clicker').classList.add('d-none')
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
@stop