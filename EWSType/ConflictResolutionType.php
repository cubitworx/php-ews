<?php
/**
 * Definition of the ConflictResolutionType type.
 *
 * @package php-ews
 * @subpackage Types
 */

/**
 * Definition of the ConflictResolutionType type.
 */
class EWSType_ConflictResolutionType extends EWSType
{
    /**
     * Never overwrite Exchange data.
     *
     * @var string
     */
    const NEVER_OVERWRITE = 'NeverOverwrite';

    /**
     * Automatically resolve conflict.
     *
     * @var string
     */
    const AUTO_RESOLVE = 'AutoResolve';

    /**
     * Always overwrite Exchange data.
     *
     * @var string
     */
    const ALWAYS_OVERWRITE = 'AlwaysOverwrite';
}
