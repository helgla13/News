<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180408114742 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pages CHANGE is_published is_published TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE news CHANGE is_active is_active TINYINT(1) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE subscribe subscribe TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE comments CHANGE created_at created_at DATETIME NOT NULL, CHANGE is_active is_active TINYINT(1) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE is_active is_active TINYINT(1) DEFAULT \'1\' NOT NULL');
        $this->addSql('ALTER TABLE news CHANGE is_active is_active TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE pages CHANGE is_published is_published TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE subscribe subscribe TINYINT(1) DEFAULT \'0\' NOT NULL');
    }
}
