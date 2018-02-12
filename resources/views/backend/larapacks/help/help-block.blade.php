<div class="card" id="help_block" style="display:none">

<div class="_card-body" style="background:#eee;padding:1.0em">
    <a style="margin-right:8px" class="float-right" href="javascript:toggle('help_block','slide')">
        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>
    <ul class="nav nav-tabs" role="tablist">
        @if($has_help_hints)
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-expanded="false">
                <i class="icon-compass font-lg"></i> Hinweise</a>
        </li>
        @endif
        @if($has_help_help)
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-expanded="false">
                <i class="icon-support font-lg"></i> Hilfe</a>
        </li>
        @endif
        @if($has_help_related)
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages3" role="tab" aria-controls="messages" aria-expanded="true">
                <i class="icon-people font-lg"></i> Verwandtes</a>
        </li>
        @endif
        @if($has_help_config)
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#config3" role="tab" aria-controls="config" aria-expanded="true">
                <i class="icon-wrench font-lg "></i> Konfiguration</a>
        </li>
        @endif
    </ul>

    <div class="tab-content">
        @if($has_help_hints)
        <div style="padding:1.2em" class="tab-pane active animated fadeIn" id="home3" role="tabpanel" aria-expanded="true">
            1. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        @endif
        @if($has_help_help)
        <div style="padding:1.2em" class="tab-pane animated fadeIn" id="profile3" role="tabpanel" aria-expanded="false">
            2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        @endif
        @if($has_help_related)
        <div style="padding:1.2em" class="tab-pane animated fadeIn" id="messages3" role="tabpanel" aria-expanded="false">
            3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        @endif
        @if($has_help_config)
        <div style="padding:1.2em" class="tab-pane animated fadeIn" id="config3" role="tabpanel" aria-expanded="false">

            <div class="card-deck">
                <div class="card">
                    {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>

                <div class="card">
                    {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card">
                    {{--<img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>



            </div>


        </div>
        @endif

    </div>
</div>
</div>