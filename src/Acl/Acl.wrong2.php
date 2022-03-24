<?php

namespace App\Acl;

class Acl
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function check($resource, $privilege, $role)
    {
        if (!array_key_exists($resource, $this->data)) {
            throw new ResourceUndefined();
        }

        if (!array_key_exists($privilege, $this->data[$resource])) {
            return false;
        }

        $roles = $this->data[$resource][$privilege];
        if (!in_array($role, $roles)) {
            throw new AccessDenied('Access denied');
        }
    }
}