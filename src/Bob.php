<?php


class Bob {

  protected static $responsesArray = [ 'DEFAULT_RESPONSE' => 'Whatever.',
    'SILENT_RESPONSE' => 'Fine. Be that way!',
    'SHOUT_RESPONSE' => 'Whoa, chill out!',
    'SHOUTED_QUESTION_RESPONSE' => 'Calm down, I know what I\'m doing!',
    'BASIC_QUESTION_RESPONSE' => 'Sure.'];

  public function respondTo(string $input) : string {
    return self::$responsesArray[$this->categorizeInput($input)];
  }

  public function categorizeInput(string $input) : string {
    $category = 'DEFAULT_RESPONSE';

    if (empty($input) || ctype_space($input) || ctype_cntrl($input)) {
      $category = 'SILENT_RESPONSE';
    }
    elseif ((strpos($input, '!') && (!strpos($input, '?')))
      && (ctype_upper(str_replace(' ', '', rtrim($input, '!')))
        || (substr_count($input, '!') > 1)
        || (ctype_upper(substr(str_replace(' ', '', rtrim($input, '!')), -1, 2))))
      || (ctype_upper(rtrim(substr($input, -1, 3), '!')))) {
      $category = 'SHOUT_RESPONSE';

    }
    elseif ((((strlen($input)) - 1) == (strpos($input, '?')))
      && (ctype_upper(str_replace(' ', '',rtrim($input, '?') )))) {
      $category = 'SHOUTED_QUESTION_RESPONSE';
    }
    elseif (((ctype_space(substr($input, -1, 3 )))
        && (strpos($input, '?')))
      || ( (((strlen($input)) - 1) == (strpos($input, '?')))
        && (!ctype_upper(str_replace(' ', '',rtrim($input, '?') ))) )) {
      $category = 'BASIC_QUESTION_RESPONSE';
    }
    return $category;
  }

}
