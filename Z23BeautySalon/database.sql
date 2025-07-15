-- Creating the database
CREATE DATABASE Z23_Beauty_Salon CHARACTER SET utf8 COLLATE utf8_general_ci;

USE Z23_Beauty_Salon;

-- create users table
CREATE TABLE users(
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	email VARCHAR(255) UNIQUE KEY,
	phone VARCHAR(255),
	password VARCHAR(255)
);

-- Creating a ITEM table
CREATE TABLE item(
	category TEXT,
	id VARCHAR(255) PRIMARY KEY,
	image_url VARCHAR(255),
	title TEXT,
	type TEXT,
	description TEXT,
	price DECIMAL(10, 2),
	quantity INT
);

-- Insert value to ITEM table
INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','TC01','https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/elseve-hyaluron/ha-night-cream-150ml/ha-night-cream-150ml.png?w=360&rev=de285d1770b34454a48f58c5fea20872&hash=71D15895F8301EFA284FBF6C2BDC969E98F9AE0C', 
	'HydraLuxe Hyaluronic Night Renewal Cream - 150ml',
	'Treatment Cream/Oil', 'Experience the ultimate overnight hair treatment infused with hyaluronic acid for deep hydration and sealed cuticles. 
	Wake up to soft, detangled, and frizz-controlled hair, replumped with 4X moisture.', 26.89, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','CN01','https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/elseve-hyaluron/ha-conditioner-410ml/ha-conditioner-410ml.png?w=360&rev=201423e704814a77bdfe42cd2d8916b7&hash=96093602BDF17BA2E750F86A7DEBAB8873601FA8', 
	'72H Hydration Lock Conditioner - 410ml','Conditioner', 
	'Unveil the science behind dehydrated hair, a clear indicator of moisture loss. Our laboratories have crafted the 72H Moisture Sealing Conditioner, harnessing the power of Hyaluronic Acid. 
	This naturally occurring molecule, capable of retaining 1000 times its weight in water, deeply hydrates your hair.', 
	25.90, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','SP01', 'https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/elseve-hyaluron/ha-shampoo-410ml/ha-shampoo-410ml.png?w=360&rev=5494dbd63a494fb798f8c20bc049dd3c&hash=E8C51BD9A7F5966AAD586DA33FC72FD3F7BC7AB1',
	'72H Hydration Boost Shampoo - 410ml', 'Shampoo',
	'Unlock the science behind dehydrated hair, a clear indication of moisture loss. Our laboratories have innovated the 72H Moisture Filling Shampoo, enriched with the potent benefits of Hyaluronic Acid. 
	This molecule, naturally occurring in the body, has the remarkable ability to retain 1000 times its weight in water, deeply hydrating your hair.', 
	22.50, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','CN02', 'https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/ever/everpure-purple-conditioner/071249395363_packshot.png?w=360&rev=eadbe53abc8f4bb9b7140b0a906bc359&hash=71EFBA59F1A7A2EEC29B4F7208EF5A96B0A106FA',
	'Pure Lavender Tone Enhancing Conditioner','Conditioner', 
	'Our Everpure Purple Conditioner effectively neutralizes brassy yellow and orange tones, perfect for maintaining the vibrancy of blonde, bleached, and colored hair. 
	Say goodbye to unwanted hues and hello to beautifully toned locks with just one use.', 
	35.50, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','SP02','https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/ever/everpure-purple-shampoo/071249395349_packshot.png?w=360&rev=4da1c5d9820f4be2bc8b0e6a8c65a089&hash=82793D478D827B654C102E3CC95CB52280E0949C',
	'Pure Lavender Tone Enhancing Shampoo', 'Shampoo',
	"Our Everpure Purple Conditioner swiftly neutralizes brassy yellow and orange tones, ideal for blondes, bleached, and colored hair. 
	Experience vibrant, salon-fresh hues with every wash, restoring your hair's natural radiance effortlessly.", 
	35.50, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','CN03','https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/elseve-full-resist/conditioner/6923700980271_packshot.png?w=360&rev=ac72f171d5ec4c3cad81c5735bdd3983&hash=95337354ACBE0D54E5E512C86948BDAFFA5BC4AD',
	'ReviveGuard Conditioner','Conditioner',
	'Experience +98% Smoothness and +154% Shine after just 1 wash. 
	This formula detangles hair, reducing breakage, while nourishing and preventing split ends. Infused with Arginine to smooth and strengthen hair from the roots.',
	53.20, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','SP03','https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/elseve-full-resist/shampoo/6923700980288_packshot.png?w=360&rev=1499d93bae62494bbd8a675e4ad70a20&hash=5E29D3F37400F1BF82401572484486FB5524923D',
	'ReviveGuard Shampoo', 'Shampoo',
	'Experience a remarkable reduction in hair breakage by 53.8%. This gentle formula purifies for a healthier scalp with 5X scalp cleansing power. 
	Specifically designed for weakened hair prone to hair fall, it stimulates and improves scalp health while relieving scalp itch and reducing dandruff. Infused with Arginine to smooth and strengthen hair from the roots.',
	52.20, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','TC02','https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/ex-oil-floral-oil/6923700943023_packshot.png?w=360&rev=9e0385494aa642dc8fc2b092fa1268a4&hash=40E63D22571BB25EDF0652ED4AB454FED7992578',
	'Lavender Blossom Essence Hair Oil','Treatment Cream/Oil',
	'72-Hour Fragrance, Ultimate Nourishment, Lustrous Shine & Weightless Finish', 
	45.80, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','TC03','https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/elseve-extraordinary-oil/rich/4992944111972_packshot.png?w=360&rev=5d75c0b7aea24145b86729ee530b6a02&hash=1973406354B22A3C3AC245EE09E512D5A15A4D95',
	'Rich Toffee Essence Hair Elixir', 'Treatment Cream/Oil',
	'Just a few drops restore dry, damaged hair, delivering lustrous shine without greasiness. Soothes and rejuvenates dry, damaged strands.', 
	47.80, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','TC04', 'https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/elseve-extraordinary-oil/gold/4992944111576_packshot.png?w=360&rev=93417caf462242ab9ba562510f2d4f47&hash=5742051A37A403FE81B4D5093D263328ECBA6378',
	'Golden Elixir Hair Serum', 'Treatment Cream/Oil',
	'A versatile solution for all hair types, especially dry hair. This luxurious hair treatment and serum nourishes, revitalizes, and adds a touch of opulent shine to your locks.', 
	53.20, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','SP04', 'https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/elseve-colour-protect/8994993011810_packshot.png?w=360&rev=9b348680b1784bc0a708a3db47330aa0&hash=F0EE9871861B4C9F941C940395D4D764F0E50EC6',
	'ChromaGuard Color-Protecting Shampoo', 'Shampoo',
	"Formulated with a Light-Reflecting System and UV filter, this nourishing formula helps shield the hair fiber from external aggressors, preserving your hair's vibrant color.",
	18.00, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('HAIR','CN04','https://www.lorealparis.com.my/-/media/project/loreal/brand-sites/oap/apac/my/local-products/hair-care/hair-care/ever/071249341254_packshot.png?w=360&rev=80033f4b25ab4ae2ab0741781a5a979f&hash=39B828C75067FFFA81DC983BD0FB2B1EC81E7FDC',
	'AquaLock Moisture Conditioner', 'Conditioner',
	'Infused with natural botanicals, this sulfate-free formula deeply replenishes moisture while safeguarding against color fade. Free from parabens, harsh salts, and cruelty-free, it provides a luxurious, vegan-friendly conditioning experience.',
	35.65, 20);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('NAIL TOOL','NP01', 'https://www.innisfree.com/my/en/resources/upload/product/21692_l.png',
	'TrueTint Nail Polish - Summer Shade','Nail Polish',
	'Experience vibrant, high-shine nail colors inspired by the breathtaking beauty of nature.',
	13.20, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('NAIL TOOL','NP02', 'https://www.innisfree.com/my/en/resources/upload/product/21693_l.png',
	'TrueTone Nail Polish - Spring Shade','Nail Polish',
	'Revel in high-shine nail colors, vividly inspired by the beauty of nature.',
	13.20, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('NAIL TOOL','NP03', 'https://www.innisfree.com/my/en/resources/upload/product/21691_l.png',
	'TrueTone Nail Polish - Autumn Shade','Nail Polish',
	'Experience vibrant, high-shine nail colors inspired by the breathtaking beauty of nature.',
	13.20, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('NAIL TOOL','NC01', 'https://www.innisfree.com/my/en/resources/upload/product/23270_l.png',
	'GlossGuard Nail Top Coat','Nail Coating',
	'Enhance the shine and consistency of your nail colors with our top coat.',
	15.00, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('NAIL TOOL','NC02', 'https://www.innisfree.com/my/en/resources/upload/product/30848_l.png',
	'PrimeGuard Nail Base Coat','Nail Coating',
	'Formulated for long-lasting, vibrant nail color.',
	15.00, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('NAIL TOOL','RV01', 'https://www.innisfree.com/my/en/resources/upload/product/23274_l.png',
	'PolishPurge Nail Polish Remover','Remover',
	'Swiftly eliminates nail color while nourishing with specially formulated tangerine oil.',
	8.00, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('NAIL TOOL','CM01', 'https://www.innisfree.my/media/catalog/product/1/3/131174578_.jpg?optimize=low&fit=bounds&height=600&width=600',
	'HydraGlove Hand Masks','Care Mask',
	'Specially designed to hydrate and nourish your hands, these glove-like masks provide intensive care for smooth, soft skin.',
	15.00, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('NAIL TOOL','CM02', 'https://www.innisfree.my/media/catalog/product/1/3/131174579_.jpg?optimize=low&fit=bounds&height=600&width=600',
	'HydraSock Foot Masks','Care Mask',
	'Specially designed to hydrate and nourish your feet, these sock-like masks provide intensive care for smooth, soft skin.',
	15.00, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','CR01', 'https://www.innisfree.my/media/catalog/product/1/3/131174335_black_tea_youth_enhancing_cream_50ml_bm.jpg?optimize=low&fit=bounds&height=600&width=600',
	'YouthRenew Black Tea Revitalizing Cream','Cream',
	'Infused with Reset Concentrate, this potent formula revitalizes and firms the skin, delivering a vibrant and well-rested appearance.',
	120.00, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','CR02', 'https://www.innisfree.my/media/catalog/product/1/3/131174323_green_tea_seed_hyaluronic_cream_1.jpg?optimize=low&fit=bounds&height=600&width=600',
	'HyaluGreen Green Tea Seed Hydrating Cream ','Cream',
	'This formula, enriched with Beauty Green Tea and 5 types of hyaluronic acid, soothes and hydrates skin, fortifying its moisture barrier and forming a protective layer with ceramide and squalane for lasting hydration and a healthy glow.',
	108.00, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','MK01', 'https://www.innisfree.my/media/catalog/product/1/3/131174336_black_tea_youth_enhancing_ampoule_mask_28ml_1.jpg?optimize=low&fit=bounds&height=600&width=600',
	'VitalityBoost Firming Hydrating Mask','Mask',
	'Formulated with Reset Concentrate, rich in antioxidant benefits, this mask delivers an instant firming effect, radiance, and hydration to dry skin, restoring vitality for a healthy-looking and glowing complexion.',
	19.00, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','MK02', 'https://www.innisfree.my/media/catalog/product/1/3/131174448_super_volcanic_pore_clay_mask_bm.jpg?optimize=low&fit=bounds&height=600&width=600',
	'CoolingVolcano Multi-Action Clay Mask','Mask',
	'Formulated with Jeju Volcanic Clusters & Spheres, this rinse-off clay mask instantly cools skin upon contact, absorbs excess oil to visibly reduce pores, and improves the overall look and texture of the skin.',
	75.00, 15);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','TR01', 'https://www.innisfree.com/my/en/resources/upload/product/36497_l.png',
	'BalancingGreen Tea Skin Toner','Toner',
	'This refreshing toner deeply replenishes skin with hydration, leaving it revitalized and refreshed.',
	78.00, 18);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','TR02', 'https://www.innisfree.com/my/en/resources/upload/product/30653_l.png',
	'CherryBloom Skin Toner','Toner',
	'Whether used as a wipe-off or layering toner, it leaves the skin clear and vibrant, reminiscent of beautifully blooming cherry blossoms.',
	75.00, 18);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','TR03', 'https://www.innisfree.com/my/en/resources/upload/product/30027_l.png',
	'BarleyFresh Peeling Toner','Toner',
	'Experience a crisp and refreshing sensation akin to post-cleansing with this peeling toner.',
	65.00, 18);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','TR04', 'https://www.innisfree.com/my/en/resources/upload/product/36501_l.png',
	'TeaSeed Skin Toner','Toner',
	"This non-sticky, feather-light toner deeply hydrates and enhances the skin's moisture barrier, leaving it visibly smoother and more refined.",
	99.00, 18);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','SS01', 'https://www.innisfree.com/my/en/resources/upload/product/36639_l.png',
	'SunshineTone Water Sunscreen','Sunscreen',
	'This unique formula combines physical and chemical sunscreens to provide sun protection while also serving as a hydrating tone-up makeup base, delivering a radiant and smooth finish.',
	68.00, 10);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','SS02', 'https://www.innisfree.com/my/en/resources/upload/product/36657_l.png',
	'DefensePro Intensive Triple Shield Sunscreen','SunScreen',
	'This water-resistant sunscreen offers a matte finish and glides on smoothly for effortless application.',
	69.00, 12);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','CL01', 'https://www.innisfree.com/my/en/resources/upload/product/36612_l.png',
	'TeaFresh Hydrating Amino Acid Cleansing Oil','Cleanser',
	'Formulated with Jeju Fresh Green Tea Water and Amino Acid oil, this moisturizing cleansing oil gently melts away makeup and removes impurities, leaving skin refreshed and hydrated.',
	78.00, 10);

INSERT INTO item (category, id, image_url, title, type, description, price, quantity)
	VALUES('FACIAL','CL02', 'https://www.innisfree.com/my/en/resources/upload/product/34700_l.png',
	'BerryBalance Rebalancing Cleanser','Cleanser',
	'This cleanser rebalances skin pH for a healthy complexion, offering a soft lather reminiscent of blueberry flesh.',
	30.00, 15);

-- Creating a SERVICE table
CREATE TABLE service(
	category TEXT,
	type TEXT,
	priceRange VARCHAR(255)
);

-- Insert value for SERVICE table
INSERT INTO service(category, type, priceRange)
	VALUES('HAIR','Hair Cut','RM10++');

INSERT INTO service(category, type, priceRange)
	VALUES('HAIR','Hair Coloring','RM150++');

INSERT INTO service(category, type, priceRange)
	VALUES('HAIR','Hair Treatment','RM120++');

INSERT INTO service(category, type, priceRange)
	VALUES('FACIAL','Classic Facial','RM125++');

INSERT INTO service(category, type, priceRange)
	VALUES('FACIAL','Acne Facial','RM150++');

INSERT INTO service(category, type, priceRange)
	VALUES('FACIAL','HydraFacial','RM160++');

INSERT INTO service(category, type, priceRange)
	VALUES('FACIAL','Brightening Facial','RM180++');

INSERT INTO service(category, type, priceRange)
	VALUES('FACIAL','HydraBrightening Facial','RM220++');

INSERT INTO service(category, type, priceRange)
	VALUES('FACIAL','AntiAging Facial','RM250++');

INSERT INTO service(category, type, priceRange)
	VALUES('MANICURES AND PEDICURES','Manicures','RM50++');

INSERT INTO service(category, type, priceRange)
	VALUES('MANICURES AND PEDICURES','Pedicures','RM60++');

INSERT INTO service(category, type, priceRange)
	VALUES('MANICURES AND PEDICURES','Manicures and Pedicures','RM99++');

INSERT INTO service(category, type, priceRange)
	VALUES('MASSAGE', 'Foot Massage', 'RM65++');

INSERT INTO service(category, type, priceRange)
	VALUES('MASSAGE', 'Back Massage', 'RM80+');

INSERT INTO service(category, type, priceRange)
	VALUES('MASSAGE', 'Head Massage', 'RM60+');

-- creating table for users when checkout
CREATE TABLE checkout(
	id INT AUTO_INCREMENT PRIMARY KEY,
	buyer_name VARCHAR(255) NOT NULL,
	buyer_email VARCHAR(255) NOT NULL,
	buyer_phone VARCHAR(15) NOT NULL,
	buyer_address VARCHAR(255) NOT NULL,
	reference VARCHAR(255) NOT NULL UNIQUE KEY,
	bank VARCHAR(255) NOT NULL
);

-- creating table for users regarding bought items
CREATE TABLE items_bought (
    id INT AUTO_INCREMENT PRIMARY KEY,
    checkout_id INT,
    item_id VARCHAR(255),
    quantity INT,
    price DECIMAL(10, 2),
    FOREIGN KEY (checkout_id) REFERENCES checkout(id)
);


CREATE TABLE service_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    num_pax INT NOT NULL,
    service_type VARCHAR(100) NOT NULL,
    preferred_date DATE NOT NULL,
    preferred_time TIME NOT NULL,
    additional_message TEXT
);

CREATE TABLE contact_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    salutation VARCHAR(10) NOT NULL,
    enquiry VARCHAR(10) NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    subject TEXT NOT NULL,
    subscribe TINYINT(1) DEFAULT 0
);