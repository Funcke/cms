<?php
namespace Models
{
    use Core\Data\DataObject;

    /**
     * Class Attempt
     * @package Models
     * @table Attempt
     */
    class Attempt extends DataObject
    {
        /**
         * @var integer PRIMARY KEY AUTOINCREMENT
         */
        public $id;
        /**
         * @var integer
         */
        public $Successful;
        /**
         * @var integer
         */
        public $QuizPartId;
        /**
         * @var integer
         */
        public $UserId;
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