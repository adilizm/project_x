@if ($message = Session::get('success'))
<script>
    toastr.success("{!! $message !!}");
</script>
@endif
  
@if ($message = Session::get('error'))
<script>
    toastr.error("{!! $message !!}");
</script>
@endif
   
@if ($message = Session::get('warning'))
<script>
    toastr.warning("{!! $message !!}");
</script>
@endif
   
@if ($message = Session::get('info'))
<script>
    toastr.info("{!! $message !!}");
</script>
@endif
  
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{!! $error !!}");
        </script>
    @endforeach
@endif