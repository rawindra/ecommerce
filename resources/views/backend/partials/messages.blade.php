@if(Session::has('success'))
<script>
    toastr.success("{{Session::get('success')}}",{timeOut: 5});
</script>

@endif
@if(Session::has('warning'))
<script>
    toastr.warning("{{Session::get('warning')}}",{timeOut: 5});
</script>
@endif
@if(Session::has('deleted'))
<script>
    toastr.error("{{Session::get('deleted')}}",{timeOut: 5});
</script>
@endif