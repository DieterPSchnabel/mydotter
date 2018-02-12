<style>
    th {
        white-space:nowrap;
    }
    td p{
        margin-bottom: 7px;
    }
</style>
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

                <?php $this_col = 'div_what'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_de'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_de'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'app_top'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'is_hint'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 't_key_comment'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 't_key_txt'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'assi_title'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'assi_typ'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'help_key'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'sa'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'manager_url'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'is_active_switch'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'c_theme'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'pv_link'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'be_fe'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'type'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_fr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_fr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_en'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_en'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_it'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_it'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_ru'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_ru'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_es'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_es'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_nl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_nl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_tr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_tr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_cr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_cr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_cz'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_cz'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_da'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_da'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_fi'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_fi'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_no'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_no'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_pl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_pl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_pt'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_pt'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_ro'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_ro'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_sr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_sr'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_sv'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_sv'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_bg'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_bg'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_ca'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_ca'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_et'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_et'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_gl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_gl'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_el'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_el'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_hu'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_hu'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_is'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_is'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_lv'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_lv'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_mk'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_mk'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_uk'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_uk'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_zh'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_zh'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_th'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_th'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_pt_BR'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_pt_BR'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_lt'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_lt'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_ja'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_ja'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_ar'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
        echo make_col_sortable2($this_col,$this_col,$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
        ?>
    </th>@endif

            <?php $this_col = 'div_res_long_ar'; $this_model = $this_table_name; ?>
    @if(in_array($this_col,$display_cols_arr))
    <th {!! tab_head_td_mark($this_col) !!}>
        <?php
        $model_path = ucfirst($this_model);
        $order = 'order='.$this_col;
        echo flag_icon_by_col_name($this_col);
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
     @if(in_array('id',$display_cols_arr))<td class="dimmed04">{{$cur_rec->id}}
            <br>
             <a style="" class=""
                data-fancybox data-type="iframe"
                data-src="http://rappasoft.loc:81/dashboard/pop_div_res_short?key={{$cur_rec->div_what}}&lang=all&curr_lang" href="javascript:;">
                 <button type="button" class="btn btn-success btn-sm ml-1" data-toggle="tooltip"
                         title="short text - diesen Hinweis editieren in allen Sprachen"
                         data-placement="top" title="" data-original-title="edit">
                     <i class="fa fa-pencil fa-sm-text-shadow"></i>
                 </button>
             </a>

             <a class=""
                data-fancybox data-type="iframe"
                data-src="http://rappasoft.loc:81/dashboard/pop1?key={{$cur_rec->div_what}}&lang=all&curr_lang" href="javascript:;">
                 <button type="button" class="btn btn-info btn-sm ml-1" data-toggle="tooltip"
                         title="long text - diesen Hinweis editieren in allen Sprachen"
                         style="margin-top: 6px"
                         data-placement="top" title="" data-original-title="edit">
                     <i class="fa fa-pencil fa-sm-text-shadow"></i>
                 </button>
             </a>

     </td>@endif

     @if(in_array('div_what',$display_cols_arr))<td>{!! mark($cur_rec->div_what) !!}</td>@endif

            @if(in_array('div_res',$display_cols_arr))<td>{!! mark($cur_rec->div_res) !!}</td>@endif

            @if(in_array('div_res_long',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long) !!}</td>@endif

            @if(in_array('div_res_de',$display_cols_arr))<td>{!! mark($cur_rec->div_res_de) !!}</td>@endif

            @if(in_array('div_res_long_de',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_de) !!}</td>@endif

            @if(in_array('app_top',$display_cols_arr))<td>{!! mark($cur_rec->app_top) !!}</td>@endif

            @if(in_array('is_hint',$display_cols_arr))<td>{!! mark($cur_rec->is_hint) !!}</td>@endif

            @if(in_array('t_key_comment',$display_cols_arr))<td>{!! mark($cur_rec->t_key_comment) !!}</td>@endif

            @if(in_array('t_key_txt',$display_cols_arr))<td>{!! mark($cur_rec->t_key_txt) !!}</td>@endif

            @if(in_array('assi_title',$display_cols_arr))<td>{!! mark($cur_rec->assi_title) !!}</td>@endif

            @if(in_array('assi_typ',$display_cols_arr))<td>{!! mark($cur_rec->assi_typ) !!}</td>@endif

            @if(in_array('help_key',$display_cols_arr))<td>{!! mark($cur_rec->help_key) !!}</td>@endif

            @if(in_array('sa',$display_cols_arr))<td>{!! mark($cur_rec->sa) !!}</td>@endif

            @if(in_array('manager_url',$display_cols_arr))<td>{!! mark($cur_rec->manager_url) !!}</td>@endif

            @if(in_array('is_active_switch',$display_cols_arr))<td>{!! mark($cur_rec->is_active_switch) !!}</td>@endif

            @if(in_array('c_theme',$display_cols_arr))<td>{!! mark($cur_rec->c_theme) !!}</td>@endif

            @if(in_array('pv_link',$display_cols_arr))<td>{!! mark($cur_rec->pv_link) !!}</td>@endif

            @if(in_array('be_fe',$display_cols_arr))<td>{!! mark($cur_rec->be_fe) !!}</td>@endif

            @if(in_array('type',$display_cols_arr))<td>{!! mark($cur_rec->type) !!}</td>@endif

            @if(in_array('div_res_fr',$display_cols_arr))<td>{!! mark($cur_rec->div_res_fr) !!}</td>@endif

            @if(in_array('div_res_long_fr',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_fr) !!}</td>@endif

            @if(in_array('div_res_en',$display_cols_arr))<td>{!! mark($cur_rec->div_res_en) !!}</td>@endif

            @if(in_array('div_res_long_en',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_en) !!}</td>@endif

            @if(in_array('div_res_it',$display_cols_arr))<td>{!! mark($cur_rec->div_res_it) !!}</td>@endif

            @if(in_array('div_res_long_it',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_it) !!}</td>@endif

            @if(in_array('div_res_ru',$display_cols_arr))<td>{!! mark($cur_rec->div_res_ru) !!}</td>@endif

            @if(in_array('div_res_long_ru',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_ru) !!}</td>@endif

            @if(in_array('div_res_es',$display_cols_arr))<td>{!! mark($cur_rec->div_res_es) !!}</td>@endif

            @if(in_array('div_res_long_es',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_es) !!}</td>@endif

            @if(in_array('div_res_nl',$display_cols_arr))<td>{!! mark($cur_rec->div_res_nl) !!}</td>@endif

            @if(in_array('div_res_long_nl',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_nl) !!}</td>@endif

            @if(in_array('div_res_tr',$display_cols_arr))<td>{!! mark($cur_rec->div_res_tr) !!}</td>@endif

            @if(in_array('div_res_long_tr',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_tr) !!}</td>@endif

            @if(in_array('div_res_cr',$display_cols_arr))<td>{!! mark($cur_rec->div_res_cr) !!}</td>@endif

            @if(in_array('div_res_long_cr',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_cr) !!}</td>@endif

            @if(in_array('div_res_cz',$display_cols_arr))<td>{!! mark($cur_rec->div_res_cz) !!}</td>@endif

            @if(in_array('div_res_long_cz',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_cz) !!}</td>@endif

            @if(in_array('div_res_da',$display_cols_arr))<td>{!! mark($cur_rec->div_res_da) !!}</td>@endif

            @if(in_array('div_res_long_da',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_da) !!}</td>@endif

            @if(in_array('div_res_fi',$display_cols_arr))<td>{!! mark($cur_rec->div_res_fi) !!}</td>@endif

            @if(in_array('div_res_long_fi',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_fi) !!}</td>@endif

            @if(in_array('div_res_no',$display_cols_arr))<td>{!! mark($cur_rec->div_res_no) !!}</td>@endif

            @if(in_array('div_res_long_no',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_no) !!}</td>@endif

            @if(in_array('div_res_pl',$display_cols_arr))<td>{!! mark($cur_rec->div_res_pl) !!}</td>@endif

            @if(in_array('div_res_long_pl',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_pl) !!}</td>@endif

            @if(in_array('div_res_pt',$display_cols_arr))<td>{!! mark($cur_rec->div_res_pt) !!}</td>@endif

            @if(in_array('div_res_long_pt',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_pt) !!}</td>@endif

            @if(in_array('div_res_ro',$display_cols_arr))<td>{!! mark($cur_rec->div_res_ro) !!}</td>@endif

            @if(in_array('div_res_long_ro',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_ro) !!}</td>@endif

            @if(in_array('div_res_sr',$display_cols_arr))<td>{!! mark($cur_rec->div_res_sr) !!}</td>@endif

            @if(in_array('div_res_long_sr',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_sr) !!}</td>@endif

            @if(in_array('div_res_sv',$display_cols_arr))<td>{!! mark($cur_rec->div_res_sv) !!}</td>@endif

            @if(in_array('div_res_long_sv',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_sv) !!}</td>@endif

            @if(in_array('div_res_bg',$display_cols_arr))<td>{!! mark($cur_rec->div_res_bg) !!}</td>@endif

            @if(in_array('div_res_long_bg',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_bg) !!}</td>@endif

            @if(in_array('div_res_ca',$display_cols_arr))<td>{!! mark($cur_rec->div_res_ca) !!}</td>@endif

            @if(in_array('div_res_long_ca',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_ca) !!}</td>@endif

            @if(in_array('div_res_et',$display_cols_arr))<td>{!! mark($cur_rec->div_res_et) !!}</td>@endif

            @if(in_array('div_res_long_et',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_et) !!}</td>@endif

            @if(in_array('div_res_gl',$display_cols_arr))<td>{!! mark($cur_rec->div_res_gl) !!}</td>@endif

            @if(in_array('div_res_long_gl',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_gl) !!}</td>@endif

            @if(in_array('div_res_el',$display_cols_arr))<td>{!! mark($cur_rec->div_res_el) !!}</td>@endif

            @if(in_array('div_res_long_el',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_el) !!}</td>@endif

            @if(in_array('div_res_hu',$display_cols_arr))<td>{!! mark($cur_rec->div_res_hu) !!}</td>@endif

            @if(in_array('div_res_long_hu',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_hu) !!}</td>@endif

            @if(in_array('div_res_is',$display_cols_arr))<td>{!! mark($cur_rec->div_res_is) !!}</td>@endif

            @if(in_array('div_res_long_is',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_is) !!}</td>@endif

            @if(in_array('div_res_lv',$display_cols_arr))<td>{!! mark($cur_rec->div_res_lv) !!}</td>@endif

            @if(in_array('div_res_long_lv',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_lv) !!}</td>@endif

            @if(in_array('div_res_mk',$display_cols_arr))<td>{!! mark($cur_rec->div_res_mk) !!}</td>@endif

            @if(in_array('div_res_long_mk',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_mk) !!}</td>@endif

            @if(in_array('div_res_uk',$display_cols_arr))<td>{!! mark($cur_rec->div_res_uk) !!}</td>@endif

            @if(in_array('div_res_long_uk',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_uk) !!}</td>@endif

            @if(in_array('div_res_zh',$display_cols_arr))<td>{!! mark($cur_rec->div_res_zh) !!}</td>@endif

            @if(in_array('div_res_long_zh',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_zh) !!}</td>@endif

            @if(in_array('div_res_th',$display_cols_arr))<td>{!! mark($cur_rec->div_res_th) !!}</td>@endif

            @if(in_array('div_res_long_th',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_th) !!}</td>@endif

            @if(in_array('div_res_pt_BR',$display_cols_arr))<td>{!! mark($cur_rec->div_res_pt_BR) !!}</td>@endif

            @if(in_array('div_res_long_pt_BR',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_pt_BR) !!}</td>@endif

            @if(in_array('div_res_lt',$display_cols_arr))<td>{!! mark($cur_rec->div_res_lt) !!}</td>@endif

            @if(in_array('div_res_long_lt',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_lt) !!}</td>@endif

            @if(in_array('div_res_ja',$display_cols_arr))<td>{!! mark($cur_rec->div_res_ja) !!}</td>@endif

            @if(in_array('div_res_long_ja',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_ja) !!}</td>@endif

            @if(in_array('div_res_ar',$display_cols_arr))<td>{!! mark($cur_rec->div_res_ar) !!}</td>@endif

            @if(in_array('div_res_long_ar',$display_cols_arr))<td>{!! mark($cur_rec->div_res_long_ar) !!}</td>@endif

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
                    <a href="{!! route('admin.diverses.show', [$cur_rec->id]) !!}">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                            <i class="fa fa-eye fa-sm-text-shadow"></i>
                        </button>
                    </a>
                @endif

                @if($has_action_edit)
                <a href="{!! route('admin.diverses.edit', [$cur_rec->id]) !!}">
                    <button type="button" class="btn btn-success btn-sm ml-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="edit">
                        <i class="fa fa-pencil fa-sm-text-shadow"></i>
                    </button>
                </a>
                @endif

                @if($has_action_delete)
                    <?php $ident = zuf() ?>
                    <a href="javascript:delete_in_table('{{$this_table_name}}','{{$cur_rec->id}}','{{$ident}}')">
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
