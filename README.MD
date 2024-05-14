# Xenophp Framework

Xenophp is a lightweight PHP framework designed to provide developers with a routing system and MVC pattern for building web applications. It aims to simplify the development process and provide a structured approach to managing projects in core PHP.

## Features

### 1. Routing System

Xenophp provides a flexible and powerful routing system that allows you to define routes for your web application. Here's an example of how you can define a route:

```php
Route::get('login', 'LoginController', 'index', [Guest::class]);

// dynamic urls
Route::get('post/{id}','PostController','index');
Route::get('post/{id}/comment/{comment_id}','PostController','comment');

// PostController.php
<?php
namespace App\Controllers;
class PostController{
    public function index($id){
        echo $id;
    }
    public function comment($id, $comment_id){
        echo "Post id : $id and comment Id : $comment_id";
    }
}
```

In the above example, we define a GET route for the /login URL, which will be handled by the index method of the LoginController class. You can also specify middleware classes, such as Guest::class, to apply before handling the route. This enables you to add authentication, authorization, or other custom logic to your routes easily.

###  2. MVC Pattern
Xenophp follows the Model-View-Controller (MVC) pattern, providing a structured approach to building web applications. This pattern helps separate concerns and maintain a clean codebase. With Xenophp, you can create models, controllers, and views to organize your application's logic.

#### Model: Models represent the data structure and interact with the database. You can define your models to handle data operations such as fetching, updating, and deleting records.

#### Controller: Controllers handle the application's business logic. They receive requests from the routing system, interact with models to retrieve data, and pass that data to views for presentation.

#### View: Views are responsible for presenting data to the user. They receive data from controllers and generate the HTML or other output to be displayed in the user's browser.

Xenophp encourages the use of the MVC pattern to ensure code maintainability and separation of concerns.

### Getting Started
To get started with Xenophp, follow these steps:

- Clone the repository or download a specific version from the releases page.
- Set up a virtual host in your web server configuration to point to the Xenophp framework's public directory.
- Configure your database connection in the app/Config/Database.php file.
- Start defining your routes in the routes/route.php file and create corresponding controllers and views.
- Access your application through the defined routes in your web browser.

