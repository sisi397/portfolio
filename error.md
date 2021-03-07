### HY000/1045 에러
#### 1) 비밀번호 오류
실제 DB의 비밀번호와 config.inc.php의 비밀번호와 다를 경우.  
C:\xampp\phpMyAdmin\config.inc.php에서  
$cfg['Servers'][$i]['password'] = '비밀번호';  같은지 확인.

#### 2) 포트 중복 오류 (전에 사용하던 DB가 3306을 사용중)
MySQL-> config->my.ini  
port=3307로 수정.  

C:\xampp\phpMyAdmin\config.inc.php에서  
$cfg['Servers'][$i]['host'] = '127.0.0.1:3307'; 로 수정
