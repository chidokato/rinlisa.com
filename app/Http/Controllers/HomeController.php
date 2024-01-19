<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Post;
use App\Models\Images;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Customer;

// $locale = App::currentLocale();

class HomeController extends Controller
{
    function __construct()
    {
        $setting = Setting::find('1');
        $menu = Menu::where('parent', 0)->orderBy('view', 'asc')->get();
        
        view()->share( [
            'setting'=>$setting,
            'menu'=>$menu,
        ]);
    }

    public function index()
    {
        $slider = Slider::get();
        $cafe = Post::where('category_id', 77)->orderBy('id', 'desc')->take(6)->get();
        $sphot = Post::where('hot', 'true')->orderBy('id', 'desc')->take(6)->get();
        $sanpham = Post::orderBy('id', 'desc')->take(6)->get();
        $sanpham1 = Post::orderBy('id', 'desc')->take(6)->get();
        return view('pages.home', compact(
            'slider',
            'cafe',
            'sphot',
            'sanpham',
            'sanpham1',
        ));
    }

    public function account()
    {
        return view('pages.account');
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
                'name' => $product->name,
                'price' => $product->price,
                'unit' => $product->unit,
                'img' => $product->img,
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
        $data = $request->all();
        if(isset($data['id'])){
            foreach($data['id'] as $key => $id){
                $cart = session()->get('cart');
                $cart[$id]['quantity'] = $data['quantity'][$key];
                session()->put('cart', $cart);
            }
        }
        $cart = session()->get('cart');
        return view('pages.cart', compact(
            'cart'
        ));
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
            $post = Post::whereIn('category_id', $cat_array)->orderBy('id', 'DESC')->paginate(8);
            return view('pages.contact', compact(
                'data',
                'post'
            ));
        }else{
            if ($data->sort_by == 'Product') {
                $post = Post::whereIn('category_id', $cat_array)->orderBy('id', 'DESC')->paginate(12);
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

    public function dangky(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $customer = new Customer;
        $customer->name = $data['name'];
        $customer->phone = $data['phone'];
        $customer->email = $data['email'];
        $customer->save();
        return redirect()->back();
    }
}
