@include('inc.header')

<?php
    $hdbg = "";
    $numblocks = 0; //number of blocks. to use for identification
?>
@if(count($contentsubs) > 0)
    @foreach($contentsubs as $contentsub)
        @if($contentsub->content_name == "Header Background")
            <?php
                $hdbg = $contentsub->the_content;
            ?>  
        @endif
    @endforeach
@endif
<?php 
    $pageidme = "";
    $pagename = "";
    $pagedate = "";
?>
@if(count($pagemains1) > 0)
    @foreach($pagemains1 as $pagemain)
        <?php 
            $pageidme = $pagemain->page_id;
            $pagename = $pagemain->name;
            $pagedate = date('F j, Y, g:i a', strtotime($pagemain->created_at));
        ?>     
    @endforeach
@endif

<!-- Header -->
    <header class="masthead" style="background-image:url({{ URL::asset('img/gallery') .'/'. $hdbg }});">
      <div class="container">
        <div class="intro-text">
                <div class="intro-lead-in">
                    {{ $pagename }}
                </div>
                        
        </div>
      </div>
    </header>
    <section class="jg-news-middle">
        <div class="container">
            <div class="jg-news-middle-body">
                <div class="jg-news-middle-body-mid">
                    @if(count($contentsubs) > 0)
                        @foreach($contentsubs as $contentsub)
                            @if($contentsub->page_id == $pageidme)
                                @if($contentsub->content_name == "Posted_by")
                                <div class="posted">
                                    {{ "Posted by " . $contentsub->the_content . " " .  $pagedate }}
                                </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                    @if(count($contentsubs) > 0)
                        @foreach($contentsubs as $contentsub)
                            @if($contentsub->page_id == $pageidme)
                                @if($contentsub->content_name == "Logo")
                                <div class="row justify-content-md-center">
                                    <div class="col col-md-12">
                                        <img src="{{ URL::asset('img/gallery') .'/'. $contentsub->the_content }}" class="img-responsive logo"/>
                                    </div>
                                </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                    @if(count($contentsubs) > 0)
                    <?php
                        $file = "";
                                            ?>
                        @foreach($contentsubs as $contentsub)
                            @if($contentsub->page_id == $pageidme)
                                @if($contentsub->content_name == "Description")
                                    <?php
                                        $file = $contentsub->content_name;
                                    ?>
                                @endif
                            @endif
                        @endforeach
                            <div class="intro-heading">
                                @if(!empty($file))
                                    <?php
                                        $path = 'jgcontents.page' .$pageidme . '.' . $file;
                                    ?>
                                    @include($path)
                                @endif
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@include('inc.chat')
@include('inc.contactfooter')
@include('inc.footer')
        