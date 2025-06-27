# 🧠 Famous Quote Quiz

&#x20;

## About The Project

**Famous Quote Quiz** is a Laravel + Vue.js web application that tests users' knowledge through a quote-based quiz. It features two modes: Binary (Yes/No) and Multiple Choice (3 options). The quiz can be taken by guest users, and results such as score, unanswered questions, and time are tracked. Admin users can manage questions and view guest statistics.

This application fulfills the task requirements for the "Famous Quote Quiz" coding challenge.

### Features

- Binary (Yes/No) and Multiple Choice quiz modes
- Timer-limited quiz sessions (default: 5 minutes)
- Score and time tracking
- Leaderboard of top scorers
- Admin panel to manage questions and view session history

### Built With

- [Laravel](https://laravel.com) – v11.x or later
- [Vue.js](https://vuejs.org)
- MySQL

---

## Getting Started

These instructions will help you get a copy of the project up and running on your local machine.

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL / MariaDB

### Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/milchevyordan/famous-quote-quiz.git
   cd famous-quote-quiz
   ```

2. **Install dependencies**

   ```bash
   composer install
   npm install && npm run build
   ```

3. **Create environment file**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure your ****\`\`**** file** with DB credentials:

   ```env
   DB_DATABASE=famous-quiz-laravel
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Set up the database** — choose one of the two options below:

   **Option 1: Import the SQL dump**

   ```sql
   -- in phpMyAdmin or MySQL CLI
   source famous-quote-quiz/famous-quiz-laravel.sql;
   ```

   **Option 2: Run migrations and seeders**

   ````bash
   php artisan migrate --seed
   ````

6. **Serve the application**

   ```bash
   php artisan serve
   ```

## Admin Credentials

Use the following credentials to log in as an admin:

- **Email:** test@example.com
- **Password:** 123456789
---

## Usage

1. Start the quiz as a guest user
2. Answer 10 randomly selected questions
3. See feedback after each answer (correct/incorrect)
4. Submit quiz before the timer expires
5. View score, unanswered questions, and time taken
6. Admins can log in to add/manage questions and view results

---

## Admin Features

- Login for admin user
- Create/edit Binary and Multiple Choice questions
- View guest attempt history (name, email, score, unanswered, time)
- Questions created by admin are instantly visible in quizzes

---

## Contact

Your Name – [@milchevyordan](https://github.com/milchevyordan) – [milchevyordan2@gmail.com](mailto\:milchevyordan2@gmail.com)\
Project Repository – [https://github.com/milchevyordan/famous-quote-quiz](https://github.com/milchevyordan/famous-quote-quiz)

---

## Acknowledgments

- [Laravel Documentation](https://laravel.com/docs)
- [Vue.js Documentation](https://vuejs.org/guide/)
- [phpMyAdmin](https://www.phpmyadmin.net/)
---

