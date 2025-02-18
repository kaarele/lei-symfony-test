# Task Manager Application Coding Test (Symfony 7.2)

This is a simple Task Manager application built with Symfony 7.2. It contains some intentional mistakes that you should identify during your code review.

## Overview
**Time allowed:** ~2 hours (with optional “nice-to-have” extensions if the candidate is quick)

**Focus**:
	•	**Communication**: We want to see how you articulate your thought process, explain code decisions, and raise questions when needed.
	•	**Code Quality**: We are interested in your ability to spot issues in existing code and write clear, maintainable code using Symfony best practices.

This test is designed to see not only your technical prowess with Symfony but also how you approach problems, articulate issues, and communicate your reasoning. We value clarity, attention to detail, and the ability to collaborate—even in a testing environment.

---

## Part A: Code Review

### Scenario
We have provided you with a small Symfony project (a “Task Manager” application) that contains some intentionally introduced code quality issues.

### Your Tasks
* **Review the code and identify at least 3 issues:** These could be anything from potential bugs, security concerns, performance problems, or poor adherence to Symfony or general PHP best practices.
* **Explain each issue:** For every issue you identify, please provide, a description of the problem, what is wrong and why it could be an issue, potential impact, your suggested solution(s). After you have found the issues, you could note them down and then just verbally explain what you found and how you fixed the issues.

---

## Part B: Coding Assignment

### Scenario
Implement a new RESTful API endpoint in the existing Task Manager application.

### Requirements
1. **Endpoint Specification:**
    *	**URL:** GET /api/tasks/{id}
    * **Purpose:** Return the details of a specific task in JSON format.
    * **Behavior:**
      * If the task exists, return its data (e.g., id, title, description, status, etc.) with a 200 HTTP status.
      * If the task does not exist, return a 404 response with an appropriate error message.
2. **Implementation Guidelines:**
    * Use Symfony 7.2 best practices (e.g., proper routing configuration, dependency injection, etc.).
    * Ensure that your controller and any service classes are well-structured.
    * Add proper error handling and input validation.
3. **Documentation/Explanation**
    * Along with your code, you could add comments or after the task explain verbally:
	    * Your approach to the problem.
	    * Any design decisions you made.
	    * How you ensured code quality and maintainability.
	    * Any questions or assumptions you had during implementation.
4. **Optional – Nice to Have:**
    * **Unit Testing:** If time permits, add PHPUnit tests for your new endpoint.
    * **Additional Endpoints:** You might also implement a POST /api/tasks endpoint to create a new task, including input validation and proper response codes.
    * **Advanced Symfony Features:** For example, using Symfony’s API Platform or custom Exception Listeners for error handling.

Good luck, and we look forward to discussing your approach!

---

## Getting Started

You can set up the project in one of the following ways:


### Option 1: Docker Setup (recommended)

1. **Clone the repository:**
```bash
git clone git@github.com:kaarele/lei-symfony-test.git
cd lei-symfony-test
```

2. **Build and Start the Containers:**
Make sure you have [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/install/) installed.
Run:
```bash
docker compose up -d
docker compose exec app bash
composer install
# For file permission issues
# docker compose run --rm php chown -R $(id -u):$(id -g) .
```

3. **Access the Application:**
Open your browser at http://localhost:8000.

### Option 2: Local Setup

1. **Clone the repository:**
```bash
git clone git@github.com:kaarele/lei-symfony-test.git
cd lei-symfony-test
```

2. **Install Dependencies:**
Make sure you have Composer installed.
```bash
composer install
```

3. **Set Up Environment:**
Copy the .env file if needed and adjust the database configuration.
```bash
cp .env .env.local
```
Update the database URL in .env.local if necessary.

4. **Database Setup:**
Create the database and run migrations (if you have migrations configured):
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

5. **Run the Application:**
```bash
symfony server:start
```
or
```bash
php -S 127.0.0.1:8000 -t public
```

6. **Access the Application:**
Open your browser at http://localhost:8000.

### Good luck and happy coding!
