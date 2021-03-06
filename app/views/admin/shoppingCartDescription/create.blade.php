@extends('admin.layout')
@section('body')
    <h3 class="page-title">@if(isset($description)) Edit @else Add @endif  ShoppingCart FAQ Management</h3>
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
                <a href="{{URL::route('admin.shoppingCart.description')}}">ShoppingCart FAQ</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                @if(isset($description))
                    <a href="{{URL::route('admin.shoppingCart.description.edit',$description->id)}}">Edit ShoppingCart FAQ</a>
                @else
                <a href="{{URL::route('admin.shoppingCart.description.create')}}">Add ShoppingCart FAQ</a>
                @endif
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        @if(isset($description)) Edit @else Add @endif ShoppingCart FAQ
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
                    <form  class="form-horizontal" id="addCategoryFiledForm" method="POST" action="{{URL::route('admin.shoppingCart.description.store')}}" enctype="multipart/form-data">
                        <input type="hidden" value="@if(isset($description)) {{$description->id}} @endif" name="descriptionID">
                        <div class="form-body">
                            @foreach ([
                                    'title' => 'Title',
                                    'description' => 'Description',]
                                     as $key=> $value)
                                    @if($key === 'title')
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">{{ Form::label($key, $value) }}</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="title" class="form-control" value="@if(isset($description)){{$description->title}} @endif">
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">{{ Form::label($key, $value) }}</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea name="description" class="form-control" rows="10">@if(isset($description)){{$description->description}} @endif</textarea>
                                        </div>
                                    </div>
                                    @endif
                            @endforeach
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-7 col-md-5">
                                            <button   class="btn  blue" type="submit" ><i class="fa fa-check-circle-o" style="margin-right:4px"></i>@if(isset($description)) Update @else Save @endif</button>
                                            <a class="btn  green" href="{{URL::route('admin.shoppingCart.description')}}"><i class="fa fa-repeat" style="margin-right:4px"></i>Cancel</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@stop