<!DOCTYPE html>
<html>
    <head>
        <title>CMS-JohnGold</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-johngold-style.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('css/editpage-johngold-style.css') }}" />

    </head>

    <body>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <ul class="cd-accordion-menu animated">
            <!--<li class="has-children">
                <input type="checkbox" name ="group-1" id="group-1" checked>
                <label for="group-1">Header</label>

                <ul>
                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-1" id="sub-group-1">
                        <label for="sub-group-1">Sub Group 1</label>

                        <ul>
                            <li><a href="#0">Image</a></li>
                            <li><a href="#0">Image</a></li>
                            <li><a href="#0">Image</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <input type="checkbox" name ="sub-group-2" id="sub-group-2">
                        <label for="sub-group-2">Sub Group 2</label>

                        <ul>
                            <li class="has-children">
                                <input type="checkbox" name ="sub-group-level-3" id="sub-group-level-3">
                                <label for="sub-group-level-3">Sub Group Level 3</label>

                                <ul>
                                    <li><a href="#0">Image</a></li>
                                    <li><a href="#0">Image</a></li>
                                </ul>
                            </li>
                            <li><a href="#0">Image</a></li>
                        </ul>
                    </li>
                    <li><a href="#0">Image</a></li>
                    <li><a href="#0">Image</a></li>
                </ul>
            </li>

            <li class="has-children">
                <input type="checkbox" name ="group-2" id="group-2">
                <label for="group-2">Body</label>

                <ul>
                    <li><a href="#0">Image</a></li>
                    <li><a href="#0">Image</a></li>
                </ul>
            </li>

            <li class="has-children">
                <input type="checkbox" name ="group-3" id="group-3">
                <label for="group-3">Footer</label>

                <ul>
                    <li><a href="#0">Image</a></li>
                    <li><a href="#0">Image</a></li>
                </ul>
            </li>-->
            <?php
                $num=0;
                $nums=0;

            ?>
            @if(count($contentsubs) > 0)
                @foreach($contentsubs->all() as $contentsub)

                    @if(count($contentmains) > 0)
                        @foreach($contentmains->all() as $contentmain)

                            @if($contentmain->content_id == $contentsub->content_id)
                                

                                <li><a href="#" class="jg-sidenav-editmode"  data-toggle="modal" data-target="#editcontentmodal<?php echo $num?>">{{ $contentmain->content_name }}</a></li>

                                <!-- Modal -->
                                <div id="editcontentmodal<?php echo $num?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Information form</h4>
                                      </div>
                                      <div class="modal-body">

                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/dashboard/insertcontentvalue') }}">
                                            {{csrf_field()}}

                                            @if(count($pagemains1) > 0)
                                                @foreach($pagemains1->all() as $pagemain)
                                                    <input type="hidden" name="pgi" id="pgi" value="{{ $pagemain->page_id }}">

                                                @endforeach
                                            @endif
                                            <input type="hidden" name="contentname" id="contentname" value="{{ $contentmain->content_name }}">
                                            <input type="hidden" name="contentid" value="{{ $contentsub->id }}"/>
                                            <input type="hidden" name="contenttype" value="{{ $contentmain->type }}"/>
                                            <div class="col col-md-12">

                                                @if($contentmain->type == "text")
                                                    <input type="text" class="form-control" id="area3" name="area3" placeholder="{{ $contentmain->content_name }}" value="{{ $contentsub->the_content }}">
                                                @elseif($contentmain->type == "paragraph")
                                                <div class="jg-texteditor">
                                                    <!--<button type="button" class="btn btn-primary" onclick="clksource()">Source</button>
                                                    <textarea style="row:3" id="txtsource"></textarea>-->
                                                    <textarea name="area3" id="area3{{ $nums }}" style="width: 930px; height: 100%;">
                                                        <?php

                                                            $file = $contentmain->content_name;
                                                            $path = 'jgcontents.page' .$pagemain->page_id . '.' . $file;

                                                        ?>
                                                        @if(count($contentmain->content_name) > 0)
                                                            @include($path)
                                                        @endif
                                                        
                                                    </textarea>
                                                </div>
                                                <?php $nums++; ?>
                                                @elseif($contentmain->type == "image")
                                                    <input type="file" class="form-control" id="area3" name="area3" value="" onchange="readURL(this);">
                                                    <img src="{{ URL::asset('img/gallery') .'/'. $contentsub->the_content }}" id="previewpic" class="img-responsive logo"/>
                                                @elseif($contentmain->type == "block")
                                                <?php
                                                    $blockpath = 'blocks.'.$contentmain->defaultvalue.'.setup';
                                                ?>
                                                @include($blockpath)
                                                    
                                                @endif
                                            </div>
                                        
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                                <?php $num++?>
                            @endif
                            
                        @endforeach
                    @endif

                @endforeach
            @endif

            <input type="hidden" id="tacount" value="{{$nums}}">
            
        </ul> <!-- cd-accordion-menu -->

        <!-- Trigger the modal with a button -->
        <a href="#" data-toggle="modal" data-target="#myModal" style="text-align: center;">Contents</a>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Choose Content</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>
              <div class="modal-body">
                <div class="edit-content-modal-container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="edit-content-modal-left">
                                <a href="#">Contents</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="edit-content-modal-right">
                                <form class="form-horizontal" method="POST" action="{{ url('/dashboard/insertcontentsub') }}">
                                    {{csrf_field()}}
                                    @if(count($pagemains1) > 0)
                                        @foreach($pagemains1->all() as $pagemain)
                                            <input type="hidden" name="pgi" id="pgi" value="{{ $pagemain->page_id }}">
                                        @endforeach
                                    @endif
                                    <?php
                                        $ch = "";
                                    ?>
                                    @if(count($contentmains) > 0)
                                        @foreach($contentmains->all() as $contentmain)
                                        <?php $ch = "";?>
                                            @if(count($contentsubs) > 0)
                                                @foreach($contentsubs->all() as $contentsub)

                                                    @if($contentsub->content_id == $contentmain->content_id)
                                                        <?php
                                                            $ch = 'checked';
                                                        ?>
                                                    @endif
                                                @endforeach
                                            @else

                                                <?php
                                                    $ch = "";
                                                ?>

                                            @endif
                                            <div class="col col-md-4">
                                                <input id="{{ $contentmain->content_id }}" name="typecontents[]" type="checkbox" class="johngold-edit-page-checkbox" value="{{ $contentmain->content_id }}"{{ $ch }}/>
                                                <label for="{{ $contentmain->content_id }}" class="johngold-edit-page-label">{{ $contentmain->content_name }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnsubmit">SAVE</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
    </div>

    <div class="editpage-nav">
        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()" class="opennav"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
        <span class="exitedit"><a href='{{ url("/dashboard/") }}'><i class="fa fa-times" aria-hidden="true"></i></a></span>
    </div>
    <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
    <div id="main">
    
        