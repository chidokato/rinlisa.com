<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Customer;

// $locale = App::currentLocale();

class HomeController extends Controller
{
    function __construct()
    {
        $setting = Setting::find('1');
        $menu = Menu::where('parent', 0)->get();
        view()->share( [
            'setting'=>$setting,
            'menu'=>$menu,
        ]);
    }

    public function index()
    {
        $slider = Slider::get();
        $tienich = Post::whereIn('category_id', [66,70,71])->get();
        $tintuc = Post::whereIn('category_id', [68])->get();
        $sanpham = Post::whereIn('category_id', [64])->take(4)->get();
        return view('pages.home', compact(
            'slider',
            'tienich',
            'tintuc',
            'sanpham',
        ));
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
        }elseif($slug == 'san-pham'){
            $post = Post::whereIn('category_id', $cat_array)->orderBy('updated_at', 'DESC')->paginate(8);
            return view('pages.category.sanpham', compact(
                'data',
                'post'
            ));
        }
        elseif($slug == 'canh-quan'){
            $post = Post::whereIn('category_id', $cat_array)->orderBy('updated_at', 'DESC')->paginate(9);
            return view('pages.category.canhquan', compact(
                'data',
                'post'
            ));
        }
        elseif($slug == 'tien-ich-dich-vu' || $slug == 'tien-ich' || $slug == 'dich-vu'){
            $post = Post::whereIn('category_id', $cat_array)->orderBy('updated_at', 'DESC')->paginate(10);
            return view('pages.category.tienich', compact(
                'data',
                'post'
            ));
        }
        elseif($slug == 'dai-hoa-than'){
            $post = Post::whereIn('category_id', $cat_array)->orderBy('updated_at', 'DESC')->paginate(8);
            return view('pages.category.daihoathan', compact(
                'data',
                'post'
            ));
        }
        elseif($slug == 'tin-tuc'){
            $post = Post::whereIn('category_id', $cat_array)->orderBy('updated_at', 'DESC')->paginate(9);
            return view('pages.category.canhquan', compact(
                'data',
                'post'
            ));
        }
        elseif($slug == 'lien-he'){
            $post = Post::whereIn('category_id', $cat_array)->orderBy('updated_at', 'DESC')->paginate(8);
            return view('pages.contact', compact(
                'data',
                'post'
            ));
        }
    }

    public function post($catslug, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $cat = Category::where('slug', $catslug)->first();
        if ($post->sort_by == 'Product') {
            return view('pages.project', compact(
                'post',
                // 'related_post',
            ));
        }elseif ($post->sort_by == 'News') {
            return view('pages.post', compact(
                'post',
                'cat',
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
