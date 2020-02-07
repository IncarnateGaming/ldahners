<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200207161304 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_81BB1695E237E06 ON upload_file');
        $this->addSql('ALTER TABLE upload_file ADD name1 VARCHAR(255) NOT NULL, ADD type1 VARCHAR(255) NOT NULL, DROP name, DROP type, CHANGE description description1 LONGTEXT NOT NULL, CHANGE `order` order1 INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_81BB1696AE169FC ON upload_file (name1)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_81BB1696AE169FC ON upload_file');
        $this->addSql('ALTER TABLE upload_file ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP name1, DROP type1, CHANGE description1 description LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE order1 `order` INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_81BB1695E237E06 ON upload_file (name)');
    }
}
