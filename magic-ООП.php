<?php

//class MagicClass
//{
//    //конструктор и деструктор
//    public function __construct()
//    {
//    }
//
//    public function __destruct()
//    {
//        // TODO: Implement __destruct() method.
//    }
//    // методы перегрузки
//    public function __call(string $name, array $arguments)
//    {
//        // TODO: Implement __call() method.
//    }
//
//    public function __callStatic($name, $arguments){
//
//    }
//
//    public function __get($name){
//
//    }
//
//    public function __set(string $name, $value): void
//    {
//        // TODO: Implement __set() method.
//    }
//
//    public function __isset(string $name): bool
//    {
//        // TODO: Implement __isset() method.
//    }
//
//    public function __unset(string $name): void
//    {
//        // TODO: Implement __unset() method.
//    }
//
//    // остальные магические методы
//
//    public function __sleep(): array
//    {
//        // TODO: Implement __sleep() method.
//    }
//
//    public function __wakeup(): void
//    {
//        // TODO: Implement __wakeup() method.
//    }
//
//    public function __toString(): string
//    {
//        // TODO: Implement __toString() method.
//    }
//
//    public function __invoke()
//    {
//        // TODO: Implement __invoke() method.
//    }
//
//    public function __debugInfo(): ?array
//    {
//        // TODO: Implement __debugInfo() method.
//    }
//
//    public static function __set_state(array $an_array): object
//    {
//        // TODO: Implement __set_state() method.
//    }
//
//    public function __clone(): void
//    {
//        // TODO: Implement __clone() method.
//    }
//}

//class OverloadProperties
//{
//         private $data = [];
//
//
//        public function __get($name)
//        {
//            return $this->data[$this->converName($name)];
//        }
//
//        public function __set(string $name, $value)
//        {
//            $this->data[$this->converName($name)] = $value;
//        }
//
//        public function __isset(string $name): bool
//        {
//            return array_key_exists($this->converName($name), $this->data);
//        }
//
//        public function __unset(string $name): void
//        {
//            if(array_key_exists($this->converName($name), $this->data)){
//                unset($this->data[$this->converName($name)]);
//            }
//        }
//
//        private function converName($name)
//        {
//            return strtolower($name);
//        }
//}
//
//$overload = new OverloadProperties();
//$overload->test = 'new Test value';
//$overload->TEST = 'second test value';
//
//echo $overload->test . PHP_EOL;
//echo $overload->TEST . PHP_EOL;
//
//echo (isset($overload->test) ? 'yes' : 'no') . PHP_EOL;
//echo (isset($overload->TEST) ? 'yes' : 'no') . PHP_EOL;

class OverloadMethods
{
    public function __call($name,$arguments)
    {
        if(strpos($name, 'say') === 0) {
            return $this->say($this->getWordsFromMethodName($name));
        }
    }

    public static function __callStatic( $name,  $arguments)
    {
        if(strpos($name, 'say') === 0)
        {
            return static::say(static::getWordsFromMethodName($name));
        }
    }

    private static function say($words)
    {
        return implode(' ', $words);
    }

    private static  function getWordsFromMethodName($name)
    {
        //sayALL_Is_Good
        $name = substr($name, 3);

        return explode('_', $name); // ['ALl', 'Is', 'Good']
    }
}

$overload = new OverloadMethods();
echo  $overload->sayAll_Is_Good() . PHP_EOL;
echo OverloadMethods::sayHello_World() . PHP_EOL;