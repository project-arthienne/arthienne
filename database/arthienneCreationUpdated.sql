create database product_manager;


-- 1. base entity tables
--------------------------------------------------------------------------------

-- buyer table
CREATE TABLE "Buyer" (
    "BuyerID"       SERIAL PRIMARY KEY,
    "BuyerFName"    VARCHAR(100) NOT NULL,
    "BuyerLName"    VARCHAR(100) NOT NULL,
    "BuyerEmail"    VARCHAR(255) UNIQUE NOT NULL,
    "BuyerPhoneNo"  VARCHAR(20),
    "BuyerAddress"  VARCHAR(255)
);

-- seller table
CREATE TABLE "Seller" (
    "SellerID"        SERIAL PRIMARY KEY,
    "SellerFName"     VARCHAR(100) NOT NULL,
    "SellerLName"     VARCHAR(100) NOT NULL,
    "SellerEmail"     VARCHAR(255) UNIQUE NOT NULL,
    "SellerPhoneNo"   VARCHAR(20),
    "SellerAddress"   VARCHAR(255)
);

-- siteManager table
CREATE TABLE "SiteManager" (
    "SMID"      SERIAL PRIMARY KEY,
    "SMFName"   VARCHAR(100) NOT NULL,
    "SMLName"   VARCHAR(100) NOT NULL,
    "SMEmail"   VARCHAR(255) UNIQUE NOT NULL
);

-- auctions table
CREATE TABLE "Auctions" (
    "AuctionID"         SERIAL PRIMARY KEY,
    "AuctionStartDate"  DATE NOT NULL,
    "AuctionEndDate"    DATE NOT NULL,
    CHECK ("AuctionStartDate" <= "AuctionEndDate")
);

-- exhibitions table
CREATE TABLE "Exhibitions" (
    "ExhibitionID"          SERIAL PRIMARY KEY,
    "ExhibitionDate"        DATE NOT NULL,
    "ExhibitionTitle"       VARCHAR(255) NOT NULL,
    "ExhibitionDescription" TEXT
);

-- forums table
CREATE TABLE "Forums" (
    "ForumID"       SERIAL PRIMARY KEY,
    "ForumTitle"    VARCHAR(255) NOT null 
    
    -- need to edit a few properties here, tags, maybe, and in exhibitions too, but if we include those -
    -- then we would also need to change the ER diagram and RM mapping 
    
    -- also need to add forum description maybe, removing it from the wireframes at the moment
    -- and number of participants, for both forums and exhibitions, we can derivde that by the "buyer/seller in exhibitions/forums" tables
    -- would work upon these changes during the holidays alongside the feedback from the client-meeting-2
);

-- category table
CREATE TABLE "Category" (
    "CategoryID"    SERIAL PRIMARY KEY,
    "CategoryTitle" VARCHAR(100) UNIQUE NOT NULL
);


-- 2. dependent entity tables
--------------------------------------------------------------------------------

-- artworks table
CREATE TABLE "Artworks" (
    "ArtworkID"             SERIAL PRIMARY KEY,
    "ArtworkTitle"          VARCHAR(255) NOT NULL,
    "ArtworkDescription"    TEXT,
    "Price"                 NUMERIC(10, 2) NOT NULL,
    "AuctionID"             INT, -- maybe boolean, would discuss and edit later
    "ExhibitionID"          INT, -- maybe boolean, would discuss and edit later
    "SellerID"              INT NOT NULL,
    CONSTRAINT fk_artworks_auction FOREIGN KEY ("AuctionID") REFERENCES "Auctions"("AuctionID") ON UPDATE CASCADE ON DELETE SET NULL,
    CONSTRAINT fk_artworks_exhibition FOREIGN KEY ("ExhibitionID") REFERENCES "Exhibitions"("ExhibitionID") ON UPDATE CASCADE ON DELETE SET NULL,
    CONSTRAINT fk_artworks_seller FOREIGN KEY ("SellerID") REFERENCES "Seller"("SellerID") ON UPDATE CASCADE ON DELETE RESTRICT
);

-- image table
CREATE TABLE "Image" (
    "ImageID"           SERIAL PRIMARY KEY,
    "ImageURL"          VARCHAR(255) UNIQUE NOT NULL,
    "ImageVisibility"   BOOLEAN DEFAULT TRUE,
    "ArtworkID"         INT NOT NULL,
    CONSTRAINT fk_image_artwork FOREIGN KEY ("ArtworkID") REFERENCES "Artworks"("ArtworkID") ON UPDATE CASCADE ON DELETE CASCADE
);


-- 3. relationship tables
--------------------------------------------------------------------------------

-- order table: relation between buyer and artworks (buys)
CREATE TABLE "Order" (
    "OrderID"           SERIAL PRIMARY KEY,
    "DeliveryAddress"   VARCHAR(255) NOT NULL,
    "PaymentID"         VARCHAR(50) UNIQUE NOT NULL,
    "OrderDate"         TIMESTAMP WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "BuyerID"           INT NOT NULL,
    "ArtworkID"         INT NOT NULL UNIQUE,
    CONSTRAINT fk_order_buyer FOREIGN KEY ("BuyerID") REFERENCES "Buyer"("BuyerID") ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_order_artwork FOREIGN KEY ("ArtworkID") REFERENCES "Artworks"("ArtworkID") ON UPDATE CASCADE ON DELETE RESTRICT
);

-- artworkCategory table: many-to-many
CREATE TABLE "ArtworkCategory" (
    "ArtworkID" INT NOT NULL,
    "CategoryID" INT NOT NULL,
    PRIMARY KEY ("ArtworkID", "CategoryID"),
    CONSTRAINT fk_ac_artwork FOREIGN KEY ("ArtworkID") REFERENCES "Artworks"("ArtworkID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_ac_category FOREIGN KEY ("CategoryID") REFERENCES "Category"("CategoryID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- buyerInAuctions table: bidsIn
CREATE TABLE "BuyerInAuctions" (
    "BuyerID" INT NOT NULL,
    "AuctionID" INT NOT NULL,
    "BidPrice" NUMERIC(10, 2) NOT NULL,
    PRIMARY KEY ("BuyerID", "AuctionID"),
    CONSTRAINT fk_bia_buyer FOREIGN KEY ("BuyerID") REFERENCES "Buyer"("BuyerID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_bia_auction FOREIGN KEY ("AuctionID") REFERENCES "Auctions"("AuctionID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- sellerInAuctions table
CREATE TABLE "SellerInAuctions" (
    "SellerID" INT NOT NULL,
    "AuctionID" INT NOT NULL,
    PRIMARY KEY ("SellerID", "AuctionID"),
    CONSTRAINT fk_sia_seller FOREIGN KEY ("SellerID") REFERENCES "Seller"("SellerID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_sia_auction FOREIGN KEY ("AuctionID") REFERENCES "Auctions"("AuctionID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- buyerInForums table
CREATE TABLE "BuyerInForums" (
    "BuyerID" INT NOT NULL,
    "ForumID" INT NOT NULL,
    PRIMARY KEY ("BuyerID", "ForumID"),
    CONSTRAINT fk_bif_buyer FOREIGN KEY ("BuyerID") REFERENCES "Buyer"("BuyerID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_bif_forum FOREIGN KEY ("ForumID") REFERENCES "Forums"("ForumID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- sellerInForums table
CREATE TABLE "SellerInForums" (
    "SellerID" INT NOT NULL,
    "ForumID" INT NOT NULL,
    PRIMARY KEY ("SellerID", "ForumID"),
    CONSTRAINT fk_sif_seller FOREIGN KEY ("SellerID") REFERENCES "Seller"("SellerID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_sif_forum FOREIGN KEY ("ForumID") REFERENCES "Forums"("ForumID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- buyerInExhibitions table
CREATE TABLE "BuyerInExhibitions" (
    "BuyerID" INT NOT NULL,
    "ExhibitionID" INT NOT NULL,
    PRIMARY KEY ("BuyerID", "ExhibitionID"),
    CONSTRAINT fk_bie_buyer FOREIGN KEY ("BuyerID") REFERENCES "Buyer"("BuyerID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_bie_exhibition FOREIGN KEY ("ExhibitionID") REFERENCES "Exhibitions"("ExhibitionID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- sellerInExhibitions table
CREATE TABLE "SellerInExhibitions" (
    "SellerID" INT NOT NULL,
    "ExhibitionID" INT NOT NULL,
    PRIMARY KEY ("SellerID", "ExhibitionID"),
    CONSTRAINT fk_sie_seller FOREIGN KEY ("SellerID") REFERENCES "Seller"("SellerID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_sie_exhibition FOREIGN KEY ("ExhibitionID") REFERENCES "Exhibitions"("ExhibitionID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- managingForums table
CREATE TABLE "ManagingForums" (
    "ForumID" INT NOT NULL,
    "SMID" INT NOT NULL,
    PRIMARY KEY ("ForumID", "SMID"),
    CONSTRAINT fk_mf_forum FOREIGN KEY ("ForumID") REFERENCES "Forums"("ForumID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_mf_sm FOREIGN KEY ("SMID") REFERENCES "SiteManager"("SMID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- managingArtworks table
CREATE TABLE "ManagingArtworks" (
    "ArtworkID" INT NOT NULL,
    "SMID" INT NOT NULL,
    PRIMARY KEY ("ArtworkID", "SMID"),
    CONSTRAINT fk_ma_artwork FOREIGN KEY ("ArtworkID") REFERENCES "Artworks"("ArtworkID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_ma_sm FOREIGN KEY ("SMID") REFERENCES "SiteManager"("SMID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- managingAuctions table
CREATE TABLE "ManagingAuctions" (
    "AuctionID" INT NOT NULL,
    "SMID" INT NOT NULL,
    PRIMARY KEY ("AuctionID", "SMID"),
    CONSTRAINT fk_mauc_auction FOREIGN KEY ("AuctionID") REFERENCES "Auctions"("AuctionID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_mauc_sm FOREIGN KEY ("SMID") REFERENCES "SiteManager"("SMID") ON UPDATE CASCADE ON DELETE CASCADE
);

-- managingExhibitions table
CREATE TABLE "ManagingExhibitions" (
    "ExhibitionID" INT NOT NULL,
    "SMID" INT NOT NULL,
    PRIMARY KEY ("ExhibitionID", "SMID"),
    CONSTRAINT fk_mexh_exhibition FOREIGN KEY ("ExhibitionID") REFERENCES "Exhibitions"("ExhibitionID") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_mexh_sm FOREIGN KEY ("SMID") REFERENCES "SiteManager"("SMID") ON UPDATE CASCADE ON DELETE CASCADE
);

--TRUNCATE TABLE
--"ManagingExhibitions",
--"ManagingAuctions",
--"ManagingArtworks",
--"ManagingForums",
--"SellerInExhibitions",
--"BuyerInExhibitions",
--"SellerInForums",
--"BuyerInForums",
--"SellerInAuctions",
--"BuyerInAuctions",
--"ArtworkCategory",
--"Order",
--"Image",
--"Artworks",
--"Forums",
--"Exhibitions",
--"Auctions",
--"Category",
--"SiteManager",
--"Seller",
--"Buyer"
--RESTART IDENTITY CASCADE;


-- new changes below

ALTER TABLE "Buyer"
ADD COLUMN "BuyerPassword" VARCHAR(255) NOT NULL;

ALTER TABLE "Seller"
ADD COLUMN "SellerPassword" VARCHAR(255) NOT NULL;

ALTER TABLE "SiteManager"
ADD COLUMN "SMPassword" VARCHAR(255) NOT NULL;

CREATE TABLE "ContactMessage" (
    "MessageID" SERIAL PRIMARY KEY,
    "Email" VARCHAR(255) NOT NULL,
    "Topic" VARCHAR(100) NOT NULL,
    "Message" TEXT,
    "CreatedAt" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE "FAQ" (
    "FAQID" SERIAL PRIMARY KEY,
    "Question" TEXT NOT NULL,
    "Answer" TEXT NOT NULL,
    "IsVisible" BOOLEAN DEFAULT TRUE
);

CREATE TABLE "Terms" (
    "TermsID" SERIAL PRIMARY KEY,
    "Content" TEXT NOT NULL,
    "LastUpdated" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM "SiteManager";

ALTER TABLE "Forums"
ADD COLUMN "ForumDescription" TEXT NOT NULL;

CREATE TABLE "ForumComment" (
    "CommentID" SERIAL PRIMARY KEY,
    "ForumID" INT NOT NULL,
    "UserType" VARCHAR(10) NOT NULL,
    "UserID" INT NOT NULL,
    "CommentText" TEXT NOT NULL,
    "CreatedAt" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_comment_forum
        FOREIGN KEY ("ForumID") REFERENCES "Forums"("ForumID")
        ON DELETE CASCADE
);

INSERT INTO "Forums" ("ForumTitle","ForumDescription") VALUES
('Contemporary Art And Culture','Discuss modern artistic movements, cultural impact, and evolving creative expression.'),
('Digital Art And NFT Discourse','Explore digital creation, NFTs, blockchain ownership, and emerging platforms.'),
('Auction Market Trends And Insights','Share insights on auction prices, bidding behavior, and market valuation.'),
('Emerging Artists And New Voices','Highlight rising artists and new creative voices shaping the art world.'),
('Sculpture Materials And Techniques','Discuss sculptural processes, materials, and three-dimensional form.'),
('Abstract Expression And Meaning','Debate interpretation, symbolism, and emotional abstraction in art.'),
('Art Collecting For Beginners','Guidance and discussion for first-time collectors and enthusiasts.'),
('Exhibition Reviews And Critiques','Share opinions and critiques of exhibitions worldwide.'),
('The Role Of AI In Art','Discuss artificial intelligence as a creative and conceptual tool.'),
('Photography As Fine Art','Explore photography’s role, techniques, and artistic legitimacy.');

INSERT INTO "Exhibitions" ("ExhibitionDate","ExhibitionTitle","ExhibitionDescription")
VALUES
('2025-09-15','Modern Masters','A curated exhibition celebrating influential abstract artists of the twentieth century.'),
('2025-12-01','Digital Dreams','An immersive look into contemporary digital painting and NFT culture.'),
('2026-03-10','Sculpted Silence','Minimalist bronze sculptures exploring form, balance, and stillness.'),
('2026-04-18','Echoes In Oil','Exploring memory and emotion through layered oil compositions.'),
('2026-06-02','Forms Of Stillness','A study of quiet geometry and restrained sculptural form.'),
('2026-08-19','Fragments Of Light','Works focused on contrast, reflection, and perception through mixed media.');

INSERT INTO "SellerInExhibitions" ("SellerID","ExhibitionID")
VALUES
(1,1),
(2,2),
(3,3),
(4,4),
(5,5),
(6,6);

INSERT INTO "FAQ" ("Question","Answer") VALUES
('How do I participate in an exhibition?','You can browse exhibitions and register through your My Space account.'),
('Is bidding legally binding?','Yes, all bids placed on Arthienne are final and legally binding.'),
('How do artists submit their work?','Artists can upload artworks directly from their My Space dashboard.'),
('Are all artworks authentic?','Yes, every artwork is reviewed before being listed on the platform.'),
('Can I contact an artist directly?','Yes, contact options are available on individual artwork pages.'),
('What happens if an auction ends?','The highest bidder at the end of the auction wins the artwork.');


INSERT INTO "Terms" ("Content")
VALUES (
'Arthienne is an online platform dedicated to the exhibition, auction, and direct sale of artworks. By accessing or using this platform, you acknowledge that you have read, understood, and agree to be bound by the following terms and conditions.

1. User Accounts
Users are responsible for maintaining the confidentiality of their account credentials, including login information and personal details. Any activity conducted through a registered account is deemed to be performed by the account holder. Arthienne reserves the right to suspend or terminate accounts that violate platform guidelines, misuse services, or engage in fraudulent or harmful behavior.

2. Exhibitions And Auctions
Participation in exhibitions and auctions hosted on Arthienne is subject to approval and review. Arthienne retains the right to curate, modify, or remove exhibitions at its discretion. All bids placed during auctions are final and legally binding. Users are responsible for ensuring accuracy before submitting any bid.

3. Intellectual Property
All content published on Arthienne, including images, text, branding elements, and platform design, is protected under applicable intellectual property laws. Users may not reproduce, distribute, or exploit platform content without prior written consent from Arthienne or the respective rights holder.

4. Limitation Of Liability
Arthienne shall not be held liable for any indirect, incidental, or consequential damages arising from the use or inability to use the platform. While reasonable efforts are made to ensure platform availability and accuracy, Arthienne does not guarantee uninterrupted service or error-free operation.

5. Governing Law
These terms and conditions shall be governed by and interpreted in accordance with the applicable laws of the operating jurisdiction, without regard to conflict of law principles.

6. Payments And Transactions
All payments conducted through Arthienne must be completed using approved payment methods. Prices, fees, and applicable taxes are clearly displayed prior to confirmation. Arthienne is not responsible for delays or failures caused by third-party payment providers.

7. Artist And Seller Responsibilities
Artists and sellers are responsible for the accuracy of information provided regarding their artworks, including descriptions, pricing, and authenticity. Any disputes regarding ownership or authenticity must be resolved by the seller in accordance with platform policies.

8. Modifications To Terms
Arthienne reserves the right to update or modify these terms at any time. Continued use of the platform following changes constitutes acceptance of the revised terms.'
);

COMMIT;

