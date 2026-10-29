<?php
session_start();
session_destroy();

?>
  <script>alert("Session is Destroyed");location.href='index.php';</script>