<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;

use App\Models\Promotion;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Image;
use File;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion = Promotion::orderBy('id', 'desc')->get();
        return view('admin.promotion.index', compact('promotion'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Promotion = Promotion::get();
        $posts = Post::get();
        return view('admin.Promotion.create', compact('Promotion', 'posts'));
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
        $promotion = new Promotion();
        $promotion->user_id = Auth::User()->id;
        $promotion->status = 'true';
        $promotion->name = $data['name'];
        $promotion->content = $data['content'];
        $promotion->title = $data['title'];
        $promotion->description = $data['description'];
        $promotion->slug = Str::slug($data['name'], '-');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/promotion/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/promotion', $filename);
            $promotion->img = $filename;
        }

        $promotion->save();
        return redirect('admin/promotion')->with('success','updated successfully');
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
        $data = Promotion::find($id);
        $Promotion = Promotion::where('sort_by', $data->sort_by)->get();
        return view('admin.Promotion.edit', compact('data', 'Promotion'));
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
        // dd($data);
        $Promotion = Promotion::find($id);
        $Promotion->view = $data['view'];
        $Promotion->icon = $data['icon'];
        $Promotion->parent = $data['parent'];
        $Promotion->name = $data['name'];
        $Promotion->content = $data['content'];
        $Promotion->title = $data['title'];
        $Promotion->description = $data['description'];
        $Promotion->slug = $data['slug'];

        // thêm ảnh
        if ($request->hasFile('img')) {
            if(File::exists('data/Promotion/'.$Promotion->img)) { File::delete('data/Promotion/'.$Promotion->img);} // xóa ảnh cũ
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/Promotion/".$filename)){$filename = rand(0,99)."_".$filename;}
            $file->move('data/Promotion', $filename);
            $Promotion->img = $filename;
        }
        // thêm ảnh

        $Promotion->save();
        
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Promotion::find($id)->delete();
        return redirect()->back();
    }
}
