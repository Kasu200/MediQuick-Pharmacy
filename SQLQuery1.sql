USE mediquick_db;

-- පරණ table එකක් තිබේ නම් එය ඉවත් කිරීම
DROP TABLE IF EXISTS users;

-- අලුතින් table එක සෑදීම
CREATE TABLE users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'customer',
    created_at DATETIME DEFAULT GETDATE()
);