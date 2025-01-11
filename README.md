
# RESTAPI CRUD

Its restapi CRUD, The purpose of the application is to enable the user to send information about the company and its employees.


## First step
For the first step we need to migrate data to db:
```
php artisan migrate
```
This command will be created db for us.

```
php artisan serve
```

And we can tested this API with postman:
```
https://www.postman.com/downloads/
```

To begin with, we need to register
```
api/register
and format in json raw in postman
{
    "name" : "test",
    "email" :"test@test.com",
    "password" : "test"
}
```

You then log in to the application using your email and password.
```
api/login
```

When the login is successful, we will receive a token, which we have to add in the postman under Authorization -> AuthType(select input) ->Bearer Token and paste into the empty field.

```
Now we can tested all endpoints in this app :). Enjoy!
```
## Endpoints
```http
 
  GET|HEAD        api/companies 
  POST            api/companies
  GET|HEAD        api/companies/{company} 
  PUT|PATCH       api/companies/{company}
  DELETE          api/companies/{company}
  GET|HEAD        api/employees 
  POST            api/employees 
  GET|HEAD        api/employees/{employee} 
  PUT|PATCH       api/employees/{employee}  
  DELETE          api/employees/{employee} 
  POST            api/login 
  POST            api/register
  GET|HEAD        api/user
```

