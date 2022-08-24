# Management Project

This project was generated with [Laravel Framework](https://laravel.com/) version 8.75.


## Table of Contents

* [Description](#description)
* [Launching Project](#launching-project)
* [Team Names](#team-names)
* [Dependencies](#dependencies)


## Description

- The Project enables you to manage Users, Roles and Movies in which you can Display list of:- Users,Roles and Movies, and you can Create,Update,Delete and See Details of:- Users,Roles and Movies.
- You can create an account on by filling in the information through the registration form page and based on that you gain User role.
- You can't browse the website if you're not logged in. So, you should login before entering Home Page and navigate between other pages.
- Privilages:-
   - If you're a **Super Admin** then you have privilages by which you can Manage Users, Roles and Movies.
   - If you're an **Admin** then you have privilages by which you can Manage Users and Movies.
   - If you're a **User** then you can see List of Movies and Movie Details.
   - In case you logged in with Super Admin privilage then you can add any Other Role with any privilage you want.


## Launching Project

1. Download the project.
2. Open XAMPP Control Panel and start Apache and mySQL.
   - If it's not installed. Go to [XAMPP-Apache](https://www.apachefriends.org/download.html) then download version 7.4.29.
3. Open managementInsertDB.sql file and run the code inside it to import Project's Database.
4. Open cmd and navigate to folder location using cd command or just open cmd in the required location then run command `php artisan serve` to launch the project.
5. Navigate to `localhost:8000` in browser to see the project.



## Team Names

- [Assem Mohamed Ahmed Samy](https://github.com/Assemmohamed0)
- [Ahmed Salah Mohammed](https://github.com/Ahmedsalahmohammed22)

## Dependencies

* Laravel `Laravel framework ^8.75`
* PHP `PHP ^7.3|^8.0`
* Bootstrap `Bootstrap 5`
* FontAwesome `FontAwesome 6.1.1`
