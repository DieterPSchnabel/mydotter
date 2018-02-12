{{------------ TABLE BEGIN ------------}}
<table class="table table-hover ">
    <thead>
    {{-- --------------------- table thead begin ------------------ --}}
    <tr>
        <th scope="col" style="white-space:nowrap;">
            <?php $t_order_col = 'id';
            $page_para = $_SERVER['QUERY_STRING'];
            //dd(request()->query());
             //dd($page_para); ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
                <?php //dd($parameters); ?>
            @else
                {{$t_order_col}}
            @endif
        </th>
        <th scope="col" style="white-space:nowrap">
            <?php $t_order_col = 'tag1'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>
        <th scope="col" style="white-space:nowrap">
            <?php $t_order_col = 'tag2'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>
        <th scope="col" style="white-space:nowrap">
            <?php $t_order_col = 'tag3'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>

        <th scope="col" style="white-space:nowrap">
            <?php $t_order_col = 'important'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>




        <th scope="col" style="width:10%">
            <?php $t_order_col = 'install_str'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>
        <th scope="col">
            <?php $t_order_col = 'git_url'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', $t_order_col,
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>
        <th scope="col">
            <?php $t_order_col = 'doc_url'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', 'Doc-URL',
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>
        <th scope="col">Description</th>
        <th scope="col" style="white-space:nowrap">
            <?php $t_order_col = 'is_installed'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', 'installed',
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>
        <th scope="col">
            <?php $t_order_col = 'pt_title'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', 'PT-Title',
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>
        <th scope="col">
            <?php $t_order_col = 'pt_link'  ?>
            @if( in_array($t_order_col,$sortables_arr) )
                {!! link_to_action('Backend\Larapack\LarapackController@index', 'PT-Link',
                $parameters = array($page_para,'order='.$t_order_col, 'dir='.$dir ),
                //$parameters = request()->query(),
                $attributes = array('title="auf- oder absteigend" data-toggle="tooltip" data-placement="top"')) !!}
                {!! sort_order_icon($t_order_col, $order, $curr_dir) !!}
            @else
                {{$t_order_col}}
            @endif
        </th>
        <th scope="col">Action</th>
    </tr>
    {{-- --------------------- table thead end ------------------ --}}
    </thead>
    <tbody>
    {{-- --------------------- table tbody begin ------------------ --}}
    {{------------ TABLE ROWS ------------}}
    @foreach ($links as $link)
        <tr>
            <th scope="row"><span class="dimmed04" style="font-weight:normal">{{ $link->id }}</span></th>
            @if ($link->tag1=='!important!')
                <td><span title="!important!" style="padding:1.1em" class="badge badge-pill badge-danger fa-sm-text-shadow" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i></span></td>
            @else
                @if ($link->tag1=='isInfo')
                    <td><span title="isInfo" style="padding:1.1em" class="badge badge-pill badge-primary fa-sm-text-shadow" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-book" aria-hidden="true"></i></span></td>
                @else
                    <td>{!! mark($link->tag1) !!}</td>
                @endif
            @endif

            @if ($link->tag2=='!important!')
                <td><span title="!important!" style="padding:1.1em" class="badge badge-pill badge-danger fa-sm-text-shadow" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i></span></td>
            @else
                @if ($link->tag2=='isInfo')
                    <td><span title="isInfo" style="padding:1.1em" class="badge badge-pill badge-primary fa-sm-text-shadow" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-book" aria-hidden="true"></i></span></td>
                @else
                    <td>{!! mark($link->tag2) !!}</td>
                @endif
            @endif

            @if ($link->tag3=='!important!')
                <td><span title="{{$link->tag3}}" style="padding:1.1em" class="badge badge-pill badge-danger fa-sm-text-shadow" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i></span></td>
            @else
                @if ($link->tag3=='isInfo')
                    <td><span title="{{$link->tag3}}" style="padding:1.1em" class="badge badge-pill badge-primary fa-sm-text-shadow" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-book" aria-hidden="true"></i></span></td>
                @else
                    <td>{!! mark($link->tag3) !!}</td>
                @endif
            @endif

            <td style="text-align:center;">
                {!!
                 get_checkbox_any_table(
                    'larapacks',
                    'important',
                    $link->id,
                    $id_field ='id',
                    $with_comment=false,
                    $hint_key = 'languages_status_checkbox',
                    $label_text = '',
                    $with_panel = false,
                    $with_tooltip= false,
                    $ax_response = true,
                    $text_first = false,
                    $input_style= '',
                    $label_style = 'font-weight:normal',
                    $cb_type = '',
                    $tt_class = 'tip',
                    $tt_width = '300px',
                    $with_page_reload = false,
                    $this_value = $link->important,
                    $from_inside_loop= true,
                    $as_switch = true,
                    $switch_size = 'no' //xs, sm, no, lg
                 );
                !!}
                {{--<label class="switch switch-text switch-pill switch-success switch-sm">
                    <input type="checkbox" class="switch-input" checked="">
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                </label>--}}
            </td>

            <td style="max-width:130px  !important">{!!  mark($link->install_str) !!}</td>
            <td style="max-width:200px  !important"><a href="{{ $link->git_url }}" target="_blank">{!!  mark($link->git_url) !!}</a></td>
            <td style="max-width:200px  !important"><a href="{{ $link->doc_url }}" target="_blank">{!! mark($link->doc_url) !!}</a></td>
            <td style="padding:12px 0 6px 0;max-width:230px"><div style="max-height:100px;overflow:auto">{!! mark($link->description) !!}</div></td>

            {{--<td style="padding:4px 0 4px 0;max-width:260px">--}}
            {{--    <textarea class="form-control" id="description" name="description" placeholder="description">{!!  $link->description !!}</textarea>
            </td>--}}

            {{--@if ($link->is_installed)
                <td style="text-align:center;"><span style="padding:1.2em" class="badge badge-pill badge-success fa-sm-text-shadow">ja</span></td>
            @else
                <td style="text-align:center;color:#bbb">nein --}}{{--{!! zuf() !!}--}}{{--</td>
            @endif--}}

            <td style="text-align:center;">
                {!!
                 get_checkbox_any_table(
                    'larapacks',
                    'is_installed',
                    $link->id,
                    $id_field ='id',
                    $with_comment=false,
                    $hint_key = 'languages_status_checkbox',
                    $label_text = '',
                    $with_panel = false,
                    $with_tooltip= false,
                    $ax_response = true,
                    $text_first = false,
                    $input_style= '',
                    $label_style = 'font-weight:normal',
                    $cb_type = '',
                    $tt_class = 'tip',
                    $tt_width = '300px',
                    $with_page_reload = false,
                    $this_value = $link->is_installed,
                    $from_inside_loop= true,
                    $as_switch = true,
                    $switch_size = 'no' //xs, sm, no, lg
                 );
                !!}
                {{--<label class="switch switch-text switch-pill switch-success switch-sm">
                    <input type="checkbox" class="switch-input" checked="">
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                </label>--}}
            </td>
            <td style="max-width:200px  !important">{!!  mark($link->pt_title) !!}</td>
            <td style="max-width:200px  !important"><a href="{{ $link->pt_link }}" target="_blank">{{--{!! mark($link->pt_link) !!}--}}
                    @if($link->pt_link<>'')
                        @if(  stristr($link->pt_link,'schnabel') )
                            Pearltree
                        @else
                            Link
                        @endif
                    @endif
                </a></td>

            {{------------ TABLE ACTIONS - EDIT - DELETE ------------}}
            <td>
                <div class="btn-group dimmed04" role="group" aria-label="">
                    @if($has_action_show)
                        <a href="#">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ansehen">
                                <i class="fa fa-eye fa-sm-text-shadow"></i>
                            </button>
                        </a>
                    @endif

                    <a href="{{ route('admin.dashboard.larapacks.edit',['link'=>$link->id,'q'=>request()->query()]) }}">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bearbeiten">
                            <i class="fa fa-pencil fa-sm-text-shadow"></i>
                        </button>
                    </a>

                    <a href="larapacks/delete/{{$link->id}}"
                       data-method="delete"
                       data-trans-button-cancel="Abbrechen"
                       data-trans-button-confirm="Löschen"
                       data-trans-title="Item {{$link->id}} löschen, bist Du sicher?"
                       data-toggle="tooltip" data-placement="top" title="" data-original-title="Löschen"
                       class="btn btn-danger btn-sm">
                        <i class="fa fa-trash fa-sm-text-shadow"></i>
                    </a>
                </div>
            </td>

        </tr>
    @endforeach
    {{-- / END TABLE ROWS ------------}}
    {{-- --------------------- table tbody begin ------------------ --}}
    </tbody>
</table>
{{-- / END TABLE ------------}}

<hr>

{{------------ UNDER THE TABLE ROW 1 ------------}}
<div class="" style="padding: 12px 16px 0 16px;background:#EFF2F4;border-top:1px #c2cfd6 solid">
                <span class="dimmed04 float-right" style="margin-right:12px;vertical-align:top">
                    <b>{{$links->firstItem()}}</b> - <b>{{$links->lastItem()}}</b> / <b>{{$links->total()}}</b> records</span>
    {!! $links->appends($page_appends)->render() !!}
</div>
{{-- / END UNDER THE TABLE ROW 1 ------------}}

{{------------ UNDER THE TABLE ROW 2 ------------}}
<div class="card-footer" style="border-top:none;margin-top:-16px">
    <a class="btn btn-primary" role="button" href="{{url('admin/dashboard/larapacks/create')}}">neu erfassen</a>

    @if(isset($_GET['mysearch']) or isset($_GET['myid']) or isset($_GET['filter']) )
        <span style="margin-left:40px;font-size:1.1em"><a class="" href="larapacks">wieder alle Daten anzeigen</a></span>
    @endif
    <a href="{{url()->previous()}}" class="btn btn-outline-primary ml-4 float-right " role="button" >Abbruch und zurück</a>
</div>
{{-- / END UNDER THE TABLE ROW 2 ------------}}
