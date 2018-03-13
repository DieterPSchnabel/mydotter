<table class="table table-hover" id="dataset-table">
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
        <th>Übersetzen
        <?php
            $what = $this_table_name.'_edit_translations_hint';
            $class="tip";  //tip or tip_lu
            $width='400px';
            $style='margin-left:5px';
            $icon='';
            echo tooltip($what,$class, $width,  $style, $icon);
        ?>
        </th>

                <?php $this_col = 'full_key'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'group'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'key'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'source_file'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'de'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon($this_col,$size='24');
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'en'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ar'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'bg'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ca'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'cr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'cz'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'da'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'el'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'es'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'et'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'fi'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'fr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'gl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'hu'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'is'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'it'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ja'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'lt'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'lv'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'mk'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'nl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'no'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pt'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pt_BR'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ro'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ru'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'sv'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'sr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'th'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'tr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'uk'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'zh'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        echo flag_icon($this_col,$size='24');
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'updated_by'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
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

    <tbody>
    @foreach($dataset as $cur_rec)
     <tr>
     @if(in_array('id',$display_cols_arr))<td class="dimmed04">{{$cur_rec->id}}</td>@endif

     <td>
         {{--<a href="{!! route('admin.languageLines.edit', [$cur_rec->id]) !!}">
             <button type="button" class="btn btn-success btn-sm ml-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="edit">
                 <i class="fa fa-pencil fa-sm-text-shadow"></i>
             </button>
         </a>--}}

         <a style="" class="" title="diesen Hinweis editieren in allen Sprachen"
            data-fancybox data-type="iframe"
            data-src="{{config('app.url')}}/dashboard/pop2?full_key={{$cur_rec->full_key}}&lang=all&curr_lang"
            href="javascript:">

             <button type="button" class="btn btn-info btn-sm ml-1" data-toggle="tooltip" data-placement="top" title=""
                     data-original-title="edit">
                 <i class="fa fa-copy fa-sm-text-shadow"></i>
             </button>

         </a>


     </td>

         @if(in_array('full_key',$display_cols_arr))
             <td>{!! mark($cur_rec->full_key) !!}

                 @if(is_dev())
                     <div title="DEV only" class="dimmed04">
                         <input class="zoom80" onfocus="this.select()" type="text"
                                value="__('{{$cur_rec->full_key}}')"/>
                     </div>
                     </div>
                 @endif

             </td>@endif

            @if(in_array('group',$display_cols_arr))<td>{!! mark($cur_rec->group) !!}</td>@endif

            @if(in_array('key',$display_cols_arr))<td>{!! mark($cur_rec->key) !!}</td>@endif

            @if(in_array('source_file',$display_cols_arr))<td>{!! mark($cur_rec->source_file) !!}</td>@endif

            @if(in_array('de',$display_cols_arr))<td>
                @if(! $display_translations_editable)
                    {!! mark($cur_rec->de) !!}
                @else
                    {!!
                    edit_text_in_any_table(
                    $table = $this_table_name,
                    $field = 'de',
                    $id = $cur_rec->id,
                    $id_field = 'id',
                    $with_break = true,
                    $lang = '',
                    $with_info = false,
                    $style = 'width:200px;padding-left:4px',
                    $class = 'inline_txt_any_table',
                    $show_translation_opt = false,
                    $this_value = $cur_rec->de,
                    $from_inside_loop = true,
                    $with_page_reload = false
                    )
                    !!}
                @endif
            </td>@endif

            @if(in_array('en',$display_cols_arr))<td>
             {{--{!! mark($cur_rec->en) !!}--}}
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->en) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'en',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->en,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif

            </td>@endif

            @if(in_array('ar',$display_cols_arr))<td>

             @if(! $display_translations_editable)
                 {!! mark($cur_rec->ar) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'ar',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;text-align:right',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->ar,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif

            </td>@endif

            @if(in_array('bg',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->bg) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'bg',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->bg,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('ca',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->ca) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'ca',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->ca,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('cr',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->cr) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'cr',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->cr,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('cz',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->cz) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'cz',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->cz,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('da',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->da) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'da',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->da,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('el',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->el) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'el',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->el,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('es',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->es) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'es',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->es,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('et',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->et) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'et',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->et,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('fi',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->fi) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'fi',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->fi,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('fr',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->fr) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'fr',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->fr,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('gl',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->gl) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'gl',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->gl,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('hu',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->hu) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'hu',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->hu,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('is',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->is) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'is',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->is,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('it',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->it) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'it',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->it,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('ja',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->ja) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'ja',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->ja,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('lt',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->lt) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'lt',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->lt,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('lv',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->lv) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'lv',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->lv,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('mk',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->mk) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'mk',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->mk,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('nl',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->nl) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'nl',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->nl,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('no',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->no) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'no',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->no,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('pl',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->pl) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'pl',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->pl,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('pt',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->pt) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'pt',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->pt,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('pt_BR',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->pt_BR) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'pt_BR',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->pt_BR,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('ro',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->ro) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'ro',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->ro,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('ru',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->ru) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'ru',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->ru,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('sv',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->sv) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'sv',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->sv,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('sr',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->sr) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'sr',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->sr,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('th',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->th) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'th',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->th,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('tr',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->tr) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'tr',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->tr,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('uk',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->uk) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'uk',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->uk,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('zh',$display_cols_arr))<td>
             @if(! $display_translations_editable)
                 {!! mark($cur_rec->zh) !!}
             @else
                 {!!
                 edit_text_in_any_table(
                 $table = $this_table_name,
                 $field = 'zh',
                 $id = $cur_rec->id,
                 $id_field = 'id',
                 $with_break = true,
                 $lang = '',
                 $with_info = false,
                 $style = 'width:200px;padding-left:4px;',
                 $class = 'inline_txt_any_table',
                 $show_translation_opt = false,
                 $this_value = $cur_rec->zh,
                 $from_inside_loop = true,
                 $with_page_reload = false
                 )
                 !!}
             @endif
            </td>@endif

            @if(in_array('updated_by',$display_cols_arr))<td>{!! mark($cur_rec->updated_by) !!}</td>@endif


    @if(in_array('created_at',$display_cols_arr))<td style="font-size:0.9em">
        @if(!is_null($cur_rec->created_at))
                <div style="color:#000;font-size:1.0em">{{ timeAgo($cur_rec->created_at) }}</div>
                <div style="color:#777;font-size:0.9em">{{formatDate($cur_rec->created_at)}} </div>
        @endif</td>
    @endif

    @if(in_array('updated_at',$display_cols_arr))<td style="font-size:0.9em">
        @if(!is_null($cur_rec->updated_at))
            <div style="color:#000;font-size:1.0em">{{ timeAgo($cur_rec->updated_at) }}</div>
            <div style="color:#777;font-size:0.9em">{{formatDate($cur_rec->updated_at)}}</div>
        @endif</td>
    @endif

        <td>
            <div class="btn-group dimmed08" role="group" aria-label="">
            <!--  blade_table_body   -->
                @if($has_action_show)
                    <a href="{!! route('admin.languageLines.show', [$cur_rec->id]) !!}">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                            <i class="fa fa-eye fa-sm-text-shadow"></i>
                        </button>
                    </a>
                @endif

                @if($has_action_edit)
                <a href="{!! route('admin.languageLines.edit', [$cur_rec->id]) !!}">
                    <button type="button" class="btn btn-success btn-sm ml-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="edit">
                        <i class="fa fa-pencil fa-sm-text-shadow"></i>
                    </button>
                </a>
                @endif

                @if($has_action_delete)
                    <?php
                    $ident = rand_str();
                    $swal_title = '#' . $cur_rec->id . ' - ' . get_tr('Wirklich löschen?');
                    $swal_text = '';
                    $swal_confirmButtonText = get_tr('Ja, löschen!');
                    $swal_cancelButtonText = get_tr('Abbruch');
                    ?>
                    {{--delete_in_table(table,id,ident,title,text,confirmButtonText,cancelButtonText)--}}
                    <a href="javascript:delete_in_table('{{$this_table_name}}','{{$cur_rec->id}}','{{$ident}}','{{$swal_title}}','{{$swal_text}}','{{$swal_confirmButtonText}}','{{$swal_cancelButtonText}}')">
                        <button type="button" class="btn btn-danger btn-sm ml-1">
                            <i class="fa fa-trash fa-sm-text-shadow"></i>
                        </button>
                    </a><span id="{{$ident}}_conf"></span></span>
                @endif
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<span id="show_only_activated_langs_conf"></span>
