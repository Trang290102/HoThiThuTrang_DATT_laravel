@extends('layouts.admin')
@section('title', 'Quản lý menu')
@section('content')

@section('header')
<link rel="stylesheet" href="{{asset ('public/jquery.dataTables.min.css')}}">
@endsection
@section('footer')
<script src="{{asset('public/jquery.dataTables.min.js')}}"></script>
<script>
  let table = new DataTable('#myTable');
</script>
@endsection

<form action="{{ route('menu.store')}}" method="post" enctype="multipart/form-data">
  @csrf      
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Quản lý menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
           <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('menu.trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
            </div>
           </div>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <!--accordion-->
                    <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header" id="headingPosition">
                          <label for="position">Vị trí</label>
                          <select name="position" id="" class="form-control">
                            <option value="mainmenu">Main Menu</option>
                            <option value="footermenu">Footer Menu</option>
                          </select>
                        </div>
                      </div>
                      <!--end-card menu-->
                      <div class="card">
                        <div class="card-header" id="headingCategory">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                              Danh mục sản phẩm
                            </button>
                          </h2>
                        </div>
                        <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionExample">
                          <div class="card-body">
                           @foreach ($list_category as $category)
                              <div class="form-check">
                            <input name="checkIdCategory[]" class="form-check-input" type="checkbox" value="{{$category->id}}" id="checkCategory{{$category->id}}">
                            <label class="form-check-label" for="checkCategory{{$category->id}}">
                              {{$category->name}}
                            </label>
                          </div>
                           @endforeach
                          
                            <div class="my-3">
                              <input name="ADDCATEGORY" type="submit" class="btn btn-sm btn-success form-control" value="Thêm">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--end-card category-->
                      <div class="card">
                        <div class="card-header" id="headingBrand">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                              Thương hiệu
                            </button>
                          </h2>
                        </div>
                        <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand" data-parent="#accordionExample">
                          <div class="card-body">
                            @foreach ($list_brand as $brand)
                              <div class="form-check">
                              <input name="checkIdBrand[]" class="form-check-input" type="checkbox" value="{{$brand->id}}" id="checkBrand{{$brand->id}}">
                              <label class="form-check-label" for="checkBrand{{$brand->id}}">
                                {{$brand->name}}
                              </label>
                            </div>
                            @endforeach
                           
                            <div class="my-3">
                              <input name="ADDBRAND" type="submit" class="btn btn-sm btn-success form-control" value="Thêm">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--end card brand-->
                      <div class="card">
                        <div class="card-header" id="headingTopic">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTopic" aria-expanded="false" aria-controls="collapseTopic">
                              Chủ đề bài viết
                            </button>
                          </h2>
                        </div>
                        <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordionExample">
                          <div class="card-body">
                            @foreach ($list_topic as $topic)
                             <div class="form-check">
                              <input name="checkIdTopic[]" class="form-check-input" type="checkbox" value="{{$topic->id}}" id="checkTopic{{$topic->id}}">
                              <label class="form-check-label" for="checkTopic{{$topic->id}}">
                                {{$topic->name}}
                              </label>
                            </div>
                            @endforeach
                            
                            <div class="my-3">
                              <input name="ADDTOPIC" type="submit" class="btn btn-sm btn-success form-control" value="Thêm">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--end-card topic-->
                      <div class="card">
                        <div class="card-header" id="headingPage">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsePage" aria-expanded="false" aria-controls="collapsePage">
                              Trang đơn
                            </button>
                          </h2>
                        </div>
                        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionExample">
                          <div class="card-body">
                            @foreach ($list_page as $page)
                              <div class="form-check">
                              <input name="checkIdPage[]" class="form-check-input" type="checkbox" value="{{$page->id}}" id="checkPage{{$page->id}}">
                              <label class="form-check-label" for="checkPage{{$page->id}}">
                                {{$page->title}}
                              </label>
                            </div>
                            @endforeach
                           
                            <div class="my-3">
                              <input name="ADDPAGE" type="submit" class="btn btn-sm btn-success form-control" value="Thêm">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--end-card page-->
                      <div class="card">
                        <div class="card-header" id="headingCustom">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseCustom" aria-expanded="false" aria-controls="collapseCustom">
                              TÙY LIÊN KẾT
                            </button>
                          </h2>
                        </div>
                        <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="my-2">
                              <input name="name" type="text" class="form-control" placeholder="Nhập tên menu">
                            </div>
                            <div class="my-2">
                              <input name="link" type="text" class="form-control" placeholder="#">
                            </div>
                            <div class="my-2">
                              <input name="ADDCUSTOM" type="submit" class="btn btn-sm btn-success form-control" value="Thêm">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--end-card-->
                    </div>
                    <!--accordion-->

                </div>
                <div class="col-md-9">
                  @includeIf('backend.message_alert')
                  <table class="table table-bordered table-striped" id="myTable">
                  <thead>
                      <tr>
                          <th style="width:20px;" class="text-center"> #</th>
                          <th>Tên Menu</th>
                          <th>Liên kết </th>
                          <th class="text-center">Vị trí</th>
                          <th style="width:150px;" class="text-center">Chức năng</th>
                          <th  style="width:20px;" class="text-center">ID</th>
                          {{-- <th style="width: 20%">
                          </th> --}}
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_menu as $menu)
                    <tr>
                      <td class="text-center"><input type="checkbox"></td>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->link}}</td>
                        <td class="text-center">{{$menu->position}}</td>
                        <td class="text-center">
                            @if ($menu->status==1)
                            <a  href="{{ route('menu.status',['menu'=>$menu->id]) }}" class="btn btn-success btn-sm">
                              <i class="fas fa-toggle-on">
                              </i>
                            </a>
                            @else
                            <a  href="{{ route('menu.status',['menu'=>$menu->id]) }}" class="btn btn-danger btn-sm">
                              <i class="fas fa-toggle-off">
                              </i>
                            </a>
                            @endif
                          
                            <a  href="{{ route('menu.show',['menu'=>$menu->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye">
                                </i>
                                
                            </a>
                            <a href="{{ route('menu.edit',['menu'=>$menu->id]) }}" class="btn btn-info btn-sm" >
                                <i class="fas fa-pencil-alt">
                                </i>
                                
                            </a>
                            <a href="{{ route('menu.delete',['menu'=>$menu->id]) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                                
                            </a>
    
                        </td>
                        <td class="text-center">{{$menu->id}}</td>
                    </tr>
                    @endforeach
    
                  </tbody>
                  </table>
                </div>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
              </div>
              <div class="col-md-6 text-right">
                  <a href="{{ route('menu.trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
              </div>
             </div>
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
  
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </form>
  @endsection
