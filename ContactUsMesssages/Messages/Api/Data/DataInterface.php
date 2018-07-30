<?php

namespace ContactUsMesssages\Messages\Api\Data;

interface DataInterface
{
    const MESSAGE_ID        = 'message_id';
    const EMAIL        		= 'email';
	const NAME        		= 'name';
	const PHONE        		= 'phone';
    const MESSAGE  			= 'message';
    const IS_ACTIVE         = 'is_active';
    const CREATED_AT        = 'created_at';
 
   
    public function getId();
    
    public function getEmail();
    	
    public function getName();
	
    public function getPhone();

    public function getMessage(); 

    public function getIsActive();
    public function setIsActive($isActive);
	
    public function getCreatedAt();  
}
