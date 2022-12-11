<?php

session_start();

include __DIR__ . '/../model/User.php';

User::userRegister();