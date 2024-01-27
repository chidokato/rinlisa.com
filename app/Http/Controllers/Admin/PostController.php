<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Image;
use File;

use App\Models\Category;
use App\Models\Option;
use App\Models\Post;
use App\Models\Images;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $update = Post::wherein('category_id',[85,77,78,79])->get();
        foreach($update as $val){
            if ($val->unit == 'JPY') {
                $data = Post::find($val->id);
                $data->price = $data->price*180;
                $data->unit = 'VNĐ';
                $data->save();
            }
        }

        $category = Category::where('sort_by', 'Product')->where('parent', '0')->orderBy('view', 'DESC')->get();
        $post = Post::where('sort_by', 'Product')->orderBy('id', 'DESC')->Paginate(20);
        return view('admin.post.index', compact(
            'post',
            'category'
        ));
    }

    public function post_up($id)
    {
        $id_max = Post::max('id');
        $data = Post::find($id);
        $data->id = $id_max+1;
        $data->save();
        return redirect()->back()->with('Success','Success');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $category = Category::where('sort_by', 'Product')->where('parent', '0')->orderBy('view', 'DESC')->get();

        $post = Post::where('sort_by', 'Product')->orderBy('id', 'DESC')->where('id','!=' , 0);
        if($request->name){
            $post->where('name','like',"%$request->name%");
        }
        if($request->category_id){
            $post->where('category_id', $request->category_id);
        }
        $post = $post->paginate($request->paginate);

        $name = $request->name;
        $category_id = $request->category_id;
        $paginate = $request->paginate;

        return view('admin.post.index', compact(
            'post',
            'category',
            'name',
            'category_id',
            'paginate',
        ));
    }


    public function create()
    {
        $category = Category::where('sort_by', 'Product')->orderBy('view', 'DESC')->get();
        $option = Option::where('category_id', '74')->where('parent', '0')->orderBy('view', 'DESC')->get();
        return view('admin.post.create')->with(compact('category', 'option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $post = new Post();
        $post->user_id = Auth::User()->id;
        $post->status = 'true';
        $post->sort_by = 'Product';
        $post->slug = Str::slug($data['name'], '-');
        $post->name = $data['name'];
        $post->category_id = $data['category_id'];
        $post->detail = $data['detail'];
        $post->content = $data['content'];
        $post->parameter = $data['parameter'];
        $post->title = $data['title'];
        $post->description = $data['description'];

        $post->price = $data['price'];
        $post->sale = $data['sale'];
        $post->unit = $data['unit'];
        $post->quantity = $data['quantity'];

        if (isset($data['genuine'])) { $post->genuine = $data['genuine']; }
        if (isset($data['shape'])) { $post->shape = $data['shape']; }
        if (isset($data['color'])) { $post->color = $data['color']; }
        if (isset($data['size'])) { $post->size = $data['size']; }
        if (isset($data['material'])) { $post->material = $data['material']; }

        // thêm ảnh
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/news/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/news', $filename);
            $post->img = $filename;
        }
        // ---------------------
        if ($request->hasFile('img_1')) {
            $file = $request->file('img_1');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/product/knot/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/product/knot', $filename);
            $post->img_1 = $filename;
        }
        if ($request->hasFile('img_2')) {
            $file = $request->file('img_2');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/product/knot/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/product/knot', $filename);
            $post->img_2 = $filename;
        }
        if ($request->hasFile('img_3')) {
            $file = $request->file('img_3');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/product/knot/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/product/knot', $filename);
            $post->img_3 = $filename;
        }
        // thêm ảnh
        $post->save();

        if($request->hasFile('imgdetail')){
            foreach ($request->file('imgdetail') as $file) {
                if(isset($file)){
                    $Images = new Images();
                    $Images->post_id = $post->id;
                    $filename = $file->getClientOriginalName();
                    while(file_exists("data/product/detail/".$filename)){$filename = rand(0,99)."_".$filename;}
                    $file->move('data/product/detail', $filename);
                    $Images->img = $filename;
                    $Images->save();
                }
            }
        }
        return redirect('admin/post')->with('Success','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('sort_by', 'Product')->get();
        $data = Post::find($id);
        $images = Images::where('post_id', $data->id)->get();
        $option = Option::where('category_id', $data->category_id)->where('parent', '0')->orderBy('view', 'DESC')->get();
        return view('admin.post.edit')->with(compact('category', 'data', 'images', 'option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = Post::find($id);
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->category_id = $data['category_id'];
        $post->detail = $data['detail'];
        if (isset($data['info'])) {
            $post->info = $data['info'];
        }
        $post->content = $data['content'];
        $post->parameter = $data['parameter'];
        $post->title = $data['title'];
        $post->description = $data['description'];

        $post->price = $data['price'];
        $post->sale = $data['sale'];
        $post->unit = $data['unit'];
        $post->quantity = $data['quantity'];

        if (isset($data['genuine'])) { $post->genuine = $data['genuine']; } else { $post->genuine = null; }
        if (isset($data['shape'])) { $post->shape = $data['shape']; } else { $post->shape = null; }
        if (isset($data['color'])) { $post->color = $data['color']; } else { $post->color = null; }
        if (isset($data['size'])) { $post->size = $data['size']; } else { $post->size = null; }
        if (isset($data['material'])) { $post->material = $data['material']; } else { $post->material = null; }

        // thêm ảnh
        if ($request->hasFile('img')) {
            if(File::exists('data/news/'.$post->img)) { File::delete('data/news/'.$post->img);} // xóa ảnh cũ
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/news/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/news', $filename);
            $post->img = $filename;
        }
        // ------------------
        if ($request->hasFile('img_1')) {
            if(File::exists('data/product/knot/'.$post->img_1)) { File::delete('data/product/knot/'.$post->img_1);} // xóa ảnh cũ
            $file = $request->file('img_1');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/product/knot/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/product/knot', $filename);
            $post->img_1 = $filename;
        }
        if ($request->hasFile('img_2')) {
            if(File::exists('data/product/knot/'.$post->img_2)) { File::delete('data/product/knot/'.$post->img_2);} // xóa ảnh cũ
            $file = $request->file('img_2');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/product/knot/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/product/knot', $filename);
            $post->img_2 = $filename;
        }
        if ($request->hasFile('img_3')) {
            if(File::exists('data/product/knot/'.$post->img_3)) { File::delete('data/product/knot/'.$post->img_3);} // xóa ảnh cũ
            $file = $request->file('img_3');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/product/knot/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/product/knot', $filename);
            $post->img_3 = $filename;
        }
        // thêm ảnh
        $post->save();

        if($request->hasFile('imgdetail')){
            foreach ($request->file('imgdetail') as $file) {
                if(isset($file)){
                    $Images = new Images();
                    $Images->post_id = $post->id;
                    $filename = $file->getClientOriginalName();
                    while(file_exists("data/product/detail/".$filename)){$filename = rand(0,99)."_".$filename;}
                    $file->move('data/product/detail', $filename);
                    $Images->img = $filename;
                    $Images->save();
                }
            }
        }

        
        return redirect()->back()->with('Success','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post = Post::find($id);
        if(File::exists('data/news/'.$Post->img)) { File::delete('data/news/'.$Post->img);} // xóa ảnh cũ
        $Post->delete();
        return redirect()->back()->with('Success','Success');
    }
}
