<?php
require_once('config.php');

class email_class {
	
	function __CONSTRUCT($to, $subject, $body, $attachments) {
		$this->send_email($to, $subject, $body, $attachments);
	}
	
	private function send_email($to, $subject, $body, $attachments) {
		require_once('Mail.php');
		require_once('Mail/mime.php');
		require_once('Mail/mail.php');
			 
		$headers = array ('From' => _EMAIL_ADDRESS, 'To' => $to, 'Subject' => $subject);
		 
		// attachment
		$crlf = "\n";
		 
		$mime = new Mail_mime($crlf);
		$mime->setHTMLBody($body);
		//$mime->addAttachment($attachment, 'text/plain');
		
		if (is_array($attachments)) {
			foreach($attachments as $attachment) {
				$mime->addAttachment($attachment, 'text/plain');
			}
		}
		
		$body = $mime->get();
		$headers = $mime->headers($headers);
		 
		$smtp = Mail::factory('smtp', array ('host' => _EMAIL_SERVER, 'auth' => true, 'username' => _EMAIL_USER, 'password' => _EMAIL_PASSWORD));
		 
		$mail = $smtp->send($to, $headers, $body);
		 
		if (PEAR::isError($mail)) {
			echo("<p>" . $mail->getMessage() . "</p>");
		}
		else {
			echo("<p>Message successfully sent!</p>");
		}
	}

}
?>