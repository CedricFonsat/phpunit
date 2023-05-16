<?php

namespace App\Tests;

use App\Entity\Book;
use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testGetId()
    {
        $book = new Book();
        $book->setId(1);
        static::assertEquals(1, $book->getId());
    }
    public function testGetTitle()
    {
        $book = new Book();
        $book->setTitle('Le Petit Prince');
        static::assertEquals('Le Petit Prince', $book->getTitle());
    }
    public function testGetAuthor()
    {
        $book = new Book();
        $book->setAuthor('Antoine de Saint-Exupéry');
        static::assertEquals('Antoine de Saint-Exupéry', $book->getAuthor());
    }

    public function testGetCategoryName()
    {
        // Crée un mock de la classe Category
        $categoryMock = $this->createMock(Category::class);
        static::assertInstanceOf(Category::class, $categoryMock);
        // Configure le mock pour retourner 'Fiction' lors de l'appel à la méthode 'getName'
        $categoryMock->method('getName')->willReturn('Fiction');
        // Utilise le mock de Category lors de la création de l'instance de Book
        $book = new Book($categoryMock);
        // Teste si la méthode 'getCategoryName' retourne le nom de la catégorie défini par le mock
        $this->assertEquals('Fiction', $book->getCategoryName());
    }
}
