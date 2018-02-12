@extends('backend.layouts.app')
@section('title')
    <?php $this_filename ='admintests2'  ?>
    admintest2
@endsection
@section('page-header')
    <h4>admintests2</h4>
@endsection

@section('meta')
<!-- nixxxxxxxxxxxxx meta -->
@endsection


@section('before-styles-end')
    <!-- nixxxxxxxxxxxxx before-styles-end -->
@endsection


@section('content')
    <style>
        pre{
            font-size:1.1em;
            color:#009;
            background:#f9fff9;
            border:1px #ccc solid;
            padding:5px 10px
        }
    </style>
    @include('backend.includes.partials.dev-nav')
    @if(is_dev())
        <div style="font-weight:normal;font-size:1.0em;color:#999;margin:-4px 0 2px 6px">{{$this_filename}}</div>
    @endif
    <div class="card">
        <div class="card-header"><h4>Buttons
                <span class="float-right dimmed04 ml-3" style="font-weight:normal;font-size:0.7em;color:#666">{{$this_filename}}</span>
            </h4></div>
        <div class="card-body">
            <div style="padding:12px;float:left">
                <button type="button" class="btn btn-primary btn-xs">button xs</button>
                &nbsp;
                <button type="button" class="btn btn-primary btn-sm">button sm</button>
                &nbsp;
                <button type="button" class="btn btn-primary">button</button>
                &nbsp;
                <button type="button" class="btn btn-primary btn-lg">btn-primary lg</button>
                &nbsp;
            </div>


            <div style="padding:12px;float:left">
                <button type="button" class="btn btn-default btn-xs"
                >btn-default xs
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-sm">btn-default sm</button>
                &nbsp;
                <button type="button" class="btn btn-default"
                >btn-default
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-lg">btn-default lg</button>
                &nbsp;
            </div>


            <div style="padding:12px">
                <button type="button" class="btn btn-success btn-xs">button xs</button>
                &nbsp;
                <button type="button" class="btn btn-success btn-sm">button sm</button>
                &nbsp;
                <button type="button" class="btn btn-success">button</button>
                &nbsp;
                <button type="button" class="btn btn-success btn-lg">btn-success lg</button>
                &nbsp;
            </div>


            <div style="padding:12px;float:left">
                <button type="button" class="btn btn-info btn-xs">button xs</button>
                &nbsp;
                <button type="button" class="btn btn-info btn-sm">button sm</button>
                &nbsp;
                <button type="button" class="btn btn-info">button</button>
                &nbsp;
                <button type="button" class="btn btn-info btn-lg">btn-info lg</button>
                &nbsp;
            </div>


            <div style="padding:12px">
                <button type="button" class="btn btn-warning btn-xs">button xs</button>
                &nbsp;
                <button type="button" class="btn btn-warning btn-sm">button sm</button>
                &nbsp;
                <button type="button" class="btn btn-warning">button</button>
                &nbsp;
                <button type="button" class="btn btn-warning btn-lg">btn-warning lg</button>
                &nbsp;
            </div>


            <div style="padding:12px;float:left">
                <button type="button" class="btn btn-danger btn-xs"
                        style="text-shadow: 1px 1px 1px rgba(0,0,0,0.9);">button xs
                </button>
                &nbsp;
                <button type="button" class="btn btn-danger btn-sm"
                        style="text-shadow: 1px 1px 1px rgba(0,0,0,0.9);">button sm
                </button>
                &nbsp;
                <button type="button" class="btn btn-danger"
                        style="text-shadow: 1px 1px 1px rgba(0,0,0,0.9);">button
                </button>
                &nbsp;
                <button type="button" class="btn btn-danger btn-lg"
                        style="text-shadow: 1px 1px 1px rgba(0,0,0,0.9);">btn-danger lg
                </button>
                &nbsp;
            </div>

            <div style="padding:12px">
                <button type="button" class="btn btn-link btn-xs">button xs</button>
                &nbsp;
                <button type="button" class="btn btn-link btn-sm">button sm</button>
                &nbsp;
                <button type="button" class="btn btn-link">button</button>
                &nbsp;
                <button type="button" class="btn btn-link btn-lg">btn-link lg</button>
                &nbsp;
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header h4">
            aktuelle Language
        </div>
        <div class="card-block">
            <pre>
echo 'aktuell: '.config('app.locale_php'). ' --- 1. config locale_php';
echo App::getLocale(). '  --- 2. App::getLocale() ';
//echo $_ENV['APP_LOCALE_PHP']. '   --- 3. ENV locale_php ';
APP_LOCALE = de
APP_FALLBACK_LOCALE = en
            </pre>
            <p style="font-size:1.2em">
                <?php
                echo 'aktuell: '.config('app.locale_php'). ' --- 1. config locale_php <br>';
                echo '<b style="color:blue">'.session()->get('locale'). '</b>  --- 2. session locale  <br>';
                 echo $_ENV['APP_LOCALE_PHP']. '   --- 3. APP_LOCALE_PHP  <br>';
                echo env("APP_LOCALE"). '   --- 4. .env APP_LOCALE <br>';
                echo env("APP_FALLBACK_LOCALE"). '   --- 5. .env APP_FALLBACK_LOCALE <br>';


                ?>
            </p>
        </div>
    </div>




    <div class="card">
        <div class="card-header"><h2>Awesome Bootstrap Checkbox v1.0.0</h2></div>
        <div class="card-body">
            <style>
                div.color_demo{
                    padding:3px 20px;
                    margin:3px;
                    width:600px;
                    border:1px #666 solid;
                }
            </style>
            <table class="table table-hover" style="font-size:1.2em;">
                <thead>
                <tr>
                    <th style="width:20%"></th><th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>base_path()</td><td>{{base_path()}}</td>
                </tr>
                <tr>
                    <td>app_path()</td><td>{{app_path()}}</td>
                </tr>
                <tr>
                    <td>config_path()</td><td>{{config_path()}}</td>
                </tr>
                <tr>
                    <td>database_path()</td><td>{{database_path()}}</td>
                </tr>


                <tr>
                    <td>public_path()</td><td>{{public_path()}}</td>
                </tr>
                <tr>
                    <td>resource_path()</td><td>{{resource_path()}}</td>
                </tr>

                <tr>
                    <td>storage_path()</td><td>{{storage_path()}}</td>
                </tr>


                <tr>
                    <td>env('APP_URL')</td><td>{{ env('APP_URL') }}</td>
                </tr>

                <tr>
                    <td>url()->current()</td><td>{{ url()->current() }}</td>
                </tr>
                <tr>
                    <td>url()->full()</td><td>{{ url()->full() }}</td>
                </tr>
                <tr>
                    <td>url()->previous()</td><td>{{ url()->previous() }}</td>
                </tr>
                <tr>
                    <td>route('log-viewer::dashboard')</td><td>{{ route('log-viewer::dashboard') }}</td>
                </tr>




                <tr>
                    <td>{{--route('frontend.mytests1')--}}</td><td>funkt. nicht: <pre> route('frontend.mytests1') </pre></td>
                </tr>
                {{--
                route('log-viewer::dashboard')


                 --}}

                <tr>
                    <td></td><td>

                        $light-blue: #3e7ea3;  //Primary 3c8dbc 3e7ea3
                        $red:        #dd4b39;  //Danger
                        $green:      #00a65a;  //Success
                        $aqua:       #00c0ef;  //Info
                        $yellow:     #f39c12;  //Warning
                        $blue:       #0073b7;
                        $navy:       #001F3F;
                        $teal:       #39CCCC;
                        $olive:      #3D9970;
                        $lime:       #01FF70;
                        $orange:     #FF851B;
                        $fuchsia:    #F012BE;
                        $purple:     #605ca8;
                        $maroon:     #D81B60;
                        $black:      #111;
                        $gray:       #d2d6de;

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div class="color_demo" style="background-color:#3e7ea3">$light-blue: #3e7ea3; //Primary 3c8dbc 3e7ea3</div>

                        <div class="color_demo" style="background-color:#dd4b39">$red: #dd4b39; //Danger </div>
                        <div class="color_demo" style="background-color:#00a65a">$green: #00a65a; //Success</div>
                        <div class="color_demo" style="background-color:#00c0ef">$aqua: #00c0ef; //Info</div>
                        <div class="color_demo" style="background-color:#f39c12">$yellow: #f39c12; //Warning</div>
                        <div class="color_demo" style="background-color:#0073b7">$blue:       #0073b7; </div>
                        <div class="color_demo" style="background-color:#001F3F;color:#ddd">$navy:       #001F3F;</div>
                        <div class="color_demo" style="background-color:#39CCCC">$teal:       #39CCCC;</div>
                        <div class="color_demo" style="background-color:#3D9970">$olive:      #3D9970;</div>

                        <div class="color_demo" style="background-color:#01FF70">$lime:       #01FF70;</div>
                        <div class="color_demo" style="background-color:#FF851B">$orange:     #FF851B;</div>
                        <div class="color_demo" style="background-color:#F012BE">$fuchsia:    #F012BE;</div>
                        <div class="color_demo" style="background-color:#605ca8">$purple:     #605ca8;</div>

                        <div class="color_demo" style="background-color:#D81B60">$maroon:     #D81B60;</div>
                        <div class="color_demo" style="background-color:#111;color:#ddd">$black:      #111;</div>
                        <div class="color_demo" style="background-color:#d2d6de">$gray:       #d2d6de;
                        </div>
                    </td>

                </tr>
                <tr>
                    <td></td><td></td>
                </tr>


                </tbody>
            </table>


        </div>
    </div>


<div class="card">
    <div class="card-header"><h2>Awesome Bootstrap Checkbox v1.0.0</h2></div>
    <div class="card-body">
    <form role="form">
        <div class="row">
            <div class="col-md-4">
                <fieldset>
                    <legend>
                        Basic
                    </legend>
                    <p>
                        Supports bootstrap brand colors: <code>.checkbox-primary</code>, <code>.checkbox-info</code> etc.
                    </p>
                    <div class="checkbox">
                        <input id="checkbox1" class="styled" type="checkbox">
                        <label for="checkbox1">
                            Default
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox2" class="styled" type="checkbox" checked>
                        <label for="checkbox2">
                            Primary
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox3" class="styled" type="checkbox">
                        <label for="checkbox3">
                            Success
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox4" class="styled" type="checkbox">
                        <label for="checkbox4">
                            Info
                        </label>
                    </div>
                    <div class="checkbox checkbox-warning">
                        <input id="checkbox5" type="checkbox" class="styled" checked>
                        <label for="checkbox5">
                            Warning
                        </label>
                    </div>
                    <div class="checkbox checkbox-danger">
                        <input id="checkbox6" type="checkbox" class="styled" checked>
                        <label for="checkbox6">
                            Check me out
                        </label>
                    </div>
                    <p>Checkboxes without label text</p>
                    <div class="checkbox">
                        <input type="checkbox" class="styled" id="singleCheckbox1" value="option1" aria-label="Single checkbox One">
                        <label></label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" class="styled styled-primary" id="singleCheckbox2" value="option2" checked aria-label="Single checkbox Two">
                        <label></label>
                    </div>
                    <p>Checkboxes with indeterminate state</p>
                    <div class="checkbox checkbox-primary">
                        <input id="indeterminateCheckbox" class="styled" type="checkbox" onclick="changeState(this)">
                        <label></label>
                    </div>
                    <p>Inline checkboxes</p>
                    <div class="checkbox checkbox-inline">
                        <input type="checkbox" class="styled" id="inlineCheckbox1" value="option1">
                        <label for="inlineCheckbox1"> Inline One </label>
                    </div>
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" class="styled" id="inlineCheckbox2" value="option1" checked>
                        <label for="inlineCheckbox2"> Inline Two </label>
                    </div>
                    <div class="checkbox checkbox-inline">
                        <input type="checkbox" class="styled" id="inlineCheckbox3" value="option1">
                        <label for="inlineCheckbox3"> Inline Three </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset>
                    <legend>
                        Circled
                    </legend>
                    <p>
                        <code>.checkbox-circle</code> for roundness.
                    </p>
                    <div class="checkbox checkbox-circle">
                        <input id="checkbox7" class="styled" type="checkbox">
                        <label for="checkbox7">
                            Simply Rounded
                        </label>
                    </div>
                    <div class="checkbox checkbox-info checkbox-circle">
                        <input id="checkbox8" class="styled" type="checkbox" checked>
                        <label for="checkbox8">
                            Me too
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset>
                    <legend>
                        Disabled
                    </legend>
                    <p>
                        Disabled state also supported.
                    </p>
                    <div class="checkbox">
                        <input class="styled" id="checkbox9" type="checkbox" disabled>
                        <label for="checkbox9">
                            Can't check this
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input class="styled styled" id="checkbox10" type="checkbox" disabled checked>
                        <label for="checkbox10">
                            This too
                        </label>
                    </div>
                    <div class="checkbox checkbox-warning checkbox-circle">
                        <input class="styled" id="checkbox11" type="checkbox" disabled checked>
                        <label for="checkbox11">
                            And this
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>
    </form>
    <h2>Radios</h2>
    <form role="form">
        <div class="row">
            <div class="col-md-4">
                <fieldset>
                    <legend>
                        Basic
                    </legend>
                    <p>
                        Supports bootstrap brand colors: <code>.radio-primary</code>, <code>.radio-danger</code> etc.
                    </p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="radio">
                                <input type="radio" name="radio1" id="radio1" value="option1" checked>
                                <label for="radio1">
                                    Small
                                </label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="radio1" id="radio2" value="option2">
                                <label for="radio2">
                                    Big
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="radio radio-danger">
                                <input type="radio" name="radio2" id="radio3" value="option1">
                                <label for="radio3">
                                    Next
                                </label>
                            </div>
                            <div class="radio radio-danger">
                                <input type="radio" name="radio2" id="radio4" value="option2" checked>
                                <label for="radio4">
                                    One
                                </label>
                            </div>
                        </div>
                    </div>
                    <p>Radios without label text</p>
                    <div class="radio">
                        <input type="radio" id="singleRadio1" value="option1" name="radioSingle1" aria-label="Single radio One">
                        <label></label>
                    </div>
                    <div class="radio radio-success">
                        <input type="radio" id="singleRadio2" value="option2" name="radioSingle1" checked aria-label="Single radio Two">
                        <label></label>
                    </div>
                    <p>Inline radios</p>
                    <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked>
                        <label for="inlineRadio1"> Inline One </label>
                    </div>
                    <div class="radio radio-inline">
                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                        <label for="inlineRadio2"> Inline Two </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset>
                    <legend>
                        Disabled
                    </legend>
                    <p>
                        Disabled state also supported.
                    </p>
                    <div class="radio radio-danger">
                        <input type="radio" name="radio3" id="radio5" value="option1" disabled>
                        <label for="radio5">
                            Next
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="radio3" id="radio6" value="option2" checked disabled>
                        <label for="radio6">
                            One
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset>
                    <legend>
                        As Checkboxes
                    </legend>
                    <p>
                        Radios can be made to look like checkboxes.
                    </p>
                    <div class="checkbox checkbox">
                        <input type="radio" name="radio4" id="radio7" value="option1" checked>
                        <label for="radio7">
                            Default
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input type="radio" name="radio4" id="radio8" value="option2">
                        <label for="radio8">
                            Success
                        </label>
                    </div>
                    <div class="checkbox checkbox-danger">
                        <input type="radio" name="radio4" id="radio9" value="option3">
                        <label for="radio9">
                            Danger
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>
    </form>
    </div>
</div>




@endsection
