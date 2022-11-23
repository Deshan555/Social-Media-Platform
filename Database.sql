
CREATE DATABASE EventsWave;

USE EventsWave;

CREATE TABLE Users(

  User_ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  
  FULL_NAME VARCHAR(100) NOT NULL,

  USER_NAME varchar(50) NOT NULL,
  
  USER_TYPE varchar(2) NOT NULL,

  PASSWORD_S varchar(50) NOT NULL,

  EMAIL varchar(60)  NOT NULL,

  IMAGE varchar(200) DEFAULT "assets/images/profile_pics/default.png",
  
  FACEBOOK varchar(200) DEFAULT "www.facebook.com",
  
  WHATSAPP varchar(200) DEFAULT "www.webwhatsapp.com",
  
  BIO varchar(500) DEFAULT "bio here",

  FALLOWERS int(11) DEFAULT 0,

  FALLOWING int(11) DEFAULT 0,

  POSTS int(11) DEFAULT 0
  );


  CREATE TABLE Posts(
  
  Post_ID int(11) PRIMARY KEY AUTO_INCREMENT,
  
  User_ID int(11) NOT NULL,
  
  Likes int(11) NOT NULL,
  
  Img_Path text  NOT NULL,
  
  Caption varchar(250) NOT NULL,
  
  HashTags varchar(250) NOT NULL,
  
  Date_Upload DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  
  USER_NAME varchar(50)  NOT NULL,
  
  Profile_Img text NOT NULL,
  
);

  CREATE TABLE Videos(
  
  Video_ID int(11) PRIMARY KEY AUTO_INCREMENT,
  
  User_ID int(11) NOT NULL,
  
  Likes int(11) NOT NULL,
  
  Video_Path text  NOT NULL,
  
  Caption varchar(250) NOT NULL,
  
  HashTags varchar(250) NOT NULL,
  
  Date_Upload DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  
  USER_NAME varchar(50)  NOT NULL,
  
  Profile_Img text NOT NULL
  
);