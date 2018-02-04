@echo off
set pgpassword=admin
set FECHA=%DATE%
set FECHA=%FECHA:/=%
CD "D:\respaldos\"
"C:\Program Files (x86)\PostgreSQL\9.2\bin\pg_dump.exe" -i -h localhost -p 5432 -U postgres -F c -b -v -f "pg_sifet_%FECHA%.backup" bdaula

CD "D:\respaldos\"
"C:\Program Files\WinRAR\Rar.exe" a -r -agDD-MMM-YY-HH-MM "pg_dbaula_.rar" pg_sifet_%FECHA%.backup
CD "D:\respaldos\"
del pg_sifet_%FECHA%.backup"
