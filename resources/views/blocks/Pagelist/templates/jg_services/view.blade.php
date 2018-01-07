    
    
    <?php 
    $pageidarr = array();
    $logoarr = array();
    $namearr = array();
    $descarr = array();
    $linkarr = array();
    $value = array();
    $numoflimit = "";
    $serviceslink = "";
    $numss = 0;
    $pag = false;
    $x = 0;
    ?>
    @if(!empty($contentsub->pagination))
        @if($contentsub->pagination == "yes")
            <?php $pag = true; ?>
        @endif
    @endif
    @if(count($contentsubs) > 0)
        @foreach($contentsubs as $contentsub)
            @if($contentsub->page_id == $pageidme)
                @if($contentsub->content_name == "Services")
                    <?php
                        $numoflimit = $contentsub->num_of_items;
                        $convalshows = explode(",",$contentsub->content_show);
                    ?>
                @endif
            @endif
        @endforeach
    @endif
    @if(count($pagemains) > 0)
            @foreach($pagemains as $pagemain)
                @foreach($convalshows as $convalshow)
                    @if($pagemain->pagetype_id == $convalshow)
                        <?php 
                        $num = 0; 
                        $img = "";
                        $name = "";
                        $desc = "";
                        $company = "";
                        $page_id = "";
                        $link = "";
                        $data = "";
                        $name = $pagemain->name;
                        ?>
                        @if(count($contentsubs1) > 0)
                            @foreach($contentsubs1 as $contentsub)
                                @if($contentsub->page_id == $pagemain->page_id)
                                  
                                    @if($contentsub->content_name == 'Logo')
                                        <?php $img = $contentsub->the_content; ?>
                                    @endif
                                    @if($contentsub->content_name == 'link')
                                        <?php $link = $contentsub->the_content; ?>
                                    @endif
                                    @if($num == 0)
                                        <?php 
                                        
                                        $page_id = $pagemain->page_id;
                                        ?>
                                        <?php $num++; ?>
                                    @endif
                                    @if($contentsub->content_name == 'Description')
                                        <?php 
                                            $desc = $contentsub->content_name; 
                                            $file = base_path().'/resources/views/jgcontents/page'.$pagemain->page_id.'/'.$desc.'.blade.php';
                                            $data = file_get_contents($file);                
                                        ?>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                            <input type="hidden" id="jg-services-logo{{ $numss }}" value="{{ $img }}">
                            <input type="hidden" id="jg-services-name{{ $numss }}" value="{{ $name }}">
                            <input type="hidden" id="jg-services-desc{{ $numss }}" value="{{ $data }}">
                            <input type="hidden" id="jg-services-link{{ $numss }}" value="{{ $link }}">
                            <input type="hidden" id="jg-services-pageid{{ $numss }}" value="{{ $page_id }}">
                        <?php
                            $pageidarr[] = $page_id;
                            $logoarr[] = $img;
                            $namearr[] = $name;
                            $descarr[] = $data;
                            $linkarr[] = $link;
                            $numss++;
                        ?>
                    @endif
                @endforeach
            @endforeach
        @endif

        @if(count($editpermission) > 0)
            @if($editpermission)
                <?php
                    $link = "/dashboard/editpage/";
                ?>
                
            @else
                <?php
                    $link = "/pages/";
                ?>
            @endif
        @endif

        @if(count($pagemains) > 0)
            @foreach($pagemains as $pagemain)
                @if($pagemain->name == "Services")
                    <?php $serviceslink = $pagemain->page_id?>
                @endif
            @endforeach
        @endif

                <div class="container">
                    <div class="row justify-content-md-center" id="jg-services-content">
                        @for($i = 0; $i < $numss; $i++)
                            @if($x < $numoflimit)
                                <div class="col-md-4">
                                    <div class="jg-services-thumbnail">
                                        <center>
                                            <a href="{{ $linkarr[$i] }}" class="jg-services-thumbnail-icon" target="_blank">
                                                <img class="img-responsive" src="{{ URL::asset('img/icon/') . '/' . $logoarr[$i] }}">
                                            </a>
                                        </center>
                                            <div class="jg-services-caption">
                                                <h6>{{ $namearr[$i] }}</h6>
                                                <div class="jg-services-caption-desc">
                                                    <?php echo html_entity_decode($descarr[$i]); ?>
                                                </div>
                                            </div>
                                        <center>
                                            <a class="btn btn-primary jg-btn" href="{{ $linkarr[$i] }}" target="_blank">Learn more</a>
                                        </center>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                    @if($pag)
                        @if($numss > $numoflimit)
                            <div id="pagination-container-services"></div>
                        @endif
                    @endif
                </div>


    <input type="hidden" id="numoflimits_services" name="numoflimit" value="{{ $numoflimit }}">
    <input type="hidden" id="numofvalue_services" value="{{ $numss }}">
    <input type="hidden" id="imguri" value="{{ URL::asset('img/gallery') }}">
    
    <script>
    
    function servicetemplate(data) {
        var html = "";
        $.each(data, function(index, item){
            html += '<div class="col-sm-4">' +
            '<div class="jg-services-thumbnail">' +
            '<center>' +
            '<a href="'+ item['link'] +'" class="jg-services-thumbnail-icon" target="_blank">' +
            '<img class="img-responsive" src="'+ $('imguri').val()+ "/" + item['logo'] +'">' +
            '</a>'+
            '</center>' +
            '<div class="jg-services-caption">'+
            '<h6>' + item['name'] + '</h6>'+
            $.parseHTML(item['desc']) +
            '<a class="btn btn-primary jg-btn" href="'+ item['link'] +'" target="_blank">Learn more</a>'+
            '</div>'+
            '</div>' +
            '</div>';
        });
        return html;
    }
    var valarr = new Array();
    var arrval = new Array();
    
    arrval = [];
    for(var x = 0; x < $('#numofvalue_services').val(); x++){
        valarr = {};
        valarr["logo"] = $('#jg-services-logo'+x).val();
        valarr["name"] = $('#jg-services-name'+x).val();
        valarr["desc"] = $('#jg-services-desc'+x).val();
        valarr["link"] = $('#jg-services-link'+x).val();
        valarr["page_id"] = $('#jg-services-pageid'+x).val();
        arrval.push(valarr);
    }
    
    $('#pagination-container-services').pagination({
        dataSource: arrval,
        pageSize: $('#numoflimits_services').val(),
        callback: function(data, pagination) {
            var html = servicetemplate(data);
            $('#jg-services-content').html(html);
        }
    });
    </script>

