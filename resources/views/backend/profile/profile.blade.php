@extends('backend.app')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box_body">
            <div class="box_header">
                <span>
                    <span aria-hidden="true" class="icon icon-documents"></span>
                    <span class="main-text">
                        Profile
                    </span>
             </span>
            </div>  
            <div class="block" style=" margin-top: 10px; ">
                <div class="block-content-outer">
                    <div class="block-content-inner">
                    <!-- =======Start Page Content======= -->
                         <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#viewCategory" aria-controls="viewCategory" role="tab" data-toggle="tab">View Profile</a></li>
                            <li role="presentation"><a href="#addCategory" aria-controls="addCategory" role="tab" data-toggle="tab">Change Password</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="viewCategory">
                                
                            @if(isset($getData))
                            <table class="table table-hover table-bordered" width="100%">
                                <tbody class="">
                                    <tr>
                                        <td><b>Name. :</b> </td>
                                        <td>{{$getData->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email :</b> </td>
                                        <td>{{$getData->email}}</td>
                                    </tr>   
                                    <tr>
                                        <td><b>Last Login Language :</b> </td>
                                        <td> 
                                            @if($getData->last_login_lang == 1)
                                                <span> English </span>
                                            @endif
                                            @if($getData->last_login_lang == 2)
                                                <span> Bangla </span>
                                            @endif
                                        </td>
                                    </tr>  

                                </tbody>
                            </table>
                            @else
                                <h3>Sorry ! There's no Order Information available..</h3>
                            @endif

                            </div>
                            <div role="tabpanel" class="tab-pane" id="addCategory">
                                {!!Form::open(['route'=>'saveAdminPassword.post','class'=>'form-horizontal password-chage-form'])!!}
                                    <div class="form-group">
                                        <label class="col-md-2"> Old Password </label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control prev_password" name="prev_password" placeholder="">
                                            </div>
                                            <div class="match-status">
                                                
                                            </div>
                                        </div>

                                    <div class="form-group new-passwprd" style="display:none;">
                                        <label class="col-md-2"> New Password </label>

                                            <div class="col-md-2">
                                                <input type="text" class="form-control new_password" name="new_password" placeholder="">
                                            </div>
                                    </div>
                    
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-2">
                                            <input style="display:none;" type="submit" class="btn btn-success btn-md btn-save" value="Save">
                                        </div>
                                    </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    <!-- =======End Page Content======= -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('.password-chage-form').on('submit',function(){
        var prev_password = $('.prev_password').val();
        var new_password = $('.new_password').val();
        if (new_password == '' || prev_password == '') {
            return false;
        }
    });

    $('.prev_password').on('keyup',function(e){
       var prev_password = e.target.value;
       if (prev_password.length<3) {
        $('.new-passwprd').slideUp(500);
        $('.btn-save').slideUp(500);
        $('.match-status').empty();
        return false;
       }
        $.ajax({
                url      : "{{URL::to('checkAdminPassword')}}",
                type     : "GET",
                cache    : false,
                dataType : 'json',
                data     : {'prev_password': prev_password},
                success  : function(data){
                    $('.match-status').empty();
                    if (data.success == true) {
                        $('.new-passwprd').slideDown(500);
                        $('.btn-save').slideDown(500);
                        $('.match-status').append('<span style="color:green" class="fa fa-check-square-o"> &nbsp;Matched</span>');
                    }else if (data.error == true) {
                        $('.match-status').append('<span style="color:red" class="fa fa-ban"> &nbsp;Not Matched</span>');
                        $('.new-passwprd').slideUp(500);
                        $('.btn-save').slideUp(500);
                    }
                },
                error: function(data){
                    alert('error occurred! Please Check');
                }
            });
    });

   
    
</script>

@endsection