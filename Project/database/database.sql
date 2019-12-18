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

INSERT INTO User_(username, password_, email, image_name) VALUES ("conta_generica", "$2y$10$eGBjQpixwBE/TwwR0y9jZeZSfKrazKo6rsocOL/upEOCRIxV3yJgu", "conta@gen.com", "default_pic.bmp");
INSERT INTO User_(username, password_, email, image_name) VALUES ("Nuguets", "$2y$10$9VzBrfzfbJSJVxMzlv/WsOmT8E56vkg497cn08NpNe5dt1ZspfO4m", "jopamoleite@gmail.com", "5744c041c34c028ff7bcb5065ebecc06305fd175.png");
INSERT INTO User_(username, password_, email, image_name) VALUES ("marciat", "$2y$10$2EnrKpZilQM87cEQ0I1toeIGwpOWw1pPo0gdkgg.foW4M6Uy0haPC", "jakelong@americandragon.com", "default_pic.bmp");
INSERT INTO User_(username, password_, email, image_name) VALUES ("pene_proud", "$2y$10$tZhXGYWDDZFGdILWmsCCvewmkpZFjTSMh32qs11tsOuIgNQ4ieUWG", "penelope@gmail.com", "default_pic.bmp");




