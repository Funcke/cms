<?php
namespace Models
{
    use Core\Data\DataObject;

    /**
     * Class Message
     * @package Models
     * @table Message
     */
    class Message extends DataObject
    {
        /**
         * @var integer PRIMARY KEY AUTOINCREMENT
         */
        public $id;
        /**
         * @var integer
         */
        public $Sender;
        /**
         * @var integer
         */
        public $ChatId;
        /**
         * @var VARCHAR(255)
         */
        public $Content;
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