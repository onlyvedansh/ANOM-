CREATE TABLE users (
  username    VARCHAR2(50) PRIMARY KEY,
  firstname   VARCHAR2(50) NOT NULL,
  middlename  VARCHAR2(50),  -- optional
  lastname    VARCHAR2(50) NOT NULL,
  email       VARCHAR2(100) UNIQUE NOT NULL,
  phoneno     VARCHAR2(15) UNIQUE NOT NULL,
  region      VARCHAR2(50),
  password    VARCHAR2(255) NOT NULL
);
