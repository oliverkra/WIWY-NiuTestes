@echo off

IF EXIST "C:\UNIMESTRE\servidor\php5.4.21" (C:\UNIMESTRE\servidor\php5.4.21\php.exe -S 0.0.0.0:8081 index.php) else IF EXIST "C:\servidor\php5.4.19" (C:\servidor\php5.4.19\php.exe -S 0.0.0.0:8081 index.php) else (C:\SERVIDOR\php5.4.10\php.exe -S 0.0.0.0:8081 index.php)