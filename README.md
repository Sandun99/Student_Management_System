# Student Management System

A Laravel-based web application designed for managing student information and educational records.  
The project features a complete frontend interface with student profile management, image handling capabilities, teacher management with image support, and PDF document generation functionality.

## Features

- Student information management and profile system
- Teacher management with image upload, storage, and deletion functionality
- Student image upload with real-time preview capability
- PDF document generation using DOMPdf
- Responsive frontend interface with multiple styling options
- Database-driven student and teacher record management
- User profile page functionality

## Technology Stack

- **Backend**: Laravel (PHP web framework)
- **Frontend**: Blade templating, CSS, JavaScript
- **Database**: MySQL with Laravel Eloquent ORM and schema migrations
- **Build Tools**: Vite, Composer, npm
- **PDF Generation**: DOMPdf library
- **Testing**: PHPUnit

### Language Distribution
- CSS: 65.3%
- Blade: 18.7%
- PHP: 16.0%

## Installation

1. Clone the repository
   ```bash
   git clone https://github.com/yourusername/student-management-system.git

2. Navigate to the project directory
    ```bash
   cd student-management-system

3. Install dependencies
    ```bash
   composer install
    npm install

4. Copy the environment file and configure it
    ```bash
   cp .env.example .env
   
5. Generate application key
    ```bash
   php artisan key:generate
   
6. Run database migrations
    ```bash
   php artisan migrate
   
7. (Optional) Seed the database with sample data
    ```bash
   php artisan db:seed
   
8. Build assets
    ```bash
    npm run dev
   #or for production
    npm run build

9. Start the development server
    ```bash
   php artisan serve

## Usage

- Access the application at http://localhost:8000
- Use the admin panel to manage students, teachers, and generate PDF reports
- Upload images for students and teachers with instant preview
- Generate and download PDF documents as needed

## License
- This project is open-source software licensed under the MIT License.


