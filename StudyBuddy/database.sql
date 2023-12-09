CREATE TABLE Users (
    userID INTEGER(8),
    fName VARCHAR(30),
    lName VARCHAR(30),
    gender VARCHAR(50),
    email TEXT,
    phone VARCHAR(20),
    PRIMARY KEY (userID)
);

CREATE TABLE Groups (
    groupID VARCHAR(4),
    name VARCHAR(30),
    description TEXT,
    createdBy INTEGER(8) DEFAULT NULL,
    dateCreated DATE DEFAULT CURRENT_DATE,
    PRIMARY KEY (groupID),
    FOREIGN KEY (createdBy) REFERENCES Users(userID) ON DELETE SET NULL
);

CREATE TABLE Memberships (
    membershipID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    groupID VARCHAR(4),
    role ENUM('Member', 'Administrator') NOT NULL,
    joined DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (userID) REFERENCES Users(userID) ON DELETE CASCADE,
    FOREIGN KEY (groupID) REFERENCES Groups(groupID) ON DELETE CASCADE
);

INSERT INTO
    Users (userID, fName, lName, gender, email, phone)
VALUES
    (
        '00000001',
        'John',
        'Doe',
        'Male',
        'john.doe@email.com',
        1234567890
    ),
    (
        '00000002',
        'Jane',
        'Smith',
        'Female',
        'jane.smith@email.com',
        9876543210
    ),
    (
        '00000003',
        'Chris',
        'Johnson',
        'Male',
        'chris.johnson@email.com',
        5551234567
    ),
    (
        '00000004',
        'Emily',
        'Brown',
        'Female',
        'emily.brown@email.com',
        1112223333
    ),
    (
        '00000005',
        'Michael',
        'Williams',
        'Male',
        'michael.williams@email.com',
        9998887777
    ),
    (
        '00000006',
        'Sophia',
        'Jones',
        'Female',
        'sophia.jones@email.com',
        4445556666
    ),
    (
        '00000007',
        'Daniel',
        'Miller',
        'Male',
        'daniel.miller@email.com',
        7778889999
    ),
    (
        '00000008',
        'Olivia',
        'Davis',
        'Female',
        'olivia.davis@email.com',
        3334445555
    ),
    (
        '00000009',
        'Ethan',
        'Taylor',
        'Male',
        'ethan.taylor@email.com',
        6667778888
    ),
    (
        '00000010',
        'Ava',
        'Anderson',
        'Female',
        'ava.anderson@email.com',
        2223334444
    ),
    (
        '00000011',
        'Liam',
        'White',
        'Male',
        'liam.white@email.com',
        9991112222
    ),
    (
        '00000012',
        'Emma',
        'Wilson',
        'Female',
        'emma.wilson@email.com',
        4441112222
    ),
    (
        '00000013',
        'Noah',
        'Moore',
        'Male',
        'noah.moore@email.com',
        7774441111
    ),
    (
        '00000014',
        'Mia',
        'Martin',
        'Female',
        'mia.martin@email.com',
        1114447777
    ),
    (
        '00000015',
        'James',
        'Harris',
        'Male',
        'james.harris@email.com',
        8885552222
    ),
    (
        '00000016',
        'Ava',
        'Clark',
        'Female',
        'ava.clark@email.com',
        2225558888
    ),
    (
        '00000017',
        'Logan',
        'Hall',
        'Male',
        'logan.hall@email.com',
        5558882222
    ),
    (
        '00000018',
        'Chloe',
        'Baker',
        'Female',
        'chloe.baker@email.com',
        8882225555
    ),
    (
        '00000019',
        'Carter',
        'Perez',
        'Male',
        'carter.perez@email.com',
        3336669999
    ),
    (
        '00000020',
        'Grace',
        'Garcia',
        'Female',
        'grace.garcia@email.com',
        9996663333
    );

INSERT INTO
    Groups (groupID, name, description, createdBy)
VALUES
    (
        'G001',
        'Tele Comm Group',
        'A study group for CIS 345 students',
        '00000001'
    ),
    (
        'G002',
        'Morning DB Group',
        'A study group for CIS 395 in the morning class',
        '00000002'
    ),
    (
        'G003',
        'Web Prog Group',
        'A study group for CIS 385 students',
        '00000003'
    ),
    (
        'G004',
        'Com Sci Group',
        'Let us study and learn C++ together',
        '00000004'
    ),
    (
        'G005',
        'CIS Group',
        'Lord help us with Java',
        '00000005'
    );

INSERT INTO
    Memberships (userID, groupID, role)
VALUES
    ('00000001', 'G001', 'Administrator'),
    ('00000002', 'G002', 'Administrator'),
    ('00000003', 'G003', 'Administrator'),
    ('00000004', 'G004', 'Administrator'),
    ('00000005', 'G005', 'Administrator'),
    ('00000006', 'G001', 'Member'),
    ('00000007', 'G002', 'Member'),
    ('00000008', 'G003', 'Member'),
    ('00000009', 'G004', 'Member'),
    ('00000010', 'G005', 'Member'),
    ('00000011', 'G001', 'Member'),
    ('00000012', 'G002', 'Member'),
    ('00000013', 'G003', 'Member'),
    ('00000014', 'G004', 'Member'),
    ('00000015', 'G005', 'Member'),
    ('00000016', 'G001', 'Member'),
    ('00000017', 'G002', 'Member'),
    ('00000018', 'G003', 'Member'),
    ('00000019', 'G004', 'Member'),
    ('00000020', 'G005', 'Member'),
    ('00000004', 'G002', 'Member'),
    ('00000004', 'G003', 'Member'),
    ('00000005', 'G001', 'Member');