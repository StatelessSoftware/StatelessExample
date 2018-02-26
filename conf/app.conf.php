<?php

// Site settings
define("SESSION_DOMAIN", "example.com");
define("SITE_DOMAIN", "https://" . SESSION_DOMAIN);

// Crypto keys
define("CIPHER_KEY", ""); // echo base64_encode(openssl_random_pseudo_bytes(64));
define("CRYPTO_SALT", ""); // echo substr(base64_encode(openssl_random_pseudo_bytes(16)), 0, 4);
define("CRYPTO_PEPPER_LEN", 4);

// Database
define("DB_NAME", "exampledb");
define("DB_HOST", "localhost");
define("DB_USER", "exampleuser");
define("DB_PASS", "password123");
