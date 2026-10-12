<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// "Tetap masuk": cookie session bertahan 30 hari di perangkat yang mencentangnya,
// selain itu hilang saat browser ditutup.
$config['cookie_lifetime'] = isset($_COOKIE['tetap_masuk']) ? 2592000 : 0;
