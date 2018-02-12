@extends('backend.layouts.app')

@section('page-header')
@endsection

@section('meta')
@endsection

@section('before-styles-end')
    <style>body{background:#ffc;}</style>
@endsection
<?php
$tag_arr = get_larapack_tag_arr();
$tag_arr_pt = get_pearltree_tag_arr();
?>

@section('content')
    <div class="container">
        <form action="{{URL::to('admin/dashboard/larapacks/store')}}" method="post">
        <div class="card">
            <div class="card-header">
                <div class="form-group float-right">
                    <button type="submit" class="btn btn-primary">Speichern</button>
                    <a style="margin-left:50px" href="{{url('admin/dashboard/larapacks')}}" class="btn btn-outline-primary float-right">zurück zur Liste</a>
                </div>
                <h3>Create a Larapack</h3>
            </div>
            <div class="card-body"  style="background:#f3f4f5">

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif
                {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('tag1') ? ' has-error' : '' }}">
                        <label for="title"></label>
                        <select class="custom-select" style="" id="tag1" name="tag1">
                            <option value ="">Tag1 wählen</option>
                            @foreach ($tag_arr as $tag)
                                <option value ="{{$tag}}">{{$tag}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('tag1'))
                            <span class="help-block">{{ $errors->first('tag1') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('tag2') ? ' has-error' : '' }}">
                        <label for="title"></label>
                        <select class="custom-select" style="" id="tag2" name="tag2">
                            <option value ="">Tag2 wählen</option>
                            @foreach ($tag_arr as $tag)
                                <option value ="{{$tag}}">{{$tag}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('tag2'))
                            <span class="help-block">{{ $errors->first('tag2') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('tag3') ? ' has-error' : '' }}">
                        <label for="title"></label>
                        <select class="custom-select" style="" id="tag3" name="tag3">
                            <option value ="">Tag3 wählen</option>
                            @foreach ($tag_arr as $tag)
                                <option value ="{{$tag}}">{{$tag}}</option>
                            @endforeach
                        </select>

                        @if($errors->has('tag3'))
                            <span class="help-block">{{ $errors->first('tag3') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('install_str') ? ' has-error' : '' }}">
                    <label for="title">install_str</label>
                    <input type="text" class="form-control" id="install_str" name="install_str" placeholder="install_str" value="{{ old('install_str') }}">
                    @if($errors->has('install_str'))
                        <span class="help-block">{{ $errors->first('install_str') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('git_url') ? ' has-error' : '' }}">
                    <label for="git_url">Git-Url</label>
                    <input type="text" class="form-control" id="git_url" name="git_url" placeholder="Git-Url" value="{{ old('git_url') }}">
                    @if($errors->has('git-url'))
                        <span class="help-block">{{ $errors->first('git-url') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('doc_url') ? ' has-error' : '' }}">
                    <label for="doc_url">Doc-Url</label>
                    <input type="text" class="form-control" id="doc_url" name="doc_url" placeholder="Doc-Url" value="{{ old('doc_url') }}">
                    @if($errors->has('doc-url'))
                        <span class="help-block">{{ $errors->first('doc-url') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="mytextarea" name="description" placeholder="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                    <div class="card">
                        <div class="card-block">
                            <div class="__checkbox">
                                {{ html()->label(
                                        html()->checkbox('is_installed')

                                              ->class('switch-input')

                                        . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                    ->class('switch switch-lg switch-3d switch-success')
                                    ->for('is_installed') }}
                                {{ html()->label(' &nbsp; Ist dieses Larapack in dieser App ist installiert? j/n') }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group{{ $errors->has('pt_title') ? ' has-error' : '' }}">
                        <label for="pt_title">Pearltree Title</label>
                        <input type="text" class="form-control" id="pt_title" name="pt_title" placeholder="Pearltree Title" value="{{ old('pt_title') }}">
                        @if($errors->has('pt_title'))
                            <span class="help-block">{{ $errors->first('pt_title') }}</span>
                        @endif
                    </div>

                    {{--<div class="form-group{{ $errors->has('pt_title') ? ' has-error' : '' }}">
                        <label for="pt_title"></label>
                        <select class="custom-select" style="" id="pt_title" name="pt_title">
                            <option value ="">PT-Tag wählen</option>
                            @foreach ($tag_arr_pt as $tag)
                                <option value ="{{$tag}}">{{$tag}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('pt_title'))
                            <span class="help-block">{{ $errors->first('pt_title') }}</span>
                        @endif
                    </div>--}}

                    <div class="form-group{{ $errors->has('pt_link') ? ' has-error' : '' }}">
                        <label for="pt_link">Pearltree-Url</label>
                        <input type="text" class="form-control" id="pt_link" name="pt_link" placeholder="Pearltree URL" value="{{ old('pt_link') }}">
                        @if($errors->has('pt_link'))
                            <span class="help-block">{{ $errors->first('pt_link') }}</span>
                        @endif
                    </div>


                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Speichern</button>
                        <a style="margin-left:50px" href="{{url('admin/dashboard/larapacks')}}" class="btn btn-outline-primary float-right">zurück zur Liste</a>
                    </div>


            </div>

        </div>

    </div>
    </form>
<hr>
    <div class="container-fluid">
        <div class="card">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col" style="white-space:nowrap;">
                        <?php $t_order_col = 'id'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', '&nbsp;ID',
                        $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                        {{$t_order_col}}
                    </th>
                    <th scope="col" style="white-space:nowrap">
                        <?php $t_order_col = 'tag1'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                        --}}{{--$parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        //$parameters = request()->query(),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                            {{$t_order_col}}
                    </th>
                    <th scope="col" style="white-space:nowrap">
                        <?php $t_order_col = 'tag2'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                        $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        //$parameters = request()->query(),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                            {{$t_order_col}}
                    </th>
                    <th scope="col" style="white-space:nowrap">
                        <?php $t_order_col = 'tag3'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                        $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        //$parameters = request()->query(),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                            {{$t_order_col}}
                    </th>
                    <th scope="col" style="width:10%">
                        <?php $t_order_col = 'install_str'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                        $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        //$parameters = request()->query(),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                            {{$t_order_col}}
                    </th>
                    <th scope="col">
                        <?php $t_order_col = 'git_url'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', 'Git-URL',
                        $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        //$parameters = request()->query(),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                    </th>
                    <th scope="col">
                        <?php $t_order_col = 'doc_url'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', 'Doc-URL',
                        $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        //$parameters = request()->query(),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                            {{$t_order_col}}
                    </th>
                    <th scope="col">Description</th>
                    <th scope="col" style="white-space:nowrap">
                        <?php $t_order_col = 'is_installed'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', 'installed',
                        $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        //$parameters = request()->query(),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                            {{$t_order_col}}
                    </th>
                    <th scope="col">
                        <?php $t_order_col = 'pt_title'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', 'PT-Title',
                        $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        //$parameters = request()->query(),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                            {{$t_order_col}}
                    </th>
                    <th scope="col">
                        <?php $t_order_col = 'pt_link'  ?>
                        {{--{!! link_to_action('Backend\Larapack\LarapackController@index', 'PT-link',
                        $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                        //$parameters = request()->query(),
                        $attributes = array('title="auf- oder absteigend"')) !!}
                        {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}--}}
                    </th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($links as $link)
                    <tr>
                        <th scope="row"><span style="color:#aaa">{{ $link->id }}</span></th>
                        @if ($link->tag1=='!important!')
                            <td><span title="!important!" style="padding:1.1em" class="badge badge-pill badge-danger fa-sm-text-shadow">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i></span></td>
                        @else
                            @if ($link->tag1=='isInfo')
                                <td><span title="isInfo" style="padding:1.1em" class="badge badge-pill badge-primary fa-sm-text-shadow">
                                <i class="fa fa-book" aria-hidden="true"></i></span></td>
                            @else
                                <td>{!! mark($link->tag1) !!}</td>
                            @endif
                        @endif

                        @if ($link->tag2=='!important!')
                            <td><span title="!important!" style="padding:1.1em" class="badge badge-pill badge-danger fa-sm-text-shadow">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i></span></td>
                        @else
                            @if ($link->tag2=='isInfo')
                                <td><span title="isInfo" style="padding:1.1em" class="badge badge-pill badge-primary fa-sm-text-shadow">
                                <i class="fa fa-book" aria-hidden="true"></i></span></td>
                            @else
                                <td>{!! mark($link->tag2) !!}</td>
                            @endif
                        @endif

                        @if ($link->tag3=='!important!')
                            <td><span title="{{$link->tag3}}" style="padding:1.1em" class="badge badge-pill badge-danger fa-sm-text-shadow">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i></span></td>
                        @else
                            @if ($link->tag3=='isInfo')
                                <td><span title="{{$link->tag3}}" style="padding:1.1em" class="badge badge-pill badge-primary fa-sm-text-shadow">
                                <i class="fa fa-book" aria-hidden="true"></i></span></td>
                            @else
                                <td>{!! mark($link->tag3) !!}</td>
                            @endif
                        @endif

                        <td style="max-width:130px  !important">{!!  mark($link->install_str) !!}</td>
                        <td style="max-width:200px  !important"><a href="{{ $link->git_url }}" target="_blank">{!!  mark($link->git_url) !!}</a></td>
                        <td style="max-width:200px  !important"><a href="{{ $link->doc_url }}" target="_blank">{!! mark($link->doc_url) !!}</a></td>
                        <td style="padding:12px 0 6px 0;max-width:230px"><div style="max-height:100px;overflow:auto">{!! mark($link->description) !!}</div></td>

                        @if ($link->is_installed)
                            <td style="text-align:center;"><span style="padding:1.2em" class="badge badge-pill badge-success fa-sm-text-shadow">ja</span></td>
                        @else
                            <td style="text-align:center;color:#bbb">nein {{--{!! zuf() !!}--}}</td>
                        @endif

                        <td style="max-width:200px  !important"><a href="{{ $link->pt_title }}" target="_blank">{!!  mark($link->pt_title) !!}</a></td>
                        <td style="max-width:200px  !important"><a href="{{ $link->pt_link }}" target="_blank">{{--{!! mark($link->pt_link) !!}--}}
                                @if($link->pt_link<>'')
                                    Link
                                @endif
                            </a></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <a href="{{ route('admin.dashboard.larapacks.edit',['link'=>$link->id,'q'=>request()->query()]) }}">
                                    <button type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil fa-sm-text-shadow" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bearbeiten"></i>
                                    </button>
                                </a>

                                <a href="larapacks/delete/{{$link->id}}"
                                   data-method="delete"
                                   data-trans-button-cancel="Abbrechen"
                                   data-trans-button-confirm="Löschen"
                                   data-trans-title="Item {{$link->id}} löschen, bist Du sicher?"
                                   class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash fa-sm-text-shadow" data-toggle="tooltip" data-placement="top" title="" data-original-title="Löschen"></i>
                                </a>
                            </div>
                        </td>
                        @endforeach
                    </tr>

                </tbody>
            </table>




            {{--<table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">tag1</th>
                    <th scope="col">tag2</th>
                    <th scope="col">tag3</th>
                    <th scope="col">install_str</th>
                    <th scope="col">Git-Url</th>
                    <th scope="col">Doc-Url</th>
                    <th scope="col">Description</th>
                    <th scope="col">is_installed</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($links as $link)
                <tr>
                    <th scope="row">{{ $link->id }}</th>
                    <td>{{ $link->tag1 }}</td>
                    <td>{{ $link->tag2 }}</td>
                    <td>{{ $link->tag3 }}</td>
                    <td style="max-width:180px  !important">{{ $link->install_str }}</td>
                    <td style="max-width:300px !important"><a href="{{ $link->git_url }}" target="_blank">{{ $link->git_url }}</a></td>
                    <td style="max-width:300px !important"><a href="{{ $link->git_url }}" target="_blank">{{ $link->doc_url }}</a></td>
                    <td>{{ $link->description }}</td>
                    <td>{{ $link->is_installed }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.dashboard.larapacks.edit',$link->id) }}">
                            <button type="button" class="btn btn-success btn-sm">Edit</button>
                            </a>
                                {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('Wirklich löschen?');",
                                    'route' => ['admin.dashboard.larapacks.delete', $link->id])) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) !!}
                                {!! Form::close() !!}
                        </div>
                    </td>
                    @endforeach
                </tr>
                </tbody>
            </table>--}}


        </div>
    </div>
@endsection
