<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>
<?php
include 'header.php';
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

$config = array();
						$config['user'] = 'root';
						$config['pass'] = 'root';
						$config['name'] = 'online_test';
						$config['host'] = 'localhost';
						$config['type'] = 'mysql';
						$config['port'] = null;
						$config['persistent'] = true;
						$db = db::instance($config);

?>
<html>
<body>
    <center>
    <p>Thank You Mr: <?php echo $_SESSION['username']; ?> , Please Note, Your Certification_Id is
    <b><?php echo $arrData['test_id']; ?> </b> and in case of system failure or any technical failure you mayneed this Certification_Id
    to resume your test.Check Your email for further details.</p>
    <a href="<?php echo SITE_PATH; ?>index.php?controller=usertest&function=testStarted&val=<?php echo $arrData['test_id']; ?>&qid=1&test_type=<?php echo $_SESSION['user_test']; ?>&user=1">Start Test</a></center>
</body>
</html>