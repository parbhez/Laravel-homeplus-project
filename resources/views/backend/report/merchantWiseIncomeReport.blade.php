@extends('backend/app')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box_body">
                <div class="box_header">
            	<span>
					<span aria-hidden="true" class="icon icon-documents"></span>
					<span class="main-text">
						Merchant Wise Income Report
					</span>
			    </span>
                </div>
                <div class="block" style=" margin-top: 10px; ">
                    <div class="block-content-outer">
                        <div class="block-content-inner">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-2" for="merchantId"><b>Select Merchant :</b></label>
                                    <div class="col-md-3">
                                        <select id="merchant_select" class=" form-control col-md-1 input-sm" required>
                                            <option disabled>Select Merchant</option>
                                            @if(isset($getAllMerchant))
                                                @foreach($getAllMerchant as $head)
                                                    @if(isset($getMerchantIncomeReport))
                                                        <option value="{{$head->id}}"
                                                                @if($getMerchantIncomeReport->id== $head->id) selected @endif >{{$head->full_name}}</option>
                                                    @else
                                                        <option value="{{$head->id}}">{{$head->full_name}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="loadContent" style="min-height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#merchant_select").on('change', function (e) {
            var marcentId = e.target.value;
            $('.loadContent').empty();
            $('.loadContent').load("{{URL::to('merchantWiseIncomeReport')}}" + '/' + marcentId, function () {

            });
        });

    </script>

    @endsection
