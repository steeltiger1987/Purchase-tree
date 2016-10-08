@extends('admin.layout')
	@section('body')
		<h3 class="page-title">Edit Escrow User Management</h3>
			<!-- page layout -->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{URL::route('admin.dashboard')}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<i class="fa fa-pencil"></i>
						<a href="{{URL::route('admin.escrow.users')}}">Escrow Users</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{URL::route('admin.escrow.users.edit', $escrowUser->id)}}">Edit Escrow User</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								Edit Escrow User
							</div>
						</div>
							<div class="portlet-body form">
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
							<form  class="form-horizontal" id="addCategoryFiledForm" method="POST" action="{{URL::route('admin.escrow.users.store')}}" enctype="multipart/form-data">
                                <input type="hidden" name="escrow_member_id" value="{{$escrowUser->id}}">
							    <div class="form-body">
                                     @foreach ([
                                                'purchasetree_username' => 'Purchasetree User Name:',
                                                'purchasetree_userpassword' =>'Purchasetree Password:',
                                                'username' =>"Escrow User Name:",
                                                'password' =>"Escrow Password:",
                                                'password_confirmation' =>"Escrow Confirm Password:",
                                                'full_name' =>"Full Name:",
                                                'email' =>"Email:",
                                                'business_name' =>"Business Name:",
                                                'address1'=>"Address1:",
                                                'address2'=>"Address2:",
                                                'city' => 'City:',
                                                'postal_code' =>"Postal Code:",
                                                'state_province' =>"State/Province:",
                                                'country' =>"Country:",
                                        ] as $key=> $value)
                                         @if ($key === 'purchasetree_username' || $key ==='username' || $key==="email" || $key==="full_name" || $key==="business_name" || $key==="address1" || $key==="address2" || $key==="city" || $key==="state_province" || $key==="postal_code")
                                            <div class="form-group" id="countryname">
                                                 <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                                    {{ Form::label($key, $value) }}
                                                    <?php if($key === 'purchasetree_username' || $key ==='username' || $key==="email"){?>
                                                       <span style="color:red">*</span>
                                                    <?php }?>
                                                 </label>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    @if($key ==='purchasetree_username')
                                                      {{ Form::text($key, $escrowUser->member->username, ['class' => 'form-control','placeholder'=>$value]) }}
                                                    @elseif($key === "username")
                                                      {{ Form::text($key, $escrowUser->username, ['class' => 'form-control','placeholder'=>$value]) }}
                                                    @elseif($key === "email")
                                                        {{ Form::text($key, $escrowUser->useremail, ['class' => 'form-control','placeholder'=>$value]) }}
                                                    @elseif($key === "full_name")
                                                        {{ Form::text($key, $escrowUser->userfullname, ['class' => 'form-control','placeholder'=>$value]) }}
                                                    @elseif($key === "business_name")
                                                        {{ Form::text($key, $escrowUser->userbusiness, ['class' => 'form-control','placeholder'=>$value]) }}
                                                    @elseif($key === "address1")
                                                        {{ Form::text($key, $escrowUser->useraddress1, ['class' => 'form-control','placeholder'=>$value]) }}
                                                     @elseif($key === "address2")
                                                        {{ Form::text($key, $escrowUser->useraddress2, ['class' => 'form-control','placeholder'=>$value]) }}
                                                     @elseif($key === "city")
                                                           {{ Form::text($key, $escrowUser->usercity, ['class' => 'form-control','placeholder'=>$value]) }}
                                                    @elseif($key === "state_province")
                                                           {{ Form::text($key, $escrowUser->userstate, ['class' => 'form-control','placeholder'=>$value]) }}
                                                    @elseif($key === "postal_code")
                                                       {{ Form::text($key, $escrowUser->userzip, ['class' => 'form-control','placeholder'=>$value]) }}
                                                    @endif

                                                 </div>
                                            </div>
                                         @elseif($key === 'purchasetree_userpassword' || $key==='password' || $key==='password_confirmation')
                                            <div class="form-group" id="countryname">
                                                  <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                                        {{ Form::label($key, $value) }}
                                                        <span style="color: red">*</span>
                                                  </label>
                                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input type="password" name="{{$key}}" placeholder="{{$value}}" class="form-control">
                                                  </div>
                                             </div>
                                          @elseif($key==='country')
                                            <div class="form-group" id="countryname">
                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                                      {{ Form::label($key, $value) }}
                                                </label>
                                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="country" class="form-control">
                                                        <option value="">--Select Country--</option>
                                                        @foreach($country as $key =>$countryItem)
                                                            @if($escrowUser->usercountry == $countryItem->id)
                                                                 <option value="{{$countryItem->id}}" selected>{{$countryItem->country_name}}</option>
                                                            @else
                                                                <option value="{{$countryItem->id}}">{{$countryItem->country_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                 </div>
                                            </div>
                                         @endif
                                      @endforeach
                                      <div class="form-group" id="countryname">
                                            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                                              <select name="payment" class="form-control margin-bottom-20">
                                                   <option value="mail" <?php if($escrowUser->paymentaccepttype == "mail"){echo "selected";}?>>Regular Mail</option>
                                                  <option value="paypal" <?php if($escrowUser->paymentaccepttype == "paypal"){echo "selected";}?>>PayPal</option>
                                                  <option value="overnight" <?php if($escrowUser->paymentaccepttype == "overnight"){echo "selected";}?>>Overnight Mail (U.S. Only)</option>
                                                  <option value="air" <?php if($escrowUser->paymentaccepttype == "air"){echo "selected";}?>>Air Mail (International)</option>
                                              </select>
                                            </div>
                                      </div>
							    </div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-7 col-md-5">
											<button   class="btn  blue" type="submit" ><i class="fa fa-check-circle-o" style="margin-right:4px"></i>Save</button>
											<a class="btn  green" href="{{URL::route('admin.escrow.users')}}"><i class="fa fa-repeat" style="margin-right:4px"></i>Cancel</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	@stop
	@section('custom-scripts')
	@stop
@stop
