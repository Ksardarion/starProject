<?php
  class Mail 
  {
  // змінні для шапки
  var $to = "";
  var $from = "";
  var $reply_to = "";
  var $cc = "";
  var $bcc = "";
  var $subject = "";
  var $msg = "";
  var $validate_email = true; 
  // правильність адресів
  var $rigorous_email_check = true; 
  // доступність DNS
  var $allow_empty_subject = false; 
  // поле
  var $allow_empty_msg = false; 
  // поле
    
  var $headers = array();   
  /* массив $headers містить всі поля, окрім to та subject*/
    
  function check_fields()
    /* метод, який викликаємо для провірки*/
  {
    if(empty($this -> to))
    {
      return false;       
    }
    if(!$this -> allow_empty_subject && empty($this -> subject))
    {
      return false;       
    }
    if(!$this -> allow_empty_msg && empty($this -> msg))
    {
      return false;       
    }
    /* додаткові заголовки при наявності пхаєм в наш масив $headers*/
    if(!empty($this -> from))
    {
      $this->headers[] = "From: $this -> from";
    }
    if(!empty($this -> reply_to))
    {
      $this -> headers[] = "Reply_to: $this -> reply_to";
    } 
    // провірка адреси      
    if ($this -> validate_email)
    {
       if (!preg_match("/[-0-9a-z_\.]+@[-0-9a-z_\.]+\.[a-z]{2,6}/i", $this -> to))
       {
          return false;
       }
       return true;
    }
  }
    
  function send()
  /* метод для відправки повідомлення */
  {
     if(!$this -> check_fields()) return true;
     if (mail($this -> to, htmlspecialchars( stripslashes(trim($this -> subject))),
        htmlspecialchars(stripslashes(trim($this -> msg)))))
     {
        return true;
     }else{
        return false;
     } 
  }
}
?>