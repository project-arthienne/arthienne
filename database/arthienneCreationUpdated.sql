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

ALTER TABLE "Buyer"
ADD COLUMN "BuyerPassword" VARCHAR(255) NOT NULL;

ALTER TABLE "Seller"
ADD COLUMN "SellerPassword" VARCHAR(255) NOT NULL;

COMMIT;