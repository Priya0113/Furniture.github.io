<?php
session_start();
session_unset();
session_destroy();
echo"<script>window.open('../dbms.php','_self')</script>";
?>