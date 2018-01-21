<?php

namespace WebLinks\DAO;

use WebLinks\Domain\Link;

//use WebLinks\DAO\UserDAO;

class LinkDAO extends DAO
{   
    /**
     * @var \WebLinks\DAO\UserDAO
     */
    private $userDAO;

    public function setUserDAO(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }

    /**
     * Returns a list of all links, sorted by id.
     *
     * @return array A list of all links.
     */
    public function findAll() {
        $sql = "select * from t_link order by link_id desc";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $entities = array();
        foreach ($result as $row) {
            $id = $row['link_id'];            
            $entities[$id] = $this->buildDomainObject($row);
        }

        return $entities;
    }

    /**  c moi qui rajoute
     * Returns author name.
     *
     * @param integer $id
     */
    public function findAuthorName($userId) {
        $sql = "select user_name from t_user where user_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($userId));
        $userName = $row['user_name'];

        return $userName;
    }

    /**
     * Creates an Link object based on a DB row.
     *
     * @param array $row The DB row containing Link data.
     * @return \WebLinks\Domain\Link
     */
    protected function buildDomainObject($row) {
        $link = new Link();
        $link->setId($row['link_id']);
        $link->setTitle($row['link_title']);
        $link->setUrl($row['link_url']);
        $link->setName(self::findAuthorName($row['user_id']));

        return $link;
    }
}
