@if((sizeof($files) > 0) || (sizeof($directories) > 0))
<table class="table table-condensed table-striped">
  <thead>
    <th style='width:50%;'>
      {{--{{ Lang::get('laravel-filemanager::lfm.title-item') }}--}}
      @lang('lfm.title-item')
    </th>
    <th>
      {{--{{ Lang::get('laravel-filemanager::lfm.title-size') }}--}}
      @lang('lfm.title-size')
    </th>
    <th>
      {{--{{ Lang::get('laravel-filemanager::lfm.title-type') }}--}}
      @lang('lfm.title-type')
    </th>
    <th>
      {{--{{ Lang::get('laravel-filemanager::lfm.title-modified') }}--}}
      @lang('lfm.title-modified')
    </th>
    <th>
      {{--{{ Lang::get('laravel-filemanager::lfm.title-action') }}--}}
      @lang('lfm.title-action')
    </th>
  </thead>
  <tbody>
    @foreach($directories as $key => $directory)
    <tr>
      <td>
        <i class="fa fa-folder-o"></i>
        <a class="folder-item clickable" data-id="{{ $directory->path }}">
          <?php
            $desired_folder =  strtolower($_GET["type"]);
            //$ppp = public_path($desired_folder.'/images/'.$directory->path);
            $ppp = public_path('myuploads/'.$desired_folder.'/'.$directory->path);
            //$_GET["type"]
            $anz = number_files_in_folder_filemanager($ppp);

          ?>
          {{ $directory->name }} ({{$anz}})
        </a>
      </td>
      <td></td>
      <td>
        {{--{{ Lang::get('laravel-filemanager::lfm.type-folder') }}--}}
        @lang('lfm.type-folder')
      </td>
      <td></td>
      <td></td>
    </tr>
    @endforeach

    @foreach($files as $file)
    <tr>
      <td>
        <i class="fa {{ $file['icon'] }}"></i>
        <?php $file_name = $file['name'];?>
        <a title="use" href="javascript:useFile('{{ $file_name }}')" id="{{ $file_name }}" data-url="{{ $file['url'] }}">
          {{--<a target="_blank" title="in new tab" href="{{ $file['url'] }}" id="{{ $file_name }}" >--}}
          {{ $file_name }}
        </a>
        &nbsp;&nbsp;



      </td>
      <td>
        {{ $file['size'] }}
      </td>
      <td>
        {{ $file['type'] }}
      </td>
      <td>
        {{ date("d.m.Y h:m", $file['updated']) }}
      </td>
      <td>
<div class="btn-group">
        <a title="rename" href="javascript:rename('{{ $file_name }}')" class="btn btn-default btn-xs">
          <i class="fa fa-edit"></i>
        </a>

        <a target="_blank" title="preview in new window" href="{{ $file['url'] }}" class="btn btn-default btn-xs">
          <i class="fa fa-eye"></i>
        </a>

        <a title="get link" href="javascript:alert_swal('','{{$file['url'] }}','')" class="btn btn-default btn-xs">
          <i class="fa fa-link "></i>
        </a>

        @if($file['thumb'])
        <a title="crop" href="javascript:cropImage('{{ $file_name }}')" class="btn btn-default btn-xs">
          <i class="fa fa-crop fa-fw"></i>
        </a>
        <a title="resize" href="javascript:resizeImage('{{ $file_name }}')" class="btn btn-default btn-xs">
          <i class="fa fa-arrows fa-fw"></i>
        </a>
        @endif
          <a  title="delete" href="javascript:trash('{{ $file_name }}')" class="btn btn-default btn-xs">
            <i class="fa fa-trash fa-fw " style="color:#dd0000"></i>
          </a>
</div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@else
<div class="row">
  <div class="col-md-12">
    <p>
      {{--{{ Lang::get('laravel-filemanager::lfm.message-empty') }}--}}
      @lang('lfm.message-empty')
    </p>
  </div>
</div>
@endif
<script>
    function alert_swal(headertxt,text,type) {
        swal(headertxt, text, type);
    }
</script>
