<?php
/**
 * Definition of the GetStreamingEventsType type
 *
 * @package php-ews
 * @subpackage Types
 */

/**
 * Definition of the GetStreamingEventsType type
 */
class EWSType_GetStreamingEventsType extends EWSType
{
    /**
     * ConnectionTimeout property
     *
     * @var EWSType_ConnectionTimeoutType
     */
    public $ConnectionTimeout;

    /**
     * SubscriptionIds property
     *
     * @var EWSType_SubscriptionIdsType
     */
    public $SubscriptionIds;
}
