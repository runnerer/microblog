How to test the project?

1. clone the repo
2. inside the src dir - run composer install
3. open a db app and run the sql from the migration file - this will create db and tables
4. at / is the public view
5. at /admin is the admin view - to log in use email: beni@abv.bg and pass: 123456789

How to run the tests?

1. inside the src dir run: ./vendor/bin/phpunit tests
