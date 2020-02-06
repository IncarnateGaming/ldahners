<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200206001151 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book CHANGE name name VARCHAR(191) NOT NULL, CHANGE amazon_link amazon_link VARCHAR(191) NOT NULL, CHANGE image_name image_name VARCHAR(191) DEFAULT NULL');
        $this->addSql('ALTER TABLE merchandise CHANGE name name VARCHAR(191) NOT NULL, CHANGE link link VARCHAR(191) NOT NULL, CHANGE image_name image_name VARCHAR(191) DEFAULT NULL');
        $this->addSql('ALTER TABLE review CHANGE name name VARCHAR(191) NOT NULL, CHANGE hyperlink hyperlink VARCHAR(191) NOT NULL');
        $this->addSql('ALTER TABLE series CHANGE name name VARCHAR(191) NOT NULL');
        $this->addSql('ALTER TABLE series_review CHANGE name name VARCHAR(191) NOT NULL, CHANGE hyperlink hyperlink VARCHAR(191) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(191) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE amazon_link amazon_link VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE image_name image_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE merchandise CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE link link VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE image_name image_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE review CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE hyperlink hyperlink VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE series CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE series_review CHANGE name name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE hyperlink hyperlink VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
