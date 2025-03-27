-- Create Accounts Table
CREATE TABLE accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    password VARCHAR(255),
    age INT,
    handle VARCHAR(50) UNIQUE,
    followers INT DEFAULT 0
);

-- Create Posts Table
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    content TEXT,
    picture VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES accounts(id)
);

-- Create Followers Table
CREATE TABLE followers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,              -- User whose followers/following are being tracked
    follower_id INT,          -- User who is following 'user_id'
    following_id INT,         -- User who is being followed by 'follower_id'
    follower_name VARCHAR(100),  -- Name of the follower
    follower_handle VARCHAR(50), -- Handle of the follower
    following_name VARCHAR(100), -- Name of the user being followed
    following_handle VARCHAR(50), -- Handle of the user being followed
    FOREIGN KEY (user_id) REFERENCES accounts(id),
    FOREIGN KEY (follower_id) REFERENCES accounts(id),
    FOREIGN KEY (following_id) REFERENCES accounts(id)
);

-- Create Likes Table
CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES accounts(id),
    FOREIGN KEY (post_id) REFERENCES posts(id)
);

-- Create Shares Table (No UNIQUE constraint)
CREATE TABLE shares (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES accounts(id),
    FOREIGN KEY (post_id) REFERENCES posts(id)
);

-- Create Retweets Table (No UNIQUE constraint)
CREATE TABLE retweets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES accounts(id),
    FOREIGN KEY (post_id) REFERENCES posts(id)
);