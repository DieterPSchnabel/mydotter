@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests16'  ?>
    {{$this_filename}}
@endsection
@section('page-header')
    <h2>{{$this_filename}}</h2>
@endsection

@section('meta')
<!-- nixxxxxxxxxxxxx meta -->
@endsection


@section('before-styles-end')
    <!-- nixxxxxxxxxxxxx before-styles-end -->
@endsection


@section('content')
    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif
    {{--
    <div class="card">
        <div class="card-header h4">
            fancybox3
        </div>
        <div class="card-block">
            <p>
            </p>
        </div>
    </div>
    --}}
    <div class="row">
        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.7em;color:#666">{{$this_filename}}</span>
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-6">--}}

        {{--#####################################################################################--}}

        <div class="col-6">

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}


        </div>{{--<div class="col-6">--}}

    </div>{{--<div class="row">--}}

    {{--#####################################################################################--}}
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

            <div class="card">
                <div class="card-header h4">
                    nix
                </div>
                <div class="card-block">
                    <pre>nix</pre>
                    <p>
                    </p>
                </div>
            </div>{{--<div class="card">--}}

        </div>{{--<div class="col-12">--}}
    </div>{{--<div class="row">--}}



    {{--<div class="card">
        <div class="card-header h4">
            nix
        </div>
        <div class="card-block">
            <pre>nix</pre>
            <p>
            </p>
        </div>
    </div>--}}

@endsection
