# crud-app
Alright — here’s one single README.md content block without separating explanations into multiple code sections so you can copy-paste directly to GitHub in one go.


---

📱 Mobile Products CRUD App

A simple Create, Read, Update, Delete (CRUD) application for managing mobile products, built using PHP, MySQL, HTML, CSS, and JavaScript.

🚀 Features

Add new mobile products with name, description, MRP, price, and product image.

View all products in a list/table.

Update product details.

Delete products from the database.

Upload and display product images.

Responsive design for desktop and mobile.


🛠️ Tech Stack

Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL

Server: XAMPP / WAMP / MAMP


📂 Folder Structure

mobile-crud/
├── config/
│   └── db.php          # Database connection file
├── uploads/            # Stores uploaded product images
├── create.php          # Add new product form
├── read.php            # List all products
├── update.php          # Edit product details
├── delete.php          # Delete product
├── index.php           # Redirect or home page
├── style.css           # App styling
├── script.js           # Optional JS functions
└── README.md           # Project documentation

⚙️ Installation & Setup

1. Clone this repository
git clone https://github.com/your-username/mobile-crud.git
cd mobile-crud


2. Move the project into your XAMPP htdocs folder:
C:\xampp\htdocs\mobile-crud


3. Create Database

Open phpMyAdmin.

Create a database named mobile_products.

Import the database.sql file from this repository.



4. Edit Database Connection
Open config/db.php and update:

<?php
$host = "localhost";
$user = "root"; // default XAMPP username
$pass = "";     // default XAMPP password
$dbname = "mobile_products";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


5. Run the App

Start Apache and MySQL in XAMPP.

Open your browser and visit:
http://localhost/mobile-crud/read.php
		


📜 License

This project is licensed under the MIT License - free to use and modify.

👨‍💻 Author

Your Name – GitHub Profile


---

If you want, I can now make the database.sql and all PHP CRUD files so you can upload the full working project to GitHub in one go.
Do you want me to create that?



