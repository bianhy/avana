<?php

function strip_content_tags($content)
{
    return trim(strtr(strip_tags($content, '<p><br>'),
        array(
            '<br />' => '<br/>',
            '</p>' => '',
            '&nbsp;' => ' ',
            '&middot;' => '˙',
            '\r' => ''
        ) ));

}

