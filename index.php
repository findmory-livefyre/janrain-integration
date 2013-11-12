<?php
?>
<!DOCTYPE html>

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0" />
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link href="http://cdn.quilt.janrain.com/2.1.4/quilt.css" media="all" rel="stylesheet" type="text/css" />
        <style type="text/css">
          .contentBoxWhiteShadow .btn_large {margin-top: 10px}
          .contentBoxDarkBlueTexture {border-radius: 0; padding-top: 50px; padding-bottom: 50px;}
          .contentBoxDarkBlueTexture h1 {padding-bottom: 25px;}
          .col_10 h2 {padding-top: 0;}
          .centered-col {float: none;margin: 0 auto; display: block;}
        </style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://d134l0cdryxgwa.cloudfront.net/backplane2.js"></script>
<script src="scripts/janrain-init.js"></script>
<script>

                        janrain.settings.capture.flowName = 'standard';
                        janrain.settings.language = 'en';
                        janrain.settings.capture.stylesheets = ['styles/janrain.css'];
                        janrain.settings.capture.mobileStylesheets = ['styles/janrain-mobile.css'];

                function janrainCaptureWidgetOnLoad() {
             		janrain.events.onCaptureLoginSuccess.addHandler(function(result) {
                		janrain.capture.ui.modal.close();
                		if (window.console && window.console.log) console.log(result) ;
                		document.getElementById("captureSignInLink").style.display = 'none';
                		document.getElementById("captureSignOutLink").style.display = '';
                		document.getElementById("captureProfileLink").style.display = '';
            		});

            		janrain.events.onCaptureSessionFound.addHandler(function(result) {
                		janrain.capture.ui.modal.close();
                		if (window.console && window.console.log) console.log(result);
                		document.getElementById("captureSignInLink").style.display = 'none';
                		document.getElementById("captureSignOutLink").style.display = '';
                		document.getElementById("captureProfileLink").style.display = '';
            		});

            		janrain.events.onCaptureRegistrationSuccess.addHandler(function(result) {
                		janrain.capture.ui.modal.close();
                		if (window.console && window.console.log) console.log(result);
                		document.getElementById("captureSignInLink").style.display = 'none';
                		document.getElementById("captureSignOutLink").style.display = '';
                		document.getElementById("captureProfileLink").style.display = '';
            		});

            		janrain.events.onCaptureSessionEnded.addHandler(function(result) {
                		document.getElementById("captureSignInLink").style.display = '';
                		document.getElementById("captureSignOutLink").style.display = 'none';
                		document.getElementById("captureProfileLink").style.display = 'none';
            		});

            		janrain.events.onCaptureScreenShow.addHandler(function(result) {
                		if (result.screen == "returnTraditional") {
                    		janrainReturnExperience();
                		}
            		});
                        janrain.events.onCaptureBackplaneReady.addHandler(function(result){ 
                            console.log("backplane ready");

                        });
			janrain.capture.ui.start();
		
                }
</script>
    </head>
    <body class="janrain-font">
        <div class="global_nav">
            <div class="wrapper">
                <ul id="loggedOutNavigation" class="nav-list">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#" id="captureSignInLink" class="capture_modal_open">Sign In / Sign Up</a></li>
                  <li><a href="edit-profile.html" id="captureProfileLink" style="display:none">Edit Profile</a><br /><br /></li>
                  <li><a href="#" id="captureSignOutLink" class="capture_end_session" style="display:none">Sign Out</a></li>
                </ul>
            </div>
        </div>
        <div class="contentBoxDarkBlueTexture">
            <div class="wrapper">
                <h1 class="lrg centerText">Welcome to the Janrain Demo Site. <br /> We are testing Janrain Capture integrated with Livefyre</h1>
            </div>
        </div>
    <!-- Capture widget screens -->
    <div style="display:none;" id="signIn">
        <div class="capture_header">
            <h1>Sign Up / Sign In</h1>
        </div>
        <div class="capture_signin">
            <h2>With your existing account from...</h2>
            {* loginWidget *} <br />
        </div>
        <div class="capture_backgroundColor">
            <div class="capture_signin">
                <h2>With a traditional account...</h2>
                {* #userInformationForm *}
                    {* traditionalSignIn_emailAddress *}
                    {* traditionalSignIn_password *}
                    <div class="capture_form_item">
                        <a href="#" data-capturescreen="forgotPassword">Forgot your password?</a>
                    </div>
                    <div class="capture_rightText">
                        {* traditionalSignIn_signInButton *}{* traditionalSignIn_createButton *}
                    </div>
                {* /userInformationForm *}
            </div>
        </div>
    </div>
    <div style="display:none;" id="returnSocial">
        <div class="capture_header">
            <h1>Sign In</h1>
        </div>
        <div class="capture_signin">
            <h2>Welcome back, {* welcomeName *}!</h2>
            {* loginWidget *}
            <div class="capture_centerText switchLink"><a href="#" data-cancelcapturereturnexperience="true">Use another account</a></div>
        </div>
    </div>
    <div style="display:none;" id="returnTraditional">
        <div class="capture_header">
            <h1>Sign In</h1>
        </div>
        <h2 class="capture_centerText"><span id="traditionalWelcomeName">Welcome back!</span></h2>
        <div class="capture_backgroundColor">
            {* #userInformationForm *}
                {* traditionalSignIn_emailAddress *}
                {* traditionalSignIn_password *}
                <div class="capture_form_item capture_rightText">
                    {* traditionalSignIn_signInButton *}
                </div>
            {* /userInformationForm *}
            <div class="capture_centerText switchLink"><a href="#" data-cancelcapturereturnexperience="true">Use another account</a></div>
        </div>
    </div>
    <div style="display:none;" id="socialRegistration">
        <div class="capture_header">
            <h1>Almost Done!</h1>
        </div>
        <h2>Please confirm the information below before signing in.</h2>
        {* #socialRegistrationForm *}
            {* socialRegistration_firstName *}
            {* socialRegistration_lastName *}
            {* socialRegistration_emailAddress *}
            {* socialRegistration_displayName *}
            By clicking "Sign in", you confirm that you accept our <a href="#">terms of service</a> and have read and understand <a href="#">privacy policy</a>.
            <div class="capture_footer">
                <div class="capture_left">
                    {* backButton *}
                </div>
                <div class="capture_right">
                    {* socialRegistration_signInButton *}
                </div>
            </div>
        {* /socialRegistrationForm *}
    </div>
    <div style="display:none;" id="registrationNewVerification">
        <div class="capture_header">
            <h1>Thank you for registering!</h1>
        </div>
        <p>We have sent a confirmation email to {* emailAddressData *}. Please check your email and click on the link to activate your account.</p>
        <div class="capture_footer">
            <a href="#" onclick="window.location.reload()" class="capture_btn capture_primary">Close</a>
        </div>
    </div>
    <div style="display:none;" id="traditionalRegistration">
        <div class="capture_header">
            <h1>Almost Done!</h1>
        </div>
        <p>Please confirm the information below before signing in. Already have an account? <a href="#" data-capturescreen="signIn">Sign In.</a></p>
        {* #registrationForm *}
            {* traditionalRegistration_firstName *}
            {* traditionalRegistration_lastName *}
            {* traditionalRegistration_emailAddress *}
            {* traditionalRegistration_password *}
            {* traditionalRegistration_passwordConfirm *}
            {* traditionalRegistration_displayName *}
            By clicking "Create Account", you confirm that you accept our <a href="#">terms of service</a> and have read and understand <a href="#">privacy policy</a>.
            <div class="capture_footer">
                <div class="capture_left">
                    {* backButton *}
                </div>
                <div class="capture_right">
                    {* createAccountButton *}
                </div>
            </div>
        {* /registrationForm *}
    </div>
    <div style="display:none;" id="forgotPassword">
        <div class="capture_header">
            <h1>Create a new password</h1>
        </div>
        <h2>We'll send you a link to create a new password.</h2>
        {* #forgotPasswordForm *}
            {* traditionalSignIn_emailAddress *}
            <div class="capture_footer">
                <div class="capture_left">
                    {* backButton *}
                </div>
                <div class="capture_right">
                    {* forgotPassword_sendButton *}
                </div>
            </div>
        {* /forgotPasswordForm *}
    </div>
    <div style="display:none;" id="forgotPasswordSuccess">
        <div class="capture_header">
            <h1>Create a new password</h1>
        </div>
            <p>We've sent an email with instructions to create a new password. Your existing password has not been changed.</p>
        <div class="capture_footer">
            <a href="#" onclick="janrain.capture.ui.modal.close()" class="capture_btn capture_primary">Close</a>
        </div>
    </div>
    <div style="display:none;" id="mergeAccounts">
        {* mergeAccounts *}
    </div>
    <div style="display:none;" id="traditionalAuthenticateMerge">
        <div class="capture_header">
            <h1>Sign in to complete account merge</h1>
        </div>
        <div class="capture_signin">
            {* #tradAuthenticateMergeForm *}
                {* traditionalSignIn_emailAddress *}
                {* mergePassword *}
                <div class="capture_footer">
                    <div class="capture_left">
                        {* backButton *}
                    </div>
                    <div class="capture_right">
                        {* traditionalSignIn_signInButton *}
                    </div>
                </div>
             {* /tradAuthenticateMergeForm *}
        </div>
    </div>
        <script>
            janrain.settings.capture.backplane = true;
            janrain.settings.capture.backplaneBusName = 'livefyre_demo';
            janrain.settings.capture.backplaneVersion = 2;
            janrain.settings.capture.backplaneBlock = 20;
	    janrain.settings.capture.backplaneServerBaseUrl='https://janrain-livefyre-demo.janrainbackplane.com/v2'
        </script>
