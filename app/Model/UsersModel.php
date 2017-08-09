<?php

namespace Model;

class UsersModel extends \W\Model\UsersModel {
    
    public function sendEmail($to, $subject, $htmlContent, $textContent='') {
        // PHPMAILER
        $mail = new \PHPMailer();
        
        // $app pour récupérer des données dans config.php, par exemple 
        $app = getApp();
		

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.live.com';                        // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'bigmanutd@hotmail.fr';                 // SMTP username
//        $mail->Password = file_get_contents('pwd.txt');                           // SMTP password
        $mail->Password = $app->getConfig('mail_password');          // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        
        // le port étant définit dans config.php, on utilise $app->getConfig('mail_port') 
        $mail->Port = $app->getConfig('mail_port');            // TCP port to connect to
        // sans $app->getConfig('mail_port') :
//        $mail->Port = 587;            
 
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('bigmanutd@hotmail.fr', 'Kevin');
        $mail->addAddress($to);     // Add a recipient
        // $mail->addAddress('jesus.kevin93@hotmail.com', 'Kevin 2');     // Add a recipient

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//         $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $htmlContent;
        $mail->AltBody = $textContent;

        if(!$mail->send()) {
//            echo 'Message could not be sent.';
            return 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return 'Message has been sent';
        }
    }

    public function searchToken(array $search,  $stripTags = true){

        $sql = 'SELECT * FROM ' . $this->table.' WHERE';
                
		foreach($search as $key => $value){
			$sql .= " `$key` = :$key ";
		}

		$sth = $this->dbh->prepare($sql);

		foreach($search as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(':'.$key, $value);
		}
		if(!$sth->execute()){
			return false;
		}
        return $sth->fetchAll();
	}    
        
        
    
}
