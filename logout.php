<?php

session_start();

session_destroy();

header("Location: homepage_nologin.html");
exit;