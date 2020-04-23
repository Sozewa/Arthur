@ECHO off
ECHO Get file version
git symbolic-ref --short -q HEAD>version
ECHO Cloning core
git clone https://github.com/rok9ru/trpo-core ./core
ECHO Success!
pause