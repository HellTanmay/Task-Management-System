# Task Managment System

A clean and minimal Task Management System built using **Laravel**, allowing users to create, manage, prioritize, and complete tasks efficiently.

---

## 📁 Project Structure (MVC)

- **Models:**  
  `App\Models\Task`

- **Controllers:**  
  `App\Http\Controllers\TaskController`

- **Views:**  
  `resources/views/tasks`
  - `index.blade.php`
  - `addtasks.blade.php`
  - `edit.blade.php`
    
  `resources/views/layout`
  - `layout.blade.php`

- **Routes:**  
  `routes/web.php`

---

## 🗄 Database Schema

**tasks table**

| Column | Type |
|------|------|
| id | bigint |
| title | string |
| description | text (nullable) |
| Priority | enum (low, medium, high) |
| Status | enum (pending, completed) |
| created_at | timestamp |
| updated_at | timestamp |

---

## ⚙️ Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/HellTanmay/Task-Management-System.git
   cd Task-Management-System
   ```

2. Install php and javascript dependencies
    ```bash
    composer install
    npm install
    ```
3. Configure Environment
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4. Update .env with database credentials
   If you are using mysql change the DATABASE_CONNECTION to mysql

7. Run migrations
    ```bash
    php artisan migrate
    ```
5. Start the Development server

    ```bash
    php artisan serve
    ```
6. Open another terminal and run the node server

    ```bash
    npm run dev
    ```
7. Visit
    ```bash
    http://127.0.0.1:8000
    ```
