# The CodeAcademy last project

## _The task manager system_

![Build Status](https://img.shields.io/badge/phpstorm-version%208.0-green)

This is an exam project from the CodeAcademy team for managers to give and create new tasks for your employees. With new
properties for the multi-task employees.

## Installation

Task manager requires [Github](https://github.com/daniilalex/task_manager_system).

- Make a clone of repository

```sh 
git clone git@github.com:daniilalex/task_manager_system.git
```

- In the DATABASE_FILE directory there is a login detail file
- Create or choose(default) database on your pc local.
- Open the migration.php file in the directory DATABASE_FILE.
- Change or leave(default values) to your connection in the DATABASE_FILE/migration.php and Classes/Repository.php
- Run the migration.php file in your IDE console.

```sh 
php DATABASE_FILE/migration.php
```

Verify the deployment by navigating to your server address in your preferred browser.

```sh
127.0.0.1:8000
```