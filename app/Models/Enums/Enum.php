<?php

	namespace App\Models\Enums;

	use ReflectionClass;

    class Enum {

        public static function getNameByValue($const)
        {
            $calledClass = get_called_class();

            $reflect = new ReflectionClass ( $calledClass );
            $constants = $reflect->getConstants();

            foreach ( $constants as $name => $value )
            {
                if ( $value == $const )
                {
                    return $name;
                }
            }

            return NULL;
        }

        public static function getAll()
        {
            $calledClass = get_called_class();

            $reflect = new ReflectionClass ( $calledClass);
            return array_flip($reflect->getConstants());
        }
	}
