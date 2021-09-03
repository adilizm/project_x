@extends('frant_master')

@section('frant_head')

@stop
@section('frant_content')
<div class="row justify-content-center " style="margin-top: 45px;">
    <div class="col-md-10 ">	
		<article class="card card-body">
			<figure class="itemside">
				<div class="aside">
					<span class="icon-sm rounded-circle bg-danger">
                    <i class="fa fa-lock"></i>
					</span>
				</div>
				<figcaption class="info">
					<h5 class="title">Voulez-vous vraiment convertir votre compte en compte vendeur</h5>
					<p>en devenant vendeur, vous acceptez nos <strong> <a href="#">politiques de vente</a></strong> </p>
				</figcaption>
			</figure> <!-- iconbox // -->
            <form class="d-flex justify-content-end my-3" action="{{ route('client_to_vondeur',app()->getLocale())}}" method="post">
                @csrf
                <button class="btn btn-primary" type="submit">Être vendeur</button>
            </form>
		</article> <!-- panel-lg.// -->
	</div><!-- col // -->
</div>
@stop
@section('frant_script')

@stop