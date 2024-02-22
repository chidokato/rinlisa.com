<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Post;
use App\Models\Images;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Mail;

// $locale = App::currentLocale();

class HomeController extends Controller
{
    public function sendmail(){
        $name = 'Nguyễn Văn Tuấn';
        Mail::send('emails.test', compact('name'), function($email) use($name){
            $email->subject('demo test mail');
            $email->to('tuan.pn92@gmail.com', 'web rinlisa');
        });
    }

    function __construct()
    {
        $setting = Setting::find('1');
        $menu = Menu::where('parent', 0)->orderBy('view', 'asc')->get();
        $cat_sibar = Category::where('sort_by', 'Product')->where('parent', 0)->orderBy('view', 'asc')->get();

        $post_news = Post::orderBy('id', 'desc')->take(5)->get();
        
        view()->share( [
            'setting'=>$setting,
            'menu'=>$menu,
            'cat_sibar'=>$cat_sibar,
            'post_news'=>$post_news,
        ]);
    }

    public function index()
    {
        $slider = Slider::get();
        $cafe = Post::where('category_id', 77)->orderBy('id', 'desc')->take(6)->get();
        $sphot = Post::where('hot', 'true')->orderBy('id', 'desc')->take(6)->get();
        $seikonam = Post::wherein('category_id', [83])->orderBy('id', 'desc')->take(12)->get();
        $seikonu = Post::wherein('category_id', [84])->orderBy('id', 'desc')->take(12)->get();
        $mypham = Post::wherein('category_id', [78,91,92])->orderBy('id', 'desc')->take(8)->get();
        $thucpham = Post::wherein('category_id', [85])->orderBy('id', 'desc')->take(8)->get();
        $traicay = Post::wherein('category_id', [79])->orderBy('id', 'desc')->take(8)->get();

        return view('pages.home', compact(
            'slider',
            'cafe',
            'sphot',
            'seikonam',
            'seikonu',
            'mypham',
            'thucpham',
            'traicay',

        ));
    }

    public function search()
    {
        $posts = Post::where('sort_by', 'Product')->orderBy('id', 'DESC');
        if($key = request()->key){
            $posts->where('name', 'like', '%' . $key . '%');
        }
        $posts = $posts->paginate(30);

        return view('pages.search', compact(
            'posts',
            'key',
        ));
    }

    public function account()
    {
        if (Auth::check()) {

            $user = User::find(Auth::User()->id);
            $order = Order::where('user_id', $user->id)->where('parent', 0)->get();
            return view('pages.account.account', compact(
                'user',
                'order',
            ));
        }else{
            return redirect()->route('dangnhap');
        }
        
    }

    public function dangnhap()
    {
        return view('pages.account.login');
    }

    public function dangky()
    {
        return view('pages.account.register');
    }

    public function customknot()
    {
        $mat = Post::where('category_id', 75)->orderBy('id', 'desc')->get();
        $day = Post::where('category_id', 76)->orderBy('id', 'desc')->get();
        $khoa = Post::where('category_id', 90)->orderBy('id', 'desc')->get();
        return view('pages.knot', compact(
            'mat',
            'day',
            'khoa',
        ));
    }


    public function addTocart($id)
    {
        // session()->flush('cart');

        $product = Post::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                'product_id' => $id,
                'name' => $product->name,
                'price' => $product->price,
                'unit' => $product->unit,
                'img' => $product->img,
                'slug' => $product->category->slug.'/'.$product->slug,
                'quantity' => '1'
            ];
        }
        session()->put('cart', $cart);

        return response()->json([
            'quanlity_cart' => count($cart),
            'code' => 200,
            'message' => 'success'
        ], status: 200); 

        // echo "<pre>";
        // print_r(session()->get('cart'));
    }
    public function showCart(){
        $cart = session()->get('cart');
        // dd($cart);
        return view('pages.cart', compact(
            'cart'
        ));
    }

    public function updateCart(Request $request){
        if(isset($request['id'])){
            foreach($request['id'] as $key => $id){
                $cart = session()->get('cart');
                $cart[$id]['quantity'] = $request['quantity'][$key];
                session()->put('cart', $cart);
            }
        }
        $cart = session()->get('cart');
        return redirect()->route('showCart');
    }

    public function delCart(Request $request){
        if ($request->id) {
            $cart = session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            $cart = session()->get('cart');
            $cartComponent = view('pages.iteam.cart', compact('cart'))->render();
            return response()->json([
                'quanlity_cart' => count($cart),
                'cart_component' => $cartComponent,
                'code' => 200
            ], status: 200);
        }
    }

    public function checkout(){
        return view('pages.cart.checkout');
    }

    public function order($uid){
        $cart = session()->get('cart');
        $order = new Order();
        $order->user_id = $uid;
        $order->parent = 0;
        $order->save();

        $edit_order = Order::find($order->id);
        $edit_order->sku = date('Ymd').$order->id;
        $edit_order->save();
        
        foreach($cart as $id => $val){
            $orders = new Order();
            $orders->user_id = $uid;
            $orders->parent = $order->id;
            $orders->product_id = $val['product_id'];
            $orders->quantity = $val['quantity'];
            $orders->save();
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect()->route('home');
    }


    public function clik_body(Request $request, $id)
    {
        $mat = Post::find($id);
        $mat_html = "<img src='data/product/knot/".$mat->img_1."'>";
        $price_face = "<div class='price_face' data-id='".$mat->price."'></div>";
        $tong = $mat->price + $request->price_strap + $request->price_rg;
        return response()->json([
            'mat_html' => $mat_html,
            'price_face' => $price_face,
            'tong' => $tong,
            'code' => 200,
            'message' => 'success'
        ], status: 200);
    }
    public function clik_strap(Request $request, $id)
    {
        $strap = Post::find($id);
        $str_m = "<img src='data/product/knot/".$strap->img_3."'>";
        $flat_top = "<img src='data/product/knot/".$strap->img_1."'>";
        $flat_bottom = "<img src='data/product/knot/".$strap->img_2."'>";
        $price_strap = "<div class='price_flat' data-id='".$strap->price."'></div>";
        $tong = $strap->price + $request->price_face + $request->price_rg;
        return response()->json([
            'str_m' => $str_m,
            'flat_top' => $flat_top,
            'flat_bottom' => $flat_bottom,
            'price_strap' => $price_strap,
            'tong' => $tong,
            'code' => 200,
            'message' => 'success'
        ], status: 200);
    }

    public function clik_buckle(Request $request, $id)
    {
        $buckle = Post::find($id);
        $rg = "<img src='data/product/knot/".$buckle->img_1."'>";
        $price_rg = "<div class='price_rg' data-id='".$buckle->price."'></div>";
        $tong = $buckle->price + $request->price_face + $request->price_strap;
        return response()->json([
            'rg' => $rg,
            'price_rg' => $price_rg,
            'tong' => $tong,
            'code' => 200,
            'message' => 'success'
        ], status: 200);
    }

    // public function about()
    // {
    //     $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
    //         ->where('locale', $locale)->where('parent', 0)
    //         ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
    //     return view('pages.about', compact(
    //         'category',
    //     ));
    // }

    // public function contact()
    // {
    //     $locale = App::currentLocale();
    //     $category = Category::where('parent', 0)
    //         ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
    //     return view('pages.contact', [
    //         'category'=>$category,
    //     ]);
    // }

    public function category($slug)
    {
        $data = Category::where('slug', $slug)->first();
        // cat_array
        $cat_array = [$data["id"]];
        $cates = Category::where('parent', $data["id"])->get();
        foreach ($cates as $key => $cate) {
            $cat_array[] = $cate->id;
        }
        // cat_array
        if ($slug == 'gioi-thieu') {
            return view('pages.about', compact(
                'data',
            ));
        }elseif($slug == 'lien-he'){
            return view('pages.contact', compact(
                'data',
            ));
        }else{
            if ($data->sort_by == 'Product') {
                $post = Post::whereIn('category_id', $cat_array)->orderBy('id', 'DESC')->paginate(30);
                $total = Post::whereIn('category_id', $cat_array)->count();
                return view('pages.category', compact(
                    'data',
                    'post',
                    'total'
                ));
            }
        }
        
        
    }

    public function post($catslug, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $images = Images::where('post_id', $post->id)->get();
        if ($post->sort_by == 'Product') {
            return view('pages.project', compact(
                'post',
                'images',
            ));
        }elseif ($post->sort_by == 'News') {
            return view('pages.post', compact(
                'post',
                // 'related_post',
            ));
        }
        
    }

    public function question(Request $request){
        $data = $request->all();
        dd($data);
        
    }

   
}
