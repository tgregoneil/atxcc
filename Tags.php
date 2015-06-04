<?php    // Tags.php
require_once 'DatabaseUsPsDb.php';

class Tags {
    
    //---------------------
    function __construct () {

        global $atxcc_db;
        $atxcc_db = new Database ('tgregone_atxcc', 'tgregone_atxcc', 'tgregone_atxcc$', 'localhost');
        
    } // end __construct ()

    
    
    //---------------------
    function tagsInit () {

        ?>
        <div id='tagitems'>
            <h1 id='tagheader'>Alerts</h1>

            <?php 
                $this->alertsShow ()
            ?>

        </div>

        <?php
    } // end topicsInit ()

    //---------------------
    function alertsShow () {

        $tags = $this->getAlerts ($_SESSION ['user']);

        ?>
            <div id='ztags'>
            <table class='table table-striped table-hover table-bordered'>
                <tbody>
                    <tr id='ztagsheader'>
                        <th id='ztag'>Tag</th>
                        <th id='ztmobile'>Mobile?</th>
                        <th id='ztemail'>Email?</th>
                    </tr>

                        
                    <?php
                    $this -> tagsShowContent ($tags);
                    ?>

                </tbody>
            </table>
            </div>

        <?php

    } // end function topicsShow ()

    
    //---------------------
    function tagsShowContent ($tags) {

        foreach ($tags as $tag) {
            
            ?>
            <tr class='ztagsrow'> 
                <td class='ztags'> 
                    <?php 
                        echo ($tag ['tag']);
                    ?>
                </td>
                <td class='ztmobiles'> 
                    <?php 
                        echo ($tag ['mobile']);
                    ?>
                </td>
                <td class='ztemails'> 
                    <?php 
                        echo ($tag ['email']); 
                    ?>
                </td>
            </tr>
            <?php

        } // end foreach ($tags as $tags

    } // end tagsShowContent ($tags)

    //---------------------
    function getAlerts ($username) {

        global $atxcc_db;
        $userid = $atxcc_db -> getUserId ($username);

        $query = "SELECT ackey, acval FROM ac_data WHERE actype=? AND acrefs=?";

        $params = [
            'alert', $userid
        ];

        $rows = $atxcc_db -> doQuery ($query, $params);

        $alerts = [];

        foreach ($rows as $row) {

            $tag = [];

            $tagname = $row ['ackey'];
            $tag ['tag'] = $tagname;

            $alertTypes = $row ['acval'];

            if (preg_match ('/T/', $alertTypes)) {

                $tag ['mobile'] = 'x';

            } else {

                $tag ['mobile'] = '';

            } // end if (preg_match ('/T/', $alertTypes))
            
            if (preg_match ('/E/', $alertTypes)) {

                $tag ['email'] = 'x';

            } else {

                $tag ['email'] = '';

            } // end if (preg_match ('/T/', $alertTypes))
            
            array_push ($alerts, $tag);

        } // end foreach ($rows as $row)
        
        return $alerts;

    } // end getTopics ()


}


