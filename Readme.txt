Welcome To DataFeed App :)

1. First install the dependencies (vendor file) of App using Composer after Cloning the repository;

  composer install

2.App could be run from src/UserInterface/App.php with PHP cli Command ;

  php src/UserInterface/App.php

3.Database could be manipulated over cli Command via ORM Tool ;

  3.1 Shows all options
      php bin/doctrine

  3.2 Creates database schema depending on Domain/Entity Classes
      php bin/doctrine orm:schema-tool:create

  3.3 Drop the tables of Database
      php bin/doctrine orm:schema-tool:drop --force

4.Tests could be run via PHPUnit command ;

  vendor/bin/phpunit

5.Database db.sqlite could be opened via SQLite Browser App and Table of Item could be checked;

  https://www.sqlite.org/
  Browse Data
  Table: Item