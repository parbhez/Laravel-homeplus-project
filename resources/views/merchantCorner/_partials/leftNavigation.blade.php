<div class="col-md-1">
    <div class="db_menu">
        <ul>
            <li>
                <a href="{{URL::to('merchantDashboard')}}" class="active">
                    <i class="fa fa-home fa-3x"></i>
                    <p>{{trans('frontend.dashboard')}}</p>
                </a>
            </li>
            <li>
                <a href="{{URL::to('merchantManagement')}}">
                    <i class="fa fa-sitemap fa-3x"></i>
                    <p>{{trans('frontend.management')}}</p>
                </a>
            </li>
            <li>
                <a href="{{URL::to('merchantOrder')}}">
                    <i class="fa fa-dollar fa-3x"></i>
                    <p>{{trans('frontend.order')}}</p>
                </a>
            </li>
            <li>
                <a href="{{URL::to('merchantProduct')}}">
                    <i class="fa fa-list-alt fa-3x"></i>
                    <p>{{trans('frontend.product')}}</p>
                </a>
            </li>
            <li>
                <a href="{{URL::to('merchantReport')}}">
                    <i class="fa fa-bar-chart fa-3x"></i>
                    <p>{{trans('frontend.report')}}</p>
                </a>
            </li>
        </ul>
    </div>
</div>