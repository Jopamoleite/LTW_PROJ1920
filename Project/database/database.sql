/* LTW project 2019/2020
 * Authors: Joao Leite, Marcia Teixeira, Joao Campos
 * SQLite database file
 */


-- Users login using username and password
-- Users edit their biography and e-mail
CREATE TABLE User_(
    id          INTEGER PRIMARY KEY,
    username    TEXT NOT NULL UNIQUE,
    password_   TEXT NOT NULL,
    name        TEXT,
    bio         TEXT,
    location_   TEXT,
    phone_num   TEXT,
    email       TEXT
);

-- Places have a title, address, price/day, capacity and description
-- Places belong to a owner (user)
CREATE TABLE Place(
    id          INTEGER PRIMARY KEY,
    title       TEXT NOT NULL,
    address_    TEXT NOT NULL UNIQUE,
    price_day   REAL CHECK (price_day > 0),
    capacity    INTEGER NOT NULL CHECK (capacity > 0),
    description TEXT NOT NULL,
    ownerID     INTEGER NOT NULL,

    FOREIGN KEY (ownerID) REFERENCES User_(id)
    ON DELETE CASCADE ON UPDATE CASCADE
);

-- Reservation have a starting date and a duration
CREATE TABLE Reservations(
    id          INTEGER PRIMARY KEY,
    placeID     INTEGER NOT NULL,
    touristID   INTEGER NOT NULL,
    begin_date  DATE NOT NULL,
    duration    INTEGER NOT NULL,

    FOREIGN KEY (placeID) REFERENCES Place(id)
    ON DELETE CASCADE ON UPDATE CASCADE,

    FOREIGN KEY (touristID) REFERENCES User_(id)
    ON DELETE CASCADE ON UPDATE CASCADE
);
