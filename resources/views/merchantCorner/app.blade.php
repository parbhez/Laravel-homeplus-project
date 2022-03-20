@include('merchantCorner._partials.top')
@include('merchantCorner._partials.header')
<section class="dashboard_body">
    <div class="container-fluid">
        @include('merchantCorner._partials.leftNavigation')
        <div class="col-md-11">
            <div class="bd_body">
                @include('merchantCorner.errors.messages')
                @include('merchantCorner.errors.ajaxMsg')
            </div>
            <div class="bd_body">
                @yield('content')
            </div>
        </div>
    </div>
</section>
@include('merchantCorner._partials.modal')
@include('merchantCorner._partials.btm')









