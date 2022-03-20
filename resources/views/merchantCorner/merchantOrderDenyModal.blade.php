<?php
$i=1;
$j=1;
$lang  = Session::get('frontend_lang');
// print "<pre>";
// print_r($allInformation);
// return;
?>  {!!Form::open(array('route'=>'orderDenyConfirm.post','class'=>'form-horizontal form-wrp'))!!}
    <table class="table table-hover table-bordered" width="100%">
        <thead>
            <th >Order Deny Cause</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <h4>Select Order Cancel Cause :</h4> 
                
                @if(isset($orderConditions))
                    <select id="cause" name="select" class="form-control">
                        <option disabled="">select cause</option>
                        @foreach($orderConditions as $conditions)
                            @if($lang == 1)
                         <option value="{{$conditions->id}}">{{$conditions->title_lang1}}</option>
                            @else
                         <option value="{{$conditions->id}}">{{$conditions->title_lang2}}</option>
                            @endif
                        @endforeach
                    </select>
                    <input type="hidden" name="orderId" value="{{$orderId}}">
                @endif
                </td>
            </tr>
            <tr>
                <td ><input type="submit" class="btn btn-md btn-primary" id="submit" value="Save"></td>
            </tr>
        </tbody>
    </table>
    {!!Form::close()!!}