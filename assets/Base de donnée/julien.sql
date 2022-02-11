#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
#------------------------------------------------------------
# Table: s4U3u_categories
#------------------------------------------------------------
CREATE TABLE s4U3u_categories(
        id Int Auto_increment NOT NULL,
        name Varchar (25) NOT NULL,
        CONSTRAINT s4U3u_categories_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_roles
#------------------------------------------------------------
CREATE TABLE s4U3u_roles(
        id Int Auto_increment NOT NULL,
        name Varchar (25) NOT NULL,
        CONSTRAINT s4U3u_roles_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_users
#------------------------------------------------------------
CREATE TABLE s4U3u_users(
        id Int Auto_increment NOT NULL,
        profilePicture Varchar (255) NOT NULL,
        userName Varchar (25) NOT NULL,
        email Varchar (255) NOT NULL,
        password Varchar (255) NOT NULL,
        id_roles Int NOT NULL,
        CONSTRAINT s4U3u_users_PK PRIMARY KEY (id),
        CONSTRAINT users_roles_FK FOREIGN KEY (id_roles) REFERENCES s4U3u_roles(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_opinions
#------------------------------------------------------------
CREATE TABLE s4U3u_opinions(
        id Int Auto_increment NOT NULL,
        reviewGrade Int NOT NULL,
        content Text,
        reviewDate Datetime NOT NULL,
        id_users Int NOT NULL,
        id_offers Int NOT NULL,

        CONSTRAINT s4U3u_opinions_PK PRIMARY KEY (id),
        CONSTRAINT opinions_offers_FK FOREIGN KEY (id_offers) REFERENCES s4U3u_offers(id),
        CONSTRAINT opinions_users_FK FOREIGN KEY (id_users) REFERENCES s4U3u_users(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_reports
#------------------------------------------------------------
CREATE TABLE s4U3u_reports(
        id Int Auto_increment NOT NULL,
        content Text,
        id_users Int NOT NULL,
        id_users_write Int NOT NULL,
        CONSTRAINT s4U3u_reports_PK PRIMARY KEY (id),
        CONSTRAINT reports_users_FK FOREIGN KEY (id_users) REFERENCES s4U3u_users(id),
        CONSTRAINT reports_users0_FK FOREIGN KEY (id_users_write) REFERENCES s4U3u_users(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_exclusivities
#------------------------------------------------------------
CREATE TABLE s4U3u_exclusivities(
        id Int Auto_increment NOT NULL,
        name Varchar (25) NOT NULL,
        CONSTRAINT s4U3u_exclusivities_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_popfilters
#------------------------------------------------------------
CREATE TABLE s4U3u_popfilters(
        id Int Auto_increment NOT NULL,
        popsName Varchar (25) NOT NULL,
        tags Int NOT NULL,
        reference Int NOT NULL,
        price DECIMAL (15, 3) NOT NULL,
        id_exclusivities Int NOT NULL,
        CONSTRAINT s4U3u_popfilters_PK PRIMARY KEY (id),
        CONSTRAINT popfilters_exclusivities_FK FOREIGN KEY (id_exclusivities) REFERENCES s4U3u_exclusivities(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_brands
#------------------------------------------------------------
CREATE TABLE s4U3u_brands(
        id Int Auto_increment NOT NULL,
        name Varchar (25) NOT NULL,
        id_popfilters Int NOT NULL,
        CONSTRAINT s4U3u_brands_PK PRIMARY KEY (id),
        CONSTRAINT brands_popfilters_FK FOREIGN KEY (id_popfilters) REFERENCES s4U3u_popfilters(id),
        CONSTRAINT brands_popfilters_AK UNIQUE (id_popfilters)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_pops
#------------------------------------------------------------
CREATE TABLE s4U3u_pops(
        id Int Auto_increment NOT NULL,
        name Varchar (25) NOT NULL,
        tags Int NOT NULL,
        reference Int NOT NULL,
        officialPopImageInTheBox Varchar (255) NOT NULL,
        officialPopImageOutBox Varchar (255) NOT NULL,
        id_exclusivities Int,
        id_brands Int NOT NULL,
        CONSTRAINT s4U3u_pops_PK PRIMARY KEY (id),
        CONSTRAINT pops_exclusivities_FK FOREIGN KEY (id_exclusivities) REFERENCES s4U3u_exclusivities(id),
        CONSTRAINT pops_brands0_FK FOREIGN KEY (id_brands) REFERENCES s4U3u_brands(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_envylists
#------------------------------------------------------------
CREATE TABLE s4U3u_envylists(
        id Int Auto_increment NOT NULL,
        nbrOfPopInEnvyList Int,
        id_users Int NOT NULL,
        id_popfilters Int NOT NULL,
        CONSTRAINT s4U3u_envylists_PK PRIMARY KEY (id),
        CONSTRAINT envylists_users_FK FOREIGN KEY (id_users) REFERENCES s4U3u_users(id),
        CONSTRAINT envylists_popfilters0_FK FOREIGN KEY (id_popfilters) REFERENCES s4U3u_popfilters(id),
        CONSTRAINT envylists_users_AK UNIQUE (id_users)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_status
#------------------------------------------------------------
CREATE TABLE s4U3u_status(
        id Int Auto_increment NOT NULL,
        name Varchar (50) NOT NULL,
        descriprion Text NOT NULL,
        CONSTRAINT s4U3u_status_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_offers
#------------------------------------------------------------
CREATE TABLE s4U3u_offers(
        id Int Auto_increment NOT NULL,
        date Datetime NOT NULL,
        price DECIMAL (15, 3) NOT NULL,
        id_pops Int NOT NULL,
        id_envylists Int NOT NULL,
        id_status Int NOT NULL,
        CONSTRAINT s4U3u_offers_PK PRIMARY KEY (id),
        CONSTRAINT offers_pops0_FK FOREIGN KEY (id_pops) REFERENCES s4U3u_pops(id),
        CONSTRAINT offers_envylists1_FK FOREIGN KEY (id_envylists) REFERENCES s4U3u_envylists(id),
        CONSTRAINT offers_status2_FK FOREIGN KEY (id_status) REFERENCES s4U3u_status(id),
        CONSTRAINT offers_envylists_AK UNIQUE (id_envylists)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_images
#------------------------------------------------------------
CREATE TABLE s4U3u_images(
        id Int Auto_increment NOT NULL,
        image Varchar (255) NOT NULL,
        id_offers Int NOT NULL,
        CONSTRAINT s4U3u_images_PK PRIMARY KEY (id),
        CONSTRAINT images_offers_FK FOREIGN KEY (id_offers) REFERENCES s4U3u_offers(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_popOfEnvyList
#------------------------------------------------------------
CREATE TABLE s4U3u_popOfEnvyList(
        id_pops Int NOT NULL,
        id_envylists Int NOT NULL,
        CONSTRAINT popOfEnvyList_PK PRIMARY KEY (id_pops, id_envylists),
        CONSTRAINT popOfEnvyList_pops_FK FOREIGN KEY (id_pops) REFERENCES s4U3u_pops(id),
        CONSTRAINT popOfEnvyList_envylists0_FK FOREIGN KEY (id_envylists) REFERENCES s4U3u_envylists(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: s4U3u_categoryBrandsLink
#------------------------------------------------------------
CREATE TABLE s4U3u_categoryBrandsLink(
        id_brands Int NOT NULL,
        id_categories Int NOT NULL,
        CONSTRAINT s4U3u_categoryBrandsLink_PK PRIMARY KEY (id_brands, id_categories),
        CONSTRAINT categoryBrandsLink_brands_FK FOREIGN KEY (id_brands) REFERENCES s4U3u_brands(id),
        CONSTRAINT categoryBrandsLink_categories0_FK FOREIGN KEY (id_categories) REFERENCES s4U3u_categories(id)
) ENGINE = InnoDB;