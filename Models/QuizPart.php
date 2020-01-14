<?php
namespace Models
{
    use Core\Data\DataObject;

    /**
     * Class QuizPart
     * @package Models
     * @table QuizPart
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
        public $English;
        /**
         * @var VARCHAR(50)
         */
        public $German;
        /**
         * @var integer, foreign key(QuizId) references User(id)
         */
        public $QuizId;
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