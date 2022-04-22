@extends('backend.layouts.master')

@section('title', 'Menus')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Menu Builder ({{$menu->name}})</div>
        </div>
        <div class="page-title-actions">
            <a href="{{route('admin.menus.index')}}" class="mr-3 btn btn-success">
                <i class="fas fa-plus-circle"></i>
                All Menus
            </a>
            <a href="{{route('admin.menus.item.create', $menu->id)}}" class="mr-3 btn btn-primary">
                <i class="fas fa-plus-circle"></i>
                Create Menu Item
            </a>
        </div>    
    </div>
</div>            

<div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p>You can output a menu anywhere on your site by calling <code>menu('name')</code></p>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body menu-builder">
                <h5 class="card-title"></h5>
                <div class="dd">
                    <ol>
                        @forelse ($menu->menuitems as $item)
                            @if ($item->type == 'divider')
                                <strong>{{$item->divider_title}}</strong>
                               @else
                               <li>{{$item->title}}</li> 
                            @endif

                            <a href="{{route('admin.menus.item.edit', ['id' => $menu->id, 'itemId' => $item->id])}}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                                <span>Edit</span>
                            </a>

                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{$item->id}})">
                                <i class="fas fa-trash-alt"></i>
                                <span>Delete</span>
                            </button>
                            <form id="delete-form-{{$item->id}}" method="post" action="{{ route('admin.menus.item.destroy', ['id' => $menu->id, 'itemId' => $item->id]) }}">
                                @csrf
                            </form>
                        @empty
                            <div class="text-center">
                                <strong>No Menu Items Found.</strong>
                            </div>
                        @endforelse
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    