@extends('user.seller.layout')
    @section('custom-styles')
    @stop
    @section('body-right')
        <div class="col-md-offset-1 col-md-8 rightMenu col-sm-8 col-sm-offset-1">
            <div class="row">
                <div class="col-md-12 favoriteContentBody">
                   <h4 class="getShippingPriceHeader">{{Lang::get('user.get_shipping_price')}}</h4>
                   <div class="panel panel-default margin-bottom-40 change-panel">
                        <div class="panel-body">

                            <form class="form-horizontal" id="addForm" action="{{URL::route('user.seller.postGetLabel')}}" method="post">
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
                                <?php if (isset($alert)) { ?>
                                    <div class="alert alert-<?php echo $alert['type'];?> alert-dismissibl fade in">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <p>
                                            <?php echo $alert['msg'];?>
                                        </p>
                                    </div>
                                <?php } ?>
                                 <input type="hidden" name="quote_id" value="{{$quote->id+100000*1}}">
                                <h4 style="padding-bottom: 20px">{{Lang::get('user.dimensions_information')}}</h4>
                                <div class="form-group">
                                    <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                        {{Lang::get('user.length')}}
                                        <span style="color: red">*</span>
                                    </label>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                        <input type="text" class="form-control" name="Length" placeholder="{{Lang::get('user.length')}}" value="{{$quoteSample[0]->shippinglength}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                        {{Lang::get('user.width')}}
                                        <span style="color: red">*</span>
                                    </label>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                        <input type="text" class="form-control" name="Width" placeholder="{{Lang::get('user.width')}}" value="{{$quoteSample[0]->shippingwidth}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                        {{Lang::get('user.height')}}
                                        <span style="color: red">*</span>
                                    </label>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                        <input type="text" class="form-control" name="Height" placeholder="{{Lang::get('user.height')}}" value="{{$quoteSample[0]->shippingheight}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                        {{Lang::get('user.weight')}}
                                        <span style="color: red">*</span>
                                    </label>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <input type="text" class="form-control" name="Weight" placeholder="{{Lang::get('user.weight')}}" value="{{$quoteSample[0]->shippingweight}}" readonly>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3">
                                        <select name="WeightUnit" class="form-control">
                                            <option value="LB" <?php if($quoteSample[0]->shippingweightunit == "LB") {echo "selected";} else{ echo "disabled";}?>>{{Lang::get('user.lb')}}</option>
                                            <option value="KG" <?php if($quoteSample[0]->shippingweightunit == "KG") {echo "selected";} else{ echo "disabled";}?>>{{Lang::get('user.kg')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                        {{Lang::get('user.your_package_count')}}
                                    </label>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                        <select class="form-control" name="package_count">
                                            <?php
                                                for($i=1; $i<16; $i++){
                                                    if($quoteSample[0]->packagecount == $i){
                                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                    }else{
                                                        echo '<option value="'.$i.'" disabled>'.$i.'</option>';
                                                    }

                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            <!-- Shipper Detail Start-->
                                 <h4 style="padding-bottom: 20px">{{Lang::get('user.shipper_details')}}</h4>
                                 <div class="form-group">
                                     <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                         {{Lang::get('user.name')}}
                                         <span style="color: red">*</span>
                                     </label>
                                     <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                         <input type="text" class="form-control" name="shipper_name" placeholder="{{Lang::get('user.name')}}" value="{{$quoteSample[0]->shippingname}}" readonly>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                       <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                           {{Lang::get('user.phone_number')}}
                                       </label>
                                       <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                           <input type="text" class="form-control" name="shipper_phonenumber" placeholder="{{Lang::get('user.phone_number')}}" value="{{$quoteSample[0]->shippingphonenumber}}" readonly>
                                       </div>
                                 </div>
                                 <div class="form-group">
                                      <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                          {{Lang::get('user.street_line')}}
                                          <span style="color: red">*</span>
                                      </label>
                                      <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                          <input type="text" class="form-control" name="shipper_street" placeholder="{{Lang::get('user.street_line')}}" value="{{$quoteSample[0]->shippingaddress}}" readonly>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                        <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                            {{Lang::get('user.city')}}
                                            <span style="color: red">*</span>
                                        </label>
                                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                            <input type="text" class="form-control" name="shipper_city" placeholder="{{Lang::get('user.city')}}" value="{{$quoteSample[0]->shippingcity}}" readonly>
                                        </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label" >
                                          {{Lang::get('user.state')}}
                                      </label>
                                      <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                          <input type="text" class="form-control" name="shipper_state" placeholder="{{Lang::get('user.state')}}" value="{{$quoteSample[0]->shippingstate}}" readonly>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                          {{Lang::get('user.postal_code')}}
                                          <span style="color: red">*</span>
                                      </label>
                                      <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                          <input type="text" class="form-control" name="shipper_postalcode" placeholder="{{Lang::get('user.postal_code')}}" value="{{$quoteSample[0]->shippingpostalcode}}" readonly>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                          {{Lang::get('user.country')}}
                                          <span style="color: red">*</span>
                                      </label>
                                      <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                         <input type ="text" name ="shipper_country" class="form-control" value="{{$quoteSample[0]->shippingcountry}}" readonly>
                                      </div>
                                </div>
                                <!-- Shipper Detail End-->
                                <!-- Ship To Information Start-->
                                 <h4 style="padding-bottom: 20px">{{Lang::get('user.ship_to_information')}}</h4>
                                 <div class="form-group">
                                      <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                          {{Lang::get('user.name')}}
                                          <span style="color: red">*</span>
                                      </label>
                                      <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                          <input type="text" class="form-control" name="shipto_name" placeholder="{{Lang::get('user.name')}}" value="{{$sellerMember->firstname." ". $sellerMember->lastname}}" readonly>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                       <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                           {{Lang::get('user.street_line')}}
                                           <span style="color: red">*</span>
                                       </label>
                                       <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                           <input type="text" class="form-control" name="shipto_street" placeholder="{{Lang::get('user.street_line')}}" value="{{$sellerMember->street}}" readonly>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                         <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                             {{Lang::get('user.city')}}
                                             <span style="color: red">*</span>
                                         </label>
                                         <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                             <input type="text" class="form-control" name="shipto_city" placeholder="{{Lang::get('user.city')}}" value="{{$sellerMember->city}}" readonly>
                                         </div>
                                   </div>
                                   <div class="form-group">
                                       <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                           {{Lang::get('user.state')}}
                                       </label>
                                       <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                           <input type="text" class="form-control" name="shipto_state" placeholder="{{Lang::get('user.state')}}" value="{{$sellerMember->state}}" readonly>
                                       </div>
                                 </div>
                                 <div class="form-group">
                                       <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                           {{Lang::get('user.postal_code')}}
                                           <span style="color: red">*</span>
                                       </label>
                                       <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                           <input type="text" class="form-control" name="shipto_postalcode" placeholder="{{Lang::get('user.postal_code')}}" value="{{$sellerMember->zipcode}}" readonly>
                                       </div>
                                 </div>
                                 <div class="form-group margin-bottom-40">
                                       <label class="col-lg-3 col-md-4 col-sm-4 col-xs-4 control-label">
                                           {{Lang::get('user.country')}}
                                           <span style="color: red">*</span>
                                       </label>
                                       <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                           <select name="shipto_country" class="form-control">
                                               <option value="AF" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Afghanistan')) {echo "selected";} else {echo "disabled";}?>>Afghanistan</option>
                                              <option value="AL" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Albania')) {echo "selected";} else {echo "disabled";}?>>Albania</option>
                                              <option value="DZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Algeria')) {echo "selected";} else {echo "disabled";}?>>Algeria</option>
                                              <option value="AS" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('American Samoa')) {echo "selected";} else {echo "disabled";}?>>American Samoa</option>
                                              <option value="AD" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Andorra')) {echo "selected";} else {echo "disabled";}?>>Andorra</option>
                                              <option value="AG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Antigua & Barbuda')) {echo "selected";} else {echo "disabled";}?>>Antigua & Barbuda</option>
                                              <option value="AO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Angola')) {echo "selected";} else {echo "disabled";}?>>Angola</option>
                                              <option value="AI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Anguilla')) {echo "selected";} else {echo "disabled";}?>>Anguilla</option>
                                              <option value="AQ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Antarctica')) {echo "selected";} else {echo "disabled";}?>>Antarctica</option>
                                              <option value="AR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Argentina')) {echo "selected";} else {echo "disabled";}?>>Argentina</option>
                                              <option value="AM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Armenia')) {echo "selected";} else {echo "disabled";}?>>Armenia</option>
                                              <option value="AW" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Aruba')) {echo "selected";} else {echo "disabled";}?>>Aruba</option>
                                              <option value="AU" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Australia')) {echo "selected";} else {echo "disabled";}?>>Australia</option>
                                              <option value="AT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Austria')) {echo "selected";} else {echo "disabled";}?>>Austria</option>
                                              <option value="AZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Azerbaijan')) {echo "selected";} else {echo "disabled";}?>>Azerbaijan</option>
                                              <option value="BS" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Bahamas')) {echo "selected";} else {echo "disabled";}?>>Bahamas</option>
                                              <option value="BH" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Bahrain')) {echo "selected";} else {echo "disabled";}?>>Bahrain</option>
                                              <option value="BD" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Bangladesh')) {echo "selected";} else {echo "disabled";}?>>Bangladesh</option>
                                              <option value="BB" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Barbados')) {echo "selected";} else {echo "disabled";}?>>Barbados</option>
                                              <option value="BY" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Belarus')) {echo "selected";} else {echo "disabled";}?>>Belarus</option>
                                              <option value="BE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Belgium')) {echo "selected";} else {echo "disabled";}?>>Belgium</option>
                                              <option value="BZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Belize')) {echo "selected";} else {echo "disabled";}?>>Belize</option>
                                              <option value="BJ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Benin')) {echo "selected";} else {echo "disabled";}?>>Benin</option>
                                              <option value="BM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Bermuda')) {echo "selected";} else {echo "disabled";}?>>Bermuda</option>
                                              <option value="BT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Bhutan')) {echo "selected";} else {echo "disabled";}?>>Bhutan</option>
                                              <option value="BO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Bolivia')) {echo "selected";} else {echo "disabled";}?>>Bolivia</option>
                                              <option value="BA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Bosnia And Herzegovina')) {echo "selected";} else {echo "disabled";}?>>Bosnia and Herzegowina</option>
                                              <option value="BW" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Botswana')) {echo "selected";} else {echo "disabled";}?>>Botswana</option>
                                              <option value="BV" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Bouvet Island')) {echo "selected";} else {echo "disabled";}?>>Bouvet Island</option>
                                              <option value="BR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Brazil')) {echo "selected";} else {echo "disabled";}?>>Brazil</option>
                                              <option value="IO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('British Indian Ocean Territory')) {echo "selected";} else {echo "disabled";}?>>British Indian Ocean Territory</option>
                                              <option value="BN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Brunei')) {echo "selected";} else {echo "disabled";}?>>Brunei Darussalam</option>
                                              <option value="BG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Bulgaria')) {echo "selected";} else {echo "disabled";}?>>Bulgaria</option>
                                              <option value="BF" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Burkina Faso')) {echo "selected";} else {echo "disabled";}?>>Burkina Faso</option>
                                              <option value="BI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Burundi')) {echo "selected";} else {echo "disabled";}?>>Burundi</option>
                                              <option value="KH" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Cambodia')) {echo "selected";} else {echo "disabled";}?>>Cambodia</option>
                                              <option value="CM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Cameroon')) {echo "selected";} else {echo "disabled";} ?>>Cameroon</option>
                                              <option value="CA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Canada')) {echo "selected";} else {echo "disabled";}?>>Canada</option>
                                              <option value="CV" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Cape Verde')) {echo "selected";} else {echo "disabled";}?>>Cape Verde</option>
                                              <option value="KY" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Cayman Islands')) {echo "selected";} else {echo "disabled";}?>>Cayman Islands</option>
                                              <option value="CF" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Central African Republic')) {echo "selected";} else {echo "disabled";}?>>Central African Republic</option>
                                              <option value="TD" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Chad')) {echo "selected";} else {echo "disabled";}?>>Chad</option>
                                              <option value="CL" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Chile')) {echo "selected";} else {echo "disabled";}?>>Chile</option>
                                              <option value="CN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('China')) {echo "selected";} else {echo "disabled";}?>>China</option>
                                              <option value="CX" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Christmas Island')) {echo "selected";} else {echo "disabled";}?>>Christmas Island</option>
                                              <option value="CC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Cocos (Keeling) Islands')) {echo "selected";} else {echo "disabled";}?>>Cocos (Keeling) Islands</option>
                                              <option value="CO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Colombia')) {echo "selected";} else {echo "disabled";}?>>Colombia</option>
                                              <option value="KM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Comoros')) {echo "selected";} else {echo "disabled";}?>>Comoros</option>
                                              <option value="CG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Congo')) {echo "selected";} else {echo "disabled";}?>>Congo</option>
                                              <option value="CD" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Congo, The Democratic Republic Of The')) {echo "selected";} else {echo "disabled";}?>>Congo, the Democratic Republic of the</option>
                                              <option value="CK" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Cook Islands')) {echo "selected";} else {echo "disabled";}?>>Cook Islands</option>
                                              <option value="CR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Costa Rica')) {echo "selected";} else {echo "disabled";}?>>Costa Rica</option>
                                              <option value="CI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Cote DIvoire')) {echo "selected";} else {echo "disabled";}?>>Cote d'Ivoire</option>
                                              <option value="HR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Croatia (Hrvatska)')) {echo "selected";} else {echo "disabled";}?>>Croatia (Hrvatska)</option>
                                              <option value="CU" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Cuba')) {echo "selected";} else {echo "disabled";}?>>Cuba</option>
                                              <option value="CY" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Cyprus')) {echo "selected";} else {echo "disabled";}?>>Cyprus</option>
                                              <option value="CZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Czech Republic')) {echo "selected";} else {echo "disabled";}?>>Czech Republic</option>
                                              <option value="DK" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Denmark')) {echo "selected";} else {echo "disabled";}?>>Denmark</option>
                                              <option value="DJ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Djibouti')) {echo "selected";} else {echo "disabled";}?>>Djibouti</option>
                                              <option value="DM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Dominica')) {echo "selected";} else {echo "disabled";}?>>Dominica</option>
                                              <option value="DO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Dominican Republic')) {echo "selected";} else {echo "disabled";}?>>Dominican Republic</option>
                                              <option value="TL" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('East Timor')) {echo "selected";} else {echo "disabled";}?>>East Timor</option>
                                              <option value="EC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Ecuador')) {echo "selected";} else {echo "disabled";}?>>Ecuador</option>
                                              <option value="EG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Egypt')) {echo "selected";} else {echo "disabled";}?>>Egypt</option>
                                              <option value="SV" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('El Salvador')) {echo "selected";} else {echo "disabled";}?>>El Salvador</option>
                                              <option value="GQ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Equatorial Guinea')) {echo "selected";} else {echo "disabled";}?>>Equatorial Guinea</option>
                                              <option value="ER" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Eritrea')) {echo "selected";} else {echo "disabled";}?>>Eritrea</option>
                                              <option value="EE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Estonia')) {echo "selected";} else {echo "disabled";}?>>Estonia</option>
                                              <option value="ET" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Ethiopia')) {echo "selected";} else {echo "disabled";}?>>Ethiopia</option>
                                              <option value="FK" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Falkland Islands')) {echo "selected";} else {echo "disabled";}?>>Falkland Islands (Malvinas)</option>
                                              <option value="FO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Faroe Islands')) {echo "selected";} else {echo "disabled";}?>>Faroe Islands</option>
                                              <option value="FJ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Fiji')) {echo "selected";} else {echo "disabled";}?>>Fiji</option>
                                              <option value="FI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Finland')) {echo "selected";} else {echo "disabled";}?>>Finland</option>
                                              <option value="FR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('France')) {echo "selected";} else {echo "disabled";}?>>France</option>
                                              <option value="GF" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('French Guiana')) {echo "selected";} else {echo "disabled";}?>>French Guiana</option>
                                              <option value="PF" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('French Polynesia')) {echo "selected";} else {echo "disabled";}?>>French Polynesia</option>
                                              <option value="TF" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('French Southern Territories')) {echo "selected";} else {echo "disabled";}?>>French Southern Territories</option>
                                              <option value="GA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Gabon')) {echo "selected";} else {echo "disabled";}?>>Gabon</option>
                                              <option value="GM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Gambia')) {echo "selected";} else {echo "disabled";}?>>Gambia</option>
                                              <option value="GE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Georgia')) {echo "selected";} else {echo "disabled";}?>>Georgia</option>
                                              <option value="DE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Germany')) {echo "selected";} else {echo "disabled";}?>>Germany</option>
                                              <option value="GH" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Ghana')) {echo "selected";} else {echo "disabled";}?>>Ghana</option>
                                              <option value="GI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Gibraltar')) {echo "selected";} else {echo "disabled";}?>>Gibraltar</option>
                                              <option value="GR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Greece')) {echo "selected";} else {echo "disabled";}?>>Greece</option>
                                              <option value="GL" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Greenland')) {echo "selected";} else {echo "disabled";}?>>Greenland</option>
                                              <option value="GD" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Grenada')) {echo "selected";} else {echo "disabled";}?>>Grenada</option>
                                              <option value="GP" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Guadeloupe')) {echo "selected";} else {echo "disabled";}?>>Guadeloupe</option>
                                              <option value="GU" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Guam')) {echo "selected";} else {echo "disabled";}?>>Guam</option>
                                              <option value="GT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Guatemala')) {echo "selected";} else {echo "disabled";}?>>Guatemala</option>
                                              <option value="GN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Guinea')) {echo "selected";} else {echo "disabled";}?>>Guinea</option>
                                              <option value="GW" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Guinea-Bissau')) {echo "selected";} else {echo "disabled";}?>>Guinea-Bissau</option>
                                              <option value="GY" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Guyana')) {echo "selected";} else {echo "disabled";}?>>Guyana</option>
                                              <option value="HT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Haiti')) {echo "selected";} else {echo "disabled";}?>>Haiti</option>
                                              <option value="VA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Holy See')) {echo "selected";} else {echo "disabled";}?>>Holy See (Vatican City State)</option>
                                              <option value="HN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Honduras')) {echo "selected";} else {echo "disabled";}?>>Honduras</option>
                                              <option value="HK" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Hong Kong')) {echo "selected";} else {echo "disabled";}?>>Hong Kong</option>
                                              <option value="HU" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Hungary')) {echo "selected";} else {echo "disabled";}?>>Hungary</option>
                                              <option value="IS" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Iceland')) {echo "selected";} else {echo "disabled";}?>>Iceland</option>
                                              <option value="IN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('India')) {echo "selected";} else {echo "disabled";}?>>India</option>
                                              <option value="ID" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Indonesia')) {echo "selected";} else {echo "disabled";}?>>Indonesia</option>
                                              <option value="IR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Iran')) {echo "selected";} else {echo "disabled";}?>>Iran (Islamic Republic of)</option>
                                              <option value="IQ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Iraq')) {echo "selected";} else {echo "disabled";}?>>Iraq</option>
                                              <option value="IE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Ireland')) {echo "selected";} else {echo "disabled";}?>>Ireland</option>
                                              <option value="IL" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Israel')) {echo "selected";} else {echo "disabled";}?>>Israel</option>
                                              <option value="IT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Italy')) {echo "selected";} else {echo "disabled";}?>>Italy</option>
                                              <option value="JM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Jamaica')) {echo "selected";} else {echo "disabled";}?>>Jamaica</option>
                                              <option value="JP" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Japan')) {echo "selected";} else {echo "disabled";}?>>Japan</option>
                                              <option value="JO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Jordan')) {echo "selected";} else {echo "disabled";}?>>Jordan</option>
                                              <option value="KZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Kazakhstan')) {echo "selected";} else {echo "disabled";}?>>Kazakhstan</option>
                                              <option value="KE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Kenya')) {echo "selected";} else {echo "disabled";}?>>Kenya</option>
                                              <option value="KI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Kiribati')) {echo "selected";} else {echo "disabled";}?>>Kiribati</option>
                                              <option value="KP" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Korea')) {echo "selected";} else {echo "disabled";}?>>Korea, Democratic People's Republic of</option>
                                              <option value="KR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('North Korea')) {echo "selected";} else {echo "disabled";}?>>Korea, Republic of</option>
                                              <option value="KW" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Kuwait')) {echo "selected";} else {echo "disabled";}?>>Kuwait</option>
                                              <option value="KG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Kyrgyzstan')) {echo "selected";} else {echo "disabled";}?>>Kyrgyzstan</option>
                                              <option value="LA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Laos')) {echo "selected";} else {echo "disabled";}?>>Laos People's Democratic Republic</option>
                                              <option value="LV" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Latvia')) {echo "selected";} else {echo "disabled";}?>>Latvia</option>
                                              <option value="LB" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Lebanon')) {echo "selected";} else {echo "disabled";}?>>Lebanon</option>
                                              <option value="LS" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Lesotho')) {echo "selected";} else {echo "disabled";}?>>Lesotho</option>
                                              <option value="LR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Liberia')) {echo "selected";} else {echo "disabled";}?>>Liberia</option>
                                              <option value="LY" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Libyan Arab')) {echo "selected";} else {echo "disabled";}?>>Libyan Arab Jamahiriya</option>
                                              <option value="LI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Liechtenstein')) {echo "selected";} else {echo "disabled";}?>>Liechtenstein</option>
                                              <option value="LT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Lithuania')) {echo "selected";} else {echo "disabled";}?>>Lithuania</option>
                                              <option value="LU" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Luxembourg')) {echo "selected";} else {echo "disabled";}?>>Luxembourg</option>
                                              <option value="MO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Macau')) {echo "selected";} else {echo "disabled";}?>>Macau</option>
                                              <option value="MK" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Macedonia')) {echo "selected";} else {echo "disabled";}?>>Macedonia, The Former Yugoslav Republic of</option>
                                              <option value="MG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Madagascar')) {echo "selected";} else {echo "disabled";}?>>Madagascar</option>
                                              <option value="MW" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Malawi')) {echo "selected";} else {echo "disabled";}?>>Malawi</option>
                                              <option value="MY" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Malaysia')) {echo "selected";} else {echo "disabled";}?>>Malaysia</option>
                                              <option value="MV" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Maldives')) {echo "selected";} else {echo "disabled";}?>>Maldives</option>
                                              <option value="ML" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Mali')) {echo "selected";} else {echo "disabled";}?>>Mali</option>
                                              <option value="MT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Malta')) {echo "selected";} else {echo "disabled";}?>>Malta</option>
                                              <option value="MH" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Marshall Islands')) {echo "selected";} else {echo "disabled";}?>>Marshall Islands</option>
                                              <option value="MQ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Martinique')) {echo "selected";} else {echo "disabled";}?>>Martinique</option>
                                              <option value="MR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Mauritania')) {echo "selected";} else {echo "disabled";}?>>Mauritania</option>
                                              <option value="MU" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Mauritius')) {echo "selected";} else {echo "disabled";}?>>Mauritius</option>
                                              <option value="YT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Mayotte')) {echo "selected";} else {echo "disabled";}?>>Mayotte</option>
                                              <option value="MX" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Mexico')) {echo "selected";} else {echo "disabled";}?>>Mexico</option>
                                              <option value="FM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Micronesia')) {echo "selected";} else {echo "disabled";}?>>Micronesia, Federated States of</option>
                                              <option value="MD" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Moldova')) {echo "selected";} else {echo "disabled";}?>>Moldova, Republic of</option>
                                              <option value="MC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Monaco')) {echo "selected";} else {echo "disabled";}?>>Monaco</option>
                                              <option value="MN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Mongolia')) {echo "selected";} else {echo "disabled";}?>>Mongolia</option>
                                              <option value="MS" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Montserrat')) {echo "selected";} else {echo "disabled";}?>>Montserrat</option>
                                              <option value="MA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Morocco')) {echo "selected";} else {echo "disabled";}?>>Morocco</option>
                                              <option value="MZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Mozambique')) {echo "selected";} else {echo "disabled";}?>>Mozambique</option>
                                              <option value="MM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Myanmar')) {echo "selected";} else {echo "disabled";}?>>Myanmar</option>
                                              <option value="NA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Namibia')) {echo "selected";} else {echo "disabled";}?>>Namibia</option>
                                              <option value="NR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Nauru')) {echo "selected";} else {echo "disabled";}?>>Nauru</option>
                                              <option value="NP" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Nepal')) {echo "selected";} else {echo "disabled";}?>>Nepal</option>
                                              <option value="NL" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Netherlands')) {echo "selected";} else {echo "disabled";}?>>Netherlands</option>
                                              <option value="AN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Netherlands Antilles')) {echo "selected";} else {echo "disabled";}?>>Netherlands Antilles</option>
                                              <option value="NC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('New Caledonia')) {echo "selected";} else {echo "disabled";}?>>New Caledonia</option>
                                              <option value="NZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('New Zealand')) {echo "selected";} else {echo "disabled";}?>>New Zealand</option>
                                              <option value="NI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Nicaragua')) {echo "selected";} else {echo "disabled";}?>>Nicaragua</option>
                                              <option value="NE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Niger')) {echo "selected";} else {echo "disabled";}?>>Niger</option>
                                              <option value="NG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Nigeria')) {echo "selected";} else {echo "disabled";}?>>Nigeria</option>
                                              <option value="NU" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Niue')) {echo "selected";} else {echo "disabled";}?>>Niue</option>
                                              <option value="NF" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Norfolk Island')) {echo "selected";} else {echo "disabled";}?>>Norfolk Island</option>
                                              <option value="MP" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Northern Mariana Islands')) {echo "selected";} else {echo "disabled";}?>>Northern Mariana Islands</option>
                                              <option value="NO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Norway')) {echo "selected";} else {echo "disabled";}?>>Norway</option>
                                              <option value="OM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Oman')) {echo "selected";} else {echo "disabled";}?>>Oman</option>
                                              <option value="PK" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Pakistan')) {echo "selected";} else {echo "disabled";}?>>Pakistan</option>
                                              <option value="PW" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Palau')) {echo "selected";} else {echo "disabled";}?>>Palau</option>
                                              <option value="PA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Panama')) {echo "selected";} else {echo "disabled";}?>>Panama</option>
                                              <option value="PG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Papua New Guinea')) {echo "selected";} else {echo "disabled";}?>>Papua New Guinea</option>
                                              <option value="PY" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Paraguay')) {echo "selected";} else {echo "disabled";}?>>Paraguay</option>
                                              <option value="PE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Peru')) {echo "selected";} else {echo "disabled";}?>>Peru</option>
                                              <option value="PH" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Philippines')) {echo "selected";} else {echo "disabled";}?>>Philippines</option>
                                              <option value="PN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Pitcairn Islands')) {echo "selected";} else {echo "disabled";}?>>Pitcairn</option>
                                              <option value="PL" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Poland')) {echo "selected";} else {echo "disabled";}?>>Poland</option>
                                              <option value="PT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Portugal')) {echo "selected";} else {echo "disabled";}?>>Portugal</option>
                                              <option value="PR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Puerto Rico')) {echo "selected";} else {echo "disabled";}?>>Puerto Rico</option>
                                              <option value="QA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Qatar')) {echo "selected";} else {echo "disabled";}?>>Qatar</option>
                                              <option value="RE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Reunion')) {echo "selected";} else {echo "disabled";}?>>Reunion</option>
                                              <option value="RO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Romania')) {echo "selected";} else {echo "disabled";}?>>Romania</option>
                                              <option value="RU" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Russia')) {echo "selected";} else {echo "disabled";}?>>Russian Federation</option>
                                              <option value="RW" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Rwanda')) {echo "selected";} else {echo "disabled";}?>>Rwanda</option>
                                              <option value="KN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Saint Kitts and Nevis')) {echo "selected";} else {echo "disabled";}?>>Saint Kitts and Nevis</option>
                                              <option value="LC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Saint LUCIA')) {echo "selected";} else {echo "disabled";}?>>Saint LUCIA</option>
                                              <option value="VC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Saint Vincent')) {echo "selected";} else {echo "disabled";}?>>Saint Vincent and the Grenadines</option>
                                              <option value="WS" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Samoa')) {echo "selected";} else {echo "disabled";}?>>Samoa</option>
                                              <option value="SM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('San Marino')) {echo "selected";} else {echo "disabled";}?>>San Marino</option>
                                              <option value="ST" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Sao Tome And Principe')) {echo "selected";} else {echo "disabled";}?>>Sao Tome and Principe</option>
                                              <option value="SA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Saudi Arabia')) {echo "selected";} else {echo "disabled";}?>>Saudi Arabia</option>
                                              <option value="SN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Senegal')) {echo "selected";} else {echo "disabled";}?>>Senegal</option>
                                              <option value="SC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Seychelles')) {echo "selected";} else {echo "disabled";}?>>Seychelles</option>
                                              <option value="SL" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Sierra Leone')) {echo "selected";} else {echo "disabled";}?>>Sierra Leone</option>
                                              <option value="SG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Singapore')) {echo "selected";} else {echo "disabled";}?>>Singapore</option>
                                              <option value="SK" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Slovakia')) {echo "selected";} else {echo "disabled";}?>>Slovakia (Slovak Republic)</option>
                                              <option value="SI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Slovenia')) {echo "selected";} else {echo "disabled";}?>>Slovenia</option>
                                              <option value="SB" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Solomon Islands')) {echo "selected";} else {echo "disabled";}?>>Solomon Islands</option>
                                              <option value="RS" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Serbia And Montenegro')) {echo "selected";} else {echo "disabled";}?>>Serbia and Montenegro</option>
                                              <option value="SO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Somalia')) {echo "selected";} else {echo "disabled";}?>>Somalia</option>
                                              <option value="ZA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('South Africa')) {echo "selected";} else {echo "disabled";}?>>South Africa</option>
                                              <option value="GS" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('South Georgia And The South Sandwich Islands')) {echo "selected";} else {echo "disabled";}?>>South Georgia and the South Sandwich Islands</option>
                                              <option value="ES" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Spain')) {echo "selected";} else {echo "disabled";}?>>Spain</option>
                                              <option value="LK" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Sri Lanka')) {echo "selected";} else {echo "disabled";}?>>Sri Lanka</option>
                                              <option value="SH" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('St. Helena')) {echo "selected";} else {echo "disabled";}?>>St. Helena</option>
                                              <option value="KN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('St. Kitts And Nevis')) {echo "selected";} else {echo "disabled";}?>>St. Kitts and Nevis</option>
                                              <option value="LC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('St. Lucia')) {echo "selected";} else {echo "disabled";}?>>St. Lucia</option>
                                              <option value="VC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('St. Pierre And Miquelon')) {echo "selected";} else {echo "disabled";}?>>St. Vincent & Grenadines</option>
                                              <option value="PM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('St. Vincent & Grenadines')) {echo "selected";} else {echo "disabled";}?>>St. Pierre and Miquelon</option>
                                              <option value="SD" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Sudan')) {echo "selected";} else {echo "disabled";}?>>Sudan</option>
                                              <option value="SR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Suriname')) {echo "selected";} else {echo "disabled";}?>>Suriname</option>
                                              <option value="SJ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Svalbard and Jan Mayen Islands')) {echo "selected";} else {echo "disabled";}?>>Svalbard and Jan Mayen Islands</option>
                                              <option value="SZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Swaziland')) {echo "selected";} else {echo "disabled";}?>>Swaziland</option>
                                              <option value="SE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Sweden')) {echo "selected";} else {echo "disabled";}?>>Sweden</option>
                                              <option value="CH" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Switzerland')) {echo "selected";} else {echo "disabled";}?>>Switzerland</option>
                                              <option value="SY" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Syria')) {echo "selected";} else {echo "disabled";}?>>Syrian Arab Republic</option>
                                              <option value="TW" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Taiwan')) {echo "selected";} else {echo "disabled";}?>>Taiwan, Province of China</option>
                                              <option value="TJ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Tajikistan')) {echo "selected";} else {echo "disabled";}?>>Tajikistan</option>
                                              <option value="TZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Tanzania')) {echo "selected";} else {echo "disabled";}?>>Tanzania, United Republic of</option>
                                              <option value="TH" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Thailand')) {echo "selected";} else {echo "disabled";}?>>Thailand</option>
                                              <option value="TG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Togo')) {echo "selected";} else {echo "disabled";}?>>Togo</option>
                                              <option value="TK" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Tokelau')) {echo "selected";} else {echo "disabled";}?>>Tokelau</option>
                                              <option value="TO" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Tonga')) {echo "selected";} else {echo "disabled";}?>>Tonga</option>
                                              <option value="TT" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Trinidad And Tobago')) {echo "selected";} else {echo "disabled";}?>>Trinidad and Tobago</option>
                                              <option value="TN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Tunisia')) {echo "selected";} else {echo "disabled";}?>>Tunisia</option>
                                              <option value="TR" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Turkey')) {echo "selected";} else {echo "disabled";}?>>Turkey</option>
                                              <option value="TM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Turkmenistan')) {echo "selected";} else {echo "disabled";}?>>Turkmenistan</option>
                                              <option value="TC" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Turks And Caicos Islands')) {echo "selected";} else {echo "disabled";}?>>Turks and Caicos Islands</option>
                                              <option value="TV" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Tuvalu')) {echo "selected";} else {echo "disabled";}?>>Tuvalu</option>
                                              <option value="UG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Uganda')) {echo "selected";} else {echo "disabled";}?>>Uganda</option>
                                              <option value="UA" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Ukraine')) {echo "selected";} else {echo "disabled";}?>>Ukraine</option>
                                              <option value="AE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('United Arab Emirates')) {echo "selected";} else {echo "disabled";}?>>United Arab Emirates</option>
                                              <option value="GB" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('United Kingdom')) {echo "selected";} else {echo "disabled";}?>>United Kingdom</option>
                                              <option value="US" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('USA')) {echo "selected";} else {echo "disabled";}?>>United States</option>
                                              <option value="UY" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Uruguay')) {echo "selected";} else {echo "disabled";}?>>Uruguay</option>
                                              <option value="UZ" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Uzbekistan')) {echo "selected";} else {echo "disabled";}?>>Uzbekistan</option>
                                              <option value="VU" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Vanuatu')) {echo "selected";} else {echo "disabled";}?>>Vanuatu</option>
                                              <option value="VE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Venezuela')) {echo "selected";} else {echo "disabled";}?>>Venezuela</option>
                                              <option value="VN" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Vietnam')) {echo "selected";} else {echo "disabled";}?>>Viet Nam</option>
                                              <option value="VG" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Virgin Islands (British)')) {echo "selected";} else {echo "disabled";}?>>Virgin Islands (British)</option>
                                              <option value="VI" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Virgin Islands')) {echo "selected";} else {echo "disabled";}?>>Virgin Islands (U.S.)</option>
                                              <option value="WF" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Wallis And Futuna')) {echo "selected";} else {echo "disabled";}?>>Wallis and Futuna Islands</option>
                                              <option value="EH" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Western Sahara')) {echo "selected";} else {echo "disabled";}?>>Western Sahara</option>
                                              <option value="YE" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Yemen')) {echo "selected";} else {echo "disabled";}?>>Yemen</option>
                                              <option value="ZM" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Zambia')) {echo "selected";} else {echo "disabled";}?>>Zambia</option>
                                              <option value="ZW" <?php if(strtoupper($sellerCountry->country_name) == strtoupper('Zimbabwe')) {echo "selected";} else {echo "disabled";}?>>Zimbabwe</option>
                                           </select>
                                       </div>
                                 </div>
                                 <div class="form-group" >
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8 col-lg-offset-3 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                                        <input type="submit" class="btn-u btn-u-blue" value="{{Lang::get('user.get_label')}}">
                                        <a href="{{URL::route('user.seller.rfqEmail',array($quote->rfq_id+100000*1, $quote->id+100000*1))}}" class="btn-u btn-u-green" target="_blank">{{Lang::get('user.contact_seller')}}</a>
                                        <a href = "{{URL::route('user.seller.loginRfq')}}" class="btn-u btn-u-red">{{Lang::get('user.cancel')}}</a>
                                    </div>
                                 </div>
                                <!-- Ship To Information End-->
                            </form>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    @stop
    @section('custom-scripts')
    @stop
@stop