# CRM System

## Overview

This project is a Customer Relationship Management (CRM) system built using the Laravel framework. It aims to provide businesses with a comprehensive tool to manage customer interactions, track sales, and automate marketing efforts.

## Features

-   **Contact Management**: Store and manage customer contact information.
-   **Sales Management**: Track and manage sales leads and opportunities.
-   **Customer Support**: Manage customer service requests and inquiries.
-   **Marketing Automation**: Automate email campaigns and marketing tasks.
-   **Analytics and Reporting**: Generate reports to analyze customer data and track performance.
-   **Workflow Automation**: Automate routine tasks to improve efficiency.

## Installation

1. Clone the repository:

    ```bash
    git clone git@github.com:sirajyesuf/uktell-crm.git

    ```

2. Navigatae to the project
    ```bash
    cd uktell-crm
    ```
3. Install the dependencies
    ```bash
    composer install
    ```
4. Copy the `.env.exampe` file to `.env`
    ````bash
     cp .env.example .env
    5.Configure your enviroment variable:
    ```bash
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
    ````
5. Generate an application key:
    ```bash
     php artisan key:generate
    ```
6. run the database migrations:
    ```
    php artisan migrate
    ```
7. Install npm dependecies
    ```bash
    npm install
    ```
8. Compile the assets
    ```bash
    npm run dev
    ```
9. Serve thr application

```bash
php artisan serve

