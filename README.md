# Registration & Login Demo

This is a demonstration of a secure registration and login system built with PHP and SQL.

This demo has been tested with PHP 7.2.34.

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
