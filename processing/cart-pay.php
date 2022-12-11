<?php

session_start();

include __DIR__ . '/../model/Order.php';

Order::payCart();