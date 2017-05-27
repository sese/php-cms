<?php
require_once "config.php";

function getHeader($name) {
    // heredoc http://php.net/manual/ro/language.types.string.php
    $title = SITE_TITLE;
    return <<<HTML
<div id="header">
    <h1><a href="index.php">$title</a></h1>
    <br/>
    <h2>$name</h2>
</div>
HTML;
}

function getNav($selectedIndex = 0)
{
    global $links;

    $content = [];
    for( $i = 0; $i < count($links); $i++) {
        $link = $links[$i];

        if( $i + 1 == $selectedIndex ) {
            $content[] = "<a href=\"" . $link["href"] . "\" class=\"selected\">" . $link["label"] . "</a> |";
        }
        else {
            $content[] = sprintf("<a href=\"%s\">%s</a> |", $link["href"] , $link["label"]);
        }
    }

   return sprintf("<div id=\"nav\">\n%s</div>\n", implode("\n", $content));
}
