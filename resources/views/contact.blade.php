
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
<?php $pageidme = "";
    $email = "";
?>
@if(count($pagemains1) > 0)
    @foreach($pagemains1 as $pagemain)
    <?php $pageidme = $pagemain->page_id;?>   
    @endforeach
@endif

@if(count($contentsubs) > 0)
        @foreach($contentsubs as $contentsub)
          @if($contentsub->page_id == $pageidme)
            @if($contentsub->content_name == "Email")
              <?php $email = $contentsub->the_content ?>
            @endif
          @endif
        @endforeach
      @endif
	
	<!-- Header -->
    <header class="masthead jg-other-header" style="background-image:url({{ URL::asset('img/gallery') .'/'. $hdbg }});">
      <div class="container">
        
      @if(count($contentsubs) > 0)
        @foreach($contentsubs as $contentsub)
          @if($contentsub->page_id == $pageidme)
            @if($contentsub->content_name == "Title")
              <div class="intro-text">
                  <div class="intro-lead-in">{{ $contentsub->the_content }}</div>
                </div>
            @endif
          @endif
        @endforeach
      @endif
      </div>
    </header>

    <!-- Contact -->
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Tell us what's on your mind</h2>
            <h3 class="section-subheading text-muted">Don't let your dreams be dreams.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <input type="hidden" id="sendemail" name="sendemail" value="{{ $email }}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-xl jg-btn" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    
		<input type="hidden" id="contacturi" value="{{url('/mail')}}">
@include('inc.chat')
@include('inc.footer')
		