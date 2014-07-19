<?php


namespace models;


class Agent  extends ActiveRecord\Model
{
    public $table_name = 'cscart_agents';
    public $user_id;
    public $surname;
    public $name;
    public $midname;
    public $town;
    public $phone;
    public $id_superagent;
    public $email;
    public $id_contract;
    public $password;
    public $login;
    public $status;

//    public function __construct() {
////        parent::__construct();
//        $this->table_name = ModelCore::$_TABLE_PREFIX_ . $this->table_name;
//    }

    // a person can have many orders and payments
    static $has_many = array(
        array('orders'),
        array('clients'),
        array('subagents'),
    );

    static $belongs_to = array(
        array('cities'),
        array('subagents'),
        array('contracts'),
        array('agent_statuses')
    );



    // must have a name and a state
    static $validates_presence_of = array(
        array('name'),/* array('state')*/);
}
?>