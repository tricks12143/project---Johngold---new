<?php 
    $convalshows = array();
    $logoarr = array();
    $namearr = array();
    $companyarr = array();
    $emailarr = array();
    $posarr = array();
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
                @if($contentsub->content_name == "Teamviewer")
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
                        $position = "";
                        $company = "";
                        $email = "";
                        ?>
                        @if(count($contentsubs1) > 0)
                            @foreach($contentsubs1 as $contentsub)
                                @if($contentsub->page_id == $pagemain->page_id)
                                  
                                    @if($contentsub->content_name == 'Logo')
                                        <?php $img = $contentsub->the_content; ?>
                                    @endif
                                    @if($num == 0)
                                        <?php $name = $pagemain->name;?>
                                        <?php $num++; ?>
                                    @endif
                                    @if($contentsub->content_name == 'Position')
                                        <?php $position = $contentsub->the_content; ?>
                                    @endif
                                    @if($contentsub->content_name == 'Company')
                                        <?php $company = $contentsub->the_content; ?>
                                    @endif
                                    @if($contentsub->content_name == 'Email')
                                        <?php $email = $contentsub->the_content; ?>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                            <input type="hidden" id="jg-team-logo{{ $numss }}" value="{{ $img }}">
                            <input type="hidden" id="jg-team-name{{ $numss }}" value="{{ $name }}">
                            <input type="hidden" id="jg-team-position{{ $numss }}" value="{{ $position }}">
                            <input type="hidden" id="jg-team-company{{ $numss }}" value="{{ $company }}">
                            <input type="hidden" id="jg-team-email{{ $numss }}" value="{{ $email }}">
                                        
                        <?php
                            $logoarr[] = $img;
                            $namearr[] = $name;
                            $companyarr[] = $company;
                            $posarr[] = $position;
                            $emailarr[] = $email;
                            $numss++;
                        ?>
                    @endif
                @endforeach
            @endforeach
        @endif
   
    <div class="row">
        <div class="data-container-team row" id="data-container-team">
        
        @for($i = 0; $i < $numss; $i++)
            @if($x < $numoflimit)
                <div class="col-sm-4">
                    <div class="team-member">
                        <div class="row">
                            <div class="col-md-10 jg-team-viewer">
                                <img class="mx-auto rounded-circle jg-team-img" src="{{ URL::asset('img/gallery') .'/'. $logoarr[$i] }}" alt="">
                                    <h5>{{ $namearr[$i] }}</h5>
                                    <b class="text-muted jg-team-position">{{ $posarr[$i] }}</b>
                                    <p class="text-muted jg-team-company">{{ $companyarr[$i] }}</p>
                                    <span class="text-muted jg-team-company">{{ $emailarr[$i] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <?php $x++;?>
        @endfor
            
        </div>
        @if($pag)
            @if($numss > $numoflimit)
                <div class="jg-pagination" id="pagination-container-team"></div>
            @endif
        @endif
    </div>


    <input type="hidden" id="numoflimits_team" name="numoflimit" value="{{ $numoflimit }}">
    <input type="hidden" id="numofvalue_team" value="{{ $numss }}">
    <input type="hidden" id="imguri" value="{{ URL::asset('img/gallery') }}">

    <script>
    function teamtemplate(data) {
        var html = "";
        $.each(data, function(index, item){
            html += '<div class="col-sm-4">' +
            '<div class="team-member">' +
            '<div class="row">' +
            '<div class="col-md-10 jg-team-viewer">' +
            '<img class="mx-auto rounded-circle jg-team-img" src="' + $('#imguri').val() + '/' + item['logo'] + '" alt="">' +
            '<h5>'+ item['name'] +'</h5>' +
            '<b class="text-muted jg-team-position">' + item['position'] + '</b>'+
            '<p class="text-muted jg-team-company">' + item['company'] + '</p>' +
            '<span class="text-muted jg-team-company">'+ item['email'] +'</span>'+
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
    for(var x = 0; x < $('#numofvalue_team').val(); x++){
        valarr = {};
        valarr["logo"] = $('#jg-team-logo'+x).val();
        valarr["name"] = $('#jg-team-name'+x).val();
        valarr["position"] = $('#jg-team-position'+x).val();
        valarr["company"] = $('#jg-team-company'+x).val();
        valarr["email"] = $('#jg-team-email'+x).val();
        arrval.push(valarr);
    }
    
    $('#pagination-container-team').pagination({
        dataSource: arrval,
        pageSize: $('#numoflimits_team').val(),
        callback: function(data, pagination) {
            var html = teamtemplate(data);
            $('#data-container-team').html(html);
        }
    });
    </script>