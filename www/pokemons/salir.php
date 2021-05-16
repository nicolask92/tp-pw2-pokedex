<?php

include_once('_session.php');

session_destroy();

header('location: ./login.php');
