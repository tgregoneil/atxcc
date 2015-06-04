<!-- index.php  -->
<?php 

    get_header(); 
    require_once 'Topics.php';
    require_once 'User.php';
    require_once 'Util.php';
    require_once 'Tags.php';

    $atxcc_tp = new Topics ();
    $atxcc_us = new User ();
    $atxcc_tg = new Tags ();

    $siteUrl = site_url ();

    $siteHome = preg_replace ('/https?:\/\/.*?\/(.*)/', '$1', $siteUrl);
    // echo "$siteHome", '<br />';
    
    $url = $_SERVER ['REQUEST_URI'];
    // echo "$url", '<br />';

        // string suffix of request uri
    $request = preg_replace ('/.*?' . $siteHome . '(.*)/', '$1', $url);

        // remove trailing '/', if present
    $request = preg_replace ('/\/?$/', '', $request);
    //echo "'$request'", '<br />';


    // var_dump ($_SERVER);

    switch ($request) {

        case '':
            $_SESSION ['err'] = '';
            $atxcc_tp -> topicsInit ();
            break;

        case '/signup':
            $atxcc_us->signupForm ($_SESSION ['err']);
            break;

        case '/alogin':
            $atxcc_us->loginForm ($_SESSION ['err']);
            break;

        case '/alogout':
            $atxcc_us->logout ();

            $server = $_SERVER ['SERVER_NAME'];
            $urlRedirect = 'http://' . $server . '/atxcc';

            Util::redirect ($urlRedirect);
            break;

        case '/tags':
            $atxcc_tg->tagsInit ();
            break;

        default:
            echo "'$request' not found";
            break;

    } // end switch ($_SERVER ['REQUEST_URI'])
        
    get_footer(); 
?>
<!-- END index.php  -->
