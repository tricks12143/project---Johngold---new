    
    
    <?php 
    $pageidarr = array();
    $logoarr = array();
    $namearr = array();
    $descarr = array();
    $linkarr = array();
    $value = array();
    $datearr = array();
    $postedarr = array();
    $numoflimit = "";
    $serviceslink = "";
    $link = "";
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
                @if($contentsub->content_name == "Newsletter")
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
                        $data = "";
                        $datecreated = "";
                        $posted = "";
                        $datecreated = date('F j, Y, g:i a', strtotime($pagemain->created_at));
                        $name = $pagemain->name;
                        ?>
                        @if(count($contentsubs1) > 0)
                            @foreach($contentsubs1 as $contentsub)
                                @if($contentsub->page_id == $pagemain->page_id)
                                    @if($contentsub->content_name == 'Logo')
                                        <?php $img = $contentsub->the_content; ?>
                                    @endif
                                    @if($contentsub->content_name == 'Posted_by')
                                        <?php $posted = $contentsub->the_content; ?>
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
                            <input type="hidden" id="jg-newsletter-logo{{ $numss }}" value="{{ $img }}">
                            <input type="hidden" id="jg-newsletter-name{{ $numss }}" value="{{ $name }}">
                            <input type="hidden" id="jg-newsletter-desc{{ $numss }}" value="{{ $data }}">
                            <input type="hidden" id="jg-newsletter-date{{ $numss }}" value="{{ $datecreated }}">
                            <input type="hidden" id="jg-newsletter-posted{{ $numss }}" value="{{ $posted }}">
                            <input type="hidden" id="jg-newsletter-pageid{{ $numss }}" value="{{ $page_id }}">
                        <?php
                            $pageidarr[] = $pagemain->page_id;
                            $logoarr[] = $img;
                            $namearr[] = $name;
                            $descarr[] = $data;
                            $linkarr[] = $link;
                            $datearr[] = $datecreated;
                            $postedarr[] = $posted;
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

                <div class="container">
                    <div class="row" id="jg-newsletter-content">
                        @if($numss > 0)
                            @for($i = 0; $i < $numss; $i++)
                                @if($x < $numoflimit)
                                    <div class="col-md-12">
                                        <div class="jg-newsletter-thumbnail">
                                                <a href="{{ url($link) . '/' . $pageidarr[$i] }}" class="jg-newsletter-thumbnail-icon" target="_blank">
                                                    <img class="img-responsive pull-left" src="{{ URL::asset('img/gallery/') . '/' . $logoarr[$i] }}">
                                                </a>
                                                <div class="jg-newsletter-caption">
                                                    <div class="jg-newsletter-caption-title">
                                                        {{ $namearr[$i] }}
                                                    </div>
                                                    <div class="jg-newsletter-caption-post">
                                                        Posted by {{ $postedarr[$i] . " " .  $datearr[$i]}}
                                                    </div>
                                                    <div class="jg-newsletter-caption-desc">
                                                        <?php
                                                        $summary = html_entity_decode($descarr[$i]);
                                                        $limit = 150;
                                                        if (strlen($summary) > $limit){
                                                            $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '...<br><a href="'. url($link) . '/' . $pageidarr[$i] .'" target="_blank">—Read More</a>';
                                                            echo $summary;
                                                        }
                                                        else{
                                                            echo $summary . '<br><a href="'. url($link) . '/' . $pageidarr[$i] .'" target="_blank">—Read More</a>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        @else
                        <div>
                            <center>
                                <h5>There's no newsletter.</h5>
                            </center>
                        </div>
                        @endif
                    </div>
                    @if($pag)
                        @if($numss > $numoflimit)
                            <div id="pagination-container-newsletter"></div>
                        @endif
                    @endif
                </div>

            <?php
                
            ?>
    <input type="hidden" id="numoflimits_newsletter" name="numoflimit" value="{{ $numoflimit }}">
    <input type="hidden" id="numofvalue_newsletter" value="{{ $numss }}">
    <input type="hidden" id="imguri" value="{{ URL::asset('img/gallery') }}">
    <input type="hidden" id="contenturi" value="{{ base_path().'/resources/views/jgcontents/page' }}">
    <input type="hidden" id="pagelink" value="{{ url($link) }}">
    <script>
    
    function newstemplate(data) {
        var html = "";
        $.each(data, function(index, item){
            var desc = "";
            if($.parseHTML(item['desc']).length > 150){
                desc = $.parseHTML(item['desc']).substring(0,150)+'...<br><a href="'+ $('#pagelink').val() + '/' + item['page_id'] +'" target="_blank">—Read More</a>';
            }
            else{
                desc = $.parseHTML(item['desc'])+'<br><a href="'+ $('#pagelink').val() + '/' + item['page_id'] +'" target="_blank">—Read More</a>';
            }
            html += '<div class="col-md-12">' +
            '<div class="jg-newsletter-thumbnail">' +
            '<a href="'+$('#pagelink').val()+"/"+item['page_id']+'"><img class="img-responsive pull-left" src="'+$('#imguri').val()+"/"+item['logo']+'"></a>'+
            '<div class="jg-newsletter-caption">'+
            '<div class="jg-newsletter-caption-title">' +
            item['name'] +
            '</div>' +
            '<div class="jg-newsletter-caption-post">' +
            'Posted by '+ item['post'] + ' ' + item['date'] +
            '</div>' +
            '<div class="jg-newsletter-caption-desc">' +
            desc +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        });
        return html;
    }
    var valarr = new Array();
    var arrval = new Array();
    
    arrval = [];
    for(var x = 0; x < $('#numofvalue_newsletter').val(); x++){
        valarr = {};
        valarr["logo"] = $('#jg-newsletter-logo'+x).val();
        valarr["name"] = $('#jg-newsletter-name'+x).val();
        valarr["desc"] = $('#jg-newsletter-desc'+x).val();
        valarr["date"] = $('#jg-newsletter-date'+x).val();
        valarr["post"] = $('#jg-newsletter-posted'+x).val();
        valarr["page_id"] = $('#jg-newsletter-pageid'+x).val();
        arrval.push(valarr);
    }
    
    $('#pagination-container-newsletter').pagination({
        dataSource: arrval,
        pageSize: $('#numoflimits_newsletter').val(),
        callback: function(data, pagination) {
            var html = newstemplate(data);
            $('#jg-newsletter-content').html(html);
        }
    });
    </script>

