@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">{{__('lang.post')}}</h2>
    <a class="add-iteam" href="{{route('post.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> {{__('lang.add')}}</button></a>
</div>

<div class="row">
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
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Status</th>
                                <!-- <th>Sort By</th> -->
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
                                <td><a href="{{route('post.edit',[$val->id])}}" >{{$val->name}}</a></td>
                                <td>{{$val->slug}}</td>
                                <td>{{$val->category_id ? $val->category->name : ''}}</td>
                                <td>
                                    <label class="container"><input <?php if($val->status == 'true'){echo "checked";} ?> type="checkbox" id='status_post' ><span class="checkmark"></span></label>
                                </td>
                                <!-- <td>{{$val->sort_by}}</td> -->
                                <td>{{$val->updated_at}}</td>
                                <td>{{$val->User->yourname}}</td>
                                <td style="display: flex;">
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
    .thumb{ padding:0px !important; width:43px; margin:0px; }
    .thumb img{ width:43px; height:43px; object-fit:cover; }
</style>
@endsection