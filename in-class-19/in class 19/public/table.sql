CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(300) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO posts (title, content) VALUES
('post 1', 'this is post 1'),
('post 2', 'this is post 2');
