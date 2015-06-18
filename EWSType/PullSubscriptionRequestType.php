<?php
/**
 * Definition of the PullSubscriptionRequestType type
 *
 * @package php-ews
 * @subpackage Types
 */

/**
 * Definition of the PullSubscriptionRequestType type
 */
class EWSType_PullSubscriptionRequestType extends EWSType_BaseSubscriptionRequestType
{
    /**
     * Timeout property
     *
     * @var EWSType_SubscriptionTimeoutType
     */
    public $Timeout;
}
