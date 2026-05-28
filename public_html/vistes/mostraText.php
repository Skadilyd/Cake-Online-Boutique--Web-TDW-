<?php
    function echoText($text) {
        echo htmlentities($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
    function mostraConfirmacio($text) {
        echo htmlentities("<div class='confirmationMsg'>" . $text . "</div>", ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
    function mostraError($text) {
        echo htmlentities("<div class='errorMsg'>" . $text . "</div>", ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
    function mostraAvis($text) {
        echo htmlentities("<div class='warningMsg'>" . $text . "</div>", ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
?>