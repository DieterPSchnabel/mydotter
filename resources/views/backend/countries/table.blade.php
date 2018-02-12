<table class="table table-hover" id="countries-table">
    <thead>
        <tr>
        <th>
            <?php
            $model_path = properCase('countries');
            $order = 'order=id';
            echo make_col_sortable2('id','ID',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
            ?>
        </th>
            <th><?php
$model_path = properCase('countries');
$order = 'order=countries_name';
echo make_col_sortable2('countries_name','Countries Name',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
        <th><?php
$model_path = properCase('countries');
$order = 'order=countries_iso_code_2';
echo make_col_sortable2('countries_iso_code_2','Countries Iso Code 2',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
        <th><?php
$model_path = properCase('countries');
$order = 'order=countries_iso_code_3';
echo make_col_sortable2('countries_iso_code_3','Countries Iso Code 3',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
        <th><?php
$model_path = properCase('countries');
$order = 'order=address_format_id';
echo make_col_sortable2('address_format_id','Address Format Id',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
        <th><?php
$model_path = properCase('countries');
$order = 'order=active';
echo make_col_sortable2('active','Active',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
        <th><?php
$model_path = properCase('countries');
$order = 'order=sort_order';
echo make_col_sortable2('sort_order','Sort Order',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
        <th><?php
$model_path = properCase('countries');
$order = 'order=is_europe';
echo make_col_sortable2('is_europe','Is Europe',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
        <th><?php
$model_path = properCase('countries');
$order = 'order=indiv_porto_active';
echo make_col_sortable2('indiv_porto_active','Indiv Porto Active',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
        <th><?php
$model_path = properCase('countries');
$order = 'order=indiv_porto';
echo make_col_sortable2('indiv_porto','Indiv Porto',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
        <th><?php
$model_path = properCase('countries');
$order = 'order=indiv_porto_freigrenze';
echo make_col_sortable2('indiv_porto_freigrenze','Indiv Porto Freigrenze',$sortables_arr,$page_para,$dir,$order,$curr_dir,$model_path.'Controller@index')
?></th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($countries as $countries)
        <tr>
        <td class="dimmed04">{{$countries->id}}</td>
            <td>{!! mark($countries->countries_name) !!}</td>
            <td>{!! mark($countries->countries_iso_code_2) !!}</td>
            <td>{!! mark($countries->countries_iso_code_3) !!}</td>
            <td>{!! mark($countries->address_format_id) !!}</td>
            <td>{!! mark($countries->active) !!}</td>
            <td>{!! mark($countries->sort_order) !!}</td>
            <td>{!! mark($countries->is_europe) !!}</td>
            <td>{!! mark($countries->indiv_porto_active) !!}</td>
            <td>{!! mark($countries->indiv_porto) !!}</td>
            <td>{!! mark($countries->indiv_porto_freigrenze) !!}</td>
            <td>
                <div class="btn-group dimmed04" role="group" aria-label="">
                    {{--@if($has_action_show)--}}
                        <a href="{!! route('admin.countries.show', [$countries->id]) !!}">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                <i class="fa fa-eye fa-sm-text-shadow"></i>
                            </button>
                        </a>
                    {{--@endif--}}

                    <a href="{!! route('admin.countries.edit', [$countries->id]) !!}">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="edit">
                            <i class="fa fa-pencil fa-sm-text-shadow"></i>
                        </button>
                    </a>

                    <a href="countries/{{$countries->id}}"
                       data-method="delete"
                       data-trans-button-cancel="Abbrechen"
                       data-trans-button-confirm="Löschen"
                       data-trans-title="Item delete, sure?"
                       data-toggle="tooltip" data-placement="top" title="" data-original-title="delete"
                       class="btn btn-danger btn-sm">
                        <i class="fa fa-trash fa-sm-text-shadow"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>