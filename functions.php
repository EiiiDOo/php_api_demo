<?php
function echoDataFromDB($users): void
{
    foreach ($users as $key => $value) {
        foreach ($value as $key => $value) {
            echo
            "
            <div>
            <p>
            $key : $value
            </p>
            </div>
            ";
        }
        echo '<hr>';
    }
}


function filterReq($requestName): string
{
    return htmlspecialchars(strip_tags($_POST[$requestName]));
}
