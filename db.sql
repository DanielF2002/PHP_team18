/* Xin Feng */
--DROP TABLE `team18`.`xin_feng_branches`;
CREATE TABLE IF NOT EXISTS `team18`.`xin_feng_branches` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL UNIQUE,
    `address` VARCHAR(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `tel` VARCHAR(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `email` VARCHAR(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `url` VARCHAR(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB


/* Xingxing Wang */
CREATE TABLE IF NOT EXISTS `team18`.`xingxing_menuItems` (
    `item_id` INT NOT NULL AUTO_INCREMENT , 
    `item_name` VARCHAR(100) NOT NULL , 
    `category` VARCHAR(50) NOT NULL , 
    `ingredients` TEXT NULL , 
    `vegetarian` BOOLEAN NULL , 
    `price` DECIMAL(8, 2) NOT NULL , 
    PRIMARY KEY (`item_id`)) 
    ENGINE = InnoDB;

INSERT INTO xingxing_menuItems (item_name, category, ingredients, vegetarian, price) 
VALUES 
    ('Caprese Salad', 'Starters/Snacks', 'Fresh mozzarella, ripe tomatoes, basil leaves, balsamic glaze', TRUE, 6.50),
    ('Bruschetta Trio', 'Starters/Snacks', 'Classic tomato and basil, olive tapenade, roasted red pepper', TRUE, 8.00),
    ('French Onion Soup', 'Soups/Salads', 'Caramelized onions, beef broth, gruyere cheese, croutons', FALSE, 5.50),
    ('Caesar Salad', 'Soups/Salads', 'Crisp romaine lettuce, garlic croutons, parmesan cheese, Caesar dressing', TRUE, 7.00),
    ('Beef Bourguignon', 'Main Courses', 'Slow-cooked beef in red wine sauce, carrots, onions, mushrooms', FALSE, 14.50),
    ('Vegetable Ratatouille', 'Main Courses', 'Eggplant, zucchini, bell peppers, tomatoes, onions, garlic', TRUE, 12.00),
    ('Chicken Piccata', 'Main Courses', 'Pan-seared chicken breast, lemon caper sauce, mashed potatoes, seasonal vegetables', FALSE, 13.50),
    ('Spaghetti Carbonara', 'Main Courses', 'Pasta tossed in creamy egg and parmesan sauce, crispy pancetta', FALSE, 11.00),
    ('Classic Beef Burger', 'Sandwiches/Burgers', 'Grilled beef patty, lettuce, tomato, onion, pickles, brioche bun', FALSE, 9.50),
    ('Mediterranean Veggie Wrap', 'Sandwiches/Burgers', 'Grilled vegetables, feta cheese, hummus, spinach, whole wheat wrap', TRUE, 8.50),
    ('Crème Brûlée', 'Desserts', 'Creamy vanilla custard, caramelized sugar crust', TRUE, 5.00),
    ('Chocolate Fondant', 'Desserts', 'Warm chocolate cake, molten chocolate center, vanilla ice cream', TRUE, 6.50),
    ('House Red/White Wine', 'Beverages', 'Varietal options available', FALSE, 5.00),
    ('Bistro Signature Cocktail', 'Beverages', 'Seasonal ingredients, crafted by our mixologist', NULL, 8.00),
    ('Freshly Brewed Coffee/Tea', 'Beverages', 'Regular or decaf coffee, assorted teas', NULL, 3.00);

/* Jin Lu */
-- DROP TABLE `team18`.`jinLu_reservationInfo`;
CREATE TABLE `team18`.`jinLu_reservationInfo` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL , 
    `guestNumber` INT NOT NULL , `date` DATE NOT NULL , 
    `email` VARCHAR(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL , 
    PRIMARY KEY (`id`)) 
    ENGINE = InnoDB;