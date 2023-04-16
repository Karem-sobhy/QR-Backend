Backend for QR Code Reader Web Application
==========================================

This is the backend for a simple web application that allows users to authenticate, and save the data in the database in an efficient way and also retrieve the data to visualize it using Laravel and any front-end framework.

Prerequisites
-------------

To run this application, you will need to have the following installed on your system:

*   Web server and PHP 8.1 or higher
*   MariaDB 10.3+ / MySQL 5.7+
Installation
------------

To install and run this application, please follow these steps:

1.  Clone the repository to your local machine.
2.  Run 
```shell
composer install
//to install the required dependencies.
```

3.  Create a new `.env` file from the provided `.env.example` file.
4.  Generate a new application key by running
```
php artisan key:generate
```
5.  Run 
```shell
php artisan migrate
//to migrate the database tables.
```

6.  Run the application by running 
```shell
php artisan serve
```
 or by configuring a web server such as NGINX or Apache.

Endpoints
---------

This application has the following endpoints:

*   `/login`: handles user authentication.
*   `/register`: handles user registration.
*   `/user`: fetches the authenticated user.
*   `/store`: saves the data to the database.
*   `/view`: exposes the yajra datatable to use with datatablejs.

Data storage
------------

To store the CSV data in the database, the application uses the `upsert` function to bulk insert or update any number of rows, using the most efficient data types for the CSV columns.

Observers
---------

The application uses the event/listener observer pattern to update a user's "rows\_count" column when new CSV data is saved to the database, due to the fact that the `upsert` function doesn't fire the built-in Laravel Model observers.

Validation
----------

All data coming from the frontend is validated using `predefined requests` to ensure data consistency and to prevent corruption of the database.

Docker
------

This application is Dockerized and includes the necessary files to build the Docker image for the app.
