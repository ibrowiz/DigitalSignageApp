@extends('layouts.admin.master')
{{--@extends('layouts.adminapp')--}}

@section('content')


<!-- Container fluid Starts -->
<div style="padding-top: 10px;">
    <a href="{{route('template.create')}}">
        
        <button type="button" class="btn btn-success"> Create Templates  <i class="fa fa-desktop fa-1x"></i> </button>
    </a>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="grid-gallery" class="grid-gallery">
                <section class="grid-wrap">
                    <ul class="grid">
                    @foreach($templates as $template)
                        <li class="grid-sizer"></li><!-- for Masonry column width -->
                        <li>
                            <figure>
                                <img src="{{$template->image}}" alt="img05"/>
                                <figcaption>
                                    <div class="ribbon">
                                        <div class="name">{{ucwords($template->file_name)}}</div>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                    </ul>
                </section><!-- // grid-wrap -->
            </div>
        </div>
        {{ $templates->links() }}
    </div>
    <!-- Row End -->

</div>
<!-- Container fluid ends -->

@endsection
