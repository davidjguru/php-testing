<?php


class Bob {

    public function respondTo(string $input) : string

    {
        $response = 'Whatever.';
        if (empty($input) || ctype_space($input) || ctype_cntrl($input)) {
            $response = 'Fine. Be that way!';

        } else if (strpos($input, '!') && (!strpos($input, '?'))) {
            $modified_input = str_replace(' ', '', rtrim($input, '!'));

            if (ctype_upper($modified_input) || (substr_count($input, '!') > 1)  || (ctype_upper(substr($modified_input, -1, 2)))) {
                $response = 'Whoa, chill out!';
            }
        } else if (((strlen($input)) - 1) == (strpos($input, '?'))) {
                $modified_input_two = str_replace(' ', '',rtrim($input, '?') );
                if (ctype_upper($modified_input_two)) {
                    $response = 'Calm down, I know what I\'m doing!';
                } else {
                    $response = 'Sure.';
                }
        } else if ((ctype_space(substr($input, -1, 3 ))) && (strpos($input, '?'))) {
            $response = 'Sure.';
        } else if(ctype_upper(rtrim(substr($input, -1, 3), '!'))) {
            $response = 'Whoa, chill out!';
        }
        return $response;
    }
}
