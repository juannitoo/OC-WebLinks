<?php

namespace WebLinks\Domain;

class User 
{
    /**
     * User id.
     *
     * @var integer
     */
    private $id;

    /**
     * User name.
     *
     * @var string
     */
    private $name;

    /**
     * User password.
     *
     * @var string
     */
    private $password;

    /**
     * User salt.
     *
     * @var string
     */
    private $salt;

    /**
     * User role.
     *
     * @var string
     */
    private $role;

    /**
     * Associated link.
     *
     * @var \weblinks\Domain\Link
     */
    private $link;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setLink(Link $link) {
        $this->link = $link;
        return $this;
    }
}
