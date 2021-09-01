@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<div class="card card-primary card-outline">
  <div class="card-body">
    <div class="d-flex ">
      <i onclick="update_menu()" class="fas fa-bars cursor-pointer m-2"></i>
      <h4>Marketing</h4>
    </div>
    <div class="row">
      <div class="col-5 col-sm-3" id="marketing_menu_managment">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="Annonce_barre-tab" data-toggle="pill" href="#Annonce_barre" role="tab" aria-controls="Annonce_barre" aria-selected="true">Annonce barre</a>
          <a class="nav-link" id="vert-tabs-curseurs-tab" data-toggle="pill" href="#vert-tabs-curseurs" role="tab" aria-controls="vert-tabs-curseurs" aria-selected="false">Curseurs</a>
          <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Messages</a>
          <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Settings</a>
        </div>
      </div>
      <div class="col-7 col-sm-9" id="page_content">
        <div class="tab-content" id="vert-tabs-tabContent">
          <div class="tab-pane text-left fade active show" id="Annonce_barre" role="tabpanel" aria-labelledby="Annonce_barre-tab">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <form action="{{ route('marketing.update.top_annonces')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="">Pc barre (1170px X 60px) </label>
                      <img @if($disktop_top_annonce->value != null) src="{{'/storage/'.$disktop_top_annonce->value}}" @endif alt="">
                    </div>
                    <input type="hidden" name="name" value="disktop_top_annonce">
                    <div class="row">
                      <span onclick="document.getElementById('disktop_top_annonce').click()" class="btn btn-warning btn-sm mx-1"><i class="fas fa-upload" style="align-self: center;"></i></span>
                      <input type="file" class=" d-none mx-1 col-12 col-md-1 form-control" id="disktop_top_annonce" name="value">
                      <label for="" style="margin: 0;place-self: center;">Du : </label>
                      <input type="date" class="mx-2 col-12 col-md-3 form-control" name="from">
                      <label for="" style="margin: 0;place-self: center;">Au :</label>
                      <input type="date" class=" mx-1 col-12 col-md-3 form-control" name="to" @if($disktop_top_annonce->to != null) value="{{$disktop_top_annonce->to}}" @endif >
                      <input type="text" class=" mx-1 col-12 col-md-4 form-control" name="link" @if($disktop_top_annonce->link != null) value="{{$disktop_top_annonce->link}}" @endif placeholder="le lien de l'anonce" >
                      <input type="hidden" name="old_image" value="{{$disktop_top_annonce->value}}">
                    </div>
                    <div class="row d-flex justify-content-end mr-3 my-2">
                      <button class="btn btn-primary" type="submit">enregistrer</button>
                    </div>
                  </form>
                  <form action="{{ route('marketing.update.top_annonces')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="">Tablet barre (700px X 60px)</label>
                      <img @if($tablet_top_annonce->value != null) src="{{'/storage/'.$tablet_top_annonce->value}}" @endif alt="">
                    </div>
                    <input type="hidden" name="name" value="tablet_top_annonce">
                    <div class="row">
                      <span onclick="document.getElementById('tablet_top_annonce').click()" class="btn btn-warning btn-sm mx-1"><i class="fas fa-upload" style="align-self: center;"></i></span>
                      <input type="file" class=" d-none mx-1 col-12 col-md-1 form-control" id="tablet_top_annonce" name="value">
                      <label for="" style="margin: 0;place-self: center;">Du : </label>
                      <input type="date" class="mx-2 col-12 col-md-3 form-control" name="from">
                      <label for="" style="margin: 0;place-self: center;">Au :</label>
                      <input type="date" class=" mx-1 col-12 col-md-3 form-control" name="to" @if($tablet_top_annonce->to != null) value="{{$tablet_top_annonce->to}}" @endif >
                      <input type="text" class=" mx-1 col-12 col-md-4 form-control" name="link" @if($tablet_top_annonce->link != null) value="{{$tablet_top_annonce->link}}" @endif placeholder="le lien de l'anonce" >
                      <input type="hidden" name="old_image" value="{{$tablet_top_annonce->value}}">
                    </div>
                    <div class="row d-flex justify-content-end mr-3 my-2">
                      <button class="btn btn-primary" type="submit">enregistrer</button>
                    </div>
                  </form>
                  <form action="{{ route('marketing.update.top_annonces')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="">Téléphone barre (400px X 60px)</label>
                      <img @if($phone_top_annonce->value != null) src="{{'/storage/'.$phone_top_annonce->value}}" @endif alt="">
                    </div>
                    <input type="hidden" name="name" value="phone_top_annonce">
                    <div class="row">
                      <span onclick="document.getElementById('phone_top_annonce').click()" class="btn btn-warning btn-sm mx-1"><i class="fas fa-upload" style="align-self: center;"></i></span>
                      <input type="file" class=" d-none mx-1 col-12 col-md-1 form-control" id="phone_top_annonce" name="value">
                      <label for="" style="margin: 0;place-self: center;">Du : </label>
                      <input type="date" class="mx-2 col-12 col-md-3 form-control" name="from">
                      <label for="" style="margin: 0;place-self: center;">Au :</label>
                      <input type="date" class=" mx-1 col-12 col-md-3 form-control" name="to" @if($phone_top_annonce->to != null) value="{{$phone_top_annonce->to}}" @endif >
                      <input type="text" class=" mx-1 col-12 col-md-4 form-control" name="link" @if($phone_top_annonce->link != null) value="{{$phone_top_annonce->link}}" @endif placeholder="le lien de l'anonce" >
                      <input type="hidden" name="old_image" value="{{$phone_top_annonce->value}}">
                    </div>
                    <div class="row d-flex justify-content-end mr-3 my-2">
                      <button class="btn btn-primary" type="submit">enregistrer</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="vert-tabs-curseurs" role="tabpanel" aria-labelledby="vert-tabs-curseurs-tab">

            <div class="row">
              <div class="d-flex justify-content-end w-100">
                <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#create_new_curseur">
                  créer un nouveau curseur
                </button>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="create_new_curseur" tabindex="-1" aria-labelledby="create_new_curseurLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="create_new_curseurLabel">créer un nouveau curseur</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('marketing.create_new_slider')}}" method="post" class="my-2" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class=" row px-3">
                          <label class="col-3" for="link">le lien :</label>
                          <input id="link" type="text" name="link" class="col-9 form-control" placeholder="lien du curseur">
                        </div>
                          <div class="custom-file my-3 px-3">
                            <input type="file" id="new_slider_id_input" accept="image/*"  class="custom-file-input" name="picture_pc" >
                            <label class="custom-file-label m-0"  for="customFileLang">sélectionner une image (712px * 384px)</label>
                          </div>
                        <div  class="row d-flex justify-content-center ">
                          <img class="d-none" style="max-height:210px" id="new_slider_id_image" alt="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @foreach($sliders as $slider)
            <form action="{{ route('marketing.update_slider') }}" method="post" class="my-3 border-bottom rounded" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="slider_id" value="{{ $slider->id }}">
              <div class="row" style="place-content: center;">
                <div class=" col-12 ">
                  <div class="row">
                    <label class="col-12 col-md-2  text-center" for="link">lien:</label>
                    <input id="link" type="text" name="link" value="{{$slider->link}}" class="col-12 col-md-10 form-control" placeholder="lien du curseur">
                  </div>
                </div>
                <div class="col-12 col-md-6 m-2 position-relative">
                  <input type="file" class="d-none" id="{{'update_image'.$loop->index}}" name="picture_pc">
                  <img style="width:100%; height:100%" loading=lazy src="{{'/storage/'.$slider->laptop_path}}" id="{{'image'.$loop->index}}">
                  <input type="hidden" name="old_picture_pc" value="{{ $slider->laptop_path}}">
                  <span onclick="document.getElementById('{{'form_delete_slider'.$loop->index}}').submit();" id="{{'delete_slider'.$loop->index}}" style="right: 20px; top: 6px; border-radius: 100%; padding-left: 7px; padding-right: 7px; padding-top: 5px; padding-bottom: 5px; font-weight: 500;border: 1px white solid;" class="badge badge-danger position-absolute cursor-pointer"><i class="fas fa-times" style="align-self: center;font-size:11px;"></i></span>
                  <span onclick="document.getElementById('{{'update_image'.$loop->index}}').click();" style="right: 20px; top: 32px; border-radius: 100%; padding-left: 7px; padding-right: 7px; padding-top: 5px; padding-bottom: 5px; font-weight: 500;border: 1px white solid;" class="badge badge-warning position-absolute cursor-pointer"><i class="fas fa-upload" style="align-self: center;font-size: 8px;"></i></span>
                </div>
              </div>
              <small class="d-flex justify-content-center">Taille de l'image recommandée (712px * 384px)</small>
              <div class="row d-flex justify-content-end">
                <button class="btn btn-primary m-2" type="submit">mise a jour</button>
              </div>
            </form>
            <form action="{{ route('marketing.delete_slider') }}" id="{{'form_delete_slider'.$loop->index}}" method="post">
              @csrf
              <input type="hidden" name="slider_id" value="{{$slider->id}}">
            </form>
            @endforeach
          </div>
          <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
          </div>
          <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->
</div>
@stop
@section('managment_script')
<script>
  var is_menu_shown = true;
  @foreach($sliders as $slider)
  document.getElementById('{{'update_image'.$loop->index}}').addEventListener('change', () => {
    const [file] = {{'update_image'.$loop->index}}.files;
    if (file) {
      document.getElementById('{{'image'.$loop->index}}').src = URL.createObjectURL(file)
      document.getElementById('{{'delete_slider'.$loop->index}}').classList.add('d-none');
    }
  })
  @endforeach

  document.getElementById('new_slider_id_input').addEventListener('change', () => {
    console.log('ok11');
    const [file] = new_slider_id_input.files;
    if (file) {
      console.log('ok');
      document.getElementById('new_slider_id_image').src = URL.createObjectURL(file)
      document.getElementById('new_slider_id_image').classList.remove('d-none');

    }
  })

  function update_menu() {
    if (is_menu_shown) {
      document.getElementById('marketing_menu_managment').classList.add(['d-none']);
      document.getElementById('page_content').classList.remove('col-7');
      document.getElementById('page_content').classList.remove('col-sm-9');
      document.getElementById('page_content').classList.add(['col-12']);
      is_menu_shown = false;
    } else {
      document.getElementById('marketing_menu_managment').classList.remove(['d-none']);
      document.getElementById('page_content').classList.remove(['col-12']);
      document.getElementById('page_content').classList.add('col-7');
      document.getElementById('page_content').classList.add('col-sm-9');
      is_menu_shown = true;
    }
  }
  
</script>
@stop