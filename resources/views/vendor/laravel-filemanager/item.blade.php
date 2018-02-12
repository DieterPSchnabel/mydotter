<?php //ec('mmmm');?>

<?php $file_name = $file['name'];?>
<?php $thumb_src = $file['thumb'];?>

<div class="thumbnail clickable" onclick="useFile('{{ $file_name }}')">
  <div class="square" id="{{ $file_name }}" data-url="{{ $file['url'] }}">
    @if($thumb_src)
    <img src="{{ $thumb_src }}">
    @else
    <div class="icon-container">
      <i class="fa {{ $file['icon'] }} fa-4x"></i>
    </div>

    @endif
  </div>
</div>

<div style="width:100%;text-align:center;margin:-6px 0 4px 0;font-size:0.9em">
 <?php
    $uf = url()->current();
    //ec($uf);
    $port_arr = explode(':',$uf);
    $port = $port_arr[2];

    if($port <> '') $port = ':'.$port;
    //ec(__line__.' '.$port);

    $port_arr2 = explode('/',$port,2);
    $port2 = $port_arr2[0];
    //ec(__line__.' '.$port2);

    $url = $_SERVER['SERVER_NAME'];

    $url = str_replace('http://','',$url);
    $url = str_replace('https://','',$url);
    $url = str_replace('www.','',$url);
    $url = str_replace('www:','',$url);

    $xx = str_replace( $url,'',$file['url'] );
    $xx = str_replace('http://','',$xx);
    $xx = str_replace('https://','',$xx);
    $xx = str_replace('www.','',$xx);
    $xx = str_replace('www:','',$xx);

//ec(__line__.' '.$xx);
    $xx = str_replace($port2,'',$xx);
    //$xx = str_replace(':81','',$xx);
    $xx=public_path($xx);
    ?>

     size: <b>{{ filesize_in_kb_mb($xx) }}</b>
  <br>
  {{get_image_dimensions($xx, $what = 3)}}
</div>

<div class="caption text-center">
  <div class="btn-group">
    <button type="button" onclick="useFile('{{ $file_name }}')" class="btn btn-default btn-xs">
     <b> {{ str_limit($file_name, $limit = 11, $end = '...') }}</b>
    </button>



    <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="javascript:rename('{{ $file_name }}')"><i class="fa fa-edit fa-fw"></i>
          {{--{{ Lang::get('laravel-filemanager::lfm.menu-rename') }}--}}
          @lang('lfm.menu-rename')
        </a></li>
      <li><a href="javascript:download('{{ $file_name }}')"><i class="fa fa-download fa-fw"></i>
          {{--{{ Lang::get('laravel-filemanager::lfm.menu-download') }}--}}
          @lang('lfm.menu-download')
        </a></li>
      <li class="divider"></li>
      @if($thumb_src)
      <li><a href="javascript:fileView('{{ $file_name }}', '{{ $file["updated"] }}')"><i class="fa fa-image fa-fw"></i>
          {{--{{ Lang::get('laravel-filemanager::lfm.menu-view') }}--}}
          @lang('lfm.menu-view')
        </a></li>
      <li><a href="javascript:resizeImage('{{ $file_name }}')"><i class="fa fa-arrows fa-fw"></i>
          {{--{{ Lang::get('laravel-filemanager::lfm.menu-resize') }}--}}
          @lang('lfm.menu-resize')
        </a></li>
      <li><a href="javascript:cropImage('{{ $file_name }}')"><i class="fa fa-crop fa-fw"></i>
          {{--{{ Lang::get('laravel-filemanager::lfm.menu-crop') }}--}}
          @lang('lfm.menu-crop')
        </a></li>
      <li class="divider"></li>
      @endif
      <li><a href="javascript:trash('{{ $file_name }}')"><i class="fa fa-trash fa-fw"></i>
          {{--{{ Lang::get('laravel-filemanager::lfm.menu-delete') }}--}}
          @lang('lfm.menu-delete')
        </a></li>
    </ul>
  </div>
</div>
