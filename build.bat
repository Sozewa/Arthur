@ECHO off
if not exist log (
ECHO Folder log create
mkdir log
)
if not exist core (
ECHO Deliting foldel core
rmdir core /q /s  
)
ECHO Get file version
git symbolic-ref --short -q HEAD>version
ECHO Cloning core
git clone https://github.com/rok9ru/trpo-core.git core/
ECHO Success!
pause