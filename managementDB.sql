CREATE DATABASE userManagement;


ALTER TABLE users MODIFY COLUMN updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;


ALTER TABLE roles MODIFY COLUMN updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;


ALTER TABLE movies MODIFY COLUMN updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;


-- INSERT INTO users(NAME, email, roles_id, `password`) VALUES ('Assem Mohamed Ahmed Samy', 'aseemmohamed045@gmail.com', 3, SHA('admin123'));


-- INSERT INTO users(NAME, email, roles_id, `password`) VALUES ('Ahmed Salah', 'ahmedabosalah380@gmail.com', 3,  MD5('admin123'));





