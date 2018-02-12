<ul class="list-unstyled" style="line-height:200%">
  @foreach($root_folders as $root_folder)
    <li>

      <a class="clickable folder-item" data-id="{{ $root_folder->path }}">
        <i class="fa fa-folder fa-2x"></i> <b>myuploads/<?php echo lowercase(htmlspecialchars($_GET["type"])) ?>/shares/</b> {{--{{ $root_folder }}--}}
      </a>
    </li>
    @foreach($root_folder->children as $directory)
      <li style="margin-left: 10px;">
        <a class="clickable folder-item" data-id="{{ $directory->path }}">
          <i class="fa fa-folder fa-2x"></i> <b>{{ $directory->name }}</b>
          <?php
            //$ppp = public_path('myuploads/images/'.$directory->path);
            $desired_folder =  strtolower($_GET["type"]);
            //$ppp = public_path($desired_folder.'/images/'.$directory->path);
            $ppp = public_path('myuploads/'.$desired_folder.'/'.$directory->path);
            //$_GET["type"]
            $anz = number_files_in_folder_filemanager($ppp);
            //$anz = 1;
            //echo $ppp;
           ?>
          <span style="opacity:0.6;font-size:0.95em">&nbsp; ({{$anz}})</span>
        </a>
      </li>
    @endforeach
    @if($root_folder->has_next)
      <hr>
    @endif
  @endforeach
</ul>
