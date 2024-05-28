CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255),
    username VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10, 2) NOT NULL,
    category VARCHAR(255) NOT NULL,
    category_id INT,
    date DATE NOT NULL,
    description TEXT,
    type ENUM('income', 'expense') NOT NULL,
    user_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO categories (id, name) VALUES
(1, 'Food'),
(2, 'Trip'),
(3, 'Transport'),
(4, 'Entertainment'),
(5, 'Bills'),
(6, 'Rent'),
(7, 'Education'),
(8, 'Clothes'),
(9, 'General'),
(10, 'Investment'),
(11, 'Salary');
