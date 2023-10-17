## Before lab instalation:
  - You need to make sure docker is installed on your workstation. Please follow the instructions from the URL below for installing docker before you start lab instalation:

    https://docs.docker.com/compose/install/

## Lab instalation:
**Step1:**
  - Get into the framework directory:
    ```sh
    cd /your/framework/directory
    ```
  - Start docker by running the following command:
    ```sh
    docker-compose up -d
    ```
  - Now you should be able to access the project through:
    http://localhost:8080/

**Step2:**
  - After your work is done you can stop docker by running the following command from your project directory:
    ```sh
    docker-compose down
    ```

**For composer update:""
  - To update composer:
  ```sh
  docker exec jambura-composer composer update
  ```

## Database migration instructions:
**Create migration file:**
  - To create a migration file you have to run the following command:
    ```sh
    docker exec jambura-php-apache2 vendor/bin/phinx create MigrationName
    ```
**Run migration file:**
  - To run a migration file you have to run the following command:
    ```sh
    docker exec jambura-php-apache2 vendor/bin/phinx migrate -e development
    ```
**For more information about migrations please visit https://book.cakephp.org/phinx/0/en/migrations.html**