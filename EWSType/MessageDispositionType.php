<?php
/**
 * Definition of the MessageDispositionType type.
 *
 * @package php-ews
 * @subpackage Types
 */

/**
 * Definition of the MessageDispositionType type.
 */
class EWSType_MessageDispositionType extends EWSType
{
    /**
     * Only save.
     *
     * @var string
     */
    const SAVE_ONLY = 'SaveOnly';

    /**
     * Only send.
     *
     * @var string
     */
    const SEND_ONLY = 'SendOnly';

    /**
     * Send and save copy.
     *
     * @var string
     */
    const SEND_AND_SAVE_COPY = 'SendAndSaveCopy';
}
