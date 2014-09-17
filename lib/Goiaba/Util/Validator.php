<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Util;

/**
 * This Validator class will compare rules to data/models fields.
 * Data to be validated: 
 * a) common mySQL datatypes: int, double, text, date, etc. 
 * b) common HTML form input: phone, email, zips, credit cards, dates.
 *
 */
class Validator
{
    protected static $_rules = array();

    public function __construct() 
    {
        static::$_rules = array(
			'alphaNumeric' => '/^[\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]+$/mu',
			'blank'        => '/[^\\s]/',
			'creditCard'   => array(
				'amex'     => '/^3[4|7]\\d{13}$/',
				'bankcard' => '/^56(10\\d\\d|022[1-5])\\d{10}$/',
				'diners'   => '/^(?:3(0[0-5]|[68]\\d)\\d{11})|(?:5[1-5]\\d{14})$/',
				'disc'     => '/^(?:6011|650\\d)\\d{12}$/',
				'electron' => '/^(?:417500|4917\\d{2}|4913\\d{2})\\d{10}$/',
				'enroute'  => '/^2(?:014|149)\\d{11}$/',
				'jcb'      => '/^(3\\d{4}|2100|1800)\\d{11}$/',
				'maestro'  => '/^(?:5020|6\\d{3})\\d{12}$/',
				'mc'       => '/^5[1-5]\\d{14}$/',
				'solo'     => '/^(6334[5-9][0-9]|6767[0-9]{2})\\d{10}(\\d{2,3})?$/',
				'switch'   => '/^(?:49(03(0[2-9]|3[5-9])|11(0[1-2]|7[4-9]|8[1-2])|36[0-9]{2})' .
				              '\\d{10}(\\d{2,3})?)|(?:564182\\d{10}(\\d{2,3})?)|(6(3(33[0-4]' .
				              '[0-9])|759[0-9]{2})\\d{10}(\\d{2,3})?)$/',
				'visa'     => '/^4\\d{12}(\\d{3})?$/',
				'voyager'  => '/^8699[0-9]{11}$/',
				'fast'     => '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3' .
				              '(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$/'
			),
			'date'         => array(
				'dmy'      => '%^(?:(?:31(\\/|-|\\.|\\x20)(?:0?[13578]|1[02]))\\1|(?:(?:29|30)' .
				              '(\\/|-|\\.|\\x20)(?:0?[1,3-9]|1[0-2])\\2))(?:(?:1[6-9]|[2-9]\\d)?' .
				              '\\d{2})$|^(?:29(\\/|-|\\.|\\x20)0?2\\3(?:(?:(?:1[6-9]|[2-9]\\d)?' .
				              '(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])' .
				              '00))))$|^(?:0?[1-9]|1\\d|2[0-8])(\\/|-|\\.|\\x20)(?:(?:0?[1-9])|' .
				              '(?:1[0-2]))\\4(?:(?:1[6-9]|[2-9]\\d)?\\d{2})$%',
				'mdy'      => '%^(?:(?:(?:0?[13578]|1[02])(\\/|-|\\.|\\x20)31)\\1|(?:(?:0?[13-9]|' .
				              '1[0-2])(\\/|-|\\.|\\x20)(?:29|30)\\2))(?:(?:1[6-9]|[2-9]\\d)?\\d' .
				              '{2})$|^(?:0?2(\\/|-|\\.|\\x20)29\\3(?:(?:(?:1[6-9]|[2-9]\\d)?' .
				              '(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])' .
				              '00))))$|^(?:(?:0?[1-9])|(?:1[0-2]))(\\/|-|\\.|\\x20)(?:0?[1-9]|1' .
				              '\\d|2[0-8])\\4(?:(?:1[6-9]|[2-9]\\d)?\\d{2})$%',
				'ymd'      => '%^(?:(?:(?:(?:(?:1[6-9]|[2-9]\\d)?(?:0[48]|[2468][048]|[13579]' .
				              '[26])|(?:(?:16|[2468][048]|[3579][26])00)))(\\/|-|\\.|\\x20)' .
				              '(?:0?2\\1(?:29)))|(?:(?:(?:1[6-9]|[2-9]\\d)?\\d{2})(\\/|-|\\.|' .
				              '\\x20)(?:(?:(?:0?[13578]|1[02])\\2(?:31))|(?:(?:0?[1,3-9]|1[0-2])' .
				              '\\2(29|30))|(?:(?:0?[1-9])|(?:1[0-2]))\\2(?:0?[1-9]|1\\d|2[0-8]' .
				              '))))$%',
				'dMy'      => '/^((31(?!\\ (Feb(ruary)?|Apr(il)?|June?|(Sep(?=\\b|t)t?|Nov)' .
				              '(ember)?)))|((30|29)(?!\\ Feb(ruary)?))|(29(?=\\ Feb(ruary)?\\ ' .
				              '(((1[6-9]|[2-9]\\d)(0[48]|[2468][048]|[13579][26])|((16|[2468]' .
				              '[048]|[3579][26])00)))))|(0?[1-9])|1\\d|2[0-8])\\ (Jan(uary)?|' .
				              'Feb(ruary)?|Ma(r(ch)?|y)|Apr(il)?|Ju((ly?)|(ne?))|Aug(ust)?|' .
				              'Oct(ober)?|(Sep(?=\\b|t)t?|Nov|Dec)(ember)?)\\ ((1[6-9]|[2-9]' .
				              '\\d)\\d{2})$/',
				'Mdy'      => '/^(?:(((Jan(uary)?|Ma(r(ch)?|y)|Jul(y)?|Aug(ust)?|Oct(ober)?' .
				              '|Dec(ember)?)\\ 31)|((Jan(uary)?|Ma(r(ch)?|y)|Apr(il)?|Ju((ly?)' .
				              '|(ne?))|Aug(ust)?|Oct(ober)?|(Sept|Nov|Dec)(ember)?)\\ (0?[1-9]' .
				              '|([12]\\d)|30))|(Feb(ruary)?\\ (0?[1-9]|1\\d|2[0-8]|(29(?=,?\\ ' .
				              '((1[6-9]|[2-9]\\d)(0[48]|[2468][048]|[13579][26])|((16|[2468]' .
				              '[048]|[3579][26])00)))))))\\,?\\ ((1[6-9]|[2-9]\\d)\\d{2}))$/',
				'My'       => '%^(Jan(uary)?|Feb(ruary)?|Ma(r(ch)?|y)|Apr(il)?|Ju((ly?)|(ne?))|' .
				              'Aug(ust)?|Oct(ober)?|(Sep(?=\\b|t)t?|Nov|Dec)(ember)?)\\ ((1[6-9]' .
				              '|[2-9]\\d)\\d{2})$%',
				'my'       => '%^(0?[1-9]|1[012])([- /.])((1[6-9])|([2-9]\\d)\\d{2})$%'
			),
			'ip' => function($value, $format = null, array $options = array()) {
				$options += array('flags' => array());
				return (boolean) filter_var($value, FILTER_VALIDATE_IP, $options);
			},
			'money'        => array(
				'right'    => '/^(?!0,?\d)(?:\d{1,3}(?:([, .])\d{3})?(?:\1\d{3})*|(?:\d+))' .
				              '((?!\1)[,.]\d{2})?(?<!\x{00a2})\p{Sc}?$/u',
				'left'     => '/^(?!\x{00a2})\p{Sc}?(?!0,?\d)(?:\d{1,3}(?:([, .])\d{3})?' .
				              '(?:\1\d{3})*|(?:\d+))((?!\1)[,.]\d{2})?$/u'
			),
			'notEmpty'     => '/[^\s]+/m',
			'phone'        => '/^\+?[0-9\(\)\-]{10,20}$/',
			'postalCode'   => '/(^|\A\b)[A-Z0-9\s\-]{5,}($|\b\z)/i',
			'regex'        => '/^(?:([^[:alpha:]\\\\{<\[\(])(.+)(?:\1))|(?:{(.+)})|(?:<(.+)>)|' .
			                  '(?:\[(.+)\])|(?:\((.+)\))[gimsxu]*$/',
			'time'         => '%^((0?[1-9]|1[012])(:[0-5]\d){0,2}([AP]M|[ap]m))$|^([01]\d|2[0-3])' .
			                  '(:[0-5]\d){0,2}$%',
			'boolean'      => function($value) {
				$bool = is_bool($value);
				$filter = filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
				return ($bool || $filter !== null || empty($value));
			},
			'decimal' => function($value, $format = null, array $options = array()) {
				if (isset($options['precision'])) {
					$precision = strlen($value) - strrpos($value, '.') - 1;

					if ($precision !== (int) $options['precision']) {
						return false;
					}
				}
				return (filter_var($value, FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE) !== null);
			},
			'inList' => function($value, $format, $options) {
				$options += array('list' => array());
				$strict = is_bool($value) || $value === '';
				return in_array($value, $options['list'], $strict);
			},
			'lengthBetween' => function($value, $format, $options) {
				$length = strlen($value);
				$options += array('min' => 1, 'max' => 255);
				return ($length >= $options['min'] && $length <= $options['max']);
			},
			'luhn' => function($value) {
				if (empty($value) || !is_string($value)) {
					return false;
				}
				$sum = 0;
				$length = strlen($value);

				for ($position = 1 - ($length % 2); $position < $length; $position += 2) {
					$sum += $value[$position];
				}
				for ($position = ($length % 2); $position < $length; $position += 2) {
					$number = $value[$position] * 2;
					$sum += ($number < 10) ? $number : $number - 9;
				}
				return ($sum % 10 === 0);
			},
			'numeric' => function($value) {
				return is_numeric($value);
			},
			'inRange' => function($value, $format, $options) {
				$defaults = array('upper' => null, 'lower' => null);
				$options += $defaults;

				if (!is_numeric($value)) {
					return false;
				}
				switch (true) {
					case (!is_null($options['upper']) && !is_null($options['lower'])):
						return ($value >= $options['lower'] && $value <= $options['upper']);
					case (!is_null($options['upper'])):
						return ($value <= $options['upper']);
					case (!is_null($options['lower'])):
						return ($value >= $options['lower']);
				}
				return is_finite($value);
			},
			'uuid' => "/^{$alnum}{8}-{$alnum}{4}-{$alnum}{4}-{$alnum}{4}-{$alnum}{12}$/",
			'email' => function($value) {
				return filter_var($value, FILTER_VALIDATE_EMAIL);
			},
			'url' => function($value, $format = null, array $options = array()) {
				$options += array('flags' => array());
				return (boolean) filter_var($value, FILTER_VALIDATE_URL, $options);
			}
		);
        
    }

    public static function validateInt($int, array $range)
    {
        return filter_var(
            $int, 
            FILTER_VALIDATE_INT, 
            array(
                'options' => array(
                    'min_range' => $range['min_range'], 
                    'max_range' => $range['max_range']
                )
            )
        );
    }

    public static function validateModel() 
    {
    } 

    public static function validateField($val, array $options)
    {
    }



}
