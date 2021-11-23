-- DB作成
create database login_test;

-- 権限付与
grant all on login_test.* to dbuser@localhost identified by 'test';

-- DB切り替え
  use login_test

-- テーブル作成
create table users (
  id int not null auto_increment primary key,
  email varchar(255) unique,
  password datetime,
  created datetime,
  modified datetime
);

desc users;
