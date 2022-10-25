<?php

namespace App\Http\Controllers;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Collection;


session_start();
class BOOKGARDENController extends Controller
{
    //phan cua user

     public function index(){
        $products = DB::table('product')->get();
        $cate=DB::table('category')->get();
           $proCate=DB::table('product')
           ->join('category','product.cateId','=','category.cateId')
           ->get();
       

            return view('index')->with(['products'=>$products])->with(['cate'=>$cate])->with(['proCate'=>$proCate]);
        }
        
    public function indexUser(Request $request){
        if ($request->session()->has('id')) {
            $id=session()->get('id');
        
         }                
             $userr=DB::table('users')->where('id',intval($id))->first();
        $products = DB::table('product')->get();
        $cate=DB::table('category')->get();
        $proCate=DB::table('product')
        ->join('category','product.cateId','=','category.cateId')
        ->get();
        return view('user.indexUser')->with(['products'=>$products])->with(['cate'=>$cate])->with(['proCate'=>$proCate])
        ->with(['userr'=>$userr]);
    }

    public function login(){
        return view('login');
    }   
     public function logout(Request $request) {
        $request->session()->invalidate();
        return redirect('index');
    }

    public function sign_up(){
        return view('signUp');
    }
    public function afterSignup(Request  $request){
  
        $userName=$request->userName;
        $userPassword=$request->userPassword;
        $email=$request->email;
        $fullname=$request->fullname;
        $telephone=$request->telephone;

        $data=DB::table('users')->select('userName')->get();
        $collection=collect($data);

        $validatedData = $request->validate([
            'userName' => 'required|min:3|unique:users,userName',    
            'userPassword' => 'required',
            'email' => 'required|email||unique:users,email',
            'fullname' => 'required|alpha|min:3|max:20',
            'telephone' => 'required|numeric|digits:9',
            'ConfirmUserPassword' => 'required|same:userPassword'
        ]);
          DB::table('users')
          ->insert([
              'userName'=>   $userName,
              'userPassword'=> $userPassword,
              'telephone'=>intval($telephone),
              'email'=>  $email,
              'fullname'=>$fullname
          ]);
          return redirect('login');
    }

    public function checkLogin(Request $request) {  
          
        $name = $request->userName;
        $password = $request->userPassword;
        
        
        $dataAd=DB::table('admin')->select('adminName')->get();
        $data=DB::table('users')->select('userName')->get();
        //pass

        // 
        foreach($data as $u){
        $userdata[]="$u->userName";
        }
        foreach($dataAd as $a){
            $admindata[]="$a->adminName";
        }

        $this->allslots=array_merge($userdata,$admindata);
       
       $collection=collect($this->allslots);
        $request['BookGarden'] = $this->allslots;
        if(isset($name) && $collection->contains("$name")){
            $dataPassad=DB::table('admin')->select('adminPassword')->where('adminName',$name)->first();
            $dataPass=DB::table('users')->select('userPassword')->where('userName',$name)->first();
    
            if(isset($dataPass)){
                $userdataPass[]="$dataPass->userPassword";
                $this->allslotsPass=$userdataPass;
            }elseif(isset($dataPassad))
               {
                    $admindataPass[]="$dataPassad->adminPassword";
                    $this->allslotsPass=$admindataPass;
               }
               $request['PasswordBookGarden'] = $this->allslotsPass;
            }

        $validatedData = $request->validate([
            'userName' => "required|min:3|in_array:BookGarden.*",
            'userPassword' => 'required|in_array:PasswordBookGarden.*'
        ]);

        $user = DB::table('users')->where('userName', $name)->first();
        $admin=DB::table('admin')->where('adminName',$name)->first();
        if (($user != null && $user->userPassword == $password) ) {
            $request->session()->push('user', $user);   
            session()->put('id', $user->id);
                return redirect('user/indexUser');

        }else if(($admin !=null && $admin->adminPassword==$password)) {
            $request->session()->push('admin', $admin);
            session()->put('id_ad', $admin->adminId);
            if ($admin->role == 1) { 
                return redirect('admin/admin-index');
            } else {
                return redirect('sale-assistant/sale-assistant-index');
            }
            
        } 
        else {
            return redirect('login')->with('message', 'Login Fail.');
        }

        }
 // change information user   
 public function infor(Request $request){
    if ($request->session()->has('id')) {
       $id=session()->get('id');
   
    }                

        $userr=DB::table('users')->where('id',intval($id))->first();
  return view('user/information')->with(['userr'=>$userr]);
    }
    public function change(Request $request,$id){
        $fullname=$request->fullname;
        $telephone=$request->telephone;
        $email=$request->email;
        $address=$request->address;
        $gender=$request->gender;
        $brithday=$request->birthday;
        $validatedData = $request->validate([
            'telephone' => "numeric|digits:9",    
            'email' => 'email',
            'fullname'=>"alpha|min:3|max:20",
         
        ]);
        DB::table('users')
      ->where('id',intval($id))
      ->update(['fullname'=>$fullname,'telephone'=>$telephone,
      'email'=>$email,'address'=>$address,'gender'=>$gender,
      'birthday'=>$brithday]);
      return redirect()->action('BOOKGARDENController@infor');
    }
public function reset($id){
    $userr=DB::table('users')
    ->where('id',intval($id))->first();
    return view('user/resetPassword')->with(['userr'=>$userr]);
}
public function afterReset(Request $request,$id){ 
    if ($request->session()->has('id')) {
        $id_user=session()->get('id');
    
     }                
   
    $passwordNew=$request->userPasswordNew;    

    $pass=DB::table('users')->where('id',intval($id_user))->first();

    $dataPass[]="$pass->userPassword";
    $this->allslotsdataPass=$dataPass;
    $request['PasswordData'] = $this->allslotsdataPass;

    $validatedData = $request->validate([
        'userPassword' =>"required|in_array:PasswordData.*",    
        'userPasswordNew' =>"required|different:userPassword",    
        'userConfirmPasswordNew' =>'required|same:userPasswordNew'
    ]);
    DB::table('users')
    ->where('id',intval($id))
    ->update(['userPassword'=>$passwordNew]);
    return redirect()->action('BOOKGARDENController@login');
    

}

public function updateImage(Request $request, $id){
    if($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $extension = $file->getClientOriginalExtension();
        if($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg'){
            return redirect('user/information'.$id)->with('err','Chỉ có thể chọn đuôi file png , jpg hoặc jpeg');
        }
        $imageName = $file->getClientOriginalName();
        $file->move('product-images',$imageName);
    }
    else{
        $p = DB::table('users')
        ->where('id',intval($id))
        ->first();
        $imageName = $p->avatar;
    }
    DB::table('users')
    ->where('id',intval($id))
    ->update(['avatar'=>$imageName]);
    return redirect()->action('BOOKGARDENController@infor');
}

//product
public function productdetails($id){
 $products=DB::table('product')
 ->join('category','product.cateId','=','category.cateId')
 ->where('productId',intval($id))->first();

 $udetails = DB::table('product')->get();

 $comment=DB::table('comment')
 ->join('users','comment.user_id','=','users.id')
 ->join('product','comment.productId','=','product.productId')
 ->where('comment.productId',intval($id))->get();

 return view('productdetails')->with(['products'=>$products])->with(['udetails'=>$udetails])
 ->with(['comment'=>$comment]);
}

public function productdetailsUser(Request $request, $id){
    if ($request->session()->has('id')) {
        $id_user=session()->get('id');
    
     }                
         $userr=DB::table('users')->where('id',intval($id_user))->first();
    
    $products=DB::table('product')
    ->join('category','product.cateId','=','category.cateId')
    ->where('productId',intval($id))->first();

    $udetails = DB::table('product')->get();

    
 $comment=DB::table('comment')
 ->join('users','comment.user_id','=','users.id')
 ->join('product','comment.productId','=','product.productId')
 ->where('comment.productId',intval($id))->get();

 $cart=DB::table('cart')
 ->join('product','cart.productId','=','product.productId')
  ->where('cart.productId',intval($id))
  ->where('cart.user_id',intval($id_user))
  ->first()
 ;

    return view('user.productdetailsUser')->with(['products'=>$products])->with(['udetails'=>$udetails])->with(['cart'=>$cart])
    ->with(['comment'=>$comment])->with(['userr'=>$userr]);
   }

 
public function comment(Request $request,$productId){
    if ($request->session()->has('id')) {
        $id_user=session()->get('id');
    
     }   
 
    $commentDescription=$request->comment;
    $validatedData = $request->validate([
        'comment' => "required",

    ]);
    DB::table('comment')
    ->insert(['productId'=>$productId,'comment'=>$commentDescription,'user_id'=>$id_user]);
   
  
    return redirect("user/productdetailsUser/{$productId}");

}
public function user_delete_comment($commentId,$productId){

    $co = DB::table('comment')
        ->where('commentId',intval($commentId))
        ->delete();
        return redirect("user/productdetailsUser/{$productId}");

}


//search
 public function search(Request $request){

         
       $namePro=$request->input('nameProduct');
       if($namePro==""){
        $namePro="";
    }
       session()->put('namePro', $namePro);
  $table= DB::table('product')
   ->where('productName','LIKE',"%{$namePro}%")->get();

   $collection=collect(["$namePro"]);


   $cate=DB::table('category')->get();
       return view('search')->with(['table'=>$table])->with(['collection'=>$collection])->with(['cate'=>$cate]);
   }
   public function searchCate(Request $request,$id){
 
        $request->session()->put('namePro','');

   

    $table= DB::table('product')
    ->join('category','product.cateId','=','category.cateId')
  ->where('category.cateId',$id)->get();

  $collection=collect([""]);

  $cate=DB::table('category')->get();
  $catePri=DB::table('category')->select('cateName')->where('cateId',intval($id))->first();

   

  return view('search')->with(['table'=>$table])->with(['collection'=>$collection])->with(['cate'=>$cate])
  ->with(['catePri'=>$catePri]);

   }

public function checkCate(Request $request, $id){
    if ($request->session()->has('namePro')) {
        $namePro=session()->get('namePro');
     } 
     $table= DB::table('product')
     ->join('category','product.cateId','=','category.cateId')
   ->where('productName','LIKE',"%{$namePro}%")
   ->where('category.cateId','=',$id)->get();

   $collection=collect(["$namePro"]);

   $cate=DB::table('category')->get();
   $catePri=DB::table('category')->select('cateName')->where('cateId',intval($id))->first();

    

   return view('search')->with(['table'=>$table])->with(['collection'=>$collection])->with(['cate'=>$cate])
   ->with(['catePri'=>$catePri]);

}



public function searchUser(Request $request){
    if ($request->session()->has('id')) {
        $id_user=session()->get('id');
    
     }                
         $userr=DB::table('users')->where('id',intval($id_user))->first();

    $namePros=$request->input('nameProduct') ;

    if($namePros==""){
        $namePros="";
    }
    session()->put('namePros', $namePros);
$table= DB::table('product')
->where('productName','LIKE',"%{$namePros}%")->get();

$collection=collect(["$namePros"]);

$cate=DB::table('category')->get();
    return view('user.search')->with(['table'=>$table])->with(['collection'=>$collection])->with(['cate'=>$cate])
    ->with(['userr'=>$userr]);
}
public function searchCates(Request $request,$id){
    if ($request->session()->has('id')) {
        $id_user=session()->get('id');
    
     }                
         $userr=DB::table('users')->where('id',intval($id_user))->first(); 

     
        $request->session()->put('namePros','');

     

    $table= DB::table('product')
    ->join('category','product.cateId','=','category.cateId')
  ->where('category.cateId',$id)->get();

  $collection=collect([""]);

  $cate=DB::table('category')->get();
  $catePri=DB::table('category')->select('cateName')->where('cateId',intval($id))->first();

   

  return view('user.search')->with(['table'=>$table])->with(['collection'=>$collection])->with(['cate'=>$cate])
  ->with(['catePri'=>$catePri])->with(['userr'=>$userr]);

   }

public function checkCates(Request $request, $id){
    if ($request->session()->has('id')) {
        $id_user=session()->get('id');
    
     }                
         $userr=DB::table('users')->where('id',intval($id_user))->first(); 


    if ($request->session()->has('namePros')) {
        $namePros=session()->get('namePros');
     } 
     $table= DB::table('product')
     ->join('category','product.cateId','=','category.cateId')
   ->where('productName','LIKE',"%{$namePros}%")
   ->where('category.cateId','=',$id)->get();

   $collection=collect(["$namePros"]);

   $cate=DB::table('category')->get();

     $catePri=DB::table('category')->select('cateName')->where('cateId',intval($id))->first(); 

   return view('user.search')->with(['table'=>$table])->with(['collection'=>$collection])->with(['cate'=>$cate])
   ->with(['userr'=>$userr]) ->with(['catePri'=>$catePri]);

}

////////order
////
//
public function viewCart(Request $request){ //den trang gio hang
  
    if ($request->session()->has('id')) {
        $id=session()->get('id');  
     }  
               
         $userr=DB::table('users')->where('id',intval($id))->first();
 $cart=DB::table('cart')
 ->join('product','cart.productId','=','product.productId')
 ->join('users','cart.user_id','=','users.id')
 ->where('user_id',$id)
 ->get();
  return view('user.cart')->with(['cart'=>$cart])->with(['userr'=>$userr]);
}

public function deleteCart(Request $request,$id){ //xoa san pham trong gio hang
    if ($request->session()->has('id')) {
        $user_id=session()->get('id');
    
     }  
DB::table('cart')
->where('user_id',$user_id)

->where('productId',$id)
->delete();
    return redirect()->action('BOOKGARDENController@viewCart');
}

public function saveCart(Request $request){ //them san pham vao gio hang
    if ($request->session()->has('id')) {
        $id=session()->get('id');

     }                
    $userr=DB::table('users')->where('id',intval($id))->first();
    $productId=$request->productid_hidden;
    $quantity=$request->input('quantity');
    $price=$request->price;

 DB::table('cart')
 ->insert(['productId'=>$productId,'quantity'=>$quantity,'price'=>$price,'user_id'=>$id,'quanPrice'=>$price*$quantity]);



 $cart=DB::table('cart')
 ->join('product','cart.productId','=','product.productId')
 ->join('users','cart.user_id','=','users.id')
 ->where('user_id',$id)
 ->get();
 return redirect()->action('BOOKGARDENController@viewCart');
}
public function updateSaveCart(Request $request){
    if ($request->session()->has('id')) {
        $id=session()->get('id');

     }                
    $userr=DB::table('users')->where('id',intval($id))->first();
    $cartId=$request->cart_hidden;
    $quantity=$request->input('quantity');
    $quantityOld=$request->quantity_hidden;
    $quan=$quantityOld+$quantity;
    $price=$request->price;

 DB::table('cart')
 ->where('cartId',intval($cartId))
 ->update(['quantity'=>$quan,'price'=>$price,'quanPrice'=>$price*$quan]);



 $cart=DB::table('cart')
 ->join('product','cart.productId','=','product.productId')
 ->join('users','cart.user_id','=','users.id')
 ->where('user_id',$id)
 ->get();
 return redirect()->action('BOOKGARDENController@viewCart');
}


public function orders(Request $request){ //nút đặt hàng
    $ship_add=$request->address;
    
    $validatedData = $request->validate([
        'address' => 'required'
    ]);
    if ($request->session()->has('id')) {
        $idd=session()->get('id');  
     }             
         $userr=DB::table('users')->where('id',intval($idd))->first();
//lay thong tin user
     $user=DB::table('users')
     ->where('id',$idd)
     ->first();
//cộng tiền
$total=DB::table('cart')->where('user_id',intval($idd))->sum('quanPrice');
$totalDeli=30000+$total;
$collection=collect(['ship_add'=>$ship_add,'total'=>$total,'totalDeli'=>$totalDeli]);

$details=DB::table('cart')
->join('product','cart.productId','=','product.productId')
->where('cart.user_id',intval($idd))->get();


return view('user.orders')->with(['user'=>$user])->with(['userr'=>$userr])
->with(['collection'=>$collection])->with(['details'=>$details]);
}

public function afterOrder(Request $request){
    if ($request->session()->has('id')) {
        $idd=session()->get('id');  
     }             
         $userr=DB::table('users')->where('id',intval($idd))->first();

$ship_address=$request->ship_address;
$user_id=$request->user_id;
$total=$request->total;

DB::table('orders')
->insert(['ship_address'=>$ship_address,'user_id'=>$user_id,'total'=>$total]);

$orders=DB::table('orders')->where('user_id',$user_id)->first();
//
//lay orderId vua tao 
$orderId=DB::table('orders')->where('user_id',intval($user_id))->max('orderId');

//insert tung cart vao orderdetals theo orderid vua tao
$user = DB::table('cart')->where('user_id',intval($user_id))->get();
foreach($user as $u)
{
DB::table('orderdetails')
->insert(['productId'=>$u->productId,'quantity'=>$u->quantity,'price'=>$u->price,
'QuanvsPrice'=>$u->quanPrice,'orderId'=>$orderId]);
}

$details=DB::table('orders')
->join('orderdetails','orders.orderId','=','orderdetails.orderId')
->where('orders.orderId',intval($orderId))->first();

$detailsPro=db::table('orderdetails')
->join('product','orderdetails.productId','=','product.productId')
->where('orderdetails.orderId',intval($orderId))->get();
return view('user.orderDetail')->with(['orders'=>$orders])->with(['userr'=>$userr])->with(['details'=>$details])
->with(['detailsPro'=>$detailsPro]) ;
}

public function viewOrder(Request $request){

    if ($request->session()->has('id')) {
        $idd=session()->get('id');  
     }             
         $userr=DB::table('users')->where('id',intval($idd))->first();

         $order=DB::table('orders')->where('user_id',$idd)->get();
         $orderOne=DB::table('orders')->whereIn('process_status',[1,2])->where('user_id',$idd)->get();
         $orderThrere=DB::table('orders')->where('process_status',3)->where('user_id',$idd)->get();
         $orderFour=DB::table('orders')->where('process_status',4)->where('user_id',$idd)->get();

return view('user.historyOrder')->with(['userr'=>$userr])->with(['order'=>$order])
->with(['orderOne'=>$orderOne])->with(['orderFour'=>$orderFour])->with(['orderThere'=>$orderThrere]);
}

public function ViewOrderDetail(Request $request,$id){
    if ($request->session()->has('id')) {
        $idd=session()->get('id');  
     }             
         $userr=DB::table('users')->where('id',intval($idd))->first();
    $orders=DB::table('orders')->where('user_id',$idd)->where('orderId',intval($id))->first();
    $details=DB::table('orders')
    ->join('orderdetails','orders.orderId','=','orderdetails.orderId')
    ->where('orders.orderId',intval($id))->first();
    
    $detailsPro=db::table('orderdetails')
    ->join('product','orderdetails.productId','=','product.productId')
    ->where('orderdetails.orderId',intval($id))->get(); 
    return view('user.orderDetail')->with(['orders'=>$orders])->with(['userr'=>$userr])->with(['details'=>$details])
->with(['detailsPro'=>$detailsPro]) ;
}

public function updateProcess($id){

         DB::table('orders')
        ->where('orderId',intval($id))
        ->update(['process_status'=>3]);
return redirect("ViewOrderDetail/{$id}"); ///////////////////////////////////////action ko can id
}

public function dropOrder($id){
    DB::table('orders')
    ->where('orderId',intval($id))
    ->update(['process_status'=>4]);
    return redirect("ViewOrderDetail/{$id}");
}

//phan cua admin 
public function admin_index(){
    $products = DB::table('product')
    ->join('category','product.cateId','=','category.cateId')
    ->get();
    return view('admin.admin-index')->with(['products'=>$products]);
}
public function logoutAdmin(Request $request) {
    $request->session()->invalidate();
    return redirect('index');
}
public function admin_category(){
    $category = DB::table('category')->get();
    return view('admin.admin-category')->with(['category'=>$category]);
}


public function create_product(Request $request){
    $category = DB::table('category')->get();
    return view('admin.create-product')->with(['category'=>$category]);

}

public function post_create_product(Request $request){
    $product = $request->all();
    $validatedData = $request->validate([
        'product-name' => 'required|min:3|unique:product,productName',
        'product-category' => 'required',
        'product-description' => 'required',
        'product-status' => 'required',
        'product-price' => 'required|numeric|min:1000|max:10000000',
        'product-image' => 'required'
    ]);
    if($request->hasFile('product-image')){
        $file = $request->file('product-image');
        $extension = $file->getClientOriginalExtension();
        if($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg'){
            return redirect('admin/create-product')->with('err','Chỉ có thể chọn đuôi file png , jpg hoặc jpeg');
        }
        $imageName = $file->getClientOriginalName();
        $file->move('product-images',$imageName);
    }
    DB::table('product')
    ->insert([
        'productName'=>$product['product-name'],
        'cateId'=>intval($product['product-category']),
        'price'=>intval($product['product-price']),
        'productStatus'=>$product['product-status'],
        'description'=>$product['product-description'],
        'productImage'=>$imageName
    ]);
    return redirect()->action('BOOKGARDENController@admin_index');
}

public function create_category(){
    $category = DB::table('category')->get();
    return view('admin.create-category')->with(['category'=>$category]);
}

public function post_create_category(Request $request){
    $categoryName = $request->categoryname;
    $validatedData = $request->validate([
        'categoryname' => 'required|min:3|unique:category,cateName',
    ]);
    DB::table('category')
    ->insert(['cateName'=>$categoryName]);
    return redirect()->action('BOOKGARDENController@admin_category');
}

public function admin_sales_information(){
    $admin = DB::table('admin')->get();
    return view('admin.admin-sales-information')->with(['admin'=>$admin]);
}

public function create_sales(){
    $admin = DB::table('admin')->get();
    return view('admin.create-sales')->with(['admin'=>$admin]);
}

public function post_create_sales(Request $request){
    $admin = $request->all();
    $validatedData = $request->validate([
        'admin-name' => 'required|min:6|unique:admin,adminName',    
        'admin-password' => 'required',
        'admin-fullname' => 'required',
        'admin-tel' => 'required|digits:9'
    ]);
    DB::table('admin')
    ->insert([
        'role'=>2,
        'roleName'=>'Sales assistant',
        'adminName'=>$admin['admin-name'],
        'adminPassword'=>$admin['admin-password'],
        'adminFName'=>$admin['admin-fullname'],
        'adminPhone'=>intval($admin['admin-tel'])
    ]);
    return redirect()->action('BOOKGARDENController@admin_sales_information');
}

public function admin_delete_sales($adminId){
    $a = DB::table('admin')
        ->where('adminId',intval($adminId))
        ->delete();
        return redirect()->action('BOOKGARDENController@admin_sales_information');
}

public function update_product($productId){
    $category = DB::table('category')->get();
    $products = DB::table('product')
    ->where('productId',intval($productId))
    ->first();
    return view('admin.update-product')->with(['products'=>$products,'category'=>$category]);
}

public function post_update_product(Request $request,$productId){
    $productName = $request->productName;
    $cateName = $request->productCategory;
    $price = $request->productPrice;
    $description = $request->productDescription;
    $productStatus = $request->productStatus;
    $validatedData = $request->validate([
        'productName' => 'required|min:3',
        'productCategory' => 'required',
        'productDescription' => 'required',
        'productStatus' => 'required',
        'productPrice' => 'required|numeric|min:1000|max:10000000',
      
    ]);
    if($request->hasFile('product-image')){
        $file = $request->file('product-image');
        $extension = $file->getClientOriginalExtension();
        if($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg'){
            return redirect('admin/update-product'.$productId)->with('err','Chỉ có thể chọn đuôi file png , jpg hoặc jpeg');
        }
        $imageName = $file->getClientOriginalName();
        $file->move('product-images',$imageName);
    }
    else{
        $p = DB::table('product')
        ->where('productId',intval($productId))
        ->first();
        $imageName = $p -> productImage;
    }
    DB::table('product')
    ->where('productId',intval($productId))
    ->update(['productName'=>$productName,'cateId'=>$cateName,'price'=>$price,'description'=>$description,'productStatus'=>$productStatus,'productImage'=>$imageName]);
    return redirect()->action('BOOKGARDENController@admin_index');
}

public function update_category($cateId){
    $category = DB::table('category')
    ->where('cateId',intval($cateId))
    ->first();
    return view('admin.update-category')->with(['category'=>$category]);
}

public function post_update_category(Request $request,$cateId){
    $categoryName = $request->categoryName;
    $validatedData = $request->validate([
        'categoryName' => 'required|min:3|unique:category,cateName',
    ]);
    DB::table('category')
    ->where('cateId',intval($cateId))
    ->update(['cateName'=>$categoryName]);
    return redirect()->action('BOOKGARDENController@admin_category');
}

public function admin_information(){
    $users = DB::table('users')->get();
    return view('admin.admin-information')->with(['users'=>$users]);
}

public function admin_information_details($id){
    $users = DB::table('users')
    ->where('id',intval($id))
    ->first();
    return view('admin.admin-information-details')->with(['users'=>$users]);
}

public function product_lock($productId){
    $p = DB::table('product')
    ->where('productId',intval($productId))
    ->update(['visiblePro'=>1]);
    return redirect()->action('BOOKGARDENController@admin_index');
}

public function product_unlock($productId){
    $p = DB::table('product')
    ->where('productId',intval($productId))
    ->update(['visiblePro'=>0]);
    return redirect()->action('BOOKGARDENController@admin_index');
}

public function category_lock($cateId){
    $c = DB::table('category')
    ->where('cateId',intval($cateId))
    ->update(['visible'=>1]);
    return redirect()->action('BOOKGARDENController@admin_category');
}

public function category_unlock($cateId){
    $c = DB::table('category')
    ->where('cateId',intval($cateId))
    ->update(['visible'=>0]);
    return redirect()->action('BOOKGARDENController@admin_category');
}


public function admin_feedback(){
    $feedback = DB::table('feedback')
    ->join('users','feedback.user_id','=','users.id')
    ->get();
    return view('admin.admin-feedback')->with(['feedback'=>$feedback]);
}

public function reply_feedback($feedbackId){
    $feedback = DB::table('feedback')
    ->join('users','feedback.user_id','=','users.id')
    ->where('feedbackId',intval($feedbackId))
    ->first();
    return view('admin.admin-reply-feedback')->with(['feedback'=>$feedback]);
}

public function post_reply_feedback(Request $request,$feedbackId){
    $replyFeedback = $request->replyFeedBack;
    DB::table('feedback')
    ->where('feedbackId',intval($feedbackId))
    ->update(['replyFeedback'=>$replyFeedback]);
    return redirect()->action('BOOKGARDENController@admin_feedback');
}

public function admin_comment(){
    $comment = DB::table('comment')
    ->join('product','comment.productId','=','product.productId')
    ->join('users','comment.user_id','=','users.id')
    ->get();
    return view('admin.admin-comment')->with(['comment'=>$comment]);
}

public function admin_delete_comment($commentId){
        $co = DB::table('comment')
        ->where('commentId',intval($commentId))
        ->delete();
        return redirect()->action('BOOKGARDENController@admin_comment');
}

public function admin_order(){
    $orders = DB::table('orders')
    ->join('users','orders.user_id','=','users.id')
    ->get();
    return view('admin.admin-order')->with(['orders'=>$orders]);
}

public function admin_update_process($orderId){
    $orders = DB::table('orders')
    ->where('orderId',intval($orderId))
    ->first();
    return view('admin.admin-update-process')->with(['orders'=>$orders]);
}

public function admin_post_update_process(Request $request,$orderId){
    $process = $request->processStatus;
    DB::table('orders')
    ->where('orderId',intval($orderId))
    ->update(['process_status'=>$process]);
    return redirect()->action('BOOKGARDENController@admin_order');
}

public function order_cancel($orderId){
    $o = DB::table('orders')
    ->where('orderId',intval($orderId))
    ->update(['process_status'=>4]);
    return redirect()->action('BOOKGARDENController@admin_order');
}


public function admin_order_details($orderId){
    $orderdetails = DB::table('orderdetails')
    ->join('product','orderdetails.productId','=','product.productId')
    ->where('orderdetails.orderId',intval($orderId))
    ->get();
    $orders = DB::table('orders')
    ->where('orderId',intval($orderId))
    ->first();
    return view('admin.admin-order-details')->with(['orderdetails'=>$orderdetails,'orders'=>$orders]);
}


//sale asistant
public function sale_assistant_Info(Request $request){
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-Info') ->with(['sale_assistant'=>$sale_assistant]);
}
public function sale_assistant_change_Info(Request $request ){
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
     }  
     $validatedData = $request->validate([
        'adminFName' => 'required|alpha',
        'adminPhone' => 'required|numeric|digits:9'
    ]);
    $adminFName=$request->adminFName;
    $adminPhone=$request->adminPhone;
    DB::table('admin')
    ->where('adminId',intval($id))
    ->update(['adminFName'=>$adminFName,'adminPhone'=>$adminPhone]);

     return redirect()->action('BOOKGARDENController@sale_assistant_Info');
}
public function sale_assistant_index(Request $request) {
    $products = DB::table('product')
    ->join('category','product.cateId','=','category.cateId')->get();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-index')->with(['products'=>$products])
    ->with(['sale_assistant'=>$sale_assistant]);


}
public function sale_assistant_category(Request $request){
    $category = DB::table('category')->get();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-category')->with(['category'=>$category])->with(['sale_assistant'=>$sale_assistant]);
}
public function sale_assistant_information(Request $request){
    $users = DB::table('users')->get();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-information')->with(['users'=>$users])->with(['sale_assistant'=>$sale_assistant]);
}

public function sale_assistant_information_details(Request $request ,$id){
    $users = DB::table('users')
    ->where('id',intval($id))
    ->first();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-information-details') ->with(['sale_assistant'=>$sale_assistant])->with(['users'=>$users]);
}

public function sale_assistant_feedback(Request $request){
    $feedback = DB::table('feedback')
    ->join('users','feedback.user_id','=','users.id')
    ->get();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-feedback') ->with(['sale_assistant'=>$sale_assistant])->with(['feedback'=>$feedback]);
}

public function sale_assistant_reply_feedback(Request $request,$feedbackId){
    $feedback = DB::table('feedback')
    ->join('users','feedback.user_id','=','users.id')
    ->where('feedbackId',intval($feedbackId))
    ->first();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-reply-feedback') ->with(['sale_assistant'=>$sale_assistant])->with(['feedback'=>$feedback]);
}

public function sale_assistant_post_reply_feedback(Request $request,$feedbackId){
    $replyFeedback = $request->replyFeedBack;
    DB::table('feedback')
    ->where('feedbackId',intval($feedbackId))
    ->update(['replyFeedback'=>$replyFeedback]);

    return redirect()->action('BOOKGARDENController@sale_assistant_feedback');
}

public function sale_assistant_comment(Request $request){
    $comment = DB::table('comment')
    ->join('product','comment.productId','=','product.productId')
    ->join('users','comment.user_id','=','users.id')
    ->get();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-comment') ->with(['sale_assistant'=>$sale_assistant])->with(['comment'=>$comment]);
}

public function sale_assistant_order(Request $request){
    $orders = DB::table('orders')
    ->join('users','orders.user_id','=','users.id')
    ->get();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-order') ->with(['sale_assistant'=>$sale_assistant])->with(['orders'=>$orders]);
}

public function order_cancel1($orderId){
    $o = DB::table('orders')
    ->where('orderId',intval($orderId))
    ->update(['process_status'=>4]);
 
    return redirect()->action('BOOKGARDENController@sale_assistant_order');
}

public function sale_assistant_delete_comment(Request $request,$commentId){
    $co = DB::table('comment')
    ->where('commentId',intval($commentId))
    ->delete();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return redirect()->action('BOOKGARDENController@sale_assistant_comment');
}

public function sale_assistant_order_details(Request $request,$orderId){
    $orderdetails = DB::table('orderdetails')
    ->join('product','orderdetails.productId','=','product.productId')
    ->where('orderdetails.orderId',intval($orderId))
    ->get();
    $orders = DB::table('orders')
    ->where('orderId',intval($orderId))
    ->first();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-order-details') ->with(['sale_assistant'=>$sale_assistant])->with(['orderdetails'=>$orderdetails,'orders'=>$orders]);
}

public function sale_assistant_update_process(Request $request,$orderId){
    $orders = DB::table('orders')
    ->where('orderId',intval($orderId))
    ->first();
    if ($request->session()->has('id_ad')) {
        $id=session()->get('id_ad');
    
     }  
    $sale_assistant=DB::table('admin')->where('adminId',intval($id))->where('role',2)->first();
    return view('sale-assistant.sale-assistant-update-process') ->with(['sale_assistant'=>$sale_assistant])->with(['orders'=>$orders]);
}

public function sale_assistant_post_update_process(Request $request,$orderId){
    $process = $request->processStatus;
    DB::table('orders')
    ->where('orderId',intval($orderId))
    ->update(['process_status'=>$process]);
   
    return redirect()->action('BOOKGARDENController@sale_assistant_order');
}




//footer
public function chinhsach(Request $request){
    if ($request->session()->has('id')) {
        $idd=session()->get('id');  
     }             
         $userr=DB::table('users')->where('id',intval($idd))->first();
    return view('footer.chinhsach')->with(['userr'=>$userr]);
}
public function dieukhoan(Request $request){
    if ($request->session()->has('id')) {
        $idd=session()->get('id');  
     }             
         $userr=DB::table('users')->where('id',intval($idd))->first();
    return view('footer.dieukhoan')->with(['userr'=>$userr]);
}
public function gioithieu(Request $request){
    if ($request->session()->has('id')) {
        $idd=session()->get('id');  
     }             
         $userr=DB::table('users')->where('id',intval($idd))->first();
    return view('footer.gioithieu')->with(['userr'=>$userr]);
}
public function feedback(Request $request){
    if ($request->session()->has('id')) {
        $id=session()->get('id');
        $userr=DB::table('users')->where('id',intval($id))->first();
     }     else{
         return redirect('login');
     }                     
     
     $feedback=DB::table('users')

     ->where('id',intval($id))->first();
    return view('footer.feedback')->with(['feedback'=>$feedback])->with(['userr'=>$userr]);
}
public function afterFeedback(Request $request,$id){
    $feedback=$request->descriptionFeedback;
    $validatedData = $request->validate([
        'descriptionFeedback' => "required",
      
    ]);
    DB::table('feedback')
    ->where('feedback.user_id',intval($id))
    ->insert(['user_id'=>$id,'descriptionFeedback'=>$feedback]);
    return redirect()->action('BOOKGARDENController@indexUser');
}
public function viewFeedback(Request $request){
    if ($request->session()->has('id')) {
        $idd=session()->get('id');  
     }             
         $userr=DB::table('users')->where('id',intval($idd))->first();

         $feedback=DB::table('feedback')->where('user_id',intval($idd))->get();

         return view('user.viewFeedback')->with(['userr'=>$userr])->with(['feedback'=>$feedback]);

}

}
