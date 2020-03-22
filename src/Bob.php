<?php


class Bob {

    public function respondTo(string $input) : string

    {
        $response = 'Whatever.';
        if (empty($input) || ctype_space($input) || ctype_cntrl($input)) {
            $response = 'Fine. Be that way!';
        } else if (strpos($input, '!') && (!strpos($input, '?'))) {
            $modified_input = rtrim($input, '!');
            $modified_input_2 = str_replace(' ', '', $modified_input);
            if (ctype_upper($modified_input_2)) {
                $response = 'Whoa, chill out!';
            } else if(substr_count($input, '!') > 1) {
                $response = 'Whoa, chill out!';
            } else if(ctype_upper(substr($modified_input, -1, 2))) {
                $response = 'Whoa, chill out!';
            }
              else {
                $response = 'Whatever.';
            }
        } else if (ctype_upper($input)) {
            $response = 'Whoa, chill out!';

        } else if (((strlen($input)) - 1) == (strpos($input, '?'))) {
            $length = strlen($input);
            if (($length - 1) == strpos($input, '?')) {
                $modified_input = rtrim($input, '?');
                $modified_input_2 = str_replace(' ', '', $modified_input);
                if (ctype_upper($modified_input_2)) {
                    $response = 'Calm down, I know what I\'m doing!';
                } else if (strstr($input, PHP_EOL)) {
                    $response = 'Whatever.';
                } else {
                    $response = 'Sure.';
                }
            } else {
                $response = 'Whatever.';
            }
        } else if ((ctype_space(substr($input, -1, 3 ))) && (strpos($input, '?'))) {
            $response = 'Sure.';
        } else if (ctype_space(substr($input, -1, 6 ))) {
            $response = 'Whatever.';
        }else if(ctype_upper(rtrim(substr($input, -1, 3), '!'))) {
            $response = 'Whoa, chill out!';
        }
        return $response;
    }
}
