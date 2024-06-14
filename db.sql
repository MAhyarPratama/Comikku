-- Create database
CREATE DATABASE comikku_db;

-- Use the database
USE comikku_db;

-- Create Users table
CREATE TABLE Users (
    UserID SERIAL PRIMARY KEY,
    Username VARCHAR(50) UNIQUE NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    PasswordHash VARCHAR(255) NOT NULL,
    Role VARCHAR(20) NOT NULL
);

-- Create Comics table
CREATE TABLE Comics (
    ComicID SERIAL PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    Author VARCHAR(100) NOT NULL,
    Genre VARCHAR(50),
    Description TEXT,
    PublishDate DATE,
    ImageURL TEXT
);

-- Create UserComics table
CREATE TABLE UserComics (
    UserComicID SERIAL PRIMARY KEY,
    UserID INT NOT NULL,
    ComicID INT NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (ComicID) REFERENCES Comics(ComicID)
);

-- Insert initial data into Users table
INSERT INTO Users (Username, Email, PasswordHash, Role) VALUES
('vykall', 'admin_moon@gmail.com', MD5('welcomeadmin1'), 'admin'),
('kayla', 'pottermore@gmail.com', MD5('here110404'), 'user');

-- Insert initial data into Comics table
INSERT INTO Comics (Title, Author, Genre, Description, PublishDate) VALUES
('One Piece', 'Eiichiro Oda', 'Adventure', 'Follows the adventures of Monkey D. Luffy and his pirate crew in order to find the greatest treasure, the "One Piece".', '1997-07-22'),
('Naruto', 'Masashi Kishimoto', 'Action', 'A story about Naruto Uzumaki, a young ninja who seeks recognition from his peers and dreams of becoming the Hokage, the leader of his village.', '1999-09-21'),
('Bleach', 'Tite Kubo', 'Supernatural', 'Ichigo Kurosaki obtains the powers of a Soul Reaper and must defend humans from evil spirits and guide the souls of the dead to the afterlife.', '2001-08-07'),
('Attack on Titan', 'Hajime Isayama', 'Dark Fantasy', 'Humanity battles giant humanoid creatures known as Titans, who devour humans seemingly without reason.', '2009-09-09')
('My Hero Academia', 'Kohei Horikoshi', 'Superhero', 'In a world where nearly everyone has superpowers called Quirks, Izuku Midoriya is a Quirkless boy who still dreams of becoming a hero.', '2014-07-07'),
('Fullmetal Alchemist', 'Hiromu Arakawa', 'Steampunk', 'The story of two brothers, Edward and Alphonse Elric, who use alchemy in their quest to restore their bodies after a failed alchemical experiment.', '2001-07-12'),
('Death Note', 'Tsugumi Ohba', 'Thriller', 'Light Yagami discovers a mysterious notebook that allows him to kill anyone by writing their name in it and decides to use it to create a utopia.', '2003-12-01'),
('Demon Slayer', 'Koyoharu Gotouge', 'Historical Fantasy', 'Tanjiro Kamado becomes a demon slayer to avenge his family and cure his sister Nezuko, who has turned into a demon.', '2016-02-15'),
('Tokyo Ghoul', 'Sui Ishida', 'Horror', 'Ken Kaneki becomes a half-ghoul and must adapt to his new life while being hunted by humans and other ghouls.', '2011-09-08'),
('Dragon Ball', 'Akira Toriyama', 'Martial Arts', 'Follows the adventures of Goku from his childhood through adulthood as he trains in martial arts and explores the world in search of the seven orbs known as Dragon Balls.', '1984-12-03');
