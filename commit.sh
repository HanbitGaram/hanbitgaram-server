#!/bin/sh
php ./config/auto_generate.php

git add .
git commit -m 'AUTO COMMIT'
git push