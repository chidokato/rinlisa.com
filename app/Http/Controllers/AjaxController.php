<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use Request;
use Session;
use Illuminate\Http\Request;
use Image;
use File;
use App\Models\Category;
use App\Models\Option;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Images;
use App\Models\ProvinceTranslation;
use App\Models\DistrictTranslation;
use App\Models\WardTranslation;
use App\Models\SectionTranslation;

class AjaxController extends Controller
{
    public function change_cate_lang($id)
    {
        $data = CategoryTranslation::where('category_id',$id)->get();
        foreach ($data as $key => $value) {
    		echo '<input value="'.$value->id.'" name="category_id:'.$value->locale.'" type="hidden">';
        }
    }

    public function change_province($id)
    {
        $Province = ProvinceTranslation::where('province_id',$id)->first();
        $data = DistrictTranslation::where('province_id',$Province->id)->get();
        echo '<option value="">...</option>';
        foreach ($data as $key => $value) {
    		echo '<option value="'.$value->district_id.'">'.$value->name.'</option>';
        }
    }
    public function change_province_lang($id)
    {
        $data = ProvinceTranslation::where('province_id',$id)->get();
        foreach ($data as $key => $value) {
            echo '<input value="'.$value->id.'" name="province_id:'.$value->locale.'" type="hidden">';
        }
    }

    public function change_district($id)
    {
        $District = DistrictTranslation::where('district_id',$id)->first();
        $data = WardTranslation::where('district_id',$District->id)->get();
        echo '<option value="">...</option>';
        foreach ($data as $key => $value) {
            echo '<option value="'.$value->ward_id.'">'.$value->name.'</option>';
        }
    }
    public function change_district_lang($id)
    { 
        $data = DistrictTranslation::where('district_id',$id)->get();
        foreach ($data as $key => $value) {
            echo '<input value="'.$value->id.'" name="district_id:'.$value->locale.'" type="hidden">';
        }
    }
    public function change_ward_lang($id)
    { 
        $data = WardTranslation::where('ward_id',$id)->get();
        foreach ($data as $key => $value) {
            echo '<input value="'.$value->id.'" name="ward_id:'.$value->locale.'" type="hidden">';
        }
    }

    public function change_SortBy($id)
    {
        $data = Category::where('sort_by',$id)->get();
        return view('admin.category.listparent',['data'=>$data]);
    }

    public function change_parent($id)
    {
        $locale = Session::get('locale');
        $data = CategoryTranslation::where('category_id',$id)->get();
        foreach ($data as $key => $value) {
            echo '<input value="'.$value->id.'" type="hidden" name="category:'.$value->locale.'">';
        }
    }

    public function update_category_view($id,$view)
    {
        $data = Category::find($id);
        $data->view = $view;
        $data->save();
    }

    public function update_menu_view($id,$view)
    {
        $data = Menu::find($id);
        $data->view = $view;
        $data->save();
    }

    public function del_img_detail($id)
    {
        $data = Images::find($id);
        if(File::exists('data/product/detail/'.$data->img)) { File::delete('data/product/detail/'.$data->img);} // xóa ảnh cũ
        $data->delete();
    }

    public function del_section($id)
    {
        $data = SectionTranslation::where('section_id', $id)->get();
        foreach ($data as $key => $value) {
            
            SectionTranslation::find($value->id)->delete();
        }
    }

    public function update_status_category($id, $status)
    {
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
    }

    public function update_status_post($id, $status)
    {
        $Post = Post::find($id);
        $Post->status = $status;
        $Post->save();
    }

    public function update_hot_post($id, $hot)
    {
        $Post = Post::find($id);
        $Post->hot = $hot;
        $Post->save();
    }

    public function change_category($id)
    {
        $data = Option::where('category_id',$id)->where('parent',0)->get();
        return view('admin.option.listoption',['data'=>$data]);
    }

    public function change_arrange_mat($id)
    {
        if ($id=='new') {
            $mat = Post::where('category_id',75)->orderBy('id', 'desc')->get();
        }else{
            $mat = Post::where('category_id',75)->orderBy('price', $id)->get();
        }
        return view('pages.iteam.load_knot',['mat'=>$mat]);
    }
    public function change_arrange_day($id)
    {
        if ($id=='new') {
            $day = Post::where('category_id',76)->orderBy('id', 'desc')->get();
        }else{
            $day = Post::where('category_id',76)->orderBy('price', $id)->get();
        }
        return view('pages.iteam.load_knot',['day'=>$day]);
    }
    public function change_arrange_khoa($id)
    {
        if ($id=='new') {
            $khoa = Post::where('category_id',90)->orderBy('id', 'desc')->get();
        }else{
            $khoa = Post::where('category_id',90)->orderBy('price', $id)->get();
        }
        return view('pages.iteam.load_knot',['khoa'=>$khoa]);
    }

    public function change_arrange_cat($id,$catid)
    {
        if ($id=='new') {
            $post = Post::where('category_id', $catid)->orderBy('id', 'desc')->get();
        }else{
            $post = Post::where('category_id', $catid)->orderBy('price', $id)->get();
        }
        return view('pages.iteam.load_cat',['post'=>$post]);
    }
}
