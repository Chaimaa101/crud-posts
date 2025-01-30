<h3 align="center">
	📝 CRUD Posts – Laravel Application
</h3>

## 📖 Table of Contents

<details>
<summary>Click to expand</summary>

- [📖 Table of Contents](#-table-of-contents)
- [📷 Demo](#-demo)
- [⛓ Description](#-description)
  - [Create Posts](#create-posts)
  - [View Posts](#view-posts)
  - [Edit Posts](#edit-posts)
  - [Delete Posts](#delete-posts)
  - [Post Validation](#post-validation)
  - [Pagination](#pagination)
  - [Responsive UI](#responsive-ui)
- [🔨 Development](#-development)
  - [Tech Stack](#tech-stack)
- [☑️ Installation](#-installation)
  - [Usage](#usage)
- [🤝 Collaborators](#-collaborators)

</details>

## 📷 Demo

https://github.com/user-attachments/assets/7360b99c-fe32-4117-a9c8-847d5075e51f

## ⛓ Description

**CRUD Posts** is a simple web application built with **Laravel** that demonstrates basic **Create, Read, Update, and Delete (CRUD)** operations for managing blog posts. The app allows users to manage posts by adding, editing, viewing, and deleting posts through a user-friendly interface. This project was created to practice the fundamentals of **Laravel** and database interactions.

### 🚀 Features

#### ✅ Create Posts
- Users can add new blog posts with a title, content, and any additional metadata.

#### ✅ View Posts
- Users can view a list of all posts and read individual posts with detailed information.

#### ✅ Edit Posts
- Users can edit existing posts to update the title, content, or metadata.

#### ✅ Delete Posts
- Users can delete posts that are no longer needed.

#### ✅ Post Validation
- Built-in validation ensures that all required fields (e.g., title and content) are provided before submitting a post.

#### ✅ Pagination
- Pagination is implemented for easy browsing of large numbers of posts.

#### ✅ Responsive UI
- Clean and modern interface with **Tailwind CSS** for a fully responsive design across desktops, tablets, and mobile devices.

---

## 🔨 Development

### 🛠️ Tech Stack  
- **Backend:** Laravel  
- **Frontend:** Blade, Tailwind CSS  
- **Database:** MySQL  
- **Authentication:** Laravel built-in auth  
- **Routing:** Laravel Routes  
- **Validation:** Laravel form validation

---

## ☑️ Installation  

1. **Clone the repository:**  
   ```bash
   git clone https://github.com/yourusername/crud-posts.git
   cd crud-posts
2. **Install dependencies:**
   ```bash
   composer install
    npm install
3. **Set up the environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
4. **Configure the database in .env and run migrations:**
   ```bash
   php artisan migrate
5. **Run the development server:**
    ```bash
    php artisan serve
    npm run dev
    
