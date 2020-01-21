<?php
namespace Models
{
    use Core\Data\DataObject;

    /**
     * Class Quiz
     * @package Models
     * @table Quiz
     */
    class Quiz extends DataObject
    {
        /**
         * @var integer PRIMARY KEY AUTOINCREMENT
         */
        public $id;
        /**
         * @var VARCHAR(50)
         */
        public $Title;
        /**
         * @var integer
         */
        public $OwnerId;
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