$atxcc.init = {// init.js

//---------------------
init: function (ip) {    $atxcc._dg.debug ({ip: ip})

    $('#zbody')
    .mousemove ( 
        function (event) {
            $atxcc.ev.mouseMove (event.pageX, event.pageY)
        }
    ) // end mousemove
    .keydown (
        function (event) {
            $atxcc.ev.keyDown (event.which)
        }
    )  // end keydown

        // clears content description when moving away from agenda items section
    $('#agendaheader, #footer, .zitem, .zcontent')
    .mouseenter ($atxcc.ev.xmeRemove)

        // pops up description when hovering over agenda row
    $('.zcontent')
    .mouseenter ($atxcc.ev.descrDisplay)

    $('#zsearch')
    .submit (
        function (event) {
            event.preventDefault ()
            $atxcc.ev.agendaSearch ()
        }
    )  // end .submit


} // end init ()

}  // $atxcc.init
$atxcc.it = $atxcc.init
