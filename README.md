## api crud test

This repo was coded using Laravel 8


 1. Clone this repo
 2. cd into it directory
 3. cd into laradock
 4. cp .env.example .env
 5. docker-compose up -d nginx mysql
 6. cd .. (back to the root directory)
 7. composer install
 8. Open the Docker command line (bash) and run:
 9. cp .env.example .env
 10. php artisan key:generate
 11. Create a database
 12. Edit .env.example file and change credentials for the DB section and save the file as **.env**
 13. php artisan migrate
 14. Open Postman and import the **API-CRUD.postman_collection.json** file
 15. Register a user via Postman using the follow POST method ending point: **http://localhost/api/register**
 16. Copy the access_token given in the result and add it to the e-mail and password to a POST method to the login ending point: **http://localhost/api/login**
 17. With the GET method to **http://localhost/api/profile** you can see your user information by entering the access_token
 18. Logout using the ending point **http://localhost/api/logout**. You will receive a goodbye message and your access_token will be deleted as well.
 19. Login again and create a pacientes using the ending point: **127.0.0.1:8000/api/pacientes** as a POST method. Send the **name** and **desc** of the pacientes.
 20. The same ending point **127.0.0.1:8000/api/pacientes** as a GET method will fetch all the pacientes created
 21. **127.0.0.1:8000/api/pacientes/{id}** will GET single data
 22. A PUT method do the ending point **127.0.0.1:8000/api/pacientes/1?name=Name of the pacientes EDITED&desc=This is a short description EDITED** will edit the pacientes with the **id = 1**
 23. And finally, using the DELETE method you can, of course, erase the pacientes **id = 1** pointing the Postman at **127.0.0.1:8000/api/pacientes/1**
 24. Just send a GET request to **/api/pacientes/search** with the desired name and/or cpf parameters. For example, to search for patients with the name "João da Silva", send a GET request to **//api/pacientes/search??name=Joao%20da%20Silva**. To search for patients with CPF **"12345678900"**, send a GET request to **/api/patients/search?cpf=12345678900**.
 25. For Docker Version:
     1.docker-compose up -d
     (this command start up the Docker)
     2.docker-compose exec app bash
     (use this command to run the next command)
     3.composer install
     (this command install all dependencies)
     4.php artisan key:generate
     (this command generate a key)
     5.Change the URL in the POSTMAN to localhost:8989/api/

Thank You!
