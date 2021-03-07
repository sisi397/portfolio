#### 포트 중복 오류 (전에 사용하던 DB가 3306을 사용중)
MySQL-> config->my.ini
port=3307로 수정.

C:\xampp\phpMyAdmin\config.inc.php에서
$cfg['Servers'][$i]['host'] = '127.0.0.1:3307'; 로 수정
