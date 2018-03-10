@extends('layouts.raw')

@section('content')


<div class="hero is-info is-bold is-medium" style="background-image: url('{{asset('media/icons-background.svg')}}'); background-position: center;background-size:cover">
    {{--  Navbar  --}}
    <div class="hero-body has-text-centered" style="padding: 0;">
        <img src="{{asset('media/fitlogo.svg')}}" style="width: 30rem" alt="">
    </div>           
</div>

<overview-table></overview-table>

    
@push('scripts')
<script> 

        $(document).ready(function(){
            window.scrollTo(0, 0);
            window.setTimeout(function(){
                $("html, body").animate({ scrollTop: $(document).height() }, 50000, 'linear');
            }, 8000);
            
            $(window).scroll(function () {
                if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
                   
                    window.setTimeout(function(){
                        location.reload();
                    }, 8000);
                    
                }
             });
           
             
             window.setTimeout(function(){
                location.reload();
            }, 60000);
            

        });

    </script>
@endpush
@endsection