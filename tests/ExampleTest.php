<?php

namespace App\Tests;

use App\Entity\A;
use App\Entity\B;
use App\Repository\BRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class ExampleTest extends KernelTestCase
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var A
     */
    private $a;
    /**
     * @var B
     */
    private $b;

    public function setUp(): void
    {
        self::bootKernel();
        $this->em = self::$container->get(EntityManagerInterface::class);
        $this->em->getConnection()->beginTransaction();

        $this->a = new A();
        $this->em->persist($this->a);

        $this->b = new B();
        $this->b->setSlug('we');
        $this->b->setA($this->a);
        $this->em->persist($this->b);

        $this->em->flush();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        $this->em->close();
        $this->em->getConnection()->rollback();
        $this->em = null;
    }

    public function testExample()
    {
        $repository = self::$container->get(BRepository::class);
        $b = $repository->findBy(['slug' => 'we']);
        $this->em->clear();
        $b = $repository->findBy(['slug' => 'we']);
    }

    public function testExample2()
    {
        $repository = self::$container->get(BRepository::class);
        $b = $repository->findBy(['slug' => 'we']);
        $this->em->clear();
        $b = $repository->findBy(['slug' => 'we']);
    }
}