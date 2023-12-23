@ECHO OFF

start msedge "http://192.168.22.173:8080/login"

cd /d C:\xampp8\
start mysql_start.bat

cd /d %~dp0
php artisan serve --host 192.168.22.173:8080

PAUSE