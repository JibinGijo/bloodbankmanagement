# Blood Bank Management System

The Blood Bank Management System is a web-based application designed to manage blood donations, stock, and exchanges efficiently. It provides separate interfaces for administrators and users, allowing them to perform various operations like donor registration, blood stock tracking, and blood exchange management.

## Features

### Admin Features
- **Donor Management**: Register new donors and view the list of existing donors.
- **Blood Stock Management**: View the current stock of blood by blood group and track out-of-stock blood.
- **Blood Exchange Management**: Register blood exchanges and view the list of exchanged blood.

### User Features
- **User Registration**: Create a new user account.
- **Dashboard**: Access donor registration, donor list, and blood stock information.

### General Features
- **Authentication**: Secure login for both admins and users.
- **Responsive Design**: User-friendly interface with responsive layouts.
- **Database Integration**: Uses MySQL for storing and managing data.
- 
### Key Files
- **`admin-home.php`**: Admin dashboard.
- **`user-home.php`**: User dashboard.
- **`donor-reg.php`**: Donor registration form.
- **`donor-list.php`**: Displays a list of registered donors.
- **`stock-blood-list.php`**: Displays the current blood stock.
- **`out-stock-blood-list.php`**: Displays out-of-stock blood.
- **`exchange-blood-list.php`**: Blood exchange registration form.
- **`exchanged-blood-list.php`**: Displays a list of exchanged blood.
- **`connection.php`**: Database connection file.
- **`index.php`**: Login page for admins.
- **`logout.php`**: Handles user logout.

## Setup Instructions

1. **Install XAMPP**:
   - Download and install XAMPP from [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html).
   - Start Apache and MySQL services.

2. **Place the Project**:
   - Copy the project folder to `c:/xampp/htdocs/bbms`.

3. **Database Setup**:
   - Create a MySQL database named `mypro_bbms`.
   - Import the database schema .

4. **Access the Application**:
   - Open a browser and navigate to `http://localhost/bbms/index.php`.

## Technologies Used

- **Frontend**: HTML, CSS
  - `css/s1.css`: Styles for user-facing pages.
  - `css/admin-style.css`: Styles for admin-facing pages.
- **Backend**: PHP
- **Database**: MySQL

## Potential Improvements

- Add input validation and sanitization to prevent SQL injection.
- Implement password hashing for secure storage.
- Provide a database schema or migration script.
- Enhance the UI with modern frameworks like Bootstrap.
- Add email notifications for donors and admins.

## License

This project is for educational purposes only and is not intended for production use.
