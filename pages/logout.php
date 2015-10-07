<?php
template_header();
session_destroy();
header("location:".URL_ROOT."login");exit;
template_footer();