# Laravel-Stack-Psychology-Application
<br>
A psychology application made in Laravel that authenticates a user as either a helper (that can give relevant resources and form a support group) and as a normal user that gets resources and is a part of several support groups connecting other users) 

# How to run the project?
To run the project, you must extract all the files in the same folder as the downloaded “multi-guard-auth” in your LocalDisk(C) >> xampp >> htdocs. Then install the node_modules
using 'npm install' and also include the storage, test and vendor folders that are a part of general laravel project in your directory. <br>
In the terminal run ‘php artisan migrate’ and agree to create the asked schema in mysql.<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=Project<br>
DB_USERNAME=root<br>
DB_PASSWORD=<br>
The details of the schema ^<br>
You must have the apache and mysql running in xampp in this case. <br>
Now, in the terminal, first run ‘npm run dev’, then open a new terminal and run ‘php artisan serve’. 
