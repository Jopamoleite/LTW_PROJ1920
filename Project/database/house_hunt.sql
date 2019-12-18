/* LTW project 2019/2020
 * Authors: Joao Leite, Marcia Teixeira, Joao Campos
 * SQLite database file
 */


-- Users login using username and password
-- Users edit their biography and e-mail
CREATE TABLE User_
(
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL UNIQUE,
    password_ TEXT NOT NULL,
    name TEXT,
    bio TEXT,
    location_ TEXT,
    phone_num TEXT,
    email TEXT,
    image_name TEXT NOT NULL
);

-- Places have a title, address, price/day, capacity and description
-- Places have a set of images
-- Places belong to a owner (user)
CREATE TABLE Place
(
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL,
    location TEXT NOT NULL,
    address_ TEXT NOT NULL UNIQUE,
    price_day REAL CHECK (price_day > 0),
    capacity INTEGER NOT NULL CHECK (capacity > 0),
    description TEXT NOT NULL,
    ownerID     INTEGER NOT NULL,

    FOREIGN KEY (ownerID) REFERENCES User_(id)
    ON DELETE CASCADE ON UPDATE CASCADE
);

-- Images related to places
CREATE TABLE PlaceImages
(
    id INTEGER PRIMARY KEY,
    image_name TEXT NOT NULL,
    placeID INTEGER NOT NULL,

    FOREIGN KEY (placeID) REFERENCES Place(id)
    ON DELETE CASCADE ON UPDATE CASCADE
);

-- Reservation have a starting date and a duration
CREATE TABLE Reservations
(
    id INTEGER PRIMARY KEY,
    placeID INTEGER NOT NULL,
    touristID INTEGER NOT NULL,
    begin_date DATE NOT NULL,
    end_date DATE NOT NULL,

    CHECK(date(begin_date) <= date(end_date)),

    FOREIGN KEY (placeID) REFERENCES Place(id)
    ON DELETE CASCADE ON UPDATE CASCADE,

    FOREIGN KEY (touristID) REFERENCES User_(id)
    ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO User_(username, password_, email, image_name, name, phone_num) VALUES ("conta_generica", "$2y$10$eGBjQpixwBE/TwwR0y9jZeZSfKrazKo6rsocOL/upEOCRIxV3yJgu", "conta@gen.com", "d639cb9c0618401e19f3248260790513c79991b7.jpg", "Miguel Mario", "+351 987 654 321");
INSERT INTO User_(username, password_, email, image_name, name, bio) VALUES ("Nuguets", "$2y$10$9VzBrfzfbJSJVxMzlv/WsOmT8E56vkg497cn08NpNe5dt1ZspfO4m", "jopamoleite@gmail.com", "5744c041c34c028ff7bcb5065ebecc06305fd175.png", "Joao Leite", "Uhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh");
INSERT INTO User_(username, password_, email, image_name, name, bio) VALUES ("marciat", "$2y$10$2EnrKpZilQM87cEQ0I1toeIGwpOWw1pPo0gdkgg.foW4M6Uy0haPC", "jakelong@americandragon.com", "803e38e4892752ee5a25ee038f63ccbcf9c698f3.jpg", "Marcia Teixeira", "Welcome to my profile!");
INSERT INTO User_(username, password_, email, image_name, name) VALUES ("pene_proud", "$2y$10$tZhXGYWDDZFGdILWmsCCvewmkpZFjTSMh32qs11tsOuIgNQ4ieUWG", "penelope@gmail.com", "5a210173fa657e111eb2c3275ff0021e3a90b171.jpg", "Joao Campos");
INSERT INTO User_(username, password_, email, image_name) VALUES ("novo_user", "$2y$10$xghcdjmKKq4.Gx5koG2Mdu40mh4GzD/0nD9m2erJhlQJBeGFexuC6", "novo@user.pt", "default_pic.bmp");

INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("Cute house with a lake view", "Porto, Portugal", "Legit Address 1", 100, 5, "Great for people who just want to relax!", 1);
INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("House on the hills", "Lisbon, Portugal", "Not Fake Address", 200, 10, "It's always nice to take a little trip with friends :)", 1);
INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("Huge house with a pool", "Lisbon, Portugal", "Yes, Address", 500, 10, "Enjoy the house with your group of friends! Can bring one or two people over the limit ;)))", 2);
INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("Small apartment", "Madrid, Spain", "Not using word Address", 35, 2, "Just take it", 3);
INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("House near the beach", "Algarve, Portugal", "Address, yes", 250, 6, "Rent me and you'll always be ready to ride the waves!", 3);
INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("Great house with great prices!", "Paris, France", "Bonjour", 1000, 3, "It's a really GREAT deal!!!!", 3);
INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("Good home", "Dublin, Ireland", "Here", 300, 5, "Spend some nice moments :D", 4);
INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("Nice house in the hills", "Porto, Portugal", "Help Me", 400, 7, "Better than any other house on the hills!", 4);
INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("One small room", "London, England", "Great Address", 25, 1, "You know why you're here, just do it...", 4);
INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES ("Big house with beautiful garden", "Stockholm, Sweden", "Aadrrees", 350, 15, "Take some time off with a group of friends, and enjoy this beautiful house, ready to accommodate you all =)", 4);

INSERT INTO PlaceImages(image_name, placeID) VALUES ("513c1bb31411042befc2a516b63b77939d8cd539.jpg", 1);
INSERT INTO PlaceImages(image_name, placeID) VALUES ("2d705ab7a503ef5b821336102ec39410203aefff.jpg", 2);
INSERT INTO PlaceImages(image_name, placeID) VALUES ("92fb3a9e3b46b902a1cdeceda4ee64aad1b25bd6.png", 3);
INSERT INTO PlaceImages(image_name, placeID) VALUES ("6fff03eb1d4db3b980eb3c3710b67b8e0eb0b8c0.png", 5);
INSERT INTO PlaceImages(image_name, placeID) VALUES ("0abf937f486c0ba6ae471c2482b894eacde389d1.jpg", 8);
INSERT INTO PlaceImages(image_name, placeID) VALUES ("e8379282fb2bca795984f8698b5dd094d8d9d274.png", 9);
INSERT INTO PlaceImages(image_name, placeID) VALUES ("3a21e46f77d72882c94e3f29513f4c2a894c8aa0.png", 10);



