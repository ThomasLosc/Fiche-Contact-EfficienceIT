<?php

namespace App\DataFixtures;

use App\Entity\CompanyDepartment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $departments = [
            ['name' => 'Direction', 'email' => 'direction@example.com'],
            ['name' => 'RH', 'email' => 'rh@example.com'],
            ['name' => 'COM', 'email' => 'com@example.com'],
            ['name' => 'DEV', 'email' => 'dev@example.com'],
        ];

        foreach ($departments as $departmentData) {
            $department = new CompanyDepartment();
            $department->setName($departmentData['name']);
            $department->setEmail($departmentData['email']);
            $manager->persist($department);
        }

        $manager->flush();
    }
}
