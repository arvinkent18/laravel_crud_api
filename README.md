## Laravel RESTful API
> Laravel 6.2 API RESTful API is an example of a School or University Enrollment Web Application that uses JWT Authentication and Repository Pattern with the following REST: GET, PATCH, and Delete.

``` bash
# Install Dependencies
composer install

# Generate key
php artisan key:generate

# Run migrations
php artisan migrate
```

## Endpoints

### List all courses
``` bash
GET api/courses?token=<token_key_from_jwt>
```

### Get single course
``` bash
GET api/courses/{id}?token=<token_key_from_jwt>
```

### Store new course
``` bash
POST api/courses
name/token
```

### Update course
``` bash
PATCH api/courses/{id}?token=<token_key_from_jwt>
```

### Delete course
``` bash
DELETE api/courses/{id}?token=<token_key_from_jwt>
```

## Application Info

### Author

Arvin Kent S. Lazaga

### Version
1.0.0

### Tseting
Unit Testing in ongoing.
