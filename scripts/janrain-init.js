/*
Janrain initializations and settings for JUMP.

For more information about these settings, see the following documents:

    http://developers.janrain.com/documentation/widgets/social-sign-in-widget/social-sign-in-widget-api/settings/
    http://developers.janrain.com/documentation/widgets/user-registration-widget/capture-widget-api/settings/
    http://developers.janrain.com/documentation/widgets/social-sharing-widget/sharing-widget-js-api/settings/


    this comes from their login page:  http://customer-dev.janrain.com/widgets/493a755cf999/index.html
*/

(function() {
    if (typeof window.janrain !== 'object') window.janrain = {};
    window.janrain.settings = {};
    window.janrain.settings.capture = {};

    janrain.settings.packages = ['login', 'capture'];

    // --- Engage Widget -------------------------------------------------------

    janrain.settings.language = 'en';
    janrain.settings.appUrl = 'https://janrain-livefyre-demo.rpxnow.com';
    janrain.settings.tokenUrl = 'http://localhost/';
    janrain.settings.tokenAction = 'event';
    janrain.settings.borderColor = '#ffffff';
    janrain.settings.fontFamily = 'Helvetica, Lucida Grande, Verdana, sans-serif';
    janrain.settings.width = 300;
    janrain.settings.actionText = ' ';

    // --- Capture Widget ------------------------------------------------------

    janrain.settings.capture.appId = 'bzjumn8xcerp2djkj26hh7uvt8';
    janrain.settings.capture.captureServer = 'https://janrain-livefyre-demo.janraincapture.com';
    janrain.settings.capture.redirectUri = 'http://localhost/';
    janrain.settings.capture.clientId = 'c3dn8ebqcunyxxzd9z9zt9tymkb9ex8e';
    janrain.settings.capture.flowVersion = 'HEAD';
    janrain.settings.capture.registerFlow = 'socialRegistration';
    janrain.settings.capture.setProfileCookie = true;
    janrain.settings.capture.keepProfileCookieAfterLogout = true;
    janrain.settings.capture.modalCloseHtml = '<span class="janrain-icon-16 janrain-icon-ex2"></span>';
    janrain.settings.capture.noModalBorderInlineCss = true;
    janrain.settings.capture.responseType = 'token';
    janrain.settings.capture.returnExperienceUserData = ['displayName'];

    // --- Mobile WebView ------------------------------------------------------

    //janrain.settings.capture.redirectFlow = true;
    //janrain.settings.popup = false;
    //janrain.settings.tokenAction = 'url';
    //janrain.settings.capture.registerFlow = 'socialMobileRegistration'

    // --- Federate  -----------------------------------------------------------

    //janrain.settings.capture.federate = true;
    //janrain.settings.capture.federateServer = '';
    //janrain.settings.capture.federateXdReceiver = '';
    //janrain.settings.capture.federateLogoutUri = '';
    //janrain.settings.capture.federateLogoutCalllback = function() {};
    //janrain.settings.capture.federateEnableSafari = false;

    // --- Backplane -----------------------------------------------------------

    //janrain.settings.capture.backplane = true;
    //janrain.settings.capture.backplaneBusName = '';
    //janrain.settings.capture.backplaneVersion = 2;
    //janrain.settings.capture.backplaneBlock = 20;

    // --- Share widget --------------------------------------------------------

    //janrain.settings.share = {};
    //janrain.settings.packages.push('share');
    //janrain.settings.share.message = "";
    //janrain.settings.share.title = "";
    //janrain.settings.share.url = "";
    //janrain.settings.share.description = "";

    // --- Load URLs -----------------------------------------------------------

    var httpsLoadUrl = "https://rpxnow.com/load/janrain-livefyre-demo";
    var httpLoadUrl = "http://widgets-cdn.rpxnow.com/load/janrain-livefyre-demo";

    var httpsShareLoadUrl = "https://rpxnow.com/js/lib/janrain-livefyre-demo/share_beta.js'";
    var httpShareLoadUrl = "http://widget-cdn.rpxnow.com/js/lib/janrain-livefyre-demo/share_beta.js";

    // --- DO NOT EDIT BELOW THIS LINE -----------------------------------------

    function isReady() { janrain.ready = true; };
    if (document.addEventListener) {
        document.addEventListener("DOMContentLoaded", isReady, false);
    } else {
        window.attachEvent('onload', isReady);
    }

    var e = document.createElement('script');
    e.type = 'text/javascript';
    e.id = 'janrainAuthWidget';
    if (document.location.protocol === 'https:') {
        e.src = httpsLoadUrl;
    } else {
        e.src = httpLoadUrl;
    }
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(e, s);

    if (typeof window.janrain.settings.share === 'object') {
        var e = document.createElement('script');
        e.type = 'text/javascript';
        e.id = 'janrainWidgets';
        if (document.location.protocol === 'https:') {
            e.src = httpsShareLoadUrl;
        } else {
            e.src = httpShareLoadUrl;
        }
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(e, s);
    }
})();

function janrainReturnExperience() {
    var span = document.getElementById('traditionalWelcomeName');
    var name = janrain.capture.ui.getReturnExperienceData("displayName");
    if (span && name) {
        span.innerHTML = "Welcome back, " + name + "!";
    }
}
