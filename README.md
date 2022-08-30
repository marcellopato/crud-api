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
 19. Login again and create a program using the ending point: **http://localhost/api/produtos** as a POST method. Send the **name** and **desc** of the program.
 20. The same ending point **http://localhost/api/produtos** as a GET method will fetch all the produtos created
 21. **http://localhost/api/produtos/{id}** will GET single data
 22. A PUT method do the ending point **http://localhost/api/produtos/1?name=Name of the program EDITED&desc=This is a short description EDITED** will edit the program with the **id = 1**
 23. And finally, using the DELETE method you can, of course, erase the program **id = 1** pointing the Postman at **http://localhost/api/produtos/1**

Thank You!
