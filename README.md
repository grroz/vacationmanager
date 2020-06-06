# Vacation Corporate Manager 

Based on a fictional concept, employees can log in and request vacation days.
A supervisor/administrator will log in as well and approve or reject requests sent by each user.

## User Capabilities
Users are able to: 
- `sign in` and `sign out` on the platform
- `create new applications` filling the appropriate fields
- `view` if their applications have been `approved` or `rejected` by the supervisor/administrator

## Admin/Supervisor Capabilities
A Supervisor/Administrator is able to:
- `sign in` and `sign out` on the platform
- `manage` active applications published by the users (`approve` or `reject` them)
- `create` new users or `edit` existent

## DB Schema
Due to the current approach, there is no viable need to create an ER diagram 
since we only have two active tables within our DB, `users` and `requests`.
Created a `user_id` column to the `requests` table to match each `id` from `users` {`1-N` (1 user has N requests)}.
I have bypassed the need for an `admin` since the only difference between an `plain` and an `admin` user is their `dashboards` and their `type` column.

## Seeds and Usaged
You can use the following credentials to log in:
- Type `user/employee` - Email: `karlzafiris@gmail.com`, Password: `admin`
- Type `user/admin` - Email: `gwills@gmail.com`, Password: `admin`

## Technologies Used 
Frontend:
- `Bootstrap 3` (Responsive Framework/CDN)
- `FontCDN` (Online Fonts)
- `jQuery`
Backend:
- Native `PHP 7`
- `MySQL`

## Requirements and Installation
A `Xampp` web server or any webserver with MySQL and PHP 7+.
- `Import` the SQL dump file using the `phpmyadmin` panel/or any panel available
- `Move` files to the `htdocs` folder of your web server
- `Start` the `apache` and `mysql` services
- Open the browser and head over `localhost` 

## Authorship & License 
`G. Karl Zafiris` - `georgezafiris.com` - `MIT`
