<?php
session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
session_unset();     // unset $_SESSION variable for the run-time
session_destroy();   // destroy session data in storage

header('Location: ' . $this->public_dir . 'login');

?>