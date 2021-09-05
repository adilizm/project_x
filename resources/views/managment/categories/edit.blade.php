@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">{{ translate('Editing a category')}}</h3>
  </div>
  <div class="card-body p-0">
    <form action="{{ route('category.update',app()->getLocale())}}" method="post" class="p-3" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="category_id" value="{{encrypt($category->id)}}">
        <div class="form-group">
          <label for="name">Nom</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required >
        </div>
    
        <div class="form-group">
          <label for="name">Description</label>
          <textarea type="text" class="form-control" name="description" required>{{ $category->description}}</textarea>
        </div>

        <div class="form-group">
        <label for="name">catégorie mére</label>
                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"  tabindex="-1" aria-hidden="true" name="parent_id" >
                   <option value="0">selectioner une catégorie</option>
                  @foreach($parent_categories as $parent_category)
                    <option @if($parent_category->id == $category->parent_id && $category->parent_id != null )  selected   @endif value="{{$parent_category->id}}">{{$parent_category->name}}</option>
                    @endforeach
                  </select>
                 </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="logo" id="customFile">
            <input type="hidden" class="custom-file-input" name="old_logo" >
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <div>
            <img id="target" src="{{ '/storage/'.$category->picture}}" style=" max-height: 350px;" />
        </div>
      
        
        <div class=" w-100 float-right">
            <button type="submit" class="btn bg-gradient-primary btn-sm float-right">Enregistrer</a>
        </div>
    </form>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
@stop

@section('managment_script')
<script>
    $('#customFile').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
<script>
    function showImage(src, target) {
        var fr = new FileReader();
        // when image is loaded, set the src of the image where you want to display it
        fr.onload = function(e) {
            target.src = this.result;
        };
        src.addEventListener("change", function() {
            // fill fr with image data    
            fr.readAsDataURL(src.files[0]);
        });
    }

    var src = document.getElementById("customFile");
    var target = document.getElementById("target");
    showImage(src, target);
</script>
@stop