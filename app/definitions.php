<?php

define('ROOT_DIR', dirname(__DIR__));

define('XHE_DIR', 'C:\XWeb\Human Emulator Studio 7.0.70');
define('XHE_EXE', XHE_DIR . DIRECTORY_SEPARATOR . 'XWeb Human Emulator Studio.exe');
define('XHE_EXE_RT', XHE_DIR . DIRECTORY_SEPARATOR . 'XWeb Human Emulator Studio RT.exe');
define('XHE_EXE_RT_OBJ', 'C:\XWeb\XWebRT');
define('XHE_EXE_OBJ', 'C:\XWeb\XWeb');

define('VAR_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . 'var');
define('LOGS_DIR', VAR_DIR . DIRECTORY_SEPARATOR . 'logs');
define('PROFILE_DIR', VAR_DIR . DIRECTORY_SEPARATOR . 'profiles');
define('TMP_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . 'tmp');
define('EVENTS_DIR', VAR_DIR . DIRECTORY_SEPARATOR . 'events');
define('DRIVEFILES_DIR', VAR_DIR . DIRECTORY_SEPARATOR . 'drivefiles');

define('EVENTS_UNPUBLISHED_DIR', EVENTS_DIR . DIRECTORY_SEPARATOR . 'unpublished');
define('EVENTS_WORKING_DIR', EVENTS_DIR . DIRECTORY_SEPARATOR . 'working');
define('EVENTS_PUBLISHED_DIR', EVENTS_DIR . DIRECTORY_SEPARATOR . 'published');
define('EVENTS_ERRORS_DIR', EVENTS_DIR . DIRECTORY_SEPARATOR . 'errors');

define('DEFAULT_SETTINGS', TMP_DIR . DIRECTORY_SEPARATOR . 'settings_v1.json');

define('DRIVEFILES_UNPUBLISHED_DIR', DRIVEFILES_DIR . DIRECTORY_SEPARATOR . 'unpublished');
define('DRIVEFILES_WORKING_DIR', DRIVEFILES_DIR . DIRECTORY_SEPARATOR . 'working');
define('DRIVEFILES_PUBLISHED_DIR', DRIVEFILES_DIR . DIRECTORY_SEPARATOR . 'published');
define('DRIVEFILES_ERRORS_DIR', DRIVEFILES_DIR . DIRECTORY_SEPARATOR . 'errors');
define('DRIVEFILES_BODY_DIR', DRIVEFILES_DIR . DIRECTORY_SEPARATOR . 'body');

