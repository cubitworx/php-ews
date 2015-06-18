<?php
/**
 * Base class for Exchange Web Service Types
 *
 * @package php-ews
 * @subpackage Types
 */

/**
 * Base class for Exchange Web Service Types
 */
abstract class EWSType
{
    /**
     * Clones any object properties on a type object when it is cloned. Allows
     * for a deep clone required when using object to represent data types when
     * making a SOAP call.
     */
    public function __clone()
    {
        // Iterate over all properties on the current object.
        foreach (get_object_vars($this) as $property => $value) {
            // If the value of the property is an object then clone it.
            if (is_object($value)) {
                $this->$property = clone $value;
            }
            elseif (is_array($value)) {
                // The value is an array that may use objects as values. Iterate
                // over the array and clone any values that are objects into a
                // new array.
                // For some reason, if we try to set $this->$property to an
                // empty array then update it as we go it ends up being empty.
                // If we use a new array that we then set as the value of
                // $this->$property all is well.
                $new_value = array();
                foreach ($value as $index => $array_value) {
                    $new_value[$index] = (is_object($array_value) ? clone $array_value : $array_value);
                }

                // Set the property to the new array.
                $this->$property = $new_value;
            }
        }
    }

		public function asObject( $bIgnoreNullProperties = false ) {
			$obj = new stdClass();
			$reflect = new ReflectionObject( $this );

	    // Iterate over all public properties on the current object.
			foreach( $reflect->getProperties( ReflectionProperty::IS_PUBLIC ) as $prop ) {
				$szName = $prop->getName();
				$mValue = $this->{$szName};
				if( !is_null( $mValue ) ) {
					if( ( $mValue instanceof self ) || ( method_exists( $mValue, 'asObject' ) ) ) {
						$obj->{$szName} = $mValue->asObject( $bIgnoreNullProperties );
					} elseif( is_array( $mValue ) ) {
						$obj->{$szName} = array();
						foreach( $mValue as $mKey => $mElement ) {
							if( $mElement instanceof self ) {
								$obj->{$szName}[$mKey] = $mElement->asObject( $bIgnoreNullProperties );
							} else {
								if( !is_null( $mValue ) || !$bIgnoreNullProperties ) {
									if( is_bool( $mElement ) )
										$mElement = ( $mElement === true ) ? 'true' : 'false';
									$obj->{$szName}[$mKey] = $mElement;
								}
							}
						}
					} else {
						if( !is_null( $mValue ) || !$bIgnoreNullProperties ) {
							if( is_bool( $mValue ) )
								$mValue = ( $mValue === true ) ? 'true' : 'false';
							$obj->{$szName} = $mValue;
						}
					}
				}
	    }

			return $obj;
	  }

}
