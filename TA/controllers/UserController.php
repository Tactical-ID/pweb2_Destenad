<?php

include_once '../../models/User.php';

class UserController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new User($db);
    }

    public function login($username, $password)
    {
        return $this->model->login($username, $password);
    }

    public function getNim($username)
    {
        return $this->model->getNim($username);
    }

    public function getUserDetails($nim)
    {
        return $this->model->getUserDetails($nim);
    }

    public function getMahasiswaDetails($nim)
    {
        return $this->model->getMahasiswaDetails($nim);
    }

    public function updateMahasiswaDetails($nim, $newDetails)
    {
        return $this->model->updateMahasiswaDetails($nim, $newDetails);
    }

    public function getProfilePictureUrl($nim)
    {
        return $this->model->getProfilePictureUrl($nim);
    }
}
