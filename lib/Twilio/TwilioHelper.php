<?php
namespace Twilio;

require_once __DIR__ . '/../../twilio.php';

use Bundle\CoreBundle\Controller as CoreController;

class TwilioHelper
{
    const TWILIO_API_VERSION = "2010-04-01";
    
    /**
     *
     * @var string 
     */
    protected $accountSid;
    
    /**
     *
     * @var string 
     */
    protected $authToken;
    
    /**
     *
     * @var TwilioRestClient 
     */
    protected $client;

    /**
     *
     * @param string $accountSid
     * @param string $authToken 
     */
    function __construct($accountSid = null, $authToken = null) {
        if(!is_null($accountSid)) {
            $this->accountSid = $accountSid;
        }
        else {
            $this->accountSid = CoreController::container()->getParameter('fridge.twilio.account_sid');
        }
        
        if(!is_null($authToken)) {
            $this->authToken = $authToken;
        }
        else {
            $this->authToken = CoreController::container()->getParameter('fridge.twilio.auth_token');
        }
        
        $this->client = new \TwilioRestClient($this->accountSid, $this->authToken);
    }
    
    /**
     *
     * @return TwilioRestClient 
     */
    public function getClient() {
        return $this->client;
    }
    
    /**
     *
     * @return string 
     */
    public function getAccountSid() {
        return $this->accountSid;
    }
}