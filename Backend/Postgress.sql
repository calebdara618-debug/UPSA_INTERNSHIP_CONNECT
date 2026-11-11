CREATE DATABASE upsa_internship_connect;
CREATE TABLE users(
    id SERIAL PRIMARY KEY,
    fullname VARCHAR(150) NOT NULL,
    email VARCHAR (150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR (30) DEFAULT 'student',
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);