@if(Session::has('info'))
<script>
$(document).ready(function(){
swal({   
    title: "{{ Session::get('info') }}",   
    
    @if(Session::get('info_text'))
    text: "{{ Session::get('info_text') }}",
    @endif   
    
    @if(Session::get('info_type'))
    type: "{{ Session::get('info_type') }}",
    @endif   
    
    timer: 2000,   
    showConfirmButton: false
});    
    
});
</script>

@endif