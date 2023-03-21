cd "C:\Users\%username%\Desktop\server" & "C:\XWeb\Human Emulator Studio 7.0.62\PHP\php.exe" -S 0.0.0.0:8000

timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php proxyAliveCheckerAndExtractorTest.php test:test 127.0.0.1 7011 "https://developers.google.com/oauthplayground" --rt
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php accountTaskListPreparationTest.php 1800

/* LOCAL */
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7667 --dynamical --rt
timeout 7 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7669 --dynamical --rt
timeout 10 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7671 --dynamical --rt
timeout 13 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7673 --dynamical --rt
timeout 15 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7675 --dynamical --rt
timeout 17 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7677 --dynamical --rt
timeout 19 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 127.0.0.1 7679 --dynamical --rt

/* REMOTE 5.45.71.226 - OK */
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.71.226 7011 --dynamical --rt
timeout 3 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.71.226 7013 --dynamical --rt
timeout 5 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.71.226 7017 --dynamical --rt

/* REMOTE 5.61.49.88 - OK */
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.49.88 7021 --dynamical --rt
timeout 7 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.49.88 7015 --dynamical --rt
timeout 11 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.49.88 7019 --dynamical --rt

/* REMOTE 94.103.95.148 - OK */
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 94.103.95.148 7035 --dynamical --rt
timeout 7 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 94.103.95.148 7037 --dynamical --rt
timeout 11 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 94.103.95.148 7039 --dynamical --rt

/* REMOTE 5.45.75.70 - NOT OK */
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.75.70 7021 --dynamical --rt
timeout 7 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.75.70 7025 --dynamical --rt
timeout 11 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.45.75.70 7027 --dynamical --rt

/* REMOTE 5.61.51.30 - ERROR - NO RESPONSE */
timeout 1 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.51.30 7023 --dynamical --rt
timeout 7 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.51.30 7029 --dynamical --rt
timeout 11 & cls & cd C:\xampp\htdocs\xhe\test & php insertCalendarEventListTest.php test:test 5.61.51.30 7031 --dynamical --rt
