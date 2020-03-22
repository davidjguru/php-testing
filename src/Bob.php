<?php


class Bob {

    public function respondTo(string $input) : string

    {
        $response = 'Whatever.';
        if (empty($input) || ctype_space($input) || ctype_cntrl($input)) {
            $response = 'Fine. Be that way!';

        } else if ((strpos($input, '!') && (!strpos($input, '?')))
            && (ctype_upper(str_replace(' ', '', rtrim($input, '!')))
            || (substr_count($input, '!') > 1)
            || (ctype_upper(substr(str_replace(' ', '', rtrim($input, '!')), -1, 2))))
            ||  (ctype_upper(rtrim(substr($input, -1, 3), '!')))) {
                $response = 'Whoa, chill out!';

        } else if ((((strlen($input)) - 1) == (strpos($input, '?')))
            && (ctype_upper(str_replace(' ', '',rtrim($input, '?') )))) {
                    $response = 'Calm down, I know what I\'m doing!';

        } else if (((ctype_space(substr($input, -1, 3 )))
             && (strpos($input, '?')))
             || ( (((strlen($input)) - 1) == (strpos($input, '?')))
             && (!ctype_upper(str_replace(' ', '',rtrim($input, '?') ))) )) {
            $response = 'Sure.';
        }
        return $response;
    }
}
