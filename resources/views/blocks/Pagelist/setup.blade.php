
<div class="form-group">
    <div class="row">
    <label for="parent" class="col-md-2 control-label" style="background:none;box-shadow:none;color:black;">Show:</label>
        <div class="col-md-4">
        	<div class="jg-checkbox-show">
	    	    
			<?php
                $convalshows = array();
                $chall = "";
                $firstprint = true;
                $pagchkyes = "";
                $pagchkno = "Checked";
            ?>
			@if(count($contentsub->content_show) > 0)
				<?php
					$convalshows = explode(",",$contentsub->content_show);
				?>
			@endif

            @if(!empty($contentsub->pagination))
                @if($contentsub->pagination == "yes")
                    <?php
                        $pagchkyes = "Checked";
                        $pagchkno = "";
                    ?>
                @else
                    <?php
                        $pagchkyes = "";
                        $pagchkno = "Checked";
                    ?>
                @endif
            @endif

			@foreach($convalshows as $convalshow)
				@if($convalshow == 'all')
					<?php $chall = "Checked"?>
				@endif
			@endforeach
				<div class="checkbox">
			      <label><input type="checkbox" id="chpagetypeall" name="cbpagetype[]" value="all" {{ $chall }}>ALL</label>
			    </div>

			@if(count($pagetypes) > 0)
                @foreach($pagetypes->all() as $pagetype)
                	<?php $conbol = false; ?>
                	<?php $chbx = ""; ?>
                	<?php $chbx0 = "";
                        
                     ?>
                    @if(count($convalshows) > 0)
                    	@foreach($convalshows as $convalshow)
                    		@if($firstprint)
                    			@if($convalshow == '0')
                    				<?php $chbx0 = 'Checked' ?>
                    			@endif
                    		@endif
                    		@if($convalshow == $pagetype->id)
                    			<?php $chbx = 'Checked' ?>
                    		@endif

                    		@if($convalshow == "all")
                    			<?php $chbx = 'Checked' ?>
                    		@endif
                    	@endforeach
                    @endif
                	@if($firstprint)
                		<div class="checkbox">
					      <label><input type="checkbox" class="jg-checkbox" name="cbpagetype[]" value="0" {{ $chbx0 }}>None</label>
					    </div>
					    <?php $firstprint = false; ?>
                	@endif
                	<div class="checkbox">
				      <label><input type="checkbox" class="jg-checkbox" name="cbpagetype[]" value="{{ $pagetype->id }}" {{ $chbx }}>{{ $pagetype->page_category }}</label>
				    </div>
				@endforeach
			@endif
			    
			</div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <label for="parent" style="background:none;box-shadow:none;color:black;">No. of Items:</label>
            </div>
            <div class="row">
                <label for="parent" style="background:none;box-shadow:none;color:black;">Allow Pagination:</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <?php $contval = ""; ?>
                @if(count($contentsub->num_of_items) > 0)
                    <?php $contval = $contentsub->num_of_items; ?>
                @endif
                <input type="text" class="form-control" name="numlimit" value="{{ $contval }}" placeholder="Number if items"/>
            </div>

            <div class="row">
                <div class="col col-md-6 jg-setup-radiob">
                    <label class="radio-inline"><input type="radio" name="radbtn" value="yes" {{ $pagchkyes }}>Yes</label>
                </div>
                <div class="col col-md-6 jg-setup-radiob">
                    <label class="radio-inline"><input type="radio" name="radbtn" value="off" {{ $pagchkno }}>No</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    
        <div class="col-lg-10">
    	    <select class="form-control" id="area3" name="area3">
            @if(count($contentsub->the_content) > 0)
                <option value="{{$contentsub->the_content}}">{{$contentsub->the_content}}(In Used)</option>
            @else
                <option value="">Please select a style</option>
            @endif
            <?php
                                                    
                $blocks = array_map('basename', File::directories('../resources/views/blocks/' . $contentmain->defaultvalue . '/templates'));
                foreach ($blocks as $block) {
            ?>
        	        <option value="{{ $block }}">{{ $block }}</option>
            <?php
            	}
            ?>

            </select>
        </div>
</div>