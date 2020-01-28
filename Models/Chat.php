<?php
namespace Models
{
    use Core\Data\DataObject;

    /**
     * Class Chat
     * @package Models
     * @table Chat
     */
    class Chat extends DataObject
    {
        /**
         * @var integer PRIMARY KEY AUTOINCREMENT
         */
        public $id;
        /**
         * @var integer
         */
        public $User1;
        /**
         * @var integer
         */
        public $User2;
        /**
         * @var date
         */
        public $CreatedAt;
        
        function __construct()
        {
            parent::__construct();
            $this->CreatedAt = date("Y-m-d H:i:s");
        }
    }
}

?>