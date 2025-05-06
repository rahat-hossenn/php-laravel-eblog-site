@section("title","Main baners index")
@extends('admin.layouts.app')

@section('content')

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Banner List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=" ">Banner</a></li>
                                <li class="breadcrumb-item ">Banner List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Banner</h3>
                                    <a class="float-right" href="">Banner New</a>
                                </div>
                                
                                <div class="card-body">
                                    <table id="postlist" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Main Banner</th>
                                                <td><img src="{{asset('front_end/assets/images/users/'.$bannerData->main_banner_img)}}" 
                                                    width="100" height="300" class="img-fluid" alt="Main Banner"></td>
                                            </tr> 
                                            <tr>
                                                <th>Main Banner headding</th>
                                                <td>{{$bannerData->main_banner_headding}}</td>
                                            </tr> 
                                            <tr>
                                                <th>Main Banner paragrap</th>
                                                <td>{{$bannerData->main_banner_paragrap}}</td>
                                            </tr>
                                            <tr>
                                                <th>small Banner one img</th>
                                                <td><img src="{{asset('front_end/assets/images/users/'.$bannerData->small_one_img )}}" 
                                                    width="100" height="300" class="img-fluid" alt="Main Banner">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>small baner one paragrap</th>
                                                <td>{{$bannerData->small_one_paragrap}}</td>
                                            </tr>  
                                            <tr>
                                                <th>small Banner two img</th>
                                                <td><img src="{{asset('front_end/assets/images/users/'.$bannerData->small_two_img )}}" 
                                                    width="100" height="300" class="img-fluid" alt="Main Banner">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>small baner two paragrap</th>
                                                <td>{{$bannerData->small_two_paragrap}}</td>
                                            </tr>  
                                        </thead> 
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
           
@endsection
