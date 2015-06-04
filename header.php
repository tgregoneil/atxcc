<?php    // header.php

session_start ();

require_once 'User.php';
$atxcc_us = new User ();

?>

<!--header.php-->

<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css">
<script src="<?php echo get_template_directory_uri();?>/js/jsRefs/_start.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jsRefs/init.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jsRefs/events.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jsRefs/debug.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jsRefs/_debug.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jsRefs/model.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jsRefs/util.js"></script>

</head>
<body id='zbody'>
    <div class='navbar navbar-default navbar-static-top'> 
        <div class="container">
            <ul class='nav navbar-nav navbar-left'>
                <li class='zmenu'> <a href='<?php echo site_url ();?>'>Home</a> </li>

                <?php
                    if ($atxcc_us->isLoggedIn) {

                        ?>
                            <li class='zmenu'> <a href='<?php echo site_url ();?>/tags'>Tags</a> </li>
                            <li class='zmenu'> <a href='<?php echo site_url ();?>/alogout'>Log out</a> </li>
                            <li class='zmenu'><a id='zuser' name='<?php echo $atxcc_us->username; ?>'href='<?php echo site_url ();?>'><?php echo 'Hello ' . $atxcc_us->username; ?></a> </li>
                        <?php
                        

                    } else {

                        ?>
                            <li class='zmenu'> <a href='<?php echo site_url ();?>/signup'>Sign up</a> </li>
                            <li class='zmenu'> <a href='<?php echo site_url ();?>/alogin'>Log in</a> </li>
                        <?php
                        

                    } // end if ($atxcc_us -> isLoggedIn)
                    
                ?>

                <li id='zsearch'> <form><input id='zsearchinput' type='text' placeholder='Search'/></form> </li>
            </ul>
        </div>
    </div>

    <div id='agendasection' class='container'>
<!--END header.php-->
