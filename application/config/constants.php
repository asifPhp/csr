
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


/*custom constant*/
define('DEFAULT_DUE_DATE',14);
define('DUE_DATE_NGO_DESK_REVIEW',14);
define('DUE_DATE_NGO_DESK_APPROVAL',3);
define('DUE_DATE_PROPOSAL_DESK_REVIEW',14);
define('DUE_DATE_BEGIN_PROPOSAL',3);
define('ERR_DEFAULT','500');
define('VALIDATION_ERROR','700');
define('SUCCESS','200');
define('DB_ERROR','201');
define('FAILED','202');
define('PROJECT_NAME','CSR LOGIN');
define('PROJECT_NAME_NGO','NGO LOGIN');
define('PROJECT_NAME_REGISTER','CREATE NEW NGO');
define('PROJECT_NAME_MINI','CSR');
define('PROJECT_URL','https://CSR.com');
define('PROJECT_EMAIL','info@csr.com');
define('LOGO','http://dev.compass-csr.com/assets/img/logo.png');
define('NGO_URL','http://dev.compass-csr.com/');
define('ORG_URL','http://devorg.compass-csr.com/');
define('STATUS_Complete','#1abb9c');
define('STATUS_Completed','#1abb9c');
define('STATUS_Reopened','Grey');
define('STATUS_Task Revision','Grey');
define('STATUS_Needs Review','red');
define('STATUS_Revision Ready','#1abb9c');
define('STATUS_New','#1abb9c');
define('STATUS_new','#1abb9c');
define('STATUS_Submitted','#1abb9c');
define('STATUS_Accepted','#1abb9c');
define('STATUS_Incomplete','#EA6254 ');
define('STATUS_Created','#10ACD6');
define('STATUS_Recommended_for_Rejection','Red');
define('STATUS_Recommended for Rejection','Red');
define('STATUS_Rejected','Red');
define('STATUS_Revision_Request','orange');
define('STATUS_Pending_Revision_by_NGO','Grey');
define('STATUS_Ngo Document Request','orange');
define('STATUS_Ngo Document Request Resolved','#1abb9c');
define('STATUS_Ngo Payemnt Document Request','orange');
define('STATUS_Ngo Payemnt Document Request Resolved','#1abb9c');
define('STATUS_NGO Revision','grey');
define('STATUS_NGO Revised','#1abb9c');
define('STATUS_Revision Requested','Red');
define('STATUS_Field Visit','orange');
define('STATUS_Field Visit Approval','orange');
define('STATUS_Leadership Engagement','orange');
define('STATUS_SC Review','orange');
define('STATUS_Board Review','orange');
define('STATUS_Approved','#1abb9c');
define('STATUS_In progress','orange');
define('STATUS_NGO Desk Review','orange');
define('STATUS_Desk Review Approval','orange');
define('STATUS_Proposal Desk Review','orange');
define('STATUS_','orange');
define('STATUS_NGO Review Pending','orange');
define('STATUS_Pending','orange');
define('STATUS_Resolved','#1abb9c');
define('STATUS_NGO Decision Pending','orange');
define('STATUS_Proposal Final Review Pending','orange');
define('STATUS_Proposal Initial Review Pending','orange');
define('STATUS_GC: Requested','orange');
define('STATUS_GC: Approved','#1abb9c');
define('STATUS_GC: Rejected','orange');
define('STATUS_Green Channel','#1abb9c');
/**Project Sections*/
define('STATUS_Setup In Progress','orange');
define('STATUS_Focal Point Review','orange');
define('STATUS_NGO Document Request','grey');
define('STATUS_NGO Payemnt Document Request','grey');
define('STATUS_Document Requested','red');
define('STATUS_NGO Resolved','#1abb9c');
define('STATUS_Internal Verification','orange');
define('STATUS_Checker Review','orange');
define('STATUS_Final Approval','orange');
define('STATUS_Payment Confirmation','orange');
define('STATUS_Cycle Completion','orange');

define('STATUS_Cycle 1','orange');
define('STATUS_Cycle 2','orange');
define('STATUS_Cycle 3','orange');
define('STATUS_Cycle 4','orange');
define('STATUS_Cycle 5','orange');
define('STATUS_Cycle 6','orange');
define('STATUS_Cycle 7','orange');
define('STATUS_Cycle 8','orange');
define('STATUS_Cycle 9','orange');
define('STATUS_Cycle 10','orange');
define('STATUS_Cycle 11','orange');
define('STATUS_Cycle 12','orange');
define('STATUS_Cycle 13','orange');
define('STATUS_Cycle 14','orange');
define('STATUS_Cycle 15','orange');
define('STATUS_Cycle 16','orange');
define('STATUS_Cycle 17','orange');
define('STATUS_Cycle 18','orange');
define('STATUS_Cycle 19','orange');
define('STATUS_Cycle 20','orange');




        