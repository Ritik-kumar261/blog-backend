
This is the backend of the blog application built using Laravel. It provides a REST API to manage blog posts.

## 📌 Features
- Create, Read, Update, Delete (CRUD) operations for blogs
- Pagination for blog listing
- Error handling and validation

## 🚀 Installation & Setup

### 1️⃣ Clone the Repository
\`\`\`bash
git clone https://github.com/Ritik-kumar261/blog_page.git
cd blog_page
\`\`\`

### 2️⃣ Install Dependencies
\`\`\`bash
composer install
\`\`\`

### 3️⃣ Configure Environment
- Copy \`.env.example\` to \`.env\`
\`\`\`bash
cp .env.example .env
\`\`\`
- Update **database details** in \`.env\`:
\`\`\`env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
\`\`\`

### 4️⃣ Generate Application Key
\`\`\`bash
php artisan key:generate
\`\`\`

### 5️⃣ Run Migrations & Seed Data
\`\`\`bash
php artisan migrate --seed
\`\`\`

### 6️⃣ Start the Development Server
\`\`\`bash
php artisan serve
\`\`\`

## 📡 API Endpoints
| Method | Endpoint           | Description              |
|--------|-------------------|--------------------------|
| GET    | \`/api/blogs\`       | Get all blogs (Paginated) |
| GET    | \`/api/blogs/{id}\`  | Get a single blog       |
| POST   | \`/api/blogs\`       | Create a new blog       |
| PUT    | \`/api/blogs/{id}\`  | Update a blog          |
| DELETE | \`/api/blogs/{id}\`  | Delete a blog          |

## 🛠️ Technologies Used
- Laravel 11
- MySQL
- PHP
- Composer

## 📜 License
This project is open-source under the MIT License." > README.md
>>>>>>> fix-readme
