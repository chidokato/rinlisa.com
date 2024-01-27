@extends('admin.layout.main')

@section('content')
<?php use App\Models\Category; ?>
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h3>Quản lý sản phẩm</h3>
    <a class="add-iteam" href="{{route('post.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
</div>

<style type="text/css">
    .search{ display:flex; margin-bottom:15px }
    .search input, .search select{ width:200px; margin-right:15px }
</style>

<div class="row">
    <form method="post" action="{{route('post_search')}}" enctype="multipart/form-data">
    @csrf
    <div class="col-xl-12 col-lg-12 search">
        <input type="name" value="{{isset($name) ? $name:''}}" placeholder="Tên sản phẩm" class="form-control" name="name">
        <select class="form-control" name="category_id">
            <option value="">...</option>
            @foreach($category as $val)
            <option {{isset($category_id) && $category_id == $val->id ? 'selected':''}} value="{{$val->id}}">{{$val->name}}</option>
                @foreach(Category::where('parent', $val->id)->get() as $sub)
                <option {{isset($category_id) && $category_id == $sub->id ? 'selected':''}} value="{{$sub->id}}">--{{$sub->name}}</option>
                @endforeach
            @endforeach
        </select>
        <select name="paginate" class="form-control" style="width: 70px;">
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <button type="submit" class="btn btn-success">Tìm kiếm</button>
    </div>
    </form>
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">{{__('lang.all')}}</a></li>
                    <!-- <li><a data-toggle="tab" class="nav-link " href="#tab2">Hiển thị</a></li> -->
                    <!-- <li><a data-toggle="tab" class="nav-link" href="#tab3">Ẩn</a></li> -->
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active" id="tab2">
                    @if(count($post) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Hot</th>
                                <th>Status</th>
                                <th>date</th>
                                <th>User</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $val)
                            <tr id="post">
                                <input type="hidden" name="id" id="id" value="{{$val->id}}" >
                                <td class="thumb"><img src="data/news/{{$val->img}}"></td>
                                <td>
                                    <div class="name"><a href="{{route('post.edit',[$val->id])}}" >{{$val->name}}</a></div>
                                    <div class="slug">{{$val->slug}}</div>
                                </td>
                                <td>{{number_format($val->price)}}
                                    <div class="slug" style="color:red">{{$val->sale?'sale: '.$val->sale.'%':''}}</div>
                                </td>
                                <td>{{$val->category_id ? $val->category->name : ''}}</td>
                                <td>
                                    <label class="container"><input <?php if($val->hot == 'true'){echo "checked";} ?> type="checkbox" id='hot_post' ><span class="checkmark"></span></label>
                                </td>
                                <td>
                                    <label class="container"><input <?php if($val->status == 'true'){echo "checked";} ?> type="checkbox" id='status_post' ><span class="checkmark"></span></label>
                                </td>
                                <td>{{date_format($val->updated_at,"d/m/Y")}}</td>
                                <td>{{$val->User->yourname}}</td>
                                <td style="display: flex;">
                                    <a href="{{route('post_up', [$val->id])}}" class="mr-3"><i class="fas fa-arrow-up" aria-hidden="true"></i></a> 
                                    <a href="{{route('post.edit',[$val->id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                    <form action="{{route('post.destroy', [$val->id])}}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </form>
                    </table>
                    {{ $post->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .name{ width:500px; overflow:hidden; text-overflow: ellipsis; }
    .slug{ font-size:.8rem }
    .thumb{ padding:0px !important; width:43px; margin:0px; }
    .thumb img{ width:59px; height:59px; object-fit:cover; }
</style>
@endsection