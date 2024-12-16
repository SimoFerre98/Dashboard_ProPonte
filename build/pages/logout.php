<?php
include "../../db.php";

session_destroy();

header("Location: ../pages/dashboard.php");