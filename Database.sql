
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
  
  Caption varchar(700) NOT NULL,
  
  HashTags varchar(250) NOT NULL,
  
  Date_Upload DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (User_ID) REFERENCES Users(User_ID)

);

CREATE TABLE Videos(
  
  Video_ID int(11) PRIMARY KEY AUTO_INCREMENT,
  
  User_ID int(11) NOT NULL,
  
  Likes int(11) NOT NULL,
  
  Video_Path text  NOT NULL,
  
  Caption varchar(250) NOT NULL,
  
  HashTags varchar(250) NOT NULL,
  
  Date_Upload DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (User_ID) REFERENCES Users(User_ID)
);

ALTER TABLE Videos ADD Thumbnail_Path varchar(255);

CREATE TABLE Fallowing(
  
  ID int(11) PRIMARY KEY AUTO_INCREMENT,

  User_Id int(11) NOT NULL,

  Other_user_id int(11) NOT NULL

);

CREATE TABLE Comments(
  
  COMMENT_ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

  POST_ID INT(11) NOT NULL,

  USER_ID INT(11) NOT NULL,

  COMMENT  text  NOT NULL,

  DATE DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (POST_ID) REFERENCES Posts(Post_ID),

  FOREIGN KEY (USER_ID) REFERENCES Users(User_ID)

);

CREATE TABLE Likes(

    Like_ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

    Post_ID INT(11) NOT NULL,

    User_ID INT(11) NOT NULL,

    FOREIGN KEY (POST_ID) REFERENCES Posts(Post_ID),

    FOREIGN KEY (USER_ID) REFERENCES Users(User_ID)
);

CREATE TABLE Comments_Vid(

    COMMENT_ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

    VIDEO_ID INT(11) NOT NULL,

    USER_ID INT(11) NOT NULL,

    COMMENT  text  NOT NULL,

    DATE DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (VIDEO_ID) REFERENCES Videos(Video_ID),

    FOREIGN KEY (USER_ID) REFERENCES Users(User_ID)
);

CREATE TABLE Likes_Vid(

    Like_ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

    Video_ID INT(11) NOT NULL,

    User_ID INT(11) NOT NULL,

    FOREIGN KEY (Video_ID) REFERENCES Videos(Video_ID),

    FOREIGN KEY (USER_ID) REFERENCES Users(User_ID)
);

CREATE TABLE Events(

    Event_ID int(11) PRIMARY KEY AUTO_INCREMENT,

    User_ID int(11) NOT NULL,

    Likes int(11) NOT NULL,

    Event_Poster text  NOT NULL,

    Caption varchar(250) NOT NULL,

    Event_Time time NOT NULL,

    Event_Date DATETIME NOT NULL ,

    Invite_Link text NOT NULL,

    HashTags varchar(250) NOT NULL,

    Date_Upload DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (User_ID) REFERENCES Users(User_ID)
);

CREATE TABLE Likes_Events(

    Like_ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

    Event_ID INT(11) NOT NULL,

    User_ID INT(11) NOT NULL,

    FOREIGN KEY (Event_ID) REFERENCES Events(Event_ID),

    FOREIGN KEY (USER_ID) REFERENCES Users(User_ID)
);

CREATE TABLE Comments_Events(

   COMMENT_ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

   Event_ID INT(11) NOT NULL,

   USER_ID INT(11) NOT NULL,

   COMMENT  text  NOT NULL,

   DATE DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,

   FOREIGN KEY (Event_ID) REFERENCES Events(Event_ID),

   FOREIGN KEY (USER_ID) REFERENCES Users(User_ID)
);

CREATE TABLE Admin
(
    Admin_ID INT(11)  AUTO_INCREMENT PRIMARY KEY,

    User_Name varchar(100) NOT NULL,

    Password varchar(100) NOT NULL
);

CREATE TABLE Special_Events(

    Event_ID int(11) PRIMARY KEY AUTO_INCREMENT,

    Caption varchar(250) NOT NULL,

    Event_Time time NOT NULL,

    Event_Date DATETIME NOT NULL ,

    Invite_Link text NOT NULL,

    Date_Upload DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP
);
