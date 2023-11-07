REM GMAIL WARMUP
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php googleMailLoginTest.php test:test 127.0.0.1 7675 --rt "alterpost.org"

REM REMOTE SERVER
cd "C:\Users\%username%\Desktop\server" & "C:\XWeb\Human Emulator Studio 7.0.71\PHP\php.exe" -S 0.0.0.0:8000

REM PROXY CHECKER
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php proxyAliveCheckerAndExtractorTest.php test:test 127.0.0.1 7011 "https://developers.google.com/oauthplayground" --rt

REM ACCOUNTS PREPARATION FOR NEWSLETTER
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php accountTaskListPreparationTest.php 1800

REM LOCAL
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7667 --dynamical --rt
timeout 11 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7671 --dynamical --rt
timeout 15 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7675 --dynamical --rt
timeout 15 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7677 --dynamical --rt
timeout 17 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7679 --dynamical --rt

REM DRIVE
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertDriveFileAlternateTest.php test:test 127.0.0.1 7667 --rt
timeout 7 & cls & cd C:\xampp\htdocs\xhe\test & php insertDriveFileAlternateTest.php test:test 127.0.0.1 7671 --rt
timeout 11 & cls & cd C:\xampp\htdocs\xhe\test & php insertDriveFileAlternateTest.php test:test 127.0.0.1 7673 --rt

REM REMOTE 5.45.71.226 - OK
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.71.226 7011 --dynamical --rt
timeout 3 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.71.226 7013 --dynamical --rt
timeout 5 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.71.226 7017 --dynamical --rt

REM REMOTE 5.61.49.88 - OK 
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.49.88 7021 --dynamical --rt
timeout 7 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.49.88 7015 --dynamical --rt
timeout 11 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.49.88 7019 --dynamical --rt

REM REMOTE 5.45.75.70 - NOT OK
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.75.70 7021 --dynamical --rt
timeout 7 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.75.70 7025 --dynamical --rt
timeout 11 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.75.70 7027 --dynamical --rt

REM REMOTE 5.61.51.30 - NO RESPONSE
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.51.30 7023 --dynamical --rt
timeout 7 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.51.30 7029 --dynamical --rt
timeout 11 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.51.30 7031 --dynamical --rt

