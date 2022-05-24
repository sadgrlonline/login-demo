# Registration & Login Demo

This is a demonstration of a secure registration and login system built with PHP and SQL.

This demo has been tested with PHP 7.4.

# About This Project

I wanted to make a 'generic' template for a registration/login system that I could use across different projects, but I wanted the opportunity to clean up my code a little bit more. I'm sure this could use more work, so maybe I'll come back to it from time to time with improvements.

# Features

- Email activation link sent upon signup.
- Stores passwords hashed & salted in the database.
- Uses PHP prepared statements for security.
- Uses parameterized SQL statements for protection against injection.
- Includes a 'forgot password?' link that prompts for username and emails a reset code.
- Includes a 'forgot username?' link that prompts for e-mail and emails a list of associated usernames.
- Allows users to create alternate accounts with the same e-mail address (I wanted to challenge myself to develop this feature specifically, because it's one I like to see.)

# The Webpages

1. Home `/index.php`
    public, view only, I put up a description of this project on there
2. Register `/register.php`
    the registration form, which emails the user with a confirmation link upon submission
3. Login `/login/`
    the login form
4. Forgot Password `/login/forgot/password/`
    a form to request a password reset
5. Forgot Username `/login/forgot/username/`
    a form to request a forgotten username

# The Database

The database is the back-end which stores the data; it has the following tables:

## Table: `users`

Each row of the `users` table has eight columns:

1. `id`: unique identifier for each row
2. `datetime`: date of registration
3. `email`: user email
4. `name`: user name
5. `username`: username
6. `password`: password encoded with bcrypt
7. `hash`: password encrypted with MD5
8. `active`: whether or not the account is active (0 or 1)

## Table: `password_reset_temp`

Each row of the `password_reset_temp` table has three columns:

1. `username`: username
2. `key`: validation key that is appended to the email link
3. `expDate`: date the validation key expires

# How to Clone & Make a Copy
1. Download a `.zip` of the repo or `git clone` it.
2. [Create a database](https://learn.sadgrl.online/create-a-user-and-database-on-leprd/) and [import the schema](https://learn.sadgrl.online/import-a-database-schema-into-phpmyadmin/) from `sadness_logindemo`
3. Update the `config.php` file with your database username and password.
4. Update all `mail-notif.php` with your information (a mailserver is required to send mail)