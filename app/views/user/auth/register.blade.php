@extends('user.layout')
    @section('custom-styles')
        {{HTML::style('/assets/asset_view/css/pages/page_log_reg_v1.css')}}
        {{HTML::style('/assets/asset_view/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}
        {{HTML::style('/assets/asset_view/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}

        <style>
        .sky-form .progress {
            float:none!important;
        }
        </style>
    @stop
	@section('body')
	      <div class="breadcrumbs-v4">
                <div class="container">
                    <h1>{{Lang::get('user.get_started_with')}}  <span class="shop-green">{{Lang::get('user.purchasetree')}}</span></h1>
                    <ul class="breadcrumb-v4-in">
                        <li><a href="index.html">{{Lang::get('user.home')}}</a></li>
                        <li class="active">{{Lang::get('user.register')}}</li>
                    </ul>
                </div><!--/end container-->
          </div>
          <div class = "registerBackground" >
          <div class="container content" >
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <form class="reg-page sky-form" method="post" action="{{URL::route('user.auth.store')}}" id="sky-form">

                        @if ($errors->has())
                            <div class="alert alert-danger alert-dismissibl fade in">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                            <div class="reg-header"><h2 class="createRegisterHead">{{Lang::get('user.account_registration')}}</h2>
                                <p>{{Lang::get('user.already_signup')}} <a href="{{URL::route('user.auth.login')}}" class="color-green" style="color: #18ba9b">{{Lang::get('user.sign_in')}}</a> {{Lang::get('user.to_login')}}</p>
                            </div>
                            <h2 class="createRegisterItem">{{Lang::get('user.member_information')}}
                                <span class="createRegisterItemRight">------------------------------------------------</span>
                            </h2>
                            <fieldset>
                                <div class="row">
                                   <section>
                                        <label>{{Lang::get('user.user_name')}} <span class="color-red">*</span></label>
                                        <input type="text" class="form-control margin-bottom-20" name="username" id="username" placeholder="{{Lang::get('user.user_name')}}" >
                                   </section>
                                </div>
                                <div class="row">
                                   <section>
                                        <label>{{Lang::get('user.password')}} <span class="color-red">*</span>
                                            <br> ( {{Lang::get('user.password_rules')}} ) </label>
                                        <input type="password" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.password')}}" name="userpassword" id="password">
                                         <div id="messages"></div>
                                   </section>
                                   <section>
                                         <label>{{Lang::get('user.confirm_password')}} <span class="color-red">*</span></label>
                                         <input type="password" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.confirm_password')}}" name="confirmpassword">
                                   </section>
                                   <section>
                                        <label>{{Lang::get('user.email_address')}} <span class="color-red">*</span></label>
                                        <input type="email" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.email_address')}}" name="email">
                                   </section>
                                </div>
                                <div class="row">
                                   <section>
                                       <div class="inline-group">
                                           <label class="radio" style="padding-left: 0px"> {{Lang::get('user.i_am')}} : <span class="color-red">*</span> </label>
                                           <label class="radio"><input type="radio" name="usertype" value="s"><i class="rounded-x"></i>{{Lang::get('user.seller')}}</label>
                                           <label class="radio"><input type="radio" name="usertype" value="b"><i class="rounded-x"></i>{{Lang::get('user.buyer')}}</label>
                                           <label class="radio"><input type="radio" name="usertype" value="k"><i class="rounded-x"></i>{{Lang::get('user.both')}}</label>
                                       </div>
                                   </section>
                                </div>
                            </fieldset>
                             <h2 class="createRegisterItem">{{Lang::get('user.add_your_contact')}}
                                <span class="createRegisterItemRight">------------------------------------------</span>
                            </h2>
                            <fieldset>
                                <div class="row">
                                    <section>
                                        <label>{{Lang::get('user.first_name')}} <span class="color-red">*</span></label>
                                        <input type="text" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.first_name')}}" name="firstname">
                                    </section>
                                    <section>
                                        <label>{{Lang::get('user.last_name')}} <span class="color-red">*</span></label>
                                        <input type="text" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.last_name')}}" name="lastname">
                                    </section>
                                    <section>
                                        <label>{{Lang::get('user.address')}} <span class="color-red">*</span></label>
                                        <input type="text" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.address')}}" name="address">
                                    </section>
                                    <section>
                                        <label>{{Lang::get('user.city')}} <span class="color-red">*</span></label>
                                        <input type="text" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.city')}}" name="city">
                                    </section>
                                    <section>
                                        <label>{{Lang::get('user.state')}}</label>
                                        <input type="text" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.state')}}" name="state">
                                    </section>
                                    <section>
                                        <label class="select">{{Lang::get('user.country')}} <span class="color-red">*</span></label>
                                            <select name="country" class="form-control margin-bottom-20">
                                                <option value="" selected disabled> -- Select Country -- </option>
                                                @foreach($country as $countries)
                                                    @if($countries->country_name == "USA")
                                                    <option value="{{$countries->id}}" selected>{{$countries->country_name}}</option>
                                                    @else
                                                        <option value="{{$countries->id}}">{{$countries->country_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section>
                                        <label>{{Lang::get('user.zip_code')}} <span class="color-red">*</span></label>
                                        <input type="text" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.zip_code')}}" name="zipcode">
                                    </section>
                                     <section>
                                        <label>{{Lang::get('user.phone_number')}} <span class="color-red">*</span></label>
                                        <input type="text" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.phone_number')}}" name="phone_number">
                                    </section>
                                    <section>
                                        <label>{{Lang::get('user.working_number')}} </label>
                                        <input type="text" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.working_number')}}" name="working_number">
                                    </section>
                                    <section>
                                        <label>{{Lang::get('user.company_name')}} </label>
                                        <input type="text" class="form-control margin-bottom-20" placeholder="{{Lang::get('user.company_name')}} " name="company_name">
                                    </section>
                                </div>
                            </fieldset>
                            <fieldset>

                                <div class="row">
                                    <div class="col-md-12" style="float: right">
                                         {{ Form::captcha(['id' => 'captcha1']) }}
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <section class="col-md-8">
                                        <label class="checkbox state-success" >
                                            <input type="checkbox" name="terms" style="left:25px; top:3px;" value="1">
                                            I read <a href="javascript:void(0)" class="color-green" style="color: #18ba9b">Terms and Conditions</a>
                                        </label>
                                        @if($errors->has('terms'))
                                            <p style="color: red">{{ $errors->first('terms')}}</p>
                                        @endif
                                    </section>

                                    <section class="col-md-4 text-right">
                                        <button class="btn-u" type="submit"><span id="savelist">Continue</span></button>
                                    </section>
                                </div>
                             </fieldset>

                        </form>
                    </div>
                </div>
          </div>
          </div>
          {{ Captcha::scriptWithCallback(['captcha1']) }}
	@stop
	@section('custom-scripts')
        {{ HTML::script('/assets/asset_view/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js') }}
        {{ HTML::script('/assets/asset_view/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js') }}
        {{ HTML::script('/assets/asset_view/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js') }}
        {{ HTML::script('/assets/asset_view/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js') }}
        {{ HTML::script('/assets/asset_view/js/forms/checkout.js') }}
        {{ HTML::script('/assets/asset_view/js/jquery.pwstrength.js') }}
        <script>

             jQuery(document).ready(function() {
                   CheckoutForm.initCheckoutForm();
                    var options = {
                       onKeyUp: function (evt) {
                           $(evt.target).pwstrength("outputErrorList");
                       }
                   };
                   $('#password').pwstrength(options);
              });
        </script>
	@stop
@stop
