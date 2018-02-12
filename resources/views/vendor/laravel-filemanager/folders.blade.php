<?php $folder_name = $directory->name; ?>
<?php $folder_path = $directory->path; ?>

<div class="thumbnail clickable">
  <div data-id="{{ $folder_path }}" class="folder-item square">
    <img src="{{ asset('vendor/laravel-filemanager/img/folder.png') }}" style="width:100%;height:100%">
  </div>
</div>
<div style="width:100%;text-align:center;font-size:0.9em;font-weight:bold;margin:-6px 0 6px 0">
  <?php
    //$ppp = public_path('myuploads/images/'.$folder_path);
    //echo number_files_in_folder_filemanager($ppp).' files';
    $desired_folder =  strtolower($_GET["type"]);
    //$ppp = public_path($desired_folder.'/images/'.$directory->path);
    $ppp = public_path('myuploads/'.$desired_folder.'/'.$folder_path);
    //$_GET["type"]
    echo str_replace(' / ','<br>',number_files_in_folder_filemanager($ppp)).'';


    ?>
</div>
<div class="caption text-center">
  <div class="btn-group">
    <button type="button" data-id="{{ $folder_path }}" class="btn btn-default btn-xs folder-item">
      <b>{{ str_limit($folder_name, $limit = 11, $end = '...') }}</b>
    </button>

    <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="javascript:rename('{{ $folder_name }}')"><i class="fa fa-edit fa-fw"></i>
          {{--{{ Lang::get('laravel-filemanager::lfm.menu-rename') }}--}}
          @lang('lfm.menu-rename')
        </a></li>
      <li><a href="javascript:trash('{{ $folder_name }}')"><i class="fa fa-trash fa-fw"></i>
          {{--{{ Lang::get('laravel-filemanager::lfm.menu-delete') }}--}}
          @lang('lfm.menu-delete')
        </a></li>
    </ul>
  </div>
</div>
