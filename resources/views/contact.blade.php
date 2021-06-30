@extends('layouts.app')
@section('content')
<title>Contact</title>
<div class="item">
	<h1 class="title">Contact</h1>
	<div class="contact_left">
		<div class="address">
			<ul class="blank">
				<li class="street">MANSARD<br />
					10, rue de la Paix<br />
					75002 Paris</li>
				<li class="country">France</li>
			</ul>
		</div>
		<div class="contact">
			<ul class="blank">
				<li><img src="../images/deco-site/mail.png" alt="mail" width="200" height="24" /></li>
				<li><img src="../images/deco-site/tel.png" alt="tel" width="200" height="24" /></li>
				<li><img src="../images/deco-site/fax.png" alt="fax" width="200" height="24" /></li>
			</ul>
		</div>
		<div class="contact_misc">
			<div>
				<!--Widgetmap-->
				<p>
				<div id="slideshow-2-60590eb46a535" class="wk-slideshow wk-slideshow-default" data-widgetkit="slideshow" data-options='{"index":0,"buttons":0,"navigation":0,"style":"default","autoplay":1,"interval":5000,"width":"auto","height":"auto","duration":500,"order":"default","slices":20,"animated":"fade","caption_animation_duration":500}'>
					<div>
						<ul class="slides">
							<li>
								<article class="wk-content clearfix"><img src="../images/slideshow-contact/pourmonchatontoutdouxdamour.jpg" alt="pourmonchatontoutdouxdamour" width="400" height="400" /></article>
							</li>
						</ul>
						<div class="caption"></div>
						<ul class="captions">
							<li></li>
						</ul>
					</div>
				</div>
				</p>
			</div>
		</div>
	</div>
	<div class="contact_right">
		<h3>{{__('Contact Form')}}</h3>
		<form class="submission box style" action="{{ route('send.email') }}" method="post" id="contact-form">
			@csrf

			<p>{{__('Send an Email. All fields with an asterisk (*) are required.')}}</p>
			<div>
				<label id="jform_contact_name-lbl" for="jform_contact_name" class="hasPopover required" title="Name" data-content="Your name.">
					{{__('Name')}}<span class="star">&#160;*</span></label>
				<input type="text" name="name" id="jform_contact_name" value="" class="required" size="30" required aria-required="true" />
			</div>
			<div>
				<label id="jform_contact_email-lbl" for="jform_contact_email" class="hasPopover required" title="Email" data-content="Email Address for contact.">
					{{__('Email')}}<span class="star">&#160;*</span></label>
				<input type="email" name="email" class="validate-email required" id="jform_contact_email" value="" size="30" autocomplete="email" required aria-required="true" />
			</div>
			<div>
				<label id="jform_contact_emailmsg-lbl" for="jform_contact_emailmsg" class="hasPopover required" title="Subject" data-content="Enter the subject of your message here.">
					{{__('Subject')}}<span class="star">&#160;*</span></label>
				<input type="text" name="subject" id="jform_contact_emailmsg" value="" class="required" size="60" required aria-required="true" />
			</div>
			<div>
				<label id="jform_contact_message-lbl" for="jform_contact_message" class="hasPopover required" title="Message (Please specify your phone number)" data-content="Enter your message here.">
					{{__('Message (Please specify your phone number)')}}<span class="star">&#160;*</span></label>
				<textarea name="content" id="jform_contact_message" cols="50" rows="10" class="required" required aria-required="true"></textarea>
			</div>
			<!-- <div class="formcontact-copy">
				<label id="jform_contact_email_copy-lbl" for="jform_contact_email_copy" class="hasPopover" title="Send a copy to yourself" data-content="Sends a copy of the message to the address you have supplied.">
					Send a copy to yourself</label>
				<input type="checkbox" name="jform[contact_email_copy]" id="jform_contact_email_copy" value="1" />
			</div> -->
			<!-- <div>
				<label id="jform_captcha-lbl" for="jform_captcha" class="hasPopover required" title="Captcha" data-content="Please complete the security check.">
					Captcha<span class="star">&#160;*</span></label>
				<div id="jform_captcha" class=" required g-recaptcha" data-sitekey="6LeS2hUUAAAAAGRo2nHkE7_Ee7Mfo5nPCv1EohIv" data-theme="light" data-size="normal" data-tabindex="0" data-callback="" data-expired-callback="" data-error-callback=""></div>
			</div> -->


			<div class="submit">
				<button class="button validate" type="submit">{{__('Send Email')}}</button>
			</div>
		</form>
		@if(session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message') }}
		</div>
		@endif
		<div class="contact_mlegale">
			COM_CONTACT_MLEGALE</div>
	</div>
</div>
@endsection