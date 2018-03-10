@extends('backend.layouts.app')

@section('page-header')
@endsection

@section('meta')
@endsection


@section('before-styles-end')
@endsection

<?php
$tag_arr = get_larapack_tag_arr();
$tag_arr_pt = get_pearltree_tag_arr();
?>
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach()
            </div>
        @endif
            <form action="{{ route('admin.dashboard.larapacks.update', $item->id) }}" method="POST" class="form-horizontal">
            <div class="card">
                <div class="card-header">

                    <div class="form-group float-right">
                        <input type="submit" class="btn btn-primary" value="Update" />
                        {{--<a href="{{url()->previous()}}" class="btn btn-outline-primary ml-4 float-right" role="button" aria-disabled="true">Abbruch und zurück</a>--}}
                        {{--{{ route('admin.diverses.edit',['link'=>$cur_rec->id,'q'=>request()->query()]) }}--}}
                        <a href="{{route('admin.diverses',['q'=>request()->query()])}}"
                           class="btn btn-outline-primary ml-4 float-right" role="button" aria-disabled="true">Abbruch
                            und zurück</a>


                    </div>
                    <h3>Edit Larapack {{ $item->id }}</h3>
                </div>
                <div class="card-body" style="background:#f3f4f5">

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('tag1') ? ' has-error' : '' }}">
                            <label for="title"></label>
                            <select class="custom-select" style="" id="tag1" name="tag1">
                                <option value ="">Tag1 ist leer</option>
                                @foreach ($tag_arr as $tag)
                                    <option value ="{{$tag}}" @if ($tag === $item->tag1) selected @else '' @endif>{{ $tag }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tag1'))
                                <span class="help-block">{{ $errors->first('tag1') }}</span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('tag2') ? ' has-error' : '' }}">
                            <label for="title"></label>
                            <select class="custom-select" style="" id="tag2" name="tag2">
                                <option value ="">Tag2 ist leer</option>
                                @foreach ($tag_arr as $tag)
                                    <option value ="{{$tag}}" @if ($tag === $item->tag2) selected @else '' @endif >{{ $tag }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tag2'))
                                <span class="help-block">{{ $errors->first('tag2') }}</span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('tag3') ? ' has-error' : '' }}">
                            <label for="title"></label>
                            <select class="custom-select" style="" id="tag3" name="tag3">
                                <option value ="">Tag3 ist leer</option>
                                @foreach ($tag_arr as $tag)
                                    <option value ="{{$tag}}" @if ($tag === $item->tag3) selected @else '' @endif>{{ $tag }}</option>
                                @endforeach
                            </select>
                        @if($errors->has('tag3'))
                                <span class="help-block">{{ $errors->first('tag3') }}</span>
                            @endif
                        </div>



                        <div class="form-group{{ $errors->has('install_str') ? ' has-error' : '' }}">
                            <label for="title">install_str</label>
                            <input type="text" class="form-control" id="install_str" name="install_str"  value="{{ $item->install_str }}">
                            @if($errors->has('install_str'))
                                <span class="help-block">{{ $errors->first('install_str') }}</span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('git_url') ? ' has-error' : '' }}">
                            <label for="title">git_url</label>
                            <input type="text" class="form-control" id="git_url" name="git_url"  value="{{ $item->git_url }}">
                            @if($errors->has('git_url'))
                                <span class="help-block">{{ $errors->first('git_url') }}</span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('doc_url') ? ' has-error' : '' }}">
                            <label for="title">doc_url</label>
                            <input type="text" class="form-control" id="doc_url" name="doc_url"  value="{{ $item->doc_url }}">
                            @if($errors->has('doc_url'))
                                <span class="help-block">{{ $errors->first('doc_url') }}</span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="title">description</label>
                            <textarea class="form-control" id="mytextarea" name="description" placeholder="description">{{ $item->description }}</textarea>
                            {{--<script>
                                CKEDITOR.replace( 'mytextarea1' );
                            </script>--}}

                            @if($errors->has('description'))
                                <span class="help-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
{{--todo: zuerst ein hidden field !?--}}
                        <input type="hidden" value="0" name="is_installed">
                        {{--<div class="card">--}}
                        <div class="card-block">
                            <div class="card-header">
                                <div class="__checkbox">
                                    {{ html()->label(
                                            html()->checkbox('is_installed')
                                                  ->checked( $item->is_installed )
                                                  ->class('switch-input')
                                                  ->id('is_installed-'.$item->id)
                                            . '<span class="switch-label" data-on="Ja" data-off="No"></span><span class="switch-handle"></span>')
                                        ->class('switch switch-lg switch-pill switch-text switch-success')
                                        ->for('is_installed-'.$item->id) }}
                                    {{--<span class="switch-label" data-on="On" data-off="Off"></span>--}}
                                    {{ html()->label(' &nbsp; Dieses Larapack ist in dieser App ist installiert? j/n') }}
                                </div>
                        </div>
                            </div>
                    <hr>
                            <div class="form-group{{ $errors->has('pt_title') ? ' has-error' : '' }}">
                                <label for="title">pt_title</label>
                                <input type="text" class="form-control" id="pt_title" name="pt_title"  value="{{ $item->pt_title }}">
                                @if($errors->has('pt_title'))
                                    <span class="help-block">{{ $errors->first('pt_title') }}</span>
                                @endif
                            </div>

{{--                            <div class="form-group{{ $errors->has('pt_title') ? ' has-error' : '' }}">
                                <label for="pt_title"></label>
                                <select class="custom-select" style="" id="pt_title" name="pt_title">
                                    <option value ="">PT-Tag ist leer</option>
                                    @foreach ($tag_arr as $tag)
                                        <option value ="{{$tag}}" @if ($tag === $item->pt_title) selected @else '' @endif>{{ $tag }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('pt_title'))
                                    <span class="help-block">{{ $errors->first('pt_title') }}</span>
                                @endif
                            </div>--}}

                            <div class="form-group{{ $errors->has('pt_link') ? ' has-error' : '' }}">
                                <label for="title">pt_link</label>
                                <input type="text" class="form-control" id="pt_link" name="pt_link"  value="{{ $item->pt_link }}">
                                @if($errors->has('pt_link'))
                                    <span class="help-block">{{ $errors->first('pt_link') }}</span>
                                @endif
                            </div>


                        {{--</div>--}}

                        <hr>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update" />
                            <a href="{{url()->previous()}}" class="btn btn-outline-primary ml-4 float-right" role="button" aria-disabled="true">Abbruch und zurück</a>
                        </div>

                </div>
            </div>
            </form>
    </div>
@endsection
