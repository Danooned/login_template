<?php

class User {

	function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    function getSalt()
    {
        return $this->salt;
    }

    function setSalt($salt) {
        $this->salt = $salt;
        return $this;
    }

    function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    function getPassword()
    {
        return $this->password;
    }

}