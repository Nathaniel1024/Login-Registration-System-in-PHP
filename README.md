# Login & Registration System in PHP

A simple and secure PHP-based login and registration system with features like user authentication, password hashing, and responsive design.

## Features

- User authentication with password hashing.
- Input sanitization for security.
- Dynamic feedback messages.
- Responsive design using HTML and CSS.

## Screenshots

### Login Screen
![Login Screen](https://github.com/user-attachments/assets/3b8a6225-aa35-488c-a438-36791f8acaef)

### Registration Screen
![Registration Screen](https://github.com/user-attachments/assets/b61572b4-f198-4124-a77a-8366d8084c01)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/login-registration-system.git
   ```

2. Navigate to the project directory:

   ```bash
   cd login-registration-system
   ```

3. Set up the database:

   - Use the following SQL script to create the `users` table:

     ```sql
     CREATE TABLE `project_db`.`users` (
         `id` INT(255) NOT NULL AUTO_INCREMENT,
         `username` VARCHAR(255) NOT NULL,
         `password` VARCHAR(255) NOT NULL,
         `reg_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
         PRIMARY KEY (`id`),
         UNIQUE (`username`)
     ) ENGINE = InnoDB;
     ```

4. Configure the database connection:

   - Open `php/database.php`.
   - Update the database credentials (`host`, `username`, `password`, `database_name`) as per your setup.

5. Start your web server and access the project in your browser:

   ```
   http://localhost/login-registration-system
   ```

## Usage

1. Register a new account by filling out the registration form.
2. Log in using your credentials.
3. Upon successful login, you will be redirected to the home page (`php/home.php`).

## File Structure

- `index.php`: Main login and registration page.
- `php/database.php`: Database connection script.
- `php/home.php`: Home page displayed after login.
- `style.css`: Stylesheet for the project.

## Security Measures

- **Password Hashing**: Passwords are securely stored using PHP's `password_hash()`.
- **Input Sanitization**: Inputs are sanitized to prevent SQL injection and XSS attacks.
- **Session Handling**: Sessions are used to manage user authentication.

## License

This project is open-source and available under the [MIT License](LICENSE).

## Contributing

Feel free to fork the repository, make improvements, and submit a pull request. Contributions are always welcome!

## Author
- **GitHub**: [nathaniel1024](https://github.com/nathaniel1024)

## Acknowledgments

Special thanks to the open-source community for providing valuable resources and tools.
