CREATE DATABASE IF NOT EXISTS psp_student_portal;

USE psp_student_portal;


-- =========================================
-- STUDENTS TABLE
-- =========================================

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    ic VARCHAR(20) NOT NULL UNIQUE,
    program VARCHAR(100) NOT NULL,
    marks INT NOT NULL DEFAULT 0,
    profile_picture VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Add profile picture column for existing databases
ALTER TABLE students
ADD COLUMN IF NOT EXISTS profile_picture VARCHAR(255) DEFAULT NULL AFTER marks;


-- =========================================
-- USERS TABLE
-- =========================================

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    student_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_student_user
    FOREIGN KEY (student_id)
    REFERENCES students(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


-- =========================================
-- SAMPLE STUDENT DATA
-- =========================================

INSERT INTO students (name, ic, program, marks)
VALUES
(
    'MUHAMMAD HARITH BIN ABDUL RAHMAN',
    '000000-00-0001',
    'Diploma in Information Technology',
    85
),
(
    'UMI SYAKIRAH BINTI JARUDI',
    '000000-00-0002',
    'Diploma in Information Technology',
    95
),
(
    'STEVEN NG QI ZE',
    '000000-00-0003',
    'Diploma in Information Technology',
    88
);

-- =========================================
-- SAMPLE USER DATA
-- =========================================

INSERT INTO users (username, password, student_id)
VALUES
(
    'harith',
    '$2y$12$VkZ7rFJwaAcu5HBJgkmBROe.0.Y94HrJQB3E9v42dBbJa04cZUzO6',
    1
),
(
    'umi',
    '$2y$12$07WQkBw08Kpk8NLlzTRZL.VKCTDfH3lh861Ej4P4eD2vdhq9iHapq',
    2
),
(
    'steven',
    '$2y$12$RtkIV1vgTip1wuHei2y49eoLYkzpm3FOdtwpO5wdZGbZsi9JypPSK',
    3
);