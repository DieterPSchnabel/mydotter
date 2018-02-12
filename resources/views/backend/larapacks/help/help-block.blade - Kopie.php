<div class="card" id="help_block">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    <div class="panel panel-default">

        <div class="__panel-heading card-header" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                   href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

                    <i style="font-size:14px;line-height:200%;width:30px;text-align:center;margin:0 6px 0 0;"
                       class="menu-icon fa fa-question bg-gray round20 shade4s"></i> Hinweise - Hilfe  - Verwandtes - Konfiguration<i style="font-size:14px;margin-left:12px" class="fa fa-sort dimmed04"></i>
                </a>
            </h4>
        </div>

        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
             aria-labelledby="headingThree">
            <div class="panel-body" style="padding:6px;">


                <div class="bs-example bs-example-tabs" data-example-id=togglable-tabs
                     style="border:none;padding:6px;background:#f9f9f9">
                    <ul class="nav nav-tabs" id=myTabs role=tablist>

                        <li role=presentation class=active>
                            <a href=#hint id=home-tab role=tab data-toggle=tab aria-controls=hint
                               aria-expanded=true>Hinweise</a>
                        </li>

                        <li role=presentation >
                            <a href=#home id=home-tab role=tab data-toggle=tab aria-controls=home
                               >Hilfe</a>
                        </li>

                        <li role=presentation><a href=#profile role=tab id=profile-tab data-toggle=tab
                                                 aria-controls=profile>Verwandtes</a></li>

                        <li role=presentation class=dropdown>
                            <a href=# class=dropdown-toggle id=myTabDrop1 data-toggle=dropdown
                               aria-controls=myTabDrop1-contents>Konfiguration <span class=caret></span></a>

                            <ul class=dropdown-menu aria-labelledby=myTabDrop1 id=myTabDrop1-contents>
                                <li><a href=#dropdown1 role=tab id=dropdown1-tab data-toggle=tab
                                       aria-controls=dropdown1>Option 1</a></li>

                                <li><a href=#dropdown2 role=tab id=dropdown2-tab data-toggle=tab
                                       aria-controls=dropdown2>Option 2</a></li>

                                <li><a href=#dropdown3 role=tab id=dropdown3-tab data-toggle=tab
                                       aria-controls=dropdown3>Option 3</a></li>


                            </ul>
                        </li>
                    </ul>
                    <div class=tab-content id=myTabContent>


                        <div class="tab-pane fade in active" role=tabpanel id=hint aria-labelledby=hint-tab>
        <?php

        /*$number_manufs_without_products = DB::table('manufacturers')->where('anz_prod', '=', 0)->count();
        $number_prods_without_manuf = 0;
        $number_manufs_without_image = DB::table('manufacturers')->where('image', '=', NULL)->count();
        $number_manufs_without_image_text = DB::table('manufacturers')->where('banner_txt', '=', '')->count();*/

        $number_manufs_without_products = 0;
        $number_prods_without_manuf = 0;
        $number_manufs_without_image = 0;
        $number_manufs_without_image_text = 0;
        ?>


        <div style="margin:12px 24px 12px 24px;font-size:1.1em;color:#666">

        <div class="{{$number_manufs_without_products>0 ? 'hint-warnings' : 'hint-warnings-ok' }}">
            <b>{{$number_manufs_without_products}}</b> Hersteller ohne Produkte
                {{--<a style="margin-left:24px" class="dimmed06 btn btn-default btn-xs" href="#">anzeigen</a>--}}
            {{--{{ Html::linkAction('ManufacturersController@index', 'anzeigen', array('filter' => urlencode('where anz_prod = 0')), array('class' => 'dimmed06 btn btn-default btn-xs', 'style' => 'margin-left:24px')) }}--}}
        </div>


            <div class="{{$number_prods_without_manuf>0 ? 'hint-warnings' : 'hint-warnings-ok' }}">
                <b>{{$number_prods_without_manuf}}</b> Produkte ohne Zuordnung zu einem Hersteller
            <a style="margin-left:24px" class="dimmed06 btn btn-default btn-xs" href="#">anzeigen</a>

            </div>

            {{--<div class="{{$number_manufs_without_image>0 ? 'hint-warnings' : 'hint-warnings-ok' }}">
                <b>{{$number_manufs_without_image}}</b> Hersteller ohne Banner
                {{ Html::linkAction('ManufacturersController@index', 'anzeigen', array('filter' => 'where image IS NULL'), array('class' => 'dimmed06 btn btn-default btn-xs', 'style' => 'margin-left:24px')) }}
            </div>--}}

            <div class="{{$number_manufs_without_image_text>0 ? 'hint-warnings' : 'hint-warnings-ok' }}">
                <b>{{$number_manufs_without_image_text}}</b> Hersteller ohne Zusatztext zum Banner
            {{--<a style="margin-left:24px" class="dimmed06 btn btn-default btn-xs" href="#">anzeigen</a>--}}
                {{--{{ Html::linkAction('ManufacturersController@index', 'anzeigen', array('filter' => urlencode('where banner_txt = ')), array('class' => 'dimmed06 btn btn-default btn-xs', 'style' => 'margin-left:24px')) }}--}}
            </div>

        </div>

                        </div>



                        <div class="tab-pane fade " role=tabpanel id=home aria-labelledby=home-tab>
                            <p>HILFE: Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor,
                                williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                                dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex
                                squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan
                                american apparel, butcher voluptate nisi qui.</p>
                        </div>

                        <div class="tab-pane fade" role=tabpanel id=profile aria-labelledby=profile-tab>
                            <p>VERWANDTES: Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin
                                coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next
                                level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts
                                ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna
                                velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson
                                8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson
                                biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui
                                sapiente accusamus tattooed echo park.</p>
                        </div>

                        <div class="tab-pane fade" role=tabpanel id=dropdown1 aria-labelledby=dropdown1-tab>
                            <p>KONFIG OPTION 1: Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out
                                mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.
                                Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
                                locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy
                                irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi
                                whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk
                                vice blog. Scenester cred you probably haven't heard of them, vinyl craft
                                beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.
                            </p>
                        </div>

                        <div class="tab-pane fade" role=tabpanel id=dropdown2 aria-labelledby=dropdown2-tab>
                            <p>KONFIG OPTION 2: Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party
                                before they sold out master cleanse gluten-free squid scenester freegan
                                cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf
                                cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh
                                mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo
                                wolf viral, mustache readymade thundercats keffiyeh craft beer marfa
                                ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                        </div>

                        <div class="tab-pane fade" role=tabpanel id=dropdown3 aria-labelledby=dropdown3-tab>
                            <p>KONFIG OPTION 3: Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party
                                before they sold out master cleanse gluten-free squid scenester freegan
                                cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf
                                cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh
                                mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo
                                wolf viral, mustache readymade thundercats keffiyeh craft beer marfa
                                ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

</div>