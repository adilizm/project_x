@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="d-flex ">
            <h4>languages</h4>
        </div>
        <div class="row p-3">
            <div class=" card col-12 col-md-6 p-3 ">
                <form class="form-horizontal" action="{{ route('languages.update_default')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-from-label">Langage par défaut</label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control demo-select2-placeholder" name="value">
                                @foreach($languages as $language)
                                <option @if($default_lang->value == $language->key) selected @endif value="{{$language->key}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-info">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class=" card col-12 col-md-6 p-3 ">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Add_new_languages">
                    Add new language
                </button>
            </div>
        </div>
        <div class="row my-2">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <th>#</th>
                    <th>name</th>
                    <th>key</th>
                    <th>option</th>
                </thead>
                <tbody>
                @foreach($languages as $language)
                    <tr>
                        <td>
                            {{ $language->id }}
                        </td>
                        <td>
                            {{ $language->name }}
                        </td>
                        <td>
                            {{ $language->key }}
                        </td>
                        <td>
                           <a href="{{ route('languages.language_edit',encrypt($language->id)) }}"  title="modifier des mots" ><i class="mx-1 fas fa-language"></i></a>
                           <a href="#" title="delete" ><i class=" mx-1 text-danger fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="Add_new_languages" tabindex="-1" aria-labelledby="Add_new_languagesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="Add_new_languagesLabel">Adding new lang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class=" row">
                            <div class="col-12 col-md-6">
                                <label for="Name lang">Name lang</label>
                                <input class="form-control" name="value" />
                            </div>
                            <div class="form-group col-3">
                                <label for="Name lang">key </label>
                                <input class="form-control" name="key" />
                            </div>
                            <div class=" form-group col-3">
                                <label for="Name lang">is rtl</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('managment_script')

@stop