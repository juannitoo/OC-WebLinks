<?php

namespace WebLinks\DAO;

use Doctrine\DBAL\Connection;
use WebLinks\Domain\User;

class UserDAO extends DAO 
{
    /**
     * Returns user details.
     *
     * @return user details.
     */
    public function findUserDetails($userId){
        $sql = "select * from t_user where user_id = ?";
        $row = $this->getDb()->fetchAssoc($sql, array($userId)); 
        $userDetails = $this->buildDomainObject($row);

        return $userDetails;
    }

    
    /**
     * Creates a User object based on a DB row.
     *
     * @param array $row The DB row containing User data.
     * @return \WebLinks\Domain\User
     */
    protected function buildDomainObject($row) {
        $user = new User();
        $user->setId($row['user_id']);
        $user->setName($row['user_name']);
        $user->setPassword($row['user_password']);
        $user->setSalt($row['user_salt']);  
        $user->setRole($row['user_role']);     
        
        return $user;
    }
}