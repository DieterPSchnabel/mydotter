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

                <?php $this_col = 'quantity'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'model'; $this_model = $this_table_name; ?>
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

            <?php $this_col = 'mediumimage'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'mediumimage_2'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'largeimage'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'largeimage_2'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'originalimage'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage1'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage2'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage3'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage4'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage5'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage6'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage7'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage8'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage9'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage10'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage11'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage12'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage13'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage14'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage15'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage16'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage17'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage18'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage19'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage20'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage21'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage22'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage23'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage24'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'subimage25'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'price'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'price_special'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'price_temp'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'price_special_temp'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'weight'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'status'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'tax_class_id'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'manufacturers_id'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ordered'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ordered_f'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ordered_ff'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_1'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_2'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_3'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_4'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_5'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_6'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_7'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_8'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_9'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_10'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_11'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_12'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_13'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_14'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_15'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_16'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_17'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_18'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pnew'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'hotshot'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'soldout'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'rare'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr1'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr2'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr3'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr4'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr5'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr6'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr7'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr8'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr9'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'attr10'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ab18'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'unterordner'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'sort_order'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'ori_img_exists'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_1_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_2_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_3_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_4_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_5_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_6_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_7_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_8_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_9_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_10_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_11_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_12_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_13_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_14_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_15_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_16_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_17_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'description_18_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'dvd_code'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'temp'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pdf'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'video'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pdf_p'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pdf_m'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pdf_c'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pdf_mc'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'highlights_sort_order'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'is_highlight'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'mp3'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'zbv1'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'zbv2'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'zbv3'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'zbv4'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'int_bemerkung'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'temp_done'; $this_model = $this_table_name; ?>
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

     @if(in_array('quantity',$display_cols_arr))<td>{{mark($cur_rec->quantity)}}</td>@endif

            @if(in_array('model',$display_cols_arr))<td>{{mark($cur_rec->model)}}</td>@endif

            @if(in_array('image',$display_cols_arr))<td>{{mark($cur_rec->image)}}</td>@endif

            @if(in_array('mediumimage',$display_cols_arr))<td>{{mark($cur_rec->mediumimage)}}</td>@endif

            @if(in_array('mediumimage_2',$display_cols_arr))<td>{{mark($cur_rec->mediumimage_2)}}</td>@endif

            @if(in_array('largeimage',$display_cols_arr))<td>{{mark($cur_rec->largeimage)}}</td>@endif

            @if(in_array('largeimage_2',$display_cols_arr))<td>{{mark($cur_rec->largeimage_2)}}</td>@endif

            @if(in_array('originalimage',$display_cols_arr))<td>{{mark($cur_rec->originalimage)}}</td>@endif

            @if(in_array('subimage1',$display_cols_arr))<td>{{mark($cur_rec->subimage1)}}</td>@endif

            @if(in_array('subimage2',$display_cols_arr))<td>{{mark($cur_rec->subimage2)}}</td>@endif

            @if(in_array('subimage3',$display_cols_arr))<td>{{mark($cur_rec->subimage3)}}</td>@endif

            @if(in_array('subimage4',$display_cols_arr))<td>{{mark($cur_rec->subimage4)}}</td>@endif

            @if(in_array('subimage5',$display_cols_arr))<td>{{mark($cur_rec->subimage5)}}</td>@endif

            @if(in_array('subimage6',$display_cols_arr))<td>{{mark($cur_rec->subimage6)}}</td>@endif

            @if(in_array('subimage7',$display_cols_arr))<td>{{mark($cur_rec->subimage7)}}</td>@endif

            @if(in_array('subimage8',$display_cols_arr))<td>{{mark($cur_rec->subimage8)}}</td>@endif

            @if(in_array('subimage9',$display_cols_arr))<td>{{mark($cur_rec->subimage9)}}</td>@endif

            @if(in_array('subimage10',$display_cols_arr))<td>{{mark($cur_rec->subimage10)}}</td>@endif

            @if(in_array('subimage11',$display_cols_arr))<td>{{mark($cur_rec->subimage11)}}</td>@endif

            @if(in_array('subimage12',$display_cols_arr))<td>{{mark($cur_rec->subimage12)}}</td>@endif

            @if(in_array('subimage13',$display_cols_arr))<td>{{mark($cur_rec->subimage13)}}</td>@endif

            @if(in_array('subimage14',$display_cols_arr))<td>{{mark($cur_rec->subimage14)}}</td>@endif

            @if(in_array('subimage15',$display_cols_arr))<td>{{mark($cur_rec->subimage15)}}</td>@endif

            @if(in_array('subimage16',$display_cols_arr))<td>{{mark($cur_rec->subimage16)}}</td>@endif

            @if(in_array('subimage17',$display_cols_arr))<td>{{mark($cur_rec->subimage17)}}</td>@endif

            @if(in_array('subimage18',$display_cols_arr))<td>{{mark($cur_rec->subimage18)}}</td>@endif

            @if(in_array('subimage19',$display_cols_arr))<td>{{mark($cur_rec->subimage19)}}</td>@endif

            @if(in_array('subimage20',$display_cols_arr))<td>{{mark($cur_rec->subimage20)}}</td>@endif

            @if(in_array('subimage21',$display_cols_arr))<td>{{mark($cur_rec->subimage21)}}</td>@endif

            @if(in_array('subimage22',$display_cols_arr))<td>{{mark($cur_rec->subimage22)}}</td>@endif

            @if(in_array('subimage23',$display_cols_arr))<td>{{mark($cur_rec->subimage23)}}</td>@endif

            @if(in_array('subimage24',$display_cols_arr))<td>{{mark($cur_rec->subimage24)}}</td>@endif

            @if(in_array('subimage25',$display_cols_arr))<td>{{mark($cur_rec->subimage25)}}</td>@endif

            @if(in_array('price',$display_cols_arr))<td>{{mark($cur_rec->price)}}</td>@endif

            @if(in_array('price_special',$display_cols_arr))<td>{{mark($cur_rec->price_special)}}</td>@endif

            @if(in_array('price_temp',$display_cols_arr))<td>{{mark($cur_rec->price_temp)}}</td>@endif

            @if(in_array('price_special_temp',$display_cols_arr))<td>{{mark($cur_rec->price_special_temp)}}</td>@endif

            @if(in_array('weight',$display_cols_arr))<td>{{mark($cur_rec->weight)}}</td>@endif

            @if(in_array('status',$display_cols_arr))<td>{{mark($cur_rec->status)}}</td>@endif

            @if(in_array('tax_class_id',$display_cols_arr))<td>{{mark($cur_rec->tax_class_id)}}</td>@endif

            @if(in_array('manufacturers_id',$display_cols_arr))<td>{{mark($cur_rec->manufacturers_id)}}</td>@endif

            @if(in_array('ordered',$display_cols_arr))<td>{{mark($cur_rec->ordered)}}</td>@endif

            @if(in_array('ordered_f',$display_cols_arr))<td>{{mark($cur_rec->ordered_f)}}</td>@endif

            @if(in_array('ordered_ff',$display_cols_arr))<td>{{mark($cur_rec->ordered_ff)}}</td>@endif

            @if(in_array('description_1',$display_cols_arr))<td>{{mark($cur_rec->description_1)}}</td>@endif

            @if(in_array('description_2',$display_cols_arr))<td>{{mark($cur_rec->description_2)}}</td>@endif

            @if(in_array('description_3',$display_cols_arr))<td>{{mark($cur_rec->description_3)}}</td>@endif

            @if(in_array('description_4',$display_cols_arr))<td>{{mark($cur_rec->description_4)}}</td>@endif

            @if(in_array('description_5',$display_cols_arr))<td>{{mark($cur_rec->description_5)}}</td>@endif

            @if(in_array('description_6',$display_cols_arr))<td>{{mark($cur_rec->description_6)}}</td>@endif

            @if(in_array('description_7',$display_cols_arr))<td>{{mark($cur_rec->description_7)}}</td>@endif

            @if(in_array('description_8',$display_cols_arr))<td>{{mark($cur_rec->description_8)}}</td>@endif

            @if(in_array('description_9',$display_cols_arr))<td>{{mark($cur_rec->description_9)}}</td>@endif

            @if(in_array('description_10',$display_cols_arr))<td>{{mark($cur_rec->description_10)}}</td>@endif

            @if(in_array('description_11',$display_cols_arr))<td>{{mark($cur_rec->description_11)}}</td>@endif

            @if(in_array('description_12',$display_cols_arr))<td>{{mark($cur_rec->description_12)}}</td>@endif

            @if(in_array('description_13',$display_cols_arr))<td>{{mark($cur_rec->description_13)}}</td>@endif

            @if(in_array('description_14',$display_cols_arr))<td>{{mark($cur_rec->description_14)}}</td>@endif

            @if(in_array('description_15',$display_cols_arr))<td>{{mark($cur_rec->description_15)}}</td>@endif

            @if(in_array('description_16',$display_cols_arr))<td>{{mark($cur_rec->description_16)}}</td>@endif

            @if(in_array('description_17',$display_cols_arr))<td>{{mark($cur_rec->description_17)}}</td>@endif

            @if(in_array('description_18',$display_cols_arr))<td>{{mark($cur_rec->description_18)}}</td>@endif

            @if(in_array('pnew',$display_cols_arr))<td>{{mark($cur_rec->pnew)}}</td>@endif

            @if(in_array('hotshot',$display_cols_arr))<td>{{mark($cur_rec->hotshot)}}</td>@endif

            @if(in_array('soldout',$display_cols_arr))<td>{{mark($cur_rec->soldout)}}</td>@endif

            @if(in_array('rare',$display_cols_arr))<td>{{mark($cur_rec->rare)}}</td>@endif

            @if(in_array('attr1',$display_cols_arr))<td>{{mark($cur_rec->attr1)}}</td>@endif

            @if(in_array('attr2',$display_cols_arr))<td>{{mark($cur_rec->attr2)}}</td>@endif

            @if(in_array('attr3',$display_cols_arr))<td>{{mark($cur_rec->attr3)}}</td>@endif

            @if(in_array('attr4',$display_cols_arr))<td>{{mark($cur_rec->attr4)}}</td>@endif

            @if(in_array('attr5',$display_cols_arr))<td>{{mark($cur_rec->attr5)}}</td>@endif

            @if(in_array('attr6',$display_cols_arr))<td>{{mark($cur_rec->attr6)}}</td>@endif

            @if(in_array('attr7',$display_cols_arr))<td>{{mark($cur_rec->attr7)}}</td>@endif

            @if(in_array('attr8',$display_cols_arr))<td>{{mark($cur_rec->attr8)}}</td>@endif

            @if(in_array('attr9',$display_cols_arr))<td>{{mark($cur_rec->attr9)}}</td>@endif

            @if(in_array('attr10',$display_cols_arr))<td>{{mark($cur_rec->attr10)}}</td>@endif

            @if(in_array('ab18',$display_cols_arr))<td>{{mark($cur_rec->ab18)}}</td>@endif

            @if(in_array('unterordner',$display_cols_arr))<td>{{mark($cur_rec->unterordner)}}</td>@endif

            @if(in_array('sort_order',$display_cols_arr))<td>{{mark($cur_rec->sort_order)}}</td>@endif

            @if(in_array('ori_img_exists',$display_cols_arr))<td>{{mark($cur_rec->ori_img_exists)}}</td>@endif

            @if(in_array('description_1_title',$display_cols_arr))<td>{{mark($cur_rec->description_1_title)}}</td>@endif

            @if(in_array('description_2_title',$display_cols_arr))<td>{{mark($cur_rec->description_2_title)}}</td>@endif

            @if(in_array('description_3_title',$display_cols_arr))<td>{{mark($cur_rec->description_3_title)}}</td>@endif

            @if(in_array('description_4_title',$display_cols_arr))<td>{{mark($cur_rec->description_4_title)}}</td>@endif

            @if(in_array('description_5_title',$display_cols_arr))<td>{{mark($cur_rec->description_5_title)}}</td>@endif

            @if(in_array('description_6_title',$display_cols_arr))<td>{{mark($cur_rec->description_6_title)}}</td>@endif

            @if(in_array('description_7_title',$display_cols_arr))<td>{{mark($cur_rec->description_7_title)}}</td>@endif

            @if(in_array('description_8_title',$display_cols_arr))<td>{{mark($cur_rec->description_8_title)}}</td>@endif

            @if(in_array('description_9_title',$display_cols_arr))<td>{{mark($cur_rec->description_9_title)}}</td>@endif

            @if(in_array('description_10_title',$display_cols_arr))<td>{{mark($cur_rec->description_10_title)}}</td>@endif

            @if(in_array('description_11_title',$display_cols_arr))<td>{{mark($cur_rec->description_11_title)}}</td>@endif

            @if(in_array('description_12_title',$display_cols_arr))<td>{{mark($cur_rec->description_12_title)}}</td>@endif

            @if(in_array('description_13_title',$display_cols_arr))<td>{{mark($cur_rec->description_13_title)}}</td>@endif

            @if(in_array('description_14_title',$display_cols_arr))<td>{{mark($cur_rec->description_14_title)}}</td>@endif

            @if(in_array('description_15_title',$display_cols_arr))<td>{{mark($cur_rec->description_15_title)}}</td>@endif

            @if(in_array('description_16_title',$display_cols_arr))<td>{{mark($cur_rec->description_16_title)}}</td>@endif

            @if(in_array('description_17_title',$display_cols_arr))<td>{{mark($cur_rec->description_17_title)}}</td>@endif

            @if(in_array('description_18_title',$display_cols_arr))<td>{{mark($cur_rec->description_18_title)}}</td>@endif

            @if(in_array('dvd_code',$display_cols_arr))<td>{{mark($cur_rec->dvd_code)}}</td>@endif

            @if(in_array('temp',$display_cols_arr))<td>{{mark($cur_rec->temp)}}</td>@endif

            @if(in_array('pdf',$display_cols_arr))<td>{{mark($cur_rec->pdf)}}</td>@endif

            @if(in_array('video',$display_cols_arr))<td>{{mark($cur_rec->video)}}</td>@endif

            @if(in_array('pdf_p',$display_cols_arr))<td>{{mark($cur_rec->pdf_p)}}</td>@endif

            @if(in_array('pdf_m',$display_cols_arr))<td>{{mark($cur_rec->pdf_m)}}</td>@endif

            @if(in_array('pdf_c',$display_cols_arr))<td>{{mark($cur_rec->pdf_c)}}</td>@endif

            @if(in_array('pdf_mc',$display_cols_arr))<td>{{mark($cur_rec->pdf_mc)}}</td>@endif

            @if(in_array('highlights_sort_order',$display_cols_arr))<td>{{mark($cur_rec->highlights_sort_order)}}</td>@endif

            @if(in_array('is_highlight',$display_cols_arr))<td>{{mark($cur_rec->is_highlight)}}</td>@endif

            @if(in_array('mp3',$display_cols_arr))<td>{{mark($cur_rec->mp3)}}</td>@endif

            @if(in_array('zbv1',$display_cols_arr))<td>{{mark($cur_rec->zbv1)}}</td>@endif

            @if(in_array('zbv2',$display_cols_arr))<td>{{mark($cur_rec->zbv2)}}</td>@endif

            @if(in_array('zbv3',$display_cols_arr))<td>{{mark($cur_rec->zbv3)}}</td>@endif

            @if(in_array('zbv4',$display_cols_arr))<td>{{mark($cur_rec->zbv4)}}</td>@endif

            @if(in_array('int_bemerkung',$display_cols_arr))<td>{{mark($cur_rec->int_bemerkung)}}</td>@endif

            @if(in_array('temp_done',$display_cols_arr))<td>{{mark($cur_rec->temp_done)}}</td>@endif


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
            <div class="btn-group dimmed04" role="group" aria-label="">
            <!--  blade_table_body   -->
                @if($has_action_show)
                    <a href="{!! route('admin.prods.show', [$cur_rec->id]) !!}">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                            <i class="fa fa-eye fa-sm-text-shadow"></i>
                        </button>
                    </a>
                @endif

                @if($has_action_edit)
                <a href="{!! route('admin.prods.edit', [$cur_rec->id]) !!}">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="edit">
                        <i class="fa fa-pencil fa-sm-text-shadow"></i>
                    </button>
                </a>
                @endif

                @if($has_action_delete)
                <a href="prods/{{$cur_rec->id}}"
                   data-method="delete"
                   data-trans-button-cancel="Abbrechen"
                   data-trans-button-confirm="Löschen"
                   data-trans-title="Item delete, sure?"
                   data-toggle="tooltip" data-placement="top" title="" data-original-title="delete"
                   class="btn btn-danger btn-sm">
                    <i class="fa fa-trash fa-sm-text-shadow"></i>
                </a>
                @endif
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
