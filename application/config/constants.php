<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



defined('IMG_PATH')      OR define('IMG_PATH', 'assets/frontend/images/'); 
defined('BLANK_IMG')      OR define('BLANK_IMG', 'assets/frontend/images/blank_image.png'); 
defined('EMPTY_IMG')      OR define('EMPTY_IMG', 'assets/frontend/images/empty.jpg'); 
defined('AVATAR')      OR define('AVATAR', 'assets/frontend/images/avatar.png'); 

class Status {
  	const PENDING = 0;
	const ACCEPT = 1;
	const COMPLETE = 2;
	const CANCEL = 3;
	const PAYMENT = 4;
	const COMPLETED_PAYMENT = 4;
	const LIVE = 1;
	const HIDE = 0;
}


class Order{
	static function status($data)
	{
		if(is_numeric($data)){
			return $data;
		}else{
			switch ($data) {
				case 'pending':
				return 0;
				break;
				case ($data=='accepted' || $data=='approved' || $data=='accept'):
				return 1;
				break;

				case ($data=='complete' || $data=='completed'):
				return 2;
				break;

				case ($data=='cancel' || $data=='canceled'|| $data=='cancle' || $data=='reject' || $data=='rejected'):
				return 3;
				break;

				default:
				return 0;
				break;
			}
		}
	}


	static function type($data)
	{
		if(is_numeric($data)){
			switch ($data) {
				case '1':
				return 'cod';
				break;
				case '2':
				return 'booking';
				break;

				case '3':
				return 'reservation';
				break;

				case '4':
				return 'pickup';
				break;
				
				case '6':
				return 'dine-in';
				break;
				
				case '7':
				return 'package-dine-in';
				break;
				
				case '8':
				return 'room-service';
				break;
				
				case '9':
				return 'paycash';
				break;

				default:
				return 0;
				break;
			}
		}else{
			switch ($data) {
				case 'cod':
				return '1';
				break;
				case 'booking':
				return '2';
				break;

				case 'reservation':
				return '3';
				break;

				case 'pickup':
				return '4';
				break;
				
				case 'dine-in':
				return '6';
				break;
				
				case 'package-dine-in':
				return '7';
				break;
				
				case 'room-service':
				return '8';
				break;
				
				case 'paycash':
				return '9';
				break;

				default:
				return 0;
				break;
			}
		}
	}
}