# Social Foundation

[![Build Status](https://travis-ci.org/jimmitjoo/social-foundation.svg?branch=master)](https://travis-ci.org/jimmitjoo/social-foundation)

## A PHP Social Platform
Social Foundation is a social platform based on PHP. It has got very much inspiration by Jeffrey Ways series Larabook which you can find here: https://laracasts.com/series/build-a-laravel-app-from-scratch

The platform has multi language support out of the box, nothing is written outside the languagefiles which you can find in app/lang.

To set up you will need to set some environment variables. Create an .env.php in the root of the project.
```
<?php

return [

    'DB_HOST' => 'localhost',   // Database host
    'DB_USER' => 'root',   // Database username
    'DB_PASS' => 'passwd',      // Database password
    'DB_NAME' => 'dbname',      // Database name

    'ini_set' => ini_set('xdebug.max_nesting_level', 200) // If you just have 100 the codecept won't work.

];
```