#!/usr/bin/env bash

rsync -avhrp ./public/ root@bartlebyproject.com:/var/www/bartlebyproject.com/public
