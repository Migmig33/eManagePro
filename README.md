# 📦 eManagePro - Inventory Management System
eManagePro is an inventory management system designed to help businesses efficiently track, manage, and control products and stock levels. 
It provides a real-time inventory monitoring, transaction ad operation recording, and reporting, helping stocks shortages, overstocking, and manual errors while improving overall operational efficiency

![PHP](https://img.shields.io/badge/PHP-7.2%2B-777BB4?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?logo=mysql)

## 🛠️ Features
- 🔐 **User Authentication** - Secure login and registration system
- 📊 **Real-time Inventory Monitoring** - Track stock levels instantly
- ✏️ **CRUD Operations** - Create, Read, Update, Delete products
- 📝 **Transaction Recording** - Log all inventory movements
- 📈 **Reporting System** - Generate inventory reports
- 📱 **Responsive Design** - Works on desktop and mobile devices
- 🎨 **Modern UI** - Clean and intuitive interface

# Tech Stack
### Frontend
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

### Backend
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

### Server
![Apache](https://img.shields.io/badge/Apache-D22128?style=for-thehttps://github.com/Migmig33/eManagePro/pulse-badge&logo=apache&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)

# Live Demo
1. Open VPN(e.g Thunder VPN)
2. Connect to Different Server (e.g America, Japan)
3. Open Browser
4. Type `emanagepro.rf.gd` in Address Bar

# Requirements
-PHP >= 7.2
-MySQL >= 5.7
-Apache web server
-Xampp(for local development)

## 🚀 Installation
### 1. Clone The Repository
```bash
gti clone https://github.com/Migmig33/eManagePro.git
cd project-name
```

### 2. Import Database
1. Open phymyAdmin
2. Create a new Database (name: `emanagepro`)
3. Import the SQL file
   - Click on your database
   - Go to **Import** tab
   - Choose `sql/database.sql` from the project folder
   - Click **Go**
4. Configure Event_Scheduler
   - Click on your database
   - Go to **SQL**
   - Insert this query `SET GLOBAL event_scheduler = ON`
   - OR Click `Events`
   - Switch `On` Event Scheduler
### 3. Start the Server
**Using Xampp:**
1. Copy project to `C:/xampp/htdocs/your-project`
2. Start Apache and MySql in Xampp Control Panel
3. Open browser: `http://localhost/your-project/index.html`


## 📂Project Structure

```

eManagePro/
├── assets/              # Static assets (CSS, JS, images)
├── auth/                # Authentication files function (login, register, logout)
├── db/                  # Database connection files
├── func/                # Functions/helpers (reusable PHP functions)
├── public/              # Public-facing pages
│    ├──js/              # Js Files
│    ├──view/            # Pages (Dashboard, Profile, Operation, Inventory, Report)
│    ├──css/             # Css Files
|    └──loadDatas/        # Php Function/ Js Function for Rendering Data
├── sql/                 # SQL database files/dumps
├── README.md            # Project documentation
├── index.html           # Landing/login page
└── user_list.php        # User listing page (just view of users/ no design)
```
## 🔑 Default Login Credentials
**User Account**
- Employee Number: `202310386`
- Password: `true`


## Screenshots
**Login**
<img width="1879" height="882" alt="image" src="https://github.com/user-attachments/assets/089e1e80-224e-4340-9dbe-a0a02124e8ee" />
**Profile**
<img width="1899" height="886" alt="image" src="https://github.com/user-attachments/assets/6ae151a0-949f-4045-ac74-7064d0da3a5b" />
**Dashboard**
<img width="1878" height="888" alt="image" src="https://github.com/user-attachments/assets/4969649b-92f7-499a-9b1a-f2704a197dc4" />
**Transactions**
<img width="1865" height="887" alt="image" src="https://github.com/user-attachments/assets/78125b25-89a8-4457-8d6d-b23c73cf365c" />
**Operations**
<img width="1875" height="891" alt="image" src="https://github.com/user-attachments/assets/d321abf6-1b22-43c9-ad23-239ad5ed9f56" />
**Reports**
<img width="1851" height="886" alt="image" src="https://github.com/user-attachments/assets/220909c7-c368-4281-9acf-1722f9d51d25" />
**Inventory**
<img width="1852" height="883" alt="image" src="https://github.com/user-attachments/assets/4cb1ba75-6899-4be3-832a-7a9f352e2a18" />


## 🐛 Common Issues & Solutions

**Problem:** Cannot connect to database(Installation)
```
Solution: Check your database credentials in /db/connection.php
```
**Problem:** No Update/Insert/Delete log in Report Page(Live Demo)
```
Explanation: It's only free hosting there is no 'trigger' feature in phpmyadmin
Solution: Use 'INSTALLATION METHOD' for full functionality and feature
```


## 📞 Contact

**Developer:** Miguel Andrei C Tan
**Email:** migztan66@gmail.com

**Published** December 2025

**Project Link:** [https://github.com/Migmig33/eManagePro](https://github.com/Migmig33/eManagePro)



