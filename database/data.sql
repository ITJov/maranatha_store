USE pharmacy_project

SELECT * FROM roles 
SELECT * FROM users 
SELECT * FROM medicines
SELECT * FROM purchasings
SELECT * FROM purchasing_details

-- Role
INSERT INTO roles (role_id, role_name, created_at, updated_at) VALUES
('01', 'admin', '2024-06-06 00:00:00', '2024-06-06 00:00:00'),
('02', 'user', '2024-06-06 00:00:00', '2024-06-06 00:00:00');


-- User 
INSERT INTO users (user_id, fname, lname, email, email_verified_at, password, location, role_id, remember_token, created_at, updated_at) VALUES
('USR001', 'John', 'Doe', 'john.doe@example.com', '2024-06-01 12:00:00', 'password1', 'New York', '02', 'token12345', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
('USR002', 'Jane', 'Smith', 'jane.smith@example.com', '2024-05-02 13:00:00', 'password2', 'Los Angeles', '02', 'token23456', '2024-02-02 11:00:00', '2024-02-02 11:00:00'),
('USR003', 'Michael', 'Johnson', 'michael.johnson@example.com', '2024-04-03 12:00:00', 'password3', 'Chicago', '02', 'token34567', '2024-03-03 12:00:00', '2024-03-03 12:00:00'),
('USR004', 'Emily', 'Davis', 'emily.davis@example.com', '2024-03-04 14:00:00', 'password4', 'Houston', '02', 'token45678', '2024-04-04 13:00:00', '2024-04-04 13:00:00'),
('USR005', 'William', 'Brown', 'william.brown@example.com', '2024-02-05 14:00:00', 'password5', 'Phoenix', '02', 'token56789', '2024-05-05 14:00:00', '2024-05-05 14:00:00'),
('USR006', 'Olivia', 'Jones', 'olivia.jones@example.com', '2024-01-06 15:00:00', 'password6', 'Philadelphia', '02', 'token67890', '2024-06-06 15:00:00', '2024-06-06 15:00:00'),
('USR007', 'James', 'Garcia', 'james.garcia@example.com', '2024-06-07 16:00:00', 'password7', 'San Antonio', '02', 'token78901', '2024-01-07 16:00:00', '2024-01-07 16:00:00'),
('USR008', 'Isabella', 'Martinez', 'isabella.martinez@example.com', '2024-05-08 17:00:00', 'password8', 'San Diego', '02', 'token89012', '2024-02-08 17:00:00', '2024-02-08 17:00:00'),
('USR009', 'Benjamin', 'Hernandez', 'benjamin.hernandez@example.com', '2024-04-09 17:00:00', 'password9', 'Dallas', '02', 'token90123', '2024-03-09 18:00:00', '2024-03-09 18:00:00'),
('USR010', 'Ava', 'Lopez', 'ava.lopez@example.com', '2024-03-10 18:00:00', 'password10', 'San Jose', '02', 'token01234', '2024-04-10 19:00:00', '2024-04-10 19:00:00'),
('USR011', 'Sophia', 'Gonzalez', 'sophia.gonzalez@example.com', '2024-06-11 12:00:00', 'password11', 'Miami', '02', 'token12340', '2024-01-11 10:00:00', '2024-01-11 10:00:00'),
('USR012', 'Mason', 'Perez', 'mason.perez@example.com', '2024-05-12 13:00:00', 'password12', 'Seattle', '02', 'token23450', '2024-02-12 11:00:00', '2024-02-12 11:00:00'),
('USR013', 'Charlotte', 'Robinson', 'charlotte.robinson@example.com', '2024-04-13 12:00:00', 'password13', 'Atlanta', '02', 'token34560', '2024-03-13 12:00:00', '2024-03-13 12:00:00');


-- Medicines
INSERT INTO medicines (med_id, med_name, description, price, med_quantity, exp_date) VALUES
('MED001', 'Paracetamol', 'Pain reliever and a fever reducer', 5000, 100, '2025-12-31 00:00:00'),
('MED002', 'Amoxicillin', 'Antibiotic for treating infections', 15000, 200, '2024-11-30 00:00:00'),
('MED003', 'Ibuprofen', 'Used to reduce fever and treat pain or inflammation', 10000, 150, '2025-10-15 00:00:00'),
('MED004', 'Cetirizine', 'Antihistamine for allergy relief', 8000, 300, '2024-08-20 00:00:00'),
('MED005', 'Metformin', 'Used to treat type 2 diabetes', 12000, 250, '2025-05-10 00:00:00'),
('MED006', 'Omeprazole', 'Reduces stomach acid', 9500, 180, '2024-12-01 00:00:00'),
('MED007', 'Amlodipine', 'Used to treat high blood pressure', 14000, 220, '2025-06-30 00:00:00'),
('MED008', 'Simvastatin', 'Used to control high cholesterol', 13500, 190, '2025-09-25 00:00:00'),
('MED009', 'Salbutamol', 'Bronchodilator used to treat asthma', 7500, 160, '2024-07-15 00:00:00'),
('MED010', 'Levothyroxine', 'Used to treat thyroid hormone deficiency', 11000, 130, '2025-04-05 00:00:00'),
('MED011', 'Ranitidine', 'Reduces stomach acid production', 9000, 140, '2025-03-01 00:00:00'),
('MED012', 'Clopidogrel', 'Prevents blood clots', 16000, 170, '2025-08-18 00:00:00'),
('MED013', 'Lisinopril', 'Used to treat high blood pressure and heart failure', 13000, 210, '2025-11-20 00:00:00');


-- Purchasing
INSERT INTO purchasings (purchase_id, user_id, date, address, status_order, total_purchase, total_payment, created_at, updated_at) VALUES
('PUR001', 'USR001', '2024-01-01', 'New York, NY', 1, 87000, 87000, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
('PUR002', 'USR002', '2024-02-02', 'Los Angeles, CA', 1, 121500, 121500, '2024-02-02 11:00:00', '2024-02-02 11:00:00'),
('PUR003', 'USR003', '2024-03-03', 'Chicago, IL', 1, 136000, 136000, '2024-03-03 12:00:00', '2024-03-03 12:00:00'),
('PUR004', 'USR004', '2024-04-04', 'Houston, TX', 1, 135000, 135000, '2024-04-04 13:00:00', '2024-04-04 13:00:00'),
('PUR005', 'USR001', '2024-01-01', 'New York, NY', 1, 87000, 87000, '2024-01-01 14:00:00', '2024-01-01 14:00:00'),

('PUR006', 'USR002', '2024-02-02', 'Los Angeles, CA', 1, 121500, 121500, '2024-02-02 11:00:00', '2024-02-02 11:00:00'),
('PUR007', 'USR003', '2024-03-03', 'Chicago, IL', 1, 136000, 136000, '2024-03-03 12:00:00', '2024-03-03 12:00:00'),
('PUR008', 'USR004', '2024-04-04', 'Houston, TX', 1, 135000, 135000, '2024-04-04 13:00:00', '2024-04-04 13:00:00'),
('PUR009', 'USR001', '2024-01-01', 'New York, NY', 1, 87000, 87000, '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
('PUR010', 'USR002', '2024-02-02', 'Los Angeles, CA', 1, 121500, 121500, '2024-02-02 11:00:00', '2024-02-02 11:00:00');

-- New
INSERT INTO purchasings (purchase_id, user_id, date, address, status_order, total_purchase, total_payment, created_at, updated_at) VALUES
('PUR011', 'USR005', '2024-03-01', 'Phoenix, AZ', 1, 40000, 40000, '2024-03-01 10:00:00', '2024-03-01 10:00:00'),
('PUR012', 'USR006', '2024-04-01', 'Philadelphia, PA', 1, 16000, 16000, '2024-04-01 11:00:00', '2024-04-01 11:00:00'),
('PUR013', 'USR007', '2024-05-01', 'San Antonio, TX', 1, 33500, 33500, '2024-05-01 12:00:00', '2024-05-01 12:00:00'),
('PUR014', 'USR008', '2024-06-01', 'San Diego, CA', 1, 28000, 28000, '2024-06-01 13:00:00', '2024-06-01 13:00:00'),
('PUR015', 'USR009', '2024-07-01', 'Dallas, TX', 1, 40500, 40500, '2024-07-01 14:00:00', '2024-07-01 14:00:00'),

('PUR016', 'USR010', '2024-08-01', 'San Jose, CA', 1, 18500, 18500, '2024-08-01 15:00:00', '2024-08-01 15:00:00'),
('PUR017', 'USR005', '2024-01-05', 'Phoenix, AZ', 1, 36000, 36000, '2024-01-05 09:00:00', '2024-01-05 09:00:00'),
('PUR018', 'USR006', '2024-01-15', 'Philadelphia, PA', 1, 34500, 34500, '2024-01-15 10:00:00', '2024-01-15 10:00:00'),
('PUR019', 'USR007', '2024-01-25', 'San Antonio, TX', 1, 46500, 46500, '2024-01-25 11:00:00', '2024-01-25 11:00:00'),
('PUR020', 'USR008', '2024-02-10', 'San Diego, CA', 1, 32000, 32000, '2024-02-10 12:00:00', '2024-02-10 12:00:00'),

('PUR021', 'USR009', '2024-02-20', 'Dallas, TX', 1, 47000, 47000, '2024-02-20 13:00:00', '2024-02-20 13:00:00'),
('PUR022', 'USR010', '2024-03-05', 'San Jose, CA', 1, 36000, 36000, '2024-03-05 14:00:00', '2024-03-05 14:00:00'),
('PUR023', 'USR005', '2024-03-15', 'Phoenix, AZ', 1, 47500, 47500, '2024-03-15 15:00:00', '2024-03-15 15:00:00'),
('PUR024', 'USR006', '2024-03-25', 'Philadelphia, PA', 1, 34000, 34000, '2024-03-25 16:00:00', '2024-03-25 16:00:00'),
('PUR025', 'USR007', '2024-04-10', 'San Antonio, TX', 1, 43500, 43500, '2024-04-10 17:00:00', '2024-04-10 17:00:00'),

('PUR026', 'USR008', '2024-04-20', 'San Diego, CA', 1, 32000, 32000, '2024-04-20 18:00:00', '2024-04-20 18:00:00'),
('PUR027', 'USR009', '2024-05-05', 'Dallas, TX', 1, 43000, 43000, '2024-05-05 19:00:00', '2024-05-05 19:00:00'),
('PUR028', 'USR010', '2024-05-15', 'San Jose, CA', 1, 32000, 32000, '2024-05-15 20:00:00', '2024-05-15 20:00:00'),
('PUR029', 'USR005', '2024-06-01', 'Phoenix, AZ', 1, 19000, 19000, '2024-06-01 09:00:00', '2024-06-01 09:00:00'),
('PUR030', 'USR006', '2024-06-11', 'Philadelphia, PA', 1, 42000, 42000, '2024-06-11 10:00:00', '2024-06-11 10:00:00'),

('PUR031', 'USR007', '2024-06-21', 'San Antonio, TX', 1, 15000, 15000, '2024-06-21 11:00:00', '2024-06-21 11:00:00'),
('PUR032', 'USR008', '2024-06-29', 'San Diego, CA', 1, 32000, 32000, '2024-06-29 12:00:00', '2024-06-29 12:00:00'),
('PUR033', 'USR009', '2024-01-30', 'Dallas, TX', 1, 30000, 30000, '2024-01-30 13:00:00', '2024-01-30 13:00:00'),
('PUR034', 'USR010', '2024-02-15', 'San Jose, CA', 1, 32000, 32000, '2024-02-15 14:00:00', '2024-02-15 14:00:00'),
('PUR035', 'USR005', '2024-02-28', 'Phoenix, AZ', 1, 33000, 33000, '2024-02-28 15:00:00', '2024-02-28 15:00:00'),
('PUR036', 'USR006', '2024-03-12', 'Philadelphia, PA', 1, 29500, 29500, '2024-03-12 16:00:00', '2024-03-12 16:00:00');

-- Purchasing Detail
INSERT INTO purchasing_details (detail_id, user_id, med_id, purchase_id, qty, price, total_price, rating, created_at, updated_at) VALUES
('DET001', 'USR001', 'MED001', 'PUR001', 2, 5000, 10000, '5', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
('DET002', 'USR002', 'MED002', 'PUR001', 1, 15000, 15000, '4', '2024-02-02 11:00:00', '2024-02-02 11:00:00'),
('DET003', 'USR003', 'MED003', 'PUR001', 3, 10000, 30000, '3', '2024-03-03 12:00:00', '2024-03-03 12:00:00'),
('DET004', 'USR004', 'MED004', 'PUR001', 1, 8000, 8000, '4', '2024-04-04 13:00:00', '2024-04-04 13:00:00'),
('DET005', 'USR001', 'MED005', 'PUR001', 2, 12000, 24000, '5', '2024-01-01 14:00:00', '2024-01-01 14:00:00'),

('DET006', 'USR002', 'MED006', 'PUR002', 1, 9500, 9500, '3', '2024-02-02 11:00:00', '2024-02-02 11:00:00'),
('DET007', 'USR002', 'MED007', 'PUR002', 3, 14000, 42000, '4', '2024-02-02 12:00:00', '2024-02-02 12:00:00'),
('DET008', 'USR002', 'MED008', 'PUR002', 1, 13500, 13500, '5', '2024-02-02 13:00:00', '2024-02-02 13:00:00'),
('DET009', 'USR002', 'MED009', 'PUR002', 2, 7500, 15000, '3', '2024-02-02 14:00:00', '2024-02-02 14:00:00'),
('DET010', 'USR002', 'MED010', 'PUR002', 1, 11000, 11000, '4', '2024-02-02 15:00:00', '2024-02-02 15:00:00'),

('DET011', 'USR003', 'MED001', 'PUR003', 4, 5000, 20000, '4', '2024-03-03 12:00:00', '2024-03-03 12:00:00'),
('DET012', 'USR003', 'MED002', 'PUR003', 2, 15000, 30000, '5', '2024-03-03 13:00:00', '2024-03-03 13:00:00'),
('DET013', 'USR003', 'MED003', 'PUR003', 1, 10000, 10000, '3', '2024-03-03 14:00:00', '2024-03-03 14:00:00'),
('DET014', 'USR003', 'MED004', 'PUR003', 5, 8000, 40000, '4', '2024-03-03 15:00:00', '2024-03-03 15:00:00'),
('DET015', 'USR003', 'MED005', 'PUR003', 3, 12000, 36000, '5', '2024-03-03 16:00:00', '2024-03-03 16:00:00'),

('DET016', 'USR004', 'MED006', 'PUR004', 2, 9500, 19000, '4', '2024-04-04 13:00:00', '2024-04-04 13:00:00'),
('DET017', 'USR004', 'MED007', 'PUR004', 1, 14000, 14000, '3', '2024-04-04 14:00:00', '2024-04-04 14:00:00'),
('DET018', 'USR004', 'MED008', 'PUR004', 4, 13500, 54000, '5', '2024-04-04 15:00:00', '2024-04-04 15:00:00'),
('DET019', 'USR004', 'MED009', 'PUR004', 2, 7500, 15000, '4', '2024-04-04 16:00:00', '2024-04-04 16:00:00'),
('DET020', 'USR004', 'MED010', 'PUR004', 3, 11000, 33000, '5', '2024-04-04 17:00:00', '2024-04-04 17:00:00'),

('DET021', 'USR001', 'MED001', 'PUR005', 2, 5000, 10000, '4', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
('DET022', 'USR001', 'MED002', 'PUR005', 1, 15000, 15000, '5', '2024-01-01 11:00:00', '2024-01-01 11:00:00'),
('DET023', 'USR001', 'MED003', 'PUR005', 3, 10000, 30000, '3', '2024-01-01 12:00:00', '2024-01-01 12:00:00'),
('DET024', 'USR001', 'MED004', 'PUR005', 1, 8000, 8000, '4', '2024-01-01 13:00:00', '2024-01-01 13:00:00'),
('DET025', 'USR001', 'MED005', 'PUR005', 2, 12000, 24000, '5', '2024-01-01 14:00:00', '2024-01-01 14:00:00'),

('DET026', 'USR002', 'MED006', 'PUR006', 1, 9500, 9500, '3', '2024-02-02 11:00:00', '2024-02-02 11:00:00'),
('DET027', 'USR002', 'MED007', 'PUR006', 3, 14000, 42000, '4', '2024-02-02 12:00:00', '2024-02-02 12:00:00'),
('DET028', 'USR002', 'MED008', 'PUR006', 1, 13500, 13500, '5', '2024-02-02 13:00:00', '2024-02-02 13:00:00'),
('DET029', 'USR002', 'MED009', 'PUR006', 2, 7500, 15000, '3', '2024-02-02 14:00:00', '2024-02-02 14:00:00'),
('DET030', 'USR002', 'MED010', 'PUR006', 1, 11000, 11000, '4', '2024-02-02 15:00:00', '2024-02-02 15:00:00'),

('DET031', 'USR003', 'MED001', 'PUR007', 4, 5000, 20000, '4', '2024-03-03 12:00:00', '2024-03-03 12:00:00'),
('DET032', 'USR003', 'MED002', 'PUR007', 2, 15000, 30000, '5', '2024-03-03 13:00:00', '2024-03-03 13:00:00'),
('DET033', 'USR003', 'MED003', 'PUR007', 1, 10000, 10000, '3', '2024-03-03 14:00:00', '2024-03-03 14:00:00'),
('DET034', 'USR003', 'MED004', 'PUR007', 5, 8000, 40000, '4', '2024-03-03 15:00:00', '2024-03-03 15:00:00'),
('DET035', 'USR003', 'MED005', 'PUR007', 3, 12000, 36000, '5', '2024-03-03 16:00:00', '2024-03-03 16:00:00'),

('DET036', 'USR004', 'MED006', 'PUR008', 2, 9500, 19000, '4', '2024-04-04 13:00:00', '2024-04-04 13:00:00'),
('DET037', 'USR004', 'MED007', 'PUR008', 1, 14000, 14000, '3', '2024-04-04 14:00:00', '2024-04-04 14:00:00'),
('DET038', 'USR004', 'MED008', 'PUR008', 4, 13500, 54000, '5', '2024-04-04 15:00:00', '2024-04-04 15:00:00'),
('DET039', 'USR004', 'MED009', 'PUR008', 2, 7500, 15000, '4', '2024-04-04 16:00:00', '2024-04-04 16:00:00'),
('DET040', 'USR004', 'MED010', 'PUR008', 3, 11000, 33000, '5', '2024-04-04 17:00:00', '2024-04-04 17:00:00'),

('DET041', 'USR001', 'MED001', 'PUR009', 2, 5000, 10000, '4', '2024-01-01 10:00:00', '2024-01-01 10:00:00'),
('DET042', 'USR001', 'MED002', 'PUR009', 1, 15000, 15000, '5', '2024-01-01 11:00:00', '2024-01-01 11:00:00'),
('DET043', 'USR001', 'MED003', 'PUR009', 3, 10000, 30000, '3', '2024-01-01 12:00:00', '2024-01-01 12:00:00'),
('DET044', 'USR001', 'MED004', 'PUR009', 1, 8000, 8000, '4', '2024-01-01 13:00:00', '2024-01-01 13:00:00'),
('DET045', 'USR001', 'MED005', 'PUR009', 2, 12000, 24000, '5', '2024-01-01 14:00:00', '2024-01-01 14:00:00'),

('DET046', 'USR002', 'MED006', 'PUR010', 1, 9500, 9500, '3', '2024-02-02 11:00:00', '2024-02-02 11:00:00'),
('DET047', 'USR002', 'MED007', 'PUR010', 3, 14000, 42000, '4', '2024-02-02 12:00:00', '2024-02-02 12:00:00'),
('DET048', 'USR002', 'MED008', 'PUR010', 1, 13500, 13500, '5', '2024-02-02 13:00:00', '2024-02-02 13:00:00'),
('DET049', 'USR002', 'MED009', 'PUR010', 2, 7500, 15000, '3', '2024-02-02 14:00:00', '2024-02-02 14:00:00'),
('DET050', 'USR002', 'MED010', 'PUR010', 1, 11000, 11000, '4', '2024-02-02 15:00:00', '2024-02-02 15:00:00');

-- New
INSERT INTO purchasing_details (detail_id, user_id, med_id, purchase_id, qty, price, total_price, rating, created_at, updated_at) VALUES
('DET051', 'USR005', 'MED001', 'PUR011', 3, 5000, 15000, '4', '2024-03-01 10:00:00', '2024-03-01 10:00:00'),
('DET052', 'USR005', 'MED002', 'PUR011', 1, 15000, 15000, '5', '2024-03-01 11:00:00', '2024-03-01 11:00:00'),
('DET053', 'USR005', 'MED003', 'PUR011', 1, 10000, 10000, '3', '2024-03-01 12:00:00', '2024-03-01 12:00:00'),

('DET054', 'USR006', 'MED004', 'PUR012', 2, 8000, 16000, '4', '2024-04-01 10:00:00', '2024-04-01 10:00:00'),

('DET055', 'USR007', 'MED005', 'PUR013', 2, 12000, 24000, '5', '2024-05-01 11:00:00', '2024-05-01 11:00:00'),
('DET056', 'USR007', 'MED006', 'PUR013', 1, 9500, 9500, '4', '2024-05-01 12:00:00', '2024-05-01 12:00:00'),

('DET057', 'USR008', 'MED007', 'PUR014', 2, 14000, 28000, '5', '2024-06-01 13:00:00', '2024-06-01 13:00:00'),

('DET058', 'USR009', 'MED008', 'PUR015', 3, 13500, 40500, '3', '2024-07-01 14:00:00', '2024-07-01 14:00:00'),

('DET059', 'USR010', 'MED009', 'PUR016', 1, 7500, 7500, '4', '2024-08-01 15:00:00', '2024-08-01 15:00:00'),
('DET060', 'USR010', 'MED010', 'PUR016', 1, 11000, 11000, '5', '2024-08-01 16:00:00', '2024-08-01 16:00:00'),

('DET061', 'USR005', 'MED001', 'PUR017', 4, 5000, 20000, '5', '2024-01-05 09:00:00', '2024-01-05 09:00:00'),
('DET062', 'USR005', 'MED004', 'PUR017', 2, 8000, 16000, '4', '2024-01-05 10:00:00', '2024-01-05 10:00:00'),

('DET063', 'USR006', 'MED002', 'PUR018', 1, 15000, 15000, '5', '2024-01-15 09:00:00', '2024-01-15 09:00:00'),
('DET064', 'USR006', 'MED003', 'PUR018', 1, 10000, 10000, '4', '2024-01-15 10:00:00', '2024-01-15 10:00:00'),
('DET065', 'USR006', 'MED006', 'PUR018', 1, 9500, 9500, '3', '2024-01-15 11:00:00', '2024-01-15 11:00:00'),

('DET066', 'USR007', 'MED007', 'PUR019', 2, 14000, 28000, '5', '2024-01-25 12:00:00', '2024-01-25 12:00:00'),
('DET067', 'USR007', 'MED009', 'PUR019', 1, 7500, 7500, '4', '2024-01-25 13:00:00', '2024-01-25 13:00:00'),
('DET068', 'USR007', 'MED010', 'PUR019', 1, 11000, 11000, '3', '2024-01-25 14:00:00', '2024-01-25 14:00:00'),

('DET069', 'USR008', 'MED003', 'PUR020', 2, 10000, 20000, '5', '2024-02-10 10:00:00', '2024-02-10 10:00:00'),
('DET070', 'USR008', 'MED005', 'PUR020', 1, 12000, 12000, '4', '2024-02-10 11:00:00', '2024-02-10 11:00:00'),

('DET071', 'USR009', 'MED006', 'PUR021', 3, 9500, 28500, '5', '2024-02-20 09:00:00', '2024-02-20 09:00:00'),
('DET072', 'USR009', 'MED001', 'PUR021', 1, 5000, 5000, '4', '2024-02-20 10:00:00', '2024-02-20 10:00:00'),
('DET073', 'USR009', 'MED008', 'PUR021', 1, 13500, 13500, '3', '2024-02-20 11:00:00', '2024-02-20 11:00:00'),

('DET074', 'USR010', 'MED007', 'PUR022', 2, 14000, 28000, '5', '2024-03-05 10:00:00', '2024-03-05 10:00:00'),
('DET075', 'USR010', 'MED004', 'PUR022', 1, 8000, 8000, '4', '2024-03-05 11:00:00', '2024-03-05 11:00:00'),

('DET076', 'USR005', 'MED003', 'PUR023', 4, 10000, 40000, '5', '2024-03-15 09:00:00', '2024-03-15 09:00:00'),
('DET077', 'USR005', 'MED009', 'PUR023', 1, 7500, 7500, '3', '2024-03-15 10:00:00', '2024-03-15 10:00:00'),

('DET078', 'USR006', 'MED010', 'PUR024', 2, 11000, 22000, '5', '2024-03-25 09:00:00', '2024-03-25 09:00:00'),
('DET079', 'USR006', 'MED005', 'PUR024', 1, 12000, 12000, '4', '2024-03-25 10:00:00', '2024-03-25 10:00:00'),

('DET080', 'USR007', 'MED006', 'PUR025', 3, 9500, 28500, '5', '2024-04-10 09:00:00', '2024-04-10 09:00:00'),
('DET081', 'USR007', 'MED002', 'PUR025', 1, 15000, 15000, '4', '2024-04-10 10:00:00', '2024-04-10 10:00:00'),

('DET082', 'USR008', 'MED004', 'PUR026', 4, 8000, 32000, '5', '2024-04-20 09:00:00', '2024-04-20 09:00:00'),

('DET083', 'USR009', 'MED001', 'PUR027', 2, 5000, 10000, '4', '2024-05-05 09:00:00', '2024-05-05 09:00:00'),
('DET084', 'USR009', 'MED010', 'PUR027', 3, 11000, 33000, '5', '2024-05-05 10:00:00', '2024-05-05 10:00:00'),

('DET085', 'USR010', 'MED003', 'PUR028', 2, 10000, 20000, '4', '2024-05-15 09:00:00', '2024-05-15 09:00:00'),
('DET086', 'USR010', 'MED005', 'PUR028', 1, 12000, 12000, '5', '2024-05-15 10:00:00', '2024-05-15 10:00:00'),

('DET087', 'USR005', 'MED006', 'PUR029', 2, 9500, 19000, '4', '2024-06-01 09:00:00', '2024-06-01 09:00:00'),

('DET088', 'USR006', 'MED007', 'PUR030', 3, 14000, 42000, '5', '2024-06-11 09:00:00', '2024-06-11 09:00:00'),

('DET089', 'USR007', 'MED009', 'PUR031', 2, 7500, 15000, '4', '2024-06-21 09:00:00', '2024-06-21 09:00:00'),

('DET090', 'USR008', 'MED004', 'PUR032', 4, 8000, 32000, '5', '2024-06-29 09:00:00', '2024-06-29 09:00:00'),

('DET091', 'USR009', 'MED002', 'PUR033', 2, 15000, 30000, '4', '2024-01-30 09:00:00', '2024-01-30 09:00:00'),

('DET092', 'USR010', 'MED001', 'PUR034', 1, 5000, 5000, '3', '2024-02-15 09:00:00', '2024-02-15 09:00:00'),
('DET093', 'USR010', 'MED008', 'PUR034', 2, 13500, 27000, '4', '2024-02-15 10:00:00', '2024-02-15 10:00:00'),

('DET094', 'USR005', 'MED010', 'PUR035', 3, 11000, 33000, '5', '2024-02-28 09:00:00', '2024-02-28 09:00:00'),

('DET095', 'USR006', 'MED003', 'PUR036', 2, 10000, 20000, '4', '2024-03-12 09:00:00', '2024-03-12 09:00:00'),
('DET096', 'USR006', 'MED006', 'PUR036', 1, 9500, 9500, '5', '2024-03-12 10:00:00', '2024-03-12 10:00:00');



-- View Penjualan Per Barang
CREATE VIEW penjualanPerBarang AS
SELECT 
    m.med_id AS 'ID Obat', 
    m.med_name AS 'Nama Obat', 
    COALESCE(pd.qty, 0) AS 'Jumlah Terjual', 
    COALESCE(pd.total_price,0) AS 'Total Harga',
    COALESCE(pd.created_at,0) AS 'Tanggal'
FROM 
    medicines m 
LEFT JOIN 
    purchasing_details pd ON pd.med_id = m.med_id;

SELECT * FROM penjualanPerBarang
DROP VIEW penjualanPerBarang

-- View Penjualan per User
CREATE VIEW penjualanPerUser AS
SELECT 
    u.user_id AS 'ID User', 
    CONCAT(u.fname, " ", u.lname) as 'Nama Lengkap', 
    COALESCE(pd.qty,0) AS 'Jumlah Beli', 
    COALESCE(pd.total_price,0) as 'Total Pembelian',
    COALESCE(pd.created_at,0) as 'Tanggal'
FROM 
    users u LEFT JOIN purchasing_details pd 
ON 
    pd.user_id = u.user_id

SELECT * FROM penjualanPerUser
DROP VIEW penjualanPerUser

-- View Penjualan per Berang/User
CREATE VIEW penjualanPerBarangDetail AS
SELECT 
    m.med_id AS 'ID Obat', 
    m.med_name AS 'Nama Obat', 
    u.user_id AS 'ID User', 
    CONCAT(u.fname, " ", u.lname) AS 'Nama Pengguna', 
    SUM(pd.qty) AS 'Jumlah Terjual', 
    FORMAT(SUM(pd.total_price), 0) AS 'Total Harga',
    pd.created_at AS 'Tanggal'
FROM 
    purchasing_details pd 
JOIN 
    medicines m ON pd.med_id = m.med_id
JOIN 
    users u ON pd.user_id = u.user_id
GROUP BY 
    m.med_id, 
    u.user_id
    
SELECT * FROM penjualanPerBarangDenganUser

-- View Penjualan per User/Barang yang dibeli
CREATE VIEW penjualanPerUserDetail AS
SELECT 
    u.`ID User`, 
    u.`Nama Lengkap`, 
    m.`ID Obat`,
    m.`Nama Obat`, 
    pd.qty AS 'Jumlah Terjual', 
    FORMAT(pd.total_price, 0) AS 'Total Harga',
    pd.created_at as 'Tanggal'
FROM 
    purchasing_details pd 
    JOIN penjualanPerUser u ON pd.user_id = u.`ID User`
    JOIN penjualanPerBarang m ON pd.med_id = m.`ID Obat`   
GROUP BY 
    u.`ID User`, 
    m.`ID Obat`;

SELECT * FROM penjualanPerUserDetail;
DROP VIEW penjualanPerUserDetail;


--  Stored Procedured
CREATE PROCEDURE PenjualanBarangPerBulan(IN bulan INT)
BEGIN
    SELECT 
    `ID Obat`,
    `Nama Obat`,
    SUM(`Jumlah Terjual`) AS `Total Terjual`,
    FORMAT(SUM(`Total Harga`),0) AS `Total Harga`
    FROM 
        penjualanPerBarang
    WHERE 
        MONTH(`Tanggal`) = bulan
    GROUP BY 
        `ID Obat`;
END;

CREATE PROCEDURE PenjualanBarangPerPeriode(IN tanggalAwal date, tanggalAkhir Date )
BEGIN
    SELECT 
    `ID Obat`,
    `Nama Obat`,
    SUM(`Jumlah Terjual`) AS `Total Terjual`,
    FORMAT(SUM(`Total Harga`),0) AS `Total Harga`
    FROM 
        penjualanPerBarang
    WHERE 
        `Tanggal` BETWEEN tanggalAwal AND tanggalAkhir 
    GROUP BY 
        `ID Obat`;
END;

SELECT * from purchasings
CALL PenjualanBarangPerPeriode('2024-01-01','2024-12-31')

CALL PenjualanBarangPerBulan(1)
DROP PROCEDURE PenjualanBarangPerBulan


CREATE PROCEDURE PenjualanUserPerBulan(IN bulan INT)
BEGIN
    SELECT 
    `ID User`,
    `Nama Lengkap`,
    SUM(`Jumlah Beli`) AS `Total Beli `,
    FORMAT(SUM(`Total Pembelian`),0) AS `Total Pembelian`
    FROM 
        penjualanPerUser
    WHERE 
        MONTH(`Tanggal`) = bulan
    GROUP BY 
        `ID User`;
END;

CREATE PROCEDURE PenjualanUserPerPeriode(IN tanggalAwal date, tanggalAkhir Date )
BEGIN
    SELECT 
    `ID User`,
    `Nama Lengkap`,
    SUM(`Jumlah Beli`) AS `Total Beli `,
    FORMAT(SUM(`Total Pembelian`),0) AS `Total Pembelian`
    FROM 
        penjualanPerUser
    WHERE 
        `Tanggal` BETWEEN tanggalAwal AND tanggalAkhir 
    GROUP BY 
        `ID User`;
END;

CALL PenjualanUserPerPeriode('2024-01-01','2024-12-31')
DROP PROCEDURE PenjualanUserPerPeriode

CALL PenjualanUserPerBulan(6)
DROP PROCEDURE PenjualanUserPerBulan

-- CREATE PROCEDURE PenjualanBarangDetailPerBulan
-- BEGIN
--     SELECT
--         'ID User'

ALTER TABLE purchasing_details
    ADD CONSTRAINT purchasing_details_med_id_foreign
    FOREIGN KEY (med_id) REFERENCES medicines(med_id);

SHOW CREATE TABLE purchasing_details

SELECT VERSION()

ALTER TABLE purchasing_details
    DROP FOREIGN KEY purchasing_details_user_id_foreign;


CREATE TABLE `purchasing_details` (   `detail_id` varchar(255) NOT NULL,   `user_id` varchar(10) NOT NULL,   `med_id` varchar(50) NOT NULL,   `purchase_id` varchar(50) NOT NULL,   `qty` int(11) NOT NULL,   `price` int(11) NOT NULL,   `total_price` int(11) NOT NULL,   `rating` varchar(45) DEFAULT NULL,   `created_at` timestamp NULL DEFAULT NULL,   `updated_at` timestamp NULL DEFAULT NULL,   PRIMARY KEY (`detail_id`),   KEY `purchasing_details_user_id_foreign` (`user_id`),   KEY `purchasing_details_med_id_foreign` (`med_id`),   KEY `purchasing_details_purchase_id_foreign` (`purchase_id`),   CONSTRAINT `purchasing_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchasings` (`purchase_id`),   CONSTRAINT `purchasing_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci