<?php namespace User;

use Illuminate\Routing\Controllers\Controller;
use View, Input, Redirect, Session, Validator, DB, Mail,File, Request,Response;
use Members as MembersModel, Country as CountryModel,CompanyProfile as CompanyProfileModel,Business as BusinessModel,
    ProductFocus as ProductFocusModel,FactorySize as FactorySizeModel,Category as CategoryModel,Employees as EmployeesModel,
    SubCategory as SubCategoryModel, Product as ProductModel,Bargain as BargainModel,Quote as QuoteModel;
class HomeController extends \BaseController {

    public function index(){
        $param['pageNo'] = 1;
        $param['categories'] = CategoryModel::orderBy('categoryname','asc')->get();
        $bargain = array();
        $product = array();
        $bargainArray = array();
        $productArray = array();
        $bargain  = BargainModel::all();
        $product = ProductModel::orderBy('created_at','desc')->paginate(20);
        if(count($bargain) %4 !=0 ){
            $countBargain = count($bargain);
            $barginList = ceil($countBargain/4);
            for($j=0; $j<$barginList*4; $j++){
                if(isset($bargain[$j])){
                    $bargainArray[$j] = $bargain[$j];
                }else{
                    $index = rand(0,$countBargain-1);
                    $bargainArray[$j] = $bargain[$index];
                }

            }
            $param['bargain'] = $bargainArray;
        }else{
            $param['bargain'] = $bargain;
        }


        if(count($product) %4 !=0 ){
            $countProduct = count($product);
            $ProductList = ceil($countProduct/4);
            
            for($j=0; $j<$ProductList*4; $j++){
                if(isset($product[$j])){
                    $productArray[$j] = $product[$j];
                }else{
                    $index = rand(0,$countProduct-1);
                    $productArray[$j] = $product[$index];
                }

            }
            $param['products'] = $productArray;
        }else{
            $param['products'] = $product;
        }

        $quoteList = DB::select('(SELECT seller_id,COUNT(id) AS countID
                        FROM np_seller_quote
                        WHERE (STATUS >5 OR accept_status >3)
                        GROUP BY seller_id
                        ORDER BY countID DESC
                        LIMIT 20)');
        $quoteArray = array();
        $MemberList = MembersModel::whereIn('usertype',array(1,3))->whereRaw('status =1')->get();
        $countMember = count($MemberList);
        foreach($quoteList as $key =>$value){
            $quoteArray[$key] = $quoteList[$key]->seller_id;
        }
        $clientList = array();
        if(count($quoteList) >=20){
            foreach($quoteArray as $key =>$value){
                $clientList[$key] = MembersModel::find($quoteArray[$key]);
            }
        }else{
            for($i=0; $i<20; $i++){
                if(isset($quoteArray[$i])){
                    $clientList[$i] = MembersModel::find($quoteArray[$i]);
                }else{
                    $index = rand(0,$countMember-1);
                    $clientList[$i] = MembersModel::find($MemberList[$index]->id);
                }
            }
        }
        $param['clients'] = $clientList;
        $companyProfileArray = array();
        for($i=0; $i<20; $i++){
            $companyProfileArray[$i] = CompanyProfileModel::where('user_id','=',($clientList[$i]->id))->first();
        }
        $param['companyProfiles'] = $companyProfileArray;
        return View::make('user.index')->with($param);
    }
    public function video($id){
        $listID= $id-100000;
        $param['pageNo'] =90;
        $param['companyProfile'] =CompanyProfileModel::whereRaw('user_id=?',array($listID))->get();
        return View::make('user.seller.video')->with($param);
    }
    public function verifyEmail($slug){
        $userID = $slug - 100000;
        $member = MembersModel::find($userID);
        $member->email_status = 1;
        $member->save();
        if($member->usertype == 2){
            $alert['msg'] = 'Your email  has been verified.';
        }else{
            $alert['msg'] = 'Your email has been verified. Before you can log in as a seller your info must be confirmed. approved You will receive a email when your seller account has been.';
        }
        $alert['type'] = 'success';
        return Redirect::route('user.auth.login')->with('alert', $alert);
    }
}