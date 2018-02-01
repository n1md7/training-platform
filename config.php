<?php

define("DB_HOST",       "localhost");
define("DB_USER",       "root");
define("DB_PASS",       "11235813");

// define("BDB_USER",      "bug");
// define("BDB_PASS",      "bug");
// define("BDB_NAME",       "bugs");

define("DB_NAME",       "training_platform");
define("DB_USER_TABLE", "trp_users");

define("ROOT_PATH",     "/training_platform/");
define("ROOT_URL",      "http://localhost/training_platform/");

date_default_timezone_set("Asia/Tbilisi");




define("URL_SIGNIN",   ROOT_URL."index.php?controller=Users&action=signin");
define("URL_SIGNUP",   ROOT_URL."index.php?controller=Users&action=signup");
define("URL_SIGNOUT",  ROOT_URL."index.php?controller=Users&action=signout");
define("URL_SETTINGS", ROOT_URL."index.php?controller=Users&action=settings");
define("URL_USERINFO", ROOT_URL."index.php?controller=Users&action=userinfo");

define("URL_XSS_STORED_EASY_1", ROOT_URL."index.php?controller=xss&action=stored&level=easy");
define("URL_XSS_STORED_MEDIUM_1", ROOT_URL."index.php?controller=xss&action=stored&level=medium");
define("URL_XSS_STORED_HARD_1", ROOT_URL."index.php?controller=xss&action=stored&level=hard");

define("URL_PATH_TRAVERSAL_EASY_1", ROOT_URL."index.php?controller=path_traversal&action=vulnerabilitie&level=easy");
define("URL_PATH_TRAVERSAL_MEDIUM_1", ROOT_URL."index.php?controller=path_traversal&action=vulnerabilitie&level=medium");
define("URL_PATH_TRAVERSAL_HARD_1", ROOT_URL."index.php?controller=path_traversal&action=vulnerabilitie&level=hard");
define("URL_PATH_TRAVERSAL_SUPERHARD_1", ROOT_URL."index.php?controller=path_traversal&action=vulnerabilitie&level=super-hard");


define("URL_BRUTE_FORCE_EASY_1", ROOT_URL."index.php?controller=brute_force&action=vulnerabilitie&level=easy");