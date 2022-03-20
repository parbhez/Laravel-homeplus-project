@extends('merchantCorner.app')
@section('content')
    <div class="tab-content section">
        <div role="tabpanel" class="tab-pane active" id="product_details">
        <br /><br /><br />
            <div class="col-md-6 col-md-offset-4">
                <a class="btn btn-info btn-lg fa fa-hand-o-right" href="{{URL::to('merchantProduct')}}">
                    Add More Product
                </a>
                <a class="btn btn-info btn-lg fa fa-hand-o-left" href="{{URL::to('merchantDashboard')}}">
                    Back To Dashboard
                </a>
            </div>
        </div>
    </div><!--// Tab panes -->
@endsection

