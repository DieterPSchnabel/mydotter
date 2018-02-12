<table class="table table-hover" id="$dataset-table">
<thead>
    <tr>
    <?php $this_col = 'id'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
        <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'name'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'code'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'lara_code'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'image'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
        <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'directory'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'sort_order'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))<th  {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        //only if col = sort_order !!!!!!!!!!!
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
        <?php
        //only if col = sort_order !!!!!!!!!!!
        $what = 'table_sort_order_hint';
        $class="tip";
        $width='400px';
        $style='margin-left:2px';
        $icon='';
        echo tooltip($what,$class, $width, $style, $icon);
        ?>
    </th>@endif

    <?php $this_col = 'status'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))<th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
        <?php
        //only if stristr(col) = status !!!!!!!!!!!
        $what = 'table_status_hint';
        $class="tip";
        $width='400px';
        $style='margin-left:2px';
        $icon='';
        echo tooltip($what,$class, $width, $style, $icon);
        ?>
    </th>@endif

    <?php $this_col = 'status_frontend'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))<th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
        <?php
        //only if stristr(col) = status !!!!!!!!!!!
        $what = 'table_status_frontend_hint';
        $class="tip";
        $width='400px';
        $style='margin-left:2px';
        $icon='';
        echo tooltip($what,$class, $width, $style, $icon);
        ?>
    </th>@endif

    <?php $this_col = 'rtl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))<th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'fallback_frontend'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))<th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'fallback_backend'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))<th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'created_at'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))<th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <?php $this_col = 'updated_at'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))<th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

    <th colspan="3">Action</th>
</tr>
</thead>
    {{--##################################################################################--}}
<tbody>
@foreach($dataset as $dataset)
<tr>
    @if(in_array('id',$display_cols_arr))<td class="dimmed04">{{$dataset->id}}</td>@endif
    @if(in_array('name',$display_cols_arr))<td>{!! mark($dataset->name) !!}</td>@endif

        @if(in_array('code',$display_cols_arr))
            <td>
                @if(!is_dev() or 1==1)
                {!! mark($dataset->code) !!}
                @else
                    {!!
                    edit_text_in_any_table(
                    $table = $this_table_name,
                    $field = 'code',
                    $id = $dataset->id,
                    $id_field = 'id',
                    $with_break = false,
                    $lang = '',
                    $with_info = false,
                    $style = 'width:51px;padding-left:4px',
                    $class = 'inline_txt_any_table',
                    $show_translation_opt = false,
                    $this_value = $dataset->code,
                    $from_inside_loop = true,
                    $with_page_reload = false
                    )
                    !!}
                @endif

            </td>@endif



    @if(in_array('lara_code',$display_cols_arr))

    <td>
    @if(!is_dev())
        {!! mark($dataset->lara_code) !!}
     @else
        {!!
        edit_text_in_any_table(
        $table = $this_table_name,
        $field = 'lara_code',
        $id = $dataset->id,
        $id_field = 'id',
        $with_break = false,
        $lang = '',
        $with_info = false,
        $style = 'width:51px;padding-left:4px',
        $class = 'inline_txt_any_table',
        $show_translation_opt = false,
        $this_value = $dataset->lara_code,
        $from_inside_loop = true,
        $with_page_reload = false
        )
        !!}
    @endif
    </td>@endif

    @if(in_array('image',$display_cols_arr))<td>
        {{--{!! mark($dataset->image) !!}--}}
        {!! flag_icon($dataset->code,$size='30') !!}

    </td>@endif

    @if(in_array('directory',$display_cols_arr))<td>{!! mark($dataset->directory) !!}</td>@endif

    @if(in_array('sort_order',$display_cols_arr))<td>
        {{--todo if stristr(col) === sort_order - create $dataset_use_what_for_sort_order - with 3 options - utilise in $dataset-help - default to sort_order_widget  (sort_order_text_editor, sort_order_plain) --}}
        {{--{!! mark($dataset->sort_order) !!}--}}

        {{--{!!
        edit_text_in_any_table(
        $table = '$dataset',
        $field = 'sort_order',
        $id = $dataset->id,
        $id_field = 'id',
        $with_break = false,
        $lang = '',
        $with_info = false,
        $style = 'width:30px;',
        $class = 'inline_txt_any_table text-center',
        $show_translation_opt = true,
        $this_value = '',
        $from_inside_loop = false,
        $with_page_reload = false
        )
        !!}--}}

        <?php
        $table = $this_table_name;
        $table_id_field = 'id';
        $table_id = $dataset->id;
        $table_col = 'sort_order';
        $with_page_reload = get_dv($this_table_name.'_table_on_sort_order_change_reload');
        $so_id = 'so_'.$table_id;
        $zoom_effect_class = 'zoom80'; /*zoom80, no_zoom80*/
        $so_width = '130px ';
        ?>
        <div class="btn-group btn-block {{$zoom_effect_class}} float-left" role="group" aria-label="plus-minus" style="width:{{$so_width}};padding:0">
            <button type="button" class="btn btn-sm btn-danger"
                    onclick="change_sort_order_and_save(-1,'{{$so_id}}','{{$table}}','{{$table_id_field}}','{{$table_id}}','{{$table_col}}','{{$with_page_reload}}')">
                <i class="fa fa-minus" aria-hidden="true"></i>
            </button>
            <input type="text" value="{{$dataset->sort_order}}" class="text-center" style="width:45px" id="{{$so_id}}" />
            <button type="button" class="btn btn-sm btn-success"
                    onclick="change_sort_order_and_save(1,'{{$so_id}}','{{$table}}','{{$table_id_field}}','{{$table_id}}','{{$table_col}}','{{$with_page_reload}}')">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            <span id="{{$table.'_'.$table_id.'_'.$table_col.'_conf'}}"></span>
        </div>

    </td>@endif

    @if(in_array('status',$display_cols_arr))<td>
        {{--{!! mark($dataset->status) !!}--}}
        {!!
         get_checkbox_any_table(
            $this_table_name,
            'status',
            $dataset->id,
            $id_field ='id',
            $with_comment=false,
            $hint_key = $this_table_name.'_status_checkbox',
            $label_text = '',
            $with_panel = false,
            $ax_response = true,
            $input_style= '',
            $label_style = 'font-weight:normal',
            $with_tooltip = false,
            $tt_class = 'tip',
            $tt_width = '300px',
            $with_page_reload = false,
            $this_value = $dataset->status,
            $from_inside_loop = true,
            $as_switch = true,
            $switch_size = 'no' //xs, sm, no, lg
         );
        !!}
    </td>@endif


    @if(in_array('status_frontend',$display_cols_arr))<td>
        {{--{!! mark($dataset->status) !!}--}}
        {!!
         get_checkbox_any_table(
            $this_table_name,
            'status_frontend',
            $dataset->id,
            $id_field ='id',
            $with_comment=false,
            $hint_key = $this_table_name.'_status_checkbox',
            $label_text = '',
            $with_panel = false,
            $ax_response = true,
            $input_style= '',
            $label_style = 'font-weight:normal',
            $with_tooltip = false,
            $tt_class = 'tip',
            $tt_width = '300px',
            $with_page_reload = false,
            $this_value = $dataset->status_frontend,
            $from_inside_loop = true,
            $as_switch = true,
            $switch_size = 'no' //xs, sm, no, lg
         );
        !!}
    </td>@endif

    @if(in_array('rtl',$display_cols_arr))<td>{!! mark($dataset->rtl) !!}</td>@endif
    @if(in_array('fallback_frontend',$display_cols_arr))<td>{!! mark($dataset->fallback_frontend) !!}</td>@endif
    @if(in_array('fallback_backend',$display_cols_arr))<td>{!! mark($dataset->fallback_backend) !!}</td>@endif

    @if(in_array('created_at',$display_cols_arr))<td style="font-size:0.9em">
        @if(!is_null($dataset->created_at))
                <div style="color:#000;font-size:1.0em">{{ timeAgo($dataset->created_at) }}</div>
                <div style="color:#777;font-size:0.9em">{{formatDate($dataset->created_at)}} </div>
        @endif</td>
    @endif

    @if(in_array('updated_at',$display_cols_arr))<td style="font-size:0.9em">
        @if(!is_null($dataset->updated_at))
                {{--timeAgo($date)--}}
            {{--<div style="color:#000;font-size:1.0em">{{ $dataset->updated_at->diffForHumans() }}</div>--}}
            <div style="color:#000;font-size:1.0em">{{ timeAgo($dataset->updated_at) }}</div>
            <div style="color:#777;font-size:0.9em">{{formatDate($dataset->updated_at)}}</div>
        @endif</td>
    @endif

    <td>

    <div class="btn-group dimmed08" role="group" aria-label="">
        @if($has_action_show)
            <a href="{!! route('admin.'.$this_table_name.'.show', [$dataset->id]) !!}">
                <button type="button" class="btn btn-primary btn-sm"
                        data-toggle="tooltip" data-placement="top"
                        data-original-title="{!! __('buttons.general.crud.view') !!}">
                    <i class="fa fa-eye fa-sm-text-shadow"></i>
                </button>
            </a>
        @endif
        @if($has_action_edit)
        <a href="{!! route('admin.'.$this_table_name.'.edit', [$dataset->id]) !!}">
            <button type="button" class="btn btn-success btn-sm ml-1"
                    data-toggle="tooltip" data-placement="top"
                    data-original-title="{!! trans('buttons.general.crud.edit') !!}">
                <i class="fa fa-pencil fa-sm-text-shadow"></i>
            </button>
        </a>
        @endif
        @if($has_action_delete)
        <a href="{{$this_table_name}}/{{$dataset->id}}"
           data-method="delete"
           data-trans-button-cancel="{!! __('buttons.general.cancel') !!}"
           data-trans-button-confirm="{!! __('buttons.general.crud.delete') !!}"
           data-trans-title="{!! __('strings.backend.general.are_you_sure') !!}"
           data-toggle="tooltip" data-placement="top" title="" data-original-title="{!! __('buttons.general.crud.delete') !!}"
           class="btn btn-danger btn-sm ml-1">
            <i class="fa fa-trash fa-sm-text-shadow"></i>
        </a>
        @endif
    </div>
    </td>
</tr>
@endforeach
</tbody>
</table>
