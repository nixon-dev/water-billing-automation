# 💧 Water Billing Automation

A simple Water Billing System that automates the calculation and delivery of billing statements to consumers.

> 🚀 This was a college learning project to deepen my understanding of web development using raw PHP and MySQL.

---

## 📌 Features

- 💡 Automated water bill computation
- 📬 Email Verification using PHPMailer
- 📊 Interactive data tables using DataTables
- 📈 Visual reports using Chart.js
- 🔐 Basic user authentication
- 🛠 Admin and Staff dashboard for managing consumers and bills
- 🧑🏼‍🦰 Consumer dashboard to conveniently view their bills and meter readings

---

## 🧰 Tech Stack

- **Backend:** PHP (no framework)
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript
- **Libraries & APIs:**
  - [PHPMailer](https://github.com/PHPMailer/PHPMailer) – for sending billing statements via email
  - [DataTables](https://datatables.net/) – for enhanced table functionality
  - [Chart.js](https://www.chartjs.org/) – for graphical data representation


## 🔧 Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/nixon-dev/water-billing-automation.git
2. Setup MySQL database
3. After importing MySQL DB, change credentials in assets/includes/db_conn.php
   ```php
   $host = 'localhost';
   $username = 'your_db_username';
   $password = 'your_db_password';
   $database = 'your_db_name';
