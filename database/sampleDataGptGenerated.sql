--
-- SAMPLE DATA
--

-- Inserting data into base entity tables first (no foreign keys)
--------------------------------------------------------------------------------

-- Buyers (3 records)
INSERT INTO "Buyer" ("BuyerFName", "BuyerLName", "BuyerEmail", "BuyerPhoneNo", "BuyerAddress") VALUES
('Anya', 'Smith', 'anya.s@email.com', '555-1234', '101 Art Ave, London'),
('Ben', 'Clark', 'ben.c@email.com', '555-5678', '202 Bid Ln, Paris'),
('Chloe', 'Davis', 'chloe.d@email.com', '555-9012', '303 Gallery St, New York');

-- Sellers (3 records)
INSERT INTO "Seller" ("SellerFName", "SellerLName", "SellerEmail", "SellerPhoneNo", "SellerAddress") VALUES
('Diana', 'Evans', 'diana.e@artist.com', '555-2345', '404 Studio Pl, Berlin'),
('Ethan', 'Fisher', 'ethan.f@artist.com', '555-6789', '505 Craft Rd, Rome'),
('Fiona', 'Green', 'fiona.g@artist.com', '555-0123', '606 Paint Ct, Tokyo');

-- SiteManagers (3 records)
INSERT INTO "SiteManager" ("SMFName", "SMLName", "SMEmail") VALUES
('Gary', 'Hill', 'gary.h@arthienne.com'),
('Holly', 'Ivy', 'holly.i@arthienne.com'),
('Ian', 'Jones', 'ian.j@arthienne.com');

-- Auctions (3 records)
INSERT INTO "Auctions" ("AuctionStartDate", "AuctionEndDate") VALUES
('2025-10-01', '2025-10-15'), -- auction 1
('2025-11-05', '2025-11-10'), -- auction 2
('2026-01-20', '2026-02-01'); -- auction 3

-- Exhibitions (3 records)
INSERT INTO "Exhibitions" ("ExhibitionDate", "ExhibitionTitle", "ExhibitionDescription") VALUES
('2025-09-15', 'Modern Masters', 'A collection of 20th century abstract art.'), -- exhibition 1
('2025-12-01', 'Digital Dreams', 'Showcasing digital painting and NFTs.'), -- exhibition 2
('2026-03-10', 'Sculpted Silence', 'An exhibition of minimalist sculptures.'); -- exhibition 3

-- Forums (3 records)
INSERT INTO "Forums" ("ForumTitle") VALUES
('Artist Discussion'), -- forum 1
('Upcoming Auction News'), -- forum 2
('Sculpture Enthusiasts'); -- forum 3

-- Category (3 records)
INSERT INTO "Category" ("CategoryTitle") VALUES
('Oil Painting'), -- category 1
('Digital Art'), -- category 2
('Bronze Sculpture'); -- category 3


-- Inserting data into dependent entity tables (requiring FKs)
--------------------------------------------------------------------------------

-- Artworks (3 records, requiring Seller, optional Auction/Exhibition)
INSERT INTO "Artworks" ("ArtworkTitle", "ArtworkDescription", "Price", "AuctionID", "ExhibitionID", "SellerID") VALUES
('Sunset Coast', 'Large oil painting capturing a dramatic sunset.', 1200.00, 1, NULL, 1), -- Diana, in Auction 1
('Neon Future', 'Vibrant digital piece.', 450.00, NULL, 2, 2), -- Ethan, in Exhibition 2
('The Thinker', 'Small bronze sculpture replica.', 2500.00, 3, 3, 3); -- Fiona, in Auction 3 and Exhibition 3

-- Image (3 records, requiring Artwork)
INSERT INTO "Image" ("ImageURL", "ImageVisibility", "ArtworkID") VALUES
('http://art.com/sunset_main.jpg', TRUE, 1),
('http://art.com/neon_preview.png', TRUE, 2),
('http://art.com/thinker_side.jpg', FALSE, 3);


-- Inserting data into relationship tables
--------------------------------------------------------------------------------

-- Order (3 records, requires Buyer and Artworks)
INSERT INTO "Order" ("DeliveryAddress", "PaymentID", "BuyerID", "ArtworkID") VALUES
('101 Art Ave, London', 'PAY-1001-A', 1, 1), -- Anya buys Sunset Coast
('202 Bid Ln, Paris', 'PAY-1002-B', 2, 2), -- Ben buys Neon Future
('303 Gallery St, New York', 'PAY-1003-C', 3, 3); -- Chloe buys The Thinker

-- ArtworkCategory (3 records, linking Artworks and Category)
INSERT INTO "ArtworkCategory" ("ArtworkID", "CategoryID") VALUES
(1, 1), -- Sunset Coast is Oil Painting
(2, 2), -- Neon Future is Digital Art
(3, 3); -- The Thinker is Bronze Sculpture

-- BuyerInAuctions (3 records, requires Buyer, Auction, and BidPrice)
INSERT INTO "BuyerInAuctions" ("BuyerID", "AuctionID", "BidPrice") VALUES
(1, 1, 1250.00), -- Anya bids on Auction 1
(2, 3, 2600.00), -- Ben bids on Auction 3
(3, 1, 1300.00); -- Chloe bids on Auction 1

-- SellerInAuctions (3 records, requires Seller and Auction)
INSERT INTO "SellerInAuctions" ("SellerID", "AuctionID") VALUES
(1, 1), -- Diana in Auction 1
(2, 2), -- Ethan in Auction 2
(3, 3); -- Fiona in Auction 3

-- BuyerInForums (3 records, requires Buyer and Forum)
INSERT INTO "BuyerInForums" ("BuyerID", "ForumID") VALUES
(1, 2), -- Anya in Upcoming Auction News
(2, 1), -- Ben in Artist Discussion
(3, 3); -- Chloe in Sculpture Enthusiasts

-- SellerInForums (3 records, requires Seller and Forum)
INSERT INTO "SellerInForums" ("SellerID", "ForumID") VALUES
(1, 1), -- Diana in Artist Discussion
(2, 2), -- Ethan in Upcoming Auction News
(3, 3); -- Fiona in Sculpture Enthusiasts

-- BuyerInExhibitions (3 records, requires Buyer and Exhibition)
INSERT INTO "BuyerInExhibitions" ("BuyerID", "ExhibitionID") VALUES
(1, 1), -- Anya attends Modern Masters
(2, 2), -- Ben attends Digital Dreams
(3, 3); -- Chloe attends Sculpted Silence

-- SellerInExhibitions (3 records, requires Seller and Exhibition)
INSERT INTO "SellerInExhibitions" ("SellerID", "ExhibitionID") VALUES
(1, 1), -- Diana attends Modern Masters
(2, 2), -- Ethan attends Digital Dreams
(3, 3); -- Fiona attends Sculpted Silence

-- ManagingForums (3 records, requires Forum and SiteManager)
INSERT INTO "ManagingForums" ("ForumID", "SMID") VALUES
(1, 1), -- Gary manages Forum 1
(2, 2), -- Holly manages Forum 2
(3, 3); -- Ian manages Forum 3

-- ManagingArtworks (3 records, requires Artwork and SiteManager)
INSERT INTO "ManagingArtworks" ("ArtworkID", "SMID") VALUES
(1, 1), -- Gary manages Artwork 1
(2, 2), -- Holly manages Artwork 2
(3, 3); -- Ian manages Artwork 3

-- ManagingAuctions (3 records, requires Auction and SiteManager)
INSERT INTO "ManagingAuctions" ("AuctionID", "SMID") VALUES
(1, 1), -- Gary manages Auction 1
(2, 2), -- Holly manages Auction 2
(3, 3); -- Ian manages Auction 3

-- ManagingExhibitions (3 records, requires Exhibition and SiteManager)
INSERT INTO "ManagingExhibitions" ("ExhibitionID", "SMID") VALUES
(1, 1), -- Gary manages Exhibition 1
(2, 2), -- Holly manages Exhibition 2
(3, 3); -- Ian manages Exhibition 3

COMMIT;