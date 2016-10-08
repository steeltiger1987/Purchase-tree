<?php namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View, Input, Redirect, Session, Validator,URL,Mail;
use ShoppingCart as ShoppingCartModel, ShoppingCartProduct as ShoppingCartProductModel;
class ShoppingCartPaymentController  extends \BaseController
{
    public function __construct()
    {
        $this->beforeFilter(function () {
            if (!Session::has('admin_id')) {
                return Redirect::route('admin.auth.login');
            }
        });
    }

    public function index(){
        $param['pageNo'] = 92;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        $param['carts'] = ShoppingCartModel::whereRaw(true)->orderBy('id','DESC')->get();

        $dateTime =date("Y-m-d H:i:s");
        $pastDateTime =  date('Y-m-d H:i:s', strtotime('-'. '7 days'));

        $param['news'] = ShoppingCartModel::whereBetween('created_at',[$pastDateTime, $dateTime])->orderBy('id','DESC')->get();
        return View::make('admin.shoppingCart.index')->with($param);
    }
    public function delete($id){
        try {
            ShoppingCartProductModel::whereRaw('cart_id =?' ,$id)->delete();
            ShoppingCartModel::find($id)->delete();
            $alert['msg'] = 'This shopping cart  has been deleted successfully';
            $alert['type'] = 'success';
        } catch(\Exception $ex) {
            $alert['msg'] = 'This shopping cart  has been already used';
            $alert['type'] = 'danger';
        }
        return Redirect::route('admin.shoppingCart.payment')->with('alert', $alert);
    }

    public function show($id){
        $param['pageNo'] = 92;
        $param['cart'] = ShoppingCartModel::find($id);
        return View::make('admin.shoppingCart.show')->with($param);
    }
    public function confirm($id){
        $shoppingCart = ShoppingCartModel::find($id);
        if($shoppingCart ->status == 1){
            $shoppingCart->paid = 1;
            $shoppingCart->status = 2;
            $shoppingCart->save();

            $shoppingCartProducts = $shoppingCart->shoppingCartItems;
            foreach($shoppingCartProducts as $key_shoppingCartProduct =>$shoppingCartProduct){
                $shoppingCartProduct->status = 2;
                $shoppingCartProduct->save();
            }
            $email = $shoppingCart->billing_email;
            $title = "Payment confirmed by admin";
            $sendMessage = "Your payment has been confirmed by admin. Your payment is in the escrow.";
            $data = array(
                'escrow_register_url' => URL::route('user.escrow.register'),
                'escrow_login_url' => URL::route('user.escrow.login'),
                'sendMessage' =>  $sendMessage,
                'title' => $title
            );
            Mail::send('emails.shoppingCart.creditPaid', $data, function($message) use ($email, $title)
            {
                $message->from('noreply@purchasetree.com', $title);
                $message->to($email, $title)->subject($title);
            });
            $alert['msg'] = 'This shopping cart payment  has been confirmed successfully';
            $alert['type'] = 'success';
            return Redirect::route('admin.shoppingCart.payment')->with('alert', $alert);
        } else{
            $alert['msg'] = 'This shopping cart payment  has been confirmed already.';
            $alert['type'] = 'danger';
            return Redirect::route('admin.shoppingCart.payment')->with('alert', $alert);
        }
    }
}