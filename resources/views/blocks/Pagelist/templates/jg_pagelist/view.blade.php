    
    
    <?php 
    $convalshows = array();
    $value = array();
    $pagelink = array();
    $link = "";
    $numoflimit = "";
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
                @if($contentsub->content_name == "Affiliation")
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
            @if($pagemain->page_id != $pageidme)
                @foreach($convalshows as $convalshow)
                    @if($pagemain->pagetype_id == $convalshow)
                            @if(count($contentsubs1) > 0)
                                @foreach($contentsubs1 as $contentsub)
                                    @if($contentsub->page_id == $pagemain->page_id)
                                        @if($contentsub->content_name == 'Logo')
                                            <input type="hidden" id="getvalue_pagelist_{{ $numss }}" value="{{ $contentsub->the_content }}">
                                            <input type="hidden" id="getvalue_pagelist_pagelink_{{ $numss }}" value="{{ $pagemain->page_id }}">
                                            <?php
                                            $pagelink[] = $pagemain->page_id;
                                            $value[] = $contentsub->the_content;
                                            $numss++;
                                            ?>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                    @endif
                @endforeach
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


    <div class="sponsor" >
    	<div class="container">
            <div class="contents row" id="data-container-pagelist">
                @for($i = 0; $i < $numss; $i++)
                    @if($x < $numoflimit)
                        <div class="col col-md-4">
                            <a href="{{ url($link) . '/' . $pagelink[$i] }}" target="_blank">
                                <div class="sponsor-img jg-img-gallery">
                                    <img src="{{ URL::asset('img/gallery') . '/' . $value[$i] }}" class="img-responsive"/>
                                </div>
                            </a>
                        </div>
                    @endif
                    <?php $x++; ?>
                @endfor
    		</div>
            @if($pag)
                @if($numss > $numoflimit)
                    <div id="pagination-container-pagelist"></div>
                @endif
            @endif
    	</div>
    </div>

    <input type="hidden" id="numoflimits_pagelist" name="numoflimit" value="{{ $numoflimit }}">
    <input type="hidden" id="numofvalue_pagelist" value="{{ $numss }}">
    <input type="hidden" id="imguri" value="{{ URL::asset('img/gallery') }}">
    <input type="hidden" id="pagelink" value="{{ url($link) }}">
    <script>
    function pagelisttemplate(data) {
        var html = "";
        $.each(data, function(index, item){
            html += '<div class="col col-md-4"><a href="' + $('#pagelink').val() + '/' + item['pageid'] + '"><div class="sponsor-img jg-img-gallery"><img src="' + $('#imguri').val() + '/'+ item['logo'] +' " class="img-responsive"/></div></a></div>';
        });
        return html;
    }
    var valarr = new Array();
    var arrval = new Array();
    
    arrval = [];
    for(var x = 0; x < $('#numofvalue_pagelist').val(); x++){
        valarr = {};
        valarr["logo"] = $('#getvalue_pagelist_'+x).val();
        valarr["pageid"] = $('#getvalue_pagelist_pagelink_'+x).val();
        arrval.push(valarr);
    }
    
    $('#pagination-container-pagelist').pagination({
        dataSource: arrval,
        pageSize: $('#numoflimits_pagelist').val(),
        callback: function(data, pagination) {
            var html = pagelisttemplate(data);
            $('#data-container-pagelist').html(html);
        }
    });
    </script>