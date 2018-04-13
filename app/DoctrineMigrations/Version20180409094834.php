<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180409094834 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news DROP FOREIGN KEY news_ibfk_1');
        $this->addSql('ALTER TABLE news CHANGE category category INT DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD3995064C19C1 FOREIGN KEY (category) REFERENCES category (id)');
        $this->addSql('ALTER TABLE category CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE is_active is_active TINYINT(1) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category CHANGE id id INT NOT NULL, CHANGE is_active is_active TINYINT(1) DEFAULT \'1\' NOT NULL');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD3995064C19C1');
        $this->addSql('ALTER TABLE news CHANGE category category INT NOT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT news_ibfk_1 FOREIGN KEY (category) REFERENCES category (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
