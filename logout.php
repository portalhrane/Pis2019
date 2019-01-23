<?php

include 'classes/Session.php';

Session::init();
Session::destroy();
header("Location:index.php");