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
         * @var integer, foreign key(QuizPartId) references QuizPart(id)
         */
        public $QuizPartId;
        /**
         * @var integer, foreign key(UserId) references User(id)
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